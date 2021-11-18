<?php

namespace App\Http\Controllers;


use App\Bundle;
use App\CourseOwn;
use App\Mail\NewUserMail;
use App\Notifications\AdminSale;
use App\Notifications\AffiliateSale;
use App\Notifications\CreatorSale;
use App\Notifications\NewAction;
use App\Notifications\NewAffiliate;
use App\Notifications\NewSignup;
use App\Payment;
use App\Product;
use App\TopUp;
use App\User;
use App\Wallet;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use KingFlamez\Rave\Facades\Rave as Flutterwave;


class FlutterwaveController extends Controller
{

    /**
     * Initialize Rave payment process
     * @return void
     */
    public function initialize()
    {
        $user = Auth::user();
        //This generates a payment reference
        $reference = Flutterwave::generateReference();


        // Enter the details of the payment
        $data = [
            'payment_options' => 'card,banktransfer',
            'amount' => request()->amount,
            'email' => $user->email,
            'tx_ref' => $reference,
            'currency' => "NGN",
            'redirect_url' => route('callback'),
            'customer' => [
                'email' => $user->email,
                "phone_number" => $user->phone,
                "name" => $user->name.' '.$user->last_name
            ],

            "customizations" => [
                "title" => '7DC Registration',
                "description" => "Creator sign up fee"
            ]
        ];





        $payment = Flutterwave::initializePayment($data);

//        "{"status":"success","message":"Hosted Link","data":{"link":"https://checkout.flutterwave.com/v3/hosted/pay/fc738fb3bc631e59366b"}}"

        $json = json_decode($payment, true);
       // dd($json);
        if ($json['status'] !== 'success') {
            // notify something went wrong
            return;
        }

        return redirect($json['data']['link']);
    }

    public function initializeAff()
    {
        $user = Auth::user();
        //This generates a payment reference
        $reference = Flutterwave::generateReference();


        // Enter the details of the payment
        $data = [
            'payment_options' => 'card,banktransfer',
            'amount' => request()->amount,
            'email' => $user->email,
            'tx_ref' => $reference,
            'currency' => "NGN",
            'redirect_url' => route('callbackAff'),
            'customer' => [
                'email' => $user->email,
                "phone_number" => $user->phone,
                "name" => $user->name.' '.$user->last_name
            ],

            "customizations" => [
                "title" => '7DC - Affiliate Registration',
                "description" => "Affiliate sign up fee"
            ]
        ];





        $payment = Flutterwave::initializePayment($data);

//        "{"status":"success","message":"Hosted Link","data":{"link":"https://checkout.flutterwave.com/v3/hosted/pay/fc738fb3bc631e59366b"}}"

        $json = json_decode($payment, true);
        if ($json['status'] !== 'success') {
            // notify something went wrong
            return;
        }

        return redirect($json['data']['link']);
    }



    public function buyCourse()
    {
        $user = Auth::user();
        if($user == null){

            $arrRules = array(
                'email' => ['required', 'string', 'email', 'max:255',Rule::unique('users')],
                'name' => ['required', 'string', 'max:200'],
                'phone' => ['required', 'string', 'max:255'],
            );

            $refferer = null;


            $user = User::where('email', request()->input('email'))->first();
            if($user)return back()->withError('email address already exist');

            $objRequest = request()->all();


            $this->validate(request(), $arrRules);


            $objRequest['password'] = Hash::make(request('email'));
            $objRequest['username'] = request()->email;
            $objRequest['last_name'] = request()->name;

            $user = User::create($objRequest);

            $wallet = new Wallet();
            $wallet->user_id = $user->id;
            $wallet->save();

//            $credentials = request()->validate([
//                'email' => ['required', 'email'],
//                'password' => ['required'],
//            ]);

            if (Auth::attempt(['email' =>request()->email, 'password' =>request()->email, ])) {
                request()->session()->regenerate();

                $user->sendEmailVerificationNotification();

                $user->notify(new NewUserMail($user));

                if(session()->get('ref') != null) return redirect()->to(session()->get('ref'));

                //  return redirect()->to('/home');
            }


            $admins = User::where('role', 'A')->get();
            $emails = array();
            foreach ($admins as $admin){
                $admin->notify(new NewSignup($user));;
            }
        }
        $user->item = request()->product_id;
        $user->referred_by_1 = request()->ref_id;
        $user->save();

        //This generates a payment reference
        $reference = Flutterwave::generateReference();


        // Enter the details of the payment
        $data = [
            'payment_options' => 'card,banktransfer',
            'amount' => request()->amount,
            'email' => $user->email,
            'tx_ref' => $reference,
            'currency' => "NGN",
            'redirect_url' => route('courseBought'),
            'customer' => [
                'email' => $user->email,
                "phone_number" => $user->phone,
                "name" => $user->name.' '.$user->last_name
            ],

            "customizations" => [
                "title" => 'Buy Course',
                "description" => "Creator sign up fee"
            ]
        ];





        $payment = Flutterwave::initializePayment($data);

//        "{"status":"success","message":"Hosted Link","data":{"link":"https://checkout.flutterwave.com/v3/hosted/pay/fc738fb3bc631e59366b"}}"

        $json = json_decode($payment, true);
        if ($json['status'] !== 'success') {
            // notify something went wrong
            return;
        }

        return redirect($json['data']['link']);
    }

    /**
     * Obtain Rave callback information
     * @returnvoid
     * @throws \Exception
     */
     public function callback()
    {
        $user = Auth::user();
        $status = request()->status;

//        return $status.' 1';

        //if payment is successful
        if ($status ==  'successful') {

            $transactionID = Flutterwave::getTransactionIDFromCallback();
            $data = Flutterwave::verifyTransaction($transactionID);
            $user->verified = 1;
            $user->save();


            $payment = new Payment();
            $payment->payment_id = random_int(20, 1000).$user->id;
            $payment->gateway_response = 'success';
            $payment->ip_address = 'none';
            $payment->channel = 'flutterwave';
            $payment->amount = 10500;
            $payment->reference = $transactionID.' ref';
            $payment->payment_type = 'card';
            $payment->item = 'creator';
            $payment->user_id = $user->id;
            $payment->save();

            //dd($data);
        }
        elseif ($status ==  'cancelled'){
            return redirect()->to('/account')->with('error', 'Transaction was cancelled!');
        }
        else{
            //Put desired action/code after transaction has failed here
        }
//        $wallet = Wallet::where('user_id', $user->id)->first();
//        $wallet->balance = $wallet->balance + 12000;
//        $wallet->save();

//            $payment = new Payment();
//            $payment->payment_id = random_int(20, 1000).$user->id;
//            $payment->gateway_response = 'success';
//            $payment->ip_address = 'none';
//            $payment->channel = 'flutterwave';
//            $payment->amount = 10000;
//            $payment->reference = 'ref';
//            $payment->payment_type = 'card';
//            $payment->item = 'yearly7D';
//            $payment->user_id = $user->id;
//            $payment->save();



            $total = 10000;
            //credit first referral
//            if($user->referred_by_1 != null){
//                $referral1 = User::find($user->referred_by_1);
//                if($referral1){
//                    $wallet1 = Wallet::where('user_id', $referral1->id)->first();
//                    $wallet1->referral_bonus = $wallet1->referral_bonus + 4000;
//                    $wallet1->save();
//                    $total = $total - 4000;
//                }
//            }
//            //credit second referral
//            if($user->referred_by_2 != null){
//                $referral2 = User::find($user->referred_by_2);
//                if($referral2){
//                    $wallet1 = Wallet::where('user_id', $referral2->id)->first();
//                    $wallet1->referral_bonus = $wallet1->referral_bonus + 2000;
//                    $wallet1->save();
//                    $total = $total - 2000;
//                }
//            }
//        if($user->referred_by_3 != null){
//            $referral3 = User::find($user->referred_by_3);
//            if($referral3){
//                $wallet1 = Wallet::where('user_id', $referral3->id)->first();
//                $wallet1->referral_bonus = $wallet1->referral_bonus + 2000;
//                $wallet1->save();
//                $total = $total - 2000;
//            }
//        }
            //admin AYO
//            $wallet1 = Wallet::where('user_id', 7)->first();
//            $wallet1->referral_bonus = $wallet1->referral_bonus + 2000;
//            $wallet1->save();
//            $total = $total - 2000;
//
//            //company gets balance
//            $companyWallet = Wallet::find(1);
//            $companyWallet->referral_bonus = $companyWallet->referral_bonus + $total;
//            $companyWallet->save();

        return redirect()->to('/account')->with('success', 'your payment was received and your account will be approved shortly. you\'ll be notified when ready.');

    }

     public function callbackAff()
    {
        $user = Auth::user();
        if(request()->user_id) $user = User::find(request()->user_id);
//        $wallet = Wallet::where('user_id', $user->id)->first();
//        $wallet->balance = $wallet->balance + 12000;
//        $wallet->referral_bonus = $wallet->referral_bonus + 12000;
//        $wallet->save();
         $transactionID = Flutterwave::getTransactionIDFromCallback();
//
            $payment = new Payment();
            $payment->payment_id = random_int(20, 1000).$user->id;
            $payment->gateway_response = 'success';
            $payment->ip_address = 'none';
            $payment->channel = 'flutterwave';
            $payment->amount = 10500;
            $payment->reference = $transactionID.' ref';
            $payment->payment_type = 'card';
            $payment->item = 'affiliate';
            $payment->user_id = $user->id;
            $payment->save();
//
//
            $user->affiliate = 1;
            $user->save();
         $user->notify(new NewAffiliate($user->name));

         //credit first referral
         if($user->referred_by_1 != null){
             $refsName = $user->name.' '.$user->middle_name .' '.$user->last_name;
             $referral1 = User::find($user->referred_by_1);

             $successMsg = 'Yo! You are balling! Anyways we’ll not have it otherwise.
                    You just made 8000 because '.$user->name.' '.$user->middle_name .' '.$user->last_name .' made payment for account verification. Way to go, you are securing the bag and your future too.
                    Remember to share your knowledge and strategies with your team members. You’ll only shine as bright as they do. 
                    Remember to reach out to '.$user->name.' '.$user->middle_name .' '.$user->last_name .' to say thank you and to offer post-payment service and support.';

             if($referral1)$referral1->notify(new NewAction($successMsg, 'Congratulations, your referral made a payment!'));

             $wallet1 = Wallet::where('user_id', $referral1->id)->first();
             $wallet1->balance = $wallet1->balance + 5000;
             $wallet1->referral_bonus = $wallet1->referral_bonus + 5000;
             $wallet1->save();


             $topup = new TopUp();
             $topup->wallet_id = $wallet1->id;
             $topup->owner_id = $referral1->id;
             $topup->user_id = $user->id;
             $topup->amount = 5000;
             $topup->description = 'Referral 1 bonus';
             $topup->type = '';
             $topup->save();

         }



     $successMsgUser = " Hello Admin,
        The following user is now an Affiliate,
        
        Email: ".$user->email."
        
        Whatsapp Number: ".$user->phone."
        
        The community is getting bigger, Team!!
        Oyaaaaaa!!
        Let’s SOAR, Team!
        
        Signed, 
        The 7D Team.";

         $admins = User::where('role', 'A')->get();

         foreach ($admins as $admin){
             $admin->notify(new NewAction($successMsgUser, 'New Affiliate Onboard!'));
         }


        return redirect()->to('/account')->with('success', 'Congrats! You are now an affiliate!');

    }


    public function courseBought()
    {
        $user = Auth::user();

        $status = request()->status;

        if ($status ==  'cancelled'){
            return redirect()->to('/account')->with('error', 'Transaction was cancelled!');
        }

        $product = Product::find($user->item);

        $transactionID = Flutterwave::getTransactionIDFromCallback();

        $payment = new Payment();
        $payment->payment_id = random_int(20, 1000).$user->id;
        $payment->gateway_response = 'success';
        $payment->ip_address = 'none';
        $payment->channel = 'flutterwave';
        $payment->amount = $product->amount;
        $payment->reference = $transactionID.'  1';
        $payment->payment_type = 'course';
        $payment->item = $product->id;
        $payment->user_id = $user->id;
        $payment->save();


        $own = new CourseOwn();
        $own->product_id = $user->item;
        $own->user_id = $user->id;
        $own->save();

        $amount = $product->commission;

        //admin wallet
        $walletAdmin = Wallet::where('user_id', 1484)->first();
        $walletAdmin->balance = $walletAdmin->balance + $product->d_commission;
        $walletAdmin->referral_bonus = $walletAdmin->referral_bonus +  $product->d_commission;
        $walletAdmin->worth = $walletAdmin->worth + $product->price;
        $walletAdmin->sales = $walletAdmin->sales + 1;
        $walletAdmin->save();


        //Creator wallet
        $walletCreator = Wallet::where('user_id', $product->user_id)->first();
        $walletCreator->balance = $walletCreator->balance + ($product->price - ($product->commission +$product->d_commission));
        $walletCreator->referral_bonus = $walletCreator->referral_bonus + ($product->price - ($product->commission +$product->d_commission));
        $walletCreator->worth = $walletCreator->worth + $product->price;
        $walletCreator->sales = $walletCreator->sales + 1;
        $walletCreator->save();


        //Affiliate wallet
        if($user->referred_by_1 != 1484){
            $wallet1 = Wallet::where('user_id', $user->referred_by_1)->first();
            if($wallet1){

                $wallet1->balance = $wallet1->balance + ($amount);
                $wallet1->referral_bonus = $wallet1->referral_bonus + ($amount);
                $wallet1->sales = $wallet1->sales + 1;
                $wallet1->save();

                $topup = new TopUp();
                $topup->wallet_id = $wallet1->id;
                $topup->owner_id = $user->referred_by_1;
                $topup->user_id = $user->id;
                $topup->amount = $amount;
                $topup->description = 'Wallet credited with referral sale for course: '.$product->name;
                $topup->type = 'credit';
                $topup->save();
            }
        }



        $creator = User::find($product->user_id);

        $creator->notify(new CreatorSale($creator, $product->name, $user));
        $affiliate = User::find($user->referred_by_1);


        if($affiliate){
            $affiliate->notify(new AffiliateSale($affiliate, $product));
        }else{

        }

        $user->item = '';
        $user->referred_by_1 = 1484;
        $user->save();



        $admins = User::where('role', 'A')->get();

        foreach ($admins as $admin){
            if($affiliate){

            }else{

            }
            $admin->notify(new AdminSale($affiliate, $product, $user));
        }


        return redirect()->to('/products/'.$product->id)->with('success', 'your payment was received');

    }


    public function buyBundle()
    {
        $user = Auth::user();
        if($user == null){

            $arrRules = array(
                'email' => ['required', 'string', 'email', 'max:255',Rule::unique('users')],
                'name' => ['required', 'string', 'max:200'],
                'phone' => ['required', 'string', 'max:255'],
            );

            $refferer = null;


            $user = User::where('email', request()->input('email'))->first();
            if($user)return back()->withError('email address already exist');

            $objRequest = request()->all();


            $this->validate(request(), $arrRules);


            $objRequest['password'] = Hash::make(request('email'));
            $objRequest['username'] = request()->email;
            $objRequest['last_name'] = request()->name;

            $user = User::create($objRequest);

            $wallet = new Wallet();
            $wallet->user_id = $user->id;
            $wallet->save();

//            $credentials = request()->validate([
//                'email' => ['required', 'email'],
//                'password' => ['required'],
//            ]);

            if (Auth::attempt(['email' =>request()->email, 'password' =>request()->email, ])) {
                request()->session()->regenerate();

                $user->sendEmailVerificationNotification();

                $user->notify(new NewUserMail($user));

                if(session()->get('ref') != null) return redirect()->to(session()->get('ref'));

                //  return redirect()->to('/home');
            }


            $admins = User::where('role', 'A')->get();
            $emails = array();
            foreach ($admins as $admin){
                $admin->notify(new NewSignup($user));;
            }
        }
        $user->item = request()->product_id;
        $user->referred_by_1 = request()->ref_id;
        $user->save();

        //This generates a payment reference
        $reference = Flutterwave::generateReference();


        // Enter the details of the payment
        $data = [
            'payment_options' => 'card,banktransfer',
            'amount' => request()->amount,
            'email' => $user->email,
            'tx_ref' => $reference,
            'currency' => "NGN",
            'redirect_url' => route('bundleBought'),
            'customer' => [
                'email' => $user->email,
                "phone_number" => $user->phone,
                "name" => $user->name.' '.$user->last_name
            ],

            "customizations" => [
                "title" => 'Buy Bundle',
                "description" => "Buy a bundle"
            ]
        ];





        $payment = Flutterwave::initializePayment($data);

//        "{"status":"success","message":"Hosted Link","data":{"link":"https://checkout.flutterwave.com/v3/hosted/pay/fc738fb3bc631e59366b"}}"

        $json = json_decode($payment, true);


        return redirect($json['data']['link']);
    }

    public function bundleBought()
    {
        $user = Auth::user();

        $status = request()->status;

        if ($status ==  'cancelled'){
            return redirect()->to('/account')->with('error', 'Transaction was cancelled!');
        }
        $product = Bundle::find($user->item);

        $transactionID = Flutterwave::getTransactionIDFromCallback();

        $payment = new Payment();
        $payment->payment_id = random_int(20, 1000).$user->id;
        $payment->gateway_response = 'success';
        $payment->ip_address = 'bundle';
        $payment->channel = 'flutterwave';
        $payment->amount = $product->price;
        $payment->reference = $transactionID.' ref';
        $payment->payment_type = 'bundle';
        $payment->item = $product->id;
        $payment->user_id = $user->id;
        $payment->save();

        if($product->product_1){

            $own = new CourseOwn();
            $own->product_id = $product->product_1;
            $own->user_id = $user->id;
            $own->save();
        }

        if($product->product_2){

            $own = new CourseOwn();
            $own->product_id = $product->product_2;
            $own->user_id = $user->id;
            $own->save();
        }

        if($product->product_3){

            $own = new CourseOwn();
            $own->product_id = $product->product_3;
            $own->user_id = $user->id;
            $own->save();
        }

        if($product->product_4){

            $own = new CourseOwn();
            $own->product_id = $product->product_4;
            $own->user_id = $user->id;
            $own->save();
        }

        if($product->product_5){

            $own = new CourseOwn();
            $own->product_id = $product->product_5;
            $own->user_id = $user->id;
            $own->save();
        }

        if($product->product_6){

            $own = new CourseOwn();
            $own->product_id = $product->product_6;
            $own->user_id = $user->id;
            $own->save();
        }

        if($product->product_7){

            $own = new CourseOwn();
            $own->product_id = $product->product_7;
            $own->user_id = $user->id;
            $own->save();
        }

        $own = new CourseOwn();
        $own->product_id = $product->id;
        $own->user_id = $user->id;
        $own->save();

        $amount = $product->commission;

        $affiliate = User::find($user->referred_by_1);


        //admin wallet
        $walletAdmin = Wallet::where('user_id', 1484)->first();
        $walletAdmin->balance = $walletAdmin->balance + $product->d_commission;
        $walletAdmin->referral_bonus = $walletAdmin->referral_bonus +  $product->d_commission;
        $walletAdmin->worth = $walletAdmin->worth + $product->price;
        $walletAdmin->sales = $walletAdmin->sales + 1;
        $walletAdmin->save();


        //Creator wallet
        $walletCreator = Wallet::where('user_id', $product->created_by)->first();
        $walletCreator->balance = $walletCreator->balance + ($product->price - ($product->commission +$product->d_commission));
        $walletCreator->referral_bonus = $walletCreator->referral_bonus + ($product->price - ($product->commission +$product->d_commission));
        $walletCreator->worth = $walletCreator->worth + $product->price;
        $walletCreator->sales = $walletCreator->sales + 1;
        $walletCreator->save();


        //Affiliate wallet
        if($user->referred_by_1 != 1484){
            $wallet1 = Wallet::where('user_id', $user->referred_by_1)->first();
            if($wallet1){

                $wallet1->balance = $wallet1->balance + ($amount);
                $wallet1->referral_bonus = $wallet1->referral_bonus + ($amount);
                $wallet1->sales = $wallet1->sales + 1;
                $wallet1->save();

                $topup = new TopUp();
                $topup->wallet_id = $wallet1->id;
                $topup->owner_id = $user->referred_by_1;
                $topup->user_id = $user->id;
                $topup->amount = $amount;
                $topup->description = 'Wallet credited with referral sale for course: '.$product->title;
                $topup->type = 'credit';
                $topup->save();
            }
        }



        $creator = User::find($product->created_by);

        $creator->notify(new CreatorSale($creator, $product->title, $user));
        //$affiliate = User::find($user->referred_by_1);


        if($affiliate){
            $affiliate->notify(new AffiliateSale($affiliate, $product));
        }else{

        }

        $user->item = '';
        $user->referred_by_1 = 1484;
        $user->save();



        $admins = User::where('role', 'A')->get();

        foreach ($admins as $admin){
            if($affiliate){

            }else{

            }
            $admin->notify(new AdminSale($affiliate, $product, $user));
        }

        return redirect()->to('/bundles/'.$product->id)->with('success', 'your payment was received');

    }

    public function callback2()
    {
        $user = Auth::user();

        $status = request()->status;

        return $status.' 2';



        $user->verified = 1;
        $user->save();

//
//        $payment = new Payment();
//        $payment->payment_id = random_int(20, 1000).$user->id;
//        $payment->gateway_response = 'success';
//        $payment->ip_address = 'none';
//        $payment->channel = 'flutterwave';
//        $payment->amount = 10500;
//        $payment->reference = 'ref';
//        $payment->payment_type = 'card';
//        $payment->item = 'creator';
//        $payment->user_id = $user->id;
//        $payment->save();



        return redirect()->to('/account')->with('success', 'your payment was received and your account will be approved shortly. you\'ll be notified when ready.');

    }
}