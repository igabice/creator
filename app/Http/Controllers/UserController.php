<?php

namespace App\Http\Controllers;

use App\Campaign;
use App\Notifications\NewAction;
use App\Notifications\NewAffiliate;
use App\Notifications\NewAffiliateRefferal;
use App\Notifications\NewCreator;
use App\Payment;
use App\Payouts;
use App\Product;
use App\TopUp;
use App\Wallet;
use Auth;
use App\User;
use App\State;

use Carbon\Carbon;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Mail;
use App\Mail\NewUserMail;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    use Notifiable;

    public function __construct(){
        $this->middleware('auth')->except([]);
    }

    public function allMarketers(){
        $user = Auth::guard('web')->user();
        $data = User::where('role', 'M')->get();
        $user->title = 'Affiliates';
        return view('users.list', compact('data', 'user'));
    }

    public function referrals(){
        $user = Auth::guard('web')->user();
        $data = User::where('referred_by_1', $user->id)->get();
        $user->title = 'Affiliates';
        return view('users.list', compact('data', 'user'));
    }
    public function index(){
        $user = Auth::guard('web')->user();
        $data = User::all();
        $user->title = 'User';
        return view('all-users', compact('data', 'user'));
    }

    public function allCreators(){
        $user = Auth::guard('web')->user();
        $data = User::where('role', 'C')->get();
        $user->title = 'Creators';
        return view('users.list', compact('data', 'user'));
    }

    public function profile(){
        return view('profile.profile');
    }

    public function verifyKyc($id){
        $user = User::find($id);
        $user->is_kyc = 1;
            $user->save();
            
            $successMsgUser = 'Your details have been verified, now you can withdraw from your wallet! <br/>
                    You’re a rockstar! <br/>';
                    $user->notify(new NewAction($successMsgUser, 'You’re a rockstar!')); 
                    
        $admins = User::where('role', '=', 'A')->get();
            
        foreach($admins as $admin){
            $successMsg = 'Hurray! <br/> <br/>
                        An affiliates KYC details have been approved! <br/>
                        The affiliate details are as follows <br/>
                        Name : '.$user->name.' '.$user->middle_name .' '.$user->last_name .'. <br/>
                        WhatsApp Number : '.$user->phone .'<br/> 
                        Email Address : '.$user->email .' <br/>
                        Name of Referrer : ';
            $admin->notify(new NewAction($successMsg, 'New KYC Verification!'));    
        }
        
        return back()->withSuccess('KYC verified!');
    }
    public function verify($id){
        $user = User::find($id);
        // if($user->verified == 1){
        //     return back()->withError('account already verified!');
        // }
        //$user->id_verified = 1;

$wallet = Wallet::where('user_id', $user->id)->first();
        $wallet->balance = $wallet->balance + 12000;
        $wallet->save();
        
        $topup = new TopUp();
        $topup->wallet_id = $wallet->id;
        $topup->owner_id = $user->id;
        $topup->user_id = Auth::guard('web')->user()->id;
        $topup->amount = 12000;
        $topup->description = 'Verification bonus';
        $topup->type = '';
        $topup->save();
 
            $payment = new Payment();
            $payment->payment_id = random_int(20, 1000).$user->id;
            $payment->gateway_response = 'success';
            $payment->ip_address = $_SERVER['SERVER_NAME'];
            $payment->channel = 'flutterwave';
            $payment->amount = 10000;
            $payment->reference = 'ref';
            $payment->payment_type = 'card';
            $payment->item = 'yearly7D';
            $payment->user_id = $user->id;
            $payment->save();


            $user->verified = 1;
            $user->save();
            
                    

            $successMsgUser = 'Thank you for taking this step to verify your account. Say bye-bye to being small. Thank you for believing in the mission!  <br/>
                    You’re now a verified member of the 7DC family. Now let’s go get that private jet. <br/>
                    As a show of gratitude, and to support and also encourage your efforts, we’ve credited your e-wallet with a membership bonus of N12,000. <br/>
                    Kudos to you, '.$user->name.' '.$user->middle_name .' '.$user->last_name .' <br/>
                    You’re a rockstar! <br/>';
                    $user->notify(new NewAction($successMsgUser, 'You’re a rockstar!')); 
            
            
            $total = 10000;
            $refsName = '';
            //credit first referral
            if($user->referred_by_1 != null){
                $refsName = $user->name.' '.$user->middle_name .' '.$user->last_name;
                $referral1 = User::find($user->referred_by_1);
                
                $successMsg = 'Yo! You are balling! Anyways we’ll not have it otherwise. <br/>
                    You just made 4000 because '.$user->name.' '.$user->middle_name .' '.$user->last_name .' made payment for account verification. Way to go, you are securing the bag and your future too.<br/>
                    Remember to share your knowledge and strategies with your team members. You’ll only shine as bright as they do. <br/>
                    Remember to reach out to '.$user->name.' '.$user->middle_name .' '.$user->last_name .' to say thank you and to offer post-payment service and support.';
                    $referral1->notify(new NewAction($successMsg, 'Congratulations, your referral made a payment!')); 
                if($referral1){
                    $wallet1 = Wallet::where('user_id', $referral1->id)->first();
                    $wallet1->balance = $wallet1->balance + 4000;
                    $wallet1->save();
                    $total = $total - 4000;
                }
            }
            

            $admins = User::where('role', '=', 'A')->get();
            
            foreach($admins as $admin){
                $successMsg = 'Hurray! <br/> <br/>
                            The 7DC Platform is growing, Kudos team! <br/>
                            The affiliate details are as follows <br/>
                            Name : '.$user->name.' '.$user->middle_name .' '.$user->last_name .'. <br/>
                            WhatsApp Number : '.$user->phone .'<br/> 
                            Email Address : '.$user->email .' <br/>
                            Name of Referrer : ';
                $admin->notify(new NewAction($successMsg, 'New Affiliate Verification!'));    
            }
            
            //credit second referral
            if($user->referred_by_2 != null){
                $referral2 = User::find($user->referred_by_2);
                
                $successMsg = 'Yo! You are balling! Anyways we’ll not have it otherwise. <br/>
                    You just made 2000 because '.$user->name.' '.$user->middle_name .' '.$user->last_name .' made payment for account verification. Way to go, you are securing the bag and your future too.<br/>
                    Remember to share your knowledge and strategies with your team members. You’ll only shine as bright as they do. <br/>
                    Remember to reach out to '.$user->name.' '.$user->middle_name .' '.$user->last_name .' to say thank you and to offer post-payment service and support.';
                    $referral2->notify(new NewAction($successMsg, 'Congratulations, your referral made a payment!'));  
                if($referral2){
                    $wallet1 = Wallet::where('user_id', $referral2->id)->first();
                    $wallet1->balance = $wallet1->balance + 2000;
                    $wallet1->save();
                    $total = $total - 2000;
                }
            }
        if($user->referred_by_3 != null){
            $referral3 = User::find($user->referred_by_3);
            
            $successMsg = 'Yo! You are balling! Anyways we’ll not have it otherwise. <br/>
                    You just made 1000 because '.$user->name.' '.$user->middle_name .' '.$user->last_name .' made payment for account verification. Way to go, you are securing the bag and your future too.<br/>
                    Remember to share your knowledge and strategies with your team members. You’ll only shine as bright as they do. <br/>
                    Remember to reach out to '.$user->name.' '.$user->middle_name .' '.$user->last_name .' to say thank you and to offer post-payment service and support.';
                    $referral3->notify(new NewAction($successMsg, 'Congratulations, your referral made a payment!')); 
            if($referral3){
                $wallet1 = Wallet::where('user_id', $referral3->id)->first();
                $wallet1->balance = $wallet1->balance + 1000;
                $wallet1->save();
                $total = $total - 1000;
            }
        }
            //admin AYO
            $wallet1 = Wallet::where('user_id', 7)->first();
            $wallet1->balance = $wallet1->balance + 2000;
            $wallet1->save();
            $total = $total - 2000;

            //company gets balance
            $companyWallet = Wallet::find(1);
            $companyWallet->balance = $companyWallet->balance + $total;
            $companyWallet->save();


            //return redirect()->to('/home')->with('success', 'your payment was received and your account will be approved shortly. you\'ll be notified when ready.');



        return back()->withSuccess('account verified!');
    }

    public function updateProfile(Request $request){
        $this->validate($request, [
            'current_password'=>['required', 'String', 'min:8', 'max:20'],
            'new_password'=>['required', 'String', 'min:8', 'max:20', 'confirmed'],
        ]);

        $user=User::find(auth()->user()->id);
        if(!$user)return back()->withError('user account does not exist');

        if(!Hash::check($request->current_password, $user->password))return back()->withError('Old password is not correct');

        $user->password=Hash::make($request->new_password);
        if($user->save())return back()->withSuccess('password has been updated');
        else return back()->withError('an error occurred');
    }
    public function idCard(Request $request){

        $arrData = User::find($request->id);
        $arrRules = array(
           // 'email' => ['required', 'string', 'email', 'max:255'],
            'name' => ['required', 'string', 'max:200'],
            'id_card'=>['required', 'mimes:jpeg,jpg,png', 'max:2000'],
            'id_type'=>['required'],
            'last_name' => ['max:200'],
            'phone' => ['required', 'string', 'max:255'],
            // 'password' => ['required','min:6'],
        );

//        $user=User::where('email', $request->input('email'))->where('id', '!=', $request->id)->first();
//        if($user != null){
//            if($user->id != $request->id)return back()->withError('email address already registered with another user');
//        }
        $objRequest = $request->all();


        $this->validate(request(), $arrRules);

        // $objRequest['password'] = Hash::make(request('password'));

        $objRequest['phone']=str_replace(' ', '', $objRequest['phone']);

        if ($request->hasFile('id_card')) {
            $fileName = null;
            $file = $request->file('id_card');
            $fileName = time().$file->getClientOriginalName();
            $pathmeter_correct =  date('Y').'/'. date('m').'/'. date('d').'/';
            $fileName = $pathmeter_correct.$fileName;
            $file->move('./uploads/idcard/'. $pathmeter_correct, $fileName);
            //$user->id_card = "/uploads/idcard/".$fileName;
            $objRequest['id_card'] = "/uploads/idcard/".$fileName;
        }

        $arrData->update($objRequest);

        $user=User::find($request->id);


        if($user->save())return back()->withSuccess('updated successfully');
        else return back()->withError('an error occurred');
    }


    public function show($id)
    {
        $user = User::find($id);
//        $ref1 = User::find($user->referred_by_1);
//        $ref2 = User::find($user->referred_by_2);
//        $ref3 = User::find($user->referred_by_3);
//
//        $referrals = User::where('referred_by_1', $user->id)->get();

        $campaigns = Campaign::join('products', 'products.id', '=', 'campaign.product_id')
            ->select('*')
            ->where('campaign.user_id', $user->id)
            ->get();
        $data = Product::where('user_id', $user->id)->get();

        return view('dashboard.index', ['data'=>$data,'user'=>$user, 'campaigns'=> $campaigns]);
    }


//    public function show($id)
//    {
//        $user = User::find($id);
//
//        if($user->role == 'M' || $user->id == 7){
//            $data = Campaign::join('products', 'products.id', '=', 'campaign.product_id')
//                ->select('*')
//                ->where('campaign.user_id', $user->id)
//                ->get();
//
//                $ref1 = User::find($user->referred_by_1);
//        $ref2 = User::find($user->referred_by_2);
//        $ref3 = User::find($user->referred_by_3);
//
//        $referrals = User::where('referred_by_1', $user->id)->get();
//
//
//        $arr = ['data'=>$data,'user'=>$user, 'ref1' => $ref1, 'ref2' => $ref2, 'ref3'=> $ref3, 'referrals' => $referrals];
//        //return $arr;
//            return view('users.marketerview', $arr);
//        }
//        $data = Product::where('user_id', $user->id)->get();
//
//
//        return view('users.viewcreator', ['data'=>$data,'user'=>$user]);
//    }


    public function myPaymentDetails()
    {
        $data = Auth::user();

        return view('users.account_details', ['data'=>$data]);
    }

    public function payouts(){
        $today = Carbon::now();
        $user = Auth::guard('web')->user();
        $payouts = Payouts::where('user_id', $user->id)->get();
        $pending = Payouts::where('verified', 0)->where('user_id', $user->id)->first();


        $wallet = Wallet::where('user_id', $user->id)->first();
        $data = ['user'=>$user, 'payouts'=>$payouts, 'pending' => $pending, 'wallet' =>$wallet, 'today'=> $today];
        return view('users.payouts', $data);
    }

    public function allPayouts(){

        $user = Auth::guard('web')->user();

        $payouts = Payouts::leftjoin('users','payouts.user_id', 'users.id')
            ->select('payouts.id as pid', 'payouts.amount', 'payouts.created_at', 'payouts.verified',
                'payouts.updated_at', 'users.name', 'payouts.user_id', 'users.last_name')
            ->get();

        $data = ['user'=>$user, 'data'=>$payouts];
        return view('all-payouts', $data);
    }

    public function approvePayouts(Request $request){
        $arrData = Payouts::find($request->pid);
//        return $request;
        $user = User::find($arrData->user_id);

        $wallet = $user->myWallet();

        if($arrData != null){
            if($arrData->verified  == 1)return back()->withError('already approved');
        }
        if($wallet->balance < $arrData->amount){
            if($arrData->verified  == 1)return back()->withError('the payout requested is less than available wallet balance');
        }
        $objRequest = $request->all();

        $arrData->update($objRequest);
        $msg='Payout approved successfully.';

        $topup = new TopUp();
        $topup->wallet_id = $wallet->id;
        $topup->owner_id = $arrData->user_id;
        $topup->user_id = Auth::guard('web')->user()->id;
        $topup->amount = $arrData->amount;
        $topup->description = 'Payout approved';
        $topup->type = $request->type;
        $topup->save();

        // $wallet->balance = $wallet->balance -  $arrData->amount;
        // $wallet->save();

        return redirect()->to('/all-payouts')->with('success', $msg);
    }


    public function updateWallet(Request $request){

        $arrRules = array(
            'amount' => ['required'],
            'user_id' => ['required'],
            'type' => ['required'],
        );

        $this->validate(request(), $arrRules);


        $user = User::find(request()->user_id);

        $wallet = $user->myWallet();


        $msg='Wallet credited successfully.';

        $topup = new TopUp();
        $topup->wallet_id = $wallet->id;
        $topup->owner_id = request()->user_id;
        $topup->user_id = Auth::guard('web')->user()->id;
        $topup->amount = request()->amount;
        $topup->description = 'Wallet credited';
        $topup->type = $request->type;
        $topup->save();
        
        if($request->type == 'credit'){
            $wallet->balance = $wallet->balance +  request()->amount;
        }else{
            $wallet->balance = $wallet->balance -  request()->amount;
        }
        $wallet->save();

        return back()->with('success', $msg);
    }

    public function requestPayouts(Request $request){
        $arrRules = array(
            'amount' => ['required',], //'integer|digits_between:24000,200000'
            'password' => ['required','min:6'],
        );

        $user= User::where('id', $request->user_id)->first();

        $pending = Payouts::where('verified', 0)->where('user_id', $user->id)->first();

        if($pending)return back()->withError('Payout can not be processed right now. You still have a pending request.');

        $objRequest = $request->all();
        if(!Hash::check($request->password, $user->password))return back()->withError('Incorrect password');

        if($request->amount < 24000)return back()->withError('Minimum amount allowed for withdrawal is 24,000.');

        $this->validate(request(), $arrRules);

        $payout = Payouts::create($objRequest);

//        try{
//            Mail::to($user->email)->send(new NewUserMail($user));
//        }catch(\Exception $ex){
//            //return $ex->getMessage();
//        }

        $msg='Request submitted successfully.';

        $wallet = Wallet::where('user_id', $request->user_id)->first();
        $wallet->balance = $wallet->balance -  $payout->amount;
        $wallet->save();


        return redirect()->to('/my-payouts')->with('success', $msg);
    }

    public function createform()
    {
        return view('users.create', ['title'=>'Create ']);
    }
    public function edit($id)
    {
        $data= User::find($id);
        return view('users.edit', ['data'=>$data]);
    }

    function store(Request $request){
        $arrRules = array(
            'email' => ['required', 'string', 'email', 'max:255',Rule::unique('users')],
            'name' => ['required', 'string', 'max:200'],
            'role' => ['required'],
            'last_name' => ['max:200'],
            'phone' => ['required', 'string', 'max:255'],
            'password' => ['required','min:6'],
        );

        $user=User::where('email', $request->input('email'))->first();
        if($user)return back()->withError('email','email address already exist');
        $objRequest = $request->all();
        //if($objRequest['password'] != $objRequest['password2'])return back()->withError('passwords do not match');

        $this->validate(request(), $arrRules);

        $objRequest['password'] = Hash::make(request('password'));
        if ($request->hasFile('image')) {
            $fileName = null;
            $file = $request->file('image');
            $fileName = time().$file->getClientOriginalName();
            $pathmeter_correct =  date('Y').'/'. date('m').'/'. date('d').'/';
            $fileName = $pathmeter_correct.$fileName;
            $file->move('./uploads/image/'. $pathmeter_correct, $fileName);
            $objRequest['image'] = "/uploads/image/".$fileName;
        }
        $objRequest['phone']=str_replace(' ', '', $objRequest['phone']);

        $user = User::create($objRequest);

//        try{
//            Mail::to($user->email)->send(new NewUserMail($user));
//        }catch(\Exception $ex){
//            //return $ex->getMessage();
//        }
        $msg='User created successfully.';
        if($user->role == 'M'){
            $user->notify(new NewAffiliate($user->name));
        }else{
            $user->notify(new NewCreator($user->name));
        }
        $user->sendEmailVerificationNotification();
        //$this->notify(new NewAction('Your account was created successfully', $user->name));

        $wallet = new Wallet();
        $wallet->user_id = $user->id;
        $wallet->save();

        if($user->role == 'M'){
            return redirect()->to('/marketers')->with('success', $msg);
        }

        return redirect()->to('/creators')->with('success', $msg);

    }



    public function update(Request $request){
        $arrData = User::find($request->id);
        $arrRules = array(
            'email' => ['required', 'string', 'email', 'max:255'],
            'name' => ['required', 'string', 'max:200'],
            'role' => ['required'],
            'id' => ['required'],
            'last_name' => ['max:200'],
            'phone' => ['required', 'string', 'max:255'],
           // 'password' => ['required','min:6'],
        );

        $user=User::where('email', $request->input('email'))->where('id', '!=', $request->id)->first();
        if($user != null){
            if($user->id != $request->id)return back()->withError('email address already registered with another user');
        }        $objRequest = $request->all();


        $this->validate(request(), $arrRules);

       // $objRequest['password'] = Hash::make(request('password'));

        $objRequest['phone']=str_replace(' ', '', $objRequest['phone']);

        $arrData->update($objRequest);
        $msg='User updated successfully.';

        if($arrData->role == 'M'){
            return redirect()->to('/marketers')->with('success', $msg);
        }

        return redirect()->to('/users')->with('success', $msg);
    }

    public function updateAccount(Request $request){
        $arrData = User::find($request->id);
        $arrRules = array(
            'bank' => ['required', 'string',],
            'account_name' => ['required', 'string',],
            'account_number' => ['required'],
        );

        $objRequest = $request->all();


        $this->validate(request(), $arrRules);

        $arrData->update($objRequest);

        $msg='Updated successfully.';

        return redirect()->to('/home')->with('success', $msg);
    }

    function registerUser(Request $request){

        $arrRules = array(
            'email' => ['required', 'string', 'email', 'max:255',Rule::unique('users')],
            'username' => ['required', 'string', 'max:50',Rule::unique('users')],
            'name' => ['required', 'string', 'max:200'],
            'role' => ['required'],
            'last_name' => ['max:200'],
             'phone' => ['required', 'string', 'max:255'],
            'password' => ['required','min:6'],
        );

        $refferer = null;
        if($request->referred_by_1){

            $refferer = User::find($request->referred_by_1);
        }

        $user = User::where('email', $request->input('email'))->first();
        if($user)return back()->withError('email address already exist');

        $objRequest = $request->all();

        if($request->password != $request->password1)return back()->withError('passwords do not match');

        $this->validate(request(), $arrRules);


        if($refferer != null){
            $objRequest['referred_by_2'] = $refferer->referred_by_1;
            if($refferer->referred_by_2){
            $objRequest['referred_by_3'] = $refferer->referred_by_2;
        }else{
            
        }
            
        }
        $objRequest['password'] = Hash::make(request('password'));

        //$objRequest['phone']=str_replace(' ', '', $objRequest['phone']);

        $user = User::create($objRequest);

        $wallet = new Wallet();
        $wallet->user_id = $user->id;
        $wallet->save();

        try{
            Mail::to($user->email)->send(new NewUserMail($user));
        }catch(\Exception $ex){
            //return $ex->getMessage();
        }

        //NewAffiliateRefferal
        if($refferer != null){
            $refferer->notify(new NewAffiliateRefferal($refferer->name, $user->name.' '.$user->last_name, $user->email, $user->phone));
        }

        if($user->role == 'M'){
            $user->notify(new NewAffiliate($user->name));
        }else{
            $user->notify(new NewCreator($user->name));
        }
        $msg= 'Account created successfully.';




        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (\Illuminate\Support\Facades\Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->to('/home');
        }

        return redirect()->to('/home')->with('success', $msg);

    }


}
