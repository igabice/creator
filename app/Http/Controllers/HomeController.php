<?php

namespace App\Http\Controllers;

use App\Campaign;
use App\CourseOwn;
use App\Notifications\NewAction;
use App\Notifications\NewSignup;
use App\Product;
use App\State;
use App\Wallet;
use Carbon\Carbon;
use File;
use App\User;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Mail;
use App\Mail\NewUserMail;
use Illuminate\Http\Request;

class HomeController extends Controller
{
   // use Notifiable;

    public function index(){
        $user = auth('web')->user();
        if($user->role == 'M'){
            return $this->marketer();
        }elseif($user->role == 'A'){
            return $this->admin();
        }else{
            return $this->creator();
        }
    }
    
    public  function assets(){
        return view('products.assets');
    }

    public function admin(){
        // $refferer = null;
        // if($request->referred_by_1){

        //     $refferer = User::find($request->referred_by_1);
        // }
        $today = Carbon::now();
        $user = Auth::guard('web')->user();
        
        if($user->role != 'A'){
            return $this->index();
        }
        $products = Product::all()->count();
        $marketers = User::where('role', 'M')->count();
        $creators = User::where('role', 'C')->count();
        $campaigns = Campaign::where('user_id', $user->id)->get();
        $wallet = Wallet::where('user_id', $user->id)->first();
        $data = ['user'=>$user, 'products'=>$products, 'campaigns' =>$campaigns, 'wallet' =>$wallet, 'today'=> $today,
            'marketers'=>$marketers, 'creators'=>$creators];
        return view('dashboard.admin', $data);
    }

    public function generateVerificationCode($length = 6) {
        $characters = '0123456789';
        $charactersLength = strlen($characters);
        $code = '';
        for ($i = 0; $i < $length; $i++) {
            $code .= $characters[rand(0, $charactersLength - 1)];
        }
        return $code;
    }

    public function marketer(){
        $today = Carbon::now();
        $user = Auth::guard('web')->user();
        $referrer = User::find($user->referred_by_1);
        $products = Product::where('user_id', $user->id)->get();

        //$orders = Product::where('user_id', $user->id)->get()->count();
        $campaigns = Campaign::where('user_id', $user->id)->get();
        $wallet = Wallet::where('user_id', $user->id)->first();
        $data = ['user'=>$user, 'products'=>$products, 'campaigns' =>$campaigns, 'wallet' =>$wallet, 'today'=> $today, 'referrer'=>$referrer];
        return view('dashboard.marketer', $data);
    }

    public function creator(){
        $refferer = null;
        $user = auth()->user();
        if($user->referred_by_1){

            $refferer = User::find($user->referred_by_1);
        }
        $today = Carbon::now();

        $products = Product::where('user_id', $user->id)->get();

        //$orders = Product::where('user_id', $user->id)->get()->count();
        $campaigns = Campaign::where('user_id', $user->id)->get();
        $wallet = Wallet::where('user_id', $user->id)->first();
        $data = ['user'=>$user, 'products'=>$products, 'campaigns' =>$campaigns, 'wallet' =>$wallet, 'today'=> $today];
        return view('dashboard.creator', $data);
    }

    public function soon(){
        $user = auth()->user();
        if($user != null){
            $wallet = Wallet::where('user_id', $user->id)->first();
            if($wallet == null){
                $wallet = new Wallet();
                $wallet->user_id = $user->id;
                $wallet->save();
            }
        }
        $best = Product::take(6)->get();
        $featured = Product::take(6)->get();
        $coaches = User::take(6)->get();
        $latest = Product::take(6)->get();

        return view('index', compact('best', 'latest', 'featured', 'coaches'));
        //return Hash::make('password');
    }

    public function register(){
        return view('auth.register');
    }

    public function contact(){
        return view('contact');
    }

    public function about(){
        return view('about');
    }

    public function account()
    {
        $user = auth()->user();
//        $ref1 = User::find($user->referred_by_1);
//        $ref2 = User::find($user->referred_by_2);
//        $ref3 = User::find($user->referred_by_3);
//
//        $referrals = User::where('referred_by_1', $user->id)->get();
        $wallet = Wallet::where('user_id', $user->id)->first();
        if($wallet == null){
            $wallet = new Wallet();
            $wallet->user_id = $user->id;
            $wallet->save();
        }

        $campaigns = Campaign::join('products', 'products.id', '=', 'campaign.product_id')
            ->select('products.name', 'products.commission', 'products.id', 'campaign.user_id', 'campaign.created_at', 'campaign.user_id')
            ->where('campaign.user_id', $user->id)
            ->get();

        $bundles_campaigns = Campaign::join('bundles', 'bundles.id', '=', 'campaign.product_id')
            ->select('bundles.title', 'bundles.commission', 'bundles.id', 'campaign.user_id', 'campaign.created_at', 'campaign.user_id')
            ->where('campaign.user_id', $user->id)
            ->get();

        $data = Product::where('user_id', $user->id)->get();

        $totalEarnings = Product::join('course_own', 'products.id', '=', 'course_own.product_id')
            ->select( DB::raw('SUM(course_own.id) as id_count'), DB::raw('SUM(products.price) as sales'), DB::raw('SUM(products.price - (products.commission + products.commission)) as revenue'))
            ->where('products.user_id', $user->id)
            //->groupBy('course_own.id')
            ->get();

        $totalSales = Product::join('course_own', 'products.id', '=', 'course_own.product_id')
            ->where('products.user_id', $user->id)
            //->groupBy('course_own.id')
            ->count();

//        return ;
//            ->get('price');
//        $totalSales = Product::select('products.id, products.name, products.price')
//            ->join('course_own', 'products.id', '=', 'course_own.product_id')
//            ->where('products.user_id', $user->id)
//            //->groupBy('products.id', 'products.name',)
//            ->count();
        $own = CourseOwn::where('user_id', $user->id)->count();

        return view('dashboard.index', ['data'=>$data,'user'=>$user, 'campaigns'=> $campaigns, 'own'=>$own, 'totalSales'=>$totalSales,
            'bundles_campaigns'=>$bundles_campaigns, 'totalEarnings' => $totalEarnings]);
    }

    public function privacy(){
        return view('privacy');
    }


    public function terms(){
        return view('terms');
    }

    function registerUser(Request $request){

        $arrRules = array(
            'email' => ['required', 'string', 'email', 'max:255',Rule::unique('users')],
            'username' => ['required', 'string', 'max:50',Rule::unique('users')],
            'name' => ['required', 'string', 'max:200'],
            'role' => ['required'],
            'last_name' => ['max:200'],
           // 'phone' => ['required', 'string', 'max:255'],
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
        }
        $objRequest['password'] = Hash::make(request('password'));

        //$objRequest['phone']=str_replace(' ', '', $objRequest['phone']);

        $user = User::create($objRequest);
        
        $wallet = new Wallet();
        $wallet->user_id = $user->id;
        $wallet->save();

       $admins = User::where('role', 'A')->get();
        $emails = array();
        foreach ($admins as $admin){
            $admin->notify(new NewSignup($user));;
        }
        $emails[] = $user->email;


        $msg= 'Account created successfully.';

      

        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            $user->sendEmailVerificationNotification();

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

            //$user->notify(new NewUserMail($user));

            if(session()->get('ref') != null) return redirect()->to(session()->get('ref'));

            return redirect()->to('/home');
        }


        return redirect()->to('/login')->with('success', $msg);

    }





}
