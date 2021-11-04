<?php

namespace App\Http\Controllers;


use App\Bundle;
use App\CourseOwn;
use App\Payment;
use App\Product;
use App\TopUp;
use App\User;
use App\Wallet;
use Illuminate\Support\Facades\Auth;
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
            'redirect_url' => route('callback-aff'),
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
                "title" => '7DC Registration',
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
//        $wallet = Wallet::where('user_id', $user->id)->first();
//        $wallet->balance = $wallet->balance + 12000;
//        $wallet->save();

            $payment = new Payment();
            $payment->payment_id = random_int(20, 1000).$user->id;
            $payment->gateway_response = 'success';
            $payment->ip_address = 'none';
            $payment->channel = 'flutterwave';
            $payment->amount = 10000;
            $payment->reference = 'ref';
            $payment->payment_type = 'card';
            $payment->item = 'yearly7D';
            $payment->user_id = $user->id;
            $payment->save();


            $user->verified = 1;
            $user->save();
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

        return redirect()->to('/home')->with('success', 'your payment was received and your account will be approved shortly. you\'ll be notified when ready.');

    }

     public function callbackAff()
    {
        $user = Auth::user();
        $wallet = Wallet::where('user_id', $user->id)->first();
//        $wallet->balance = $wallet->balance + 12000;
//        $wallet->referral_bonus = $wallet->referral_bonus + 12000;
//        $wallet->save();
//
//            $payment = new Payment();
//            $payment->payment_id = random_int(20, 1000).$user->id;
//            $payment->gateway_response = 'success';
//            $payment->ip_address = 'none';
//            $payment->channel = 'flutterwave';
//            $payment->amount = 10000;
//            $payment->reference = 'ref';
//            $payment->payment_type = 'card';
//            $payment->item = 'affiliate';
//            $payment->user_id = $user->id;
//            $payment->save();
//
//
//            $user->affiliate = 1;
//            $user->save();


        return redirect()->to('/account')->with('success', 'Congrats! You are now an affiliate!');

    }


    public function courseBought()
    {
        $user = Auth::user();

        $product = Product::find($user->item);

        $payment = new Payment();
        $payment->payment_id = random_int(20, 1000).$user->id;
        $payment->gateway_response = 'success';
        $payment->ip_address = 'none';
        $payment->channel = 'flutterwave';
        $payment->amount = $product->amount;
        $payment->reference = 'ref';
        $payment->payment_type = 'card';
        $payment->item = $product->id;
        $payment->user_id = $user->id;
        $payment->save();


        $own = new CourseOwn();
        $own->product_id = $user->item;
        $own->user_id = $user->id;
        $own->save();

        $amount = $product->amount*$product->commission;

        $wallet1 = Wallet::where('user_id', $user->referred_by_1)->first();
        $wallet1->balance = $wallet1->balance + ($amount);
        $wallet1->referral_bonus = $wallet1->referral_bonus + ($amount);
        $wallet1->save();

        $topup = new TopUp();
        $topup->wallet_id = $wallet1->id;
        $topup->owner_id = $user->referred_by_1;
        $topup->user_id = $user->id;
        $topup->amount = $amount;
        $topup->description = 'Wallet credited with referral sale for course: '.$product->name;
        $topup->type = 'credit';
        $topup->save();


        $user->item = '';
        $user->referred_by_1 = 7;
        $user->save();

        return redirect()->to('/products/'.$product->id)->with('success', 'your payment was received');

    }


    public function buyBundle()
    {
        $user = Auth::user();
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

        $product = Bundle::find($user->item);

        $payment = new Payment();
        $payment->payment_id = random_int(20, 1000).$user->id;
        $payment->gateway_response = 'success';
        $payment->ip_address = 'bundle';
        $payment->channel = 'flutterwave';
        $payment->amount = $product->price;
        $payment->reference = 'ref';
        $payment->payment_type = 'card';
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

        $own = new CourseOwn();
        $own->product_id = $product->id;
        $own->user_id = $user->id;
        $own->save();

        $amount = $product->amount*$product->commission;

        $wallet1 = Wallet::where('user_id', $user->referred_by_1)->first();
        $wallet1->balance = $wallet1->balance + ($amount);
        $wallet1->referral_bonus = $wallet1->referral_bonus + ($amount);
        $wallet1->save();

        $topup = new TopUp();
        $topup->wallet_id = $wallet1->id;
        $topup->owner_id = $user->referred_by_1;
        $topup->user_id = $user->id;
        $topup->amount = $amount;
        $topup->description = 'Wallet credited with referral sale '.$product->title;
        $topup->type = 'credit';
        $topup->save();


        $user->item = '';
//        $user->referred_by_1 = 7;
        $user->save();

        return redirect()->to('/bundles/'.$product->id)->with('success', 'your payment was received');

    }

    public function callback2()
    {
        $user = Auth::user();

        $payment = new Payment();
        $payment->payment_id = random_int(20, 1000).$user->id;
        $payment->gateway_response = 'success';
        $payment->ip_address = 'none';
        $payment->channel = 'flutterwave';
        $payment->amount = 120000;
        $payment->reference = 'ref';
        $payment->payment_type = 'card';
        $payment->item = 'lifetime7D';
        $payment->user_id = $user->id;
        $payment->save();


        $user->verified = 1;
        $user->save();
        $total = 120000;


        //credit first referral
//        if($user->referred_by_1 != null){
//            $referral1 = User::find($user->referred_by_1);
//            if($referral1){
//                $wallet1 = Wallet::where('user_id', $referral1->id)->first();
//                $wallet1->referral_bonus = $wallet1->referral_bonus + ($total*0.5);
//                $wallet1->save();
//                $total = $total - ($total*0.5);
//            }
//        }
        //credit second referral
//        if($user->referred_by_2 != null){
//            $referral2 = User::find($user->referred_by_2);
//            if($referral2){
//                $wallet1 = Wallet::where('user_id', $referral2->id)->first();
//                $wallet1->referral_bonus = $wallet1->referral_bonus + ($total*0.1);
//                $wallet1->save();
//                $total = $total - ($total*0.1);
//            }
//        }
        //admin AYO
//        $wallet1 = Wallet::where('user_id', 7)->first();
//        $wallet1->referral_bonus = $wallet1->referral_bonus + ($total*0.2);
//        $wallet1->save();
//        $total = $total - ($total*0.2);
//
//        //company gets balance
//        $companyWallet = Wallet::find(1);
//        $companyWallet->referral_bonus = $companyWallet->referral_bonus + $total;
//        $companyWallet->save();

        return redirect()->to('/account')->with('success', 'your payment was received and your account will be approved shortly. you\'ll be notified when ready.');

    }
}