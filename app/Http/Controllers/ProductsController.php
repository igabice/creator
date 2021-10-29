<?php

namespace App\Http\Controllers;

use App\CommissionDeposit;
use App\CourseOwn;
use App\CourseVideo;
use App\Mail\NewproductMail;
use App\Product;
use App\Rating;
use App\User;
use App\Wallet;
use Auth;
use App\Post;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

use Illuminate\Validation\Rule;
use App\Mail\NewUserMail;
use App\productGuests;
use App\Campaign;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Carbon\Carbon;

class ProductsController extends Controller
{
    public function __construct(){
        //$this->middleware('auth')->except(['declineproduct', 'acceptproduct']);
    }

    public function index(){
        $user = auth('web')->user();
        $data=Product::all();
  return view('products.products', compact('data', 'user'));
    }
    
    

    public function courses(){
        $user = auth('web')->user();
        $data=Product::where('type', 'course')->get();
        return view('products.courses', compact('data', 'user'));
    }
    
    

    public function strategy(){
        $user = auth('web')->user();
        $data=Product::where('type', 'strategy')->get();
        return view('products.strategy', compact('data', 'user'));
    }

    public function show($id){
        $user = auth('web')->user();
        $data = Product::find($id);
        $orders = Campaign::where('product_id', $id)->get();
        $own = CourseOwn::where('user_id', $user->id)->where('product_id', $id)->first();

        $videos = CourseVideo::all();//where('course_id', $id)->get();

        $campaign = Campaign::leftJoin('users as marketers', 'marketers.id', '=', 'campaign.user_id')
            ->join('products', 'products.id', '=', 'campaign.product_id')
            ->leftjoin('commission_deposit', 'marketers.id', '=', 'commission_deposit.user_id')
            ->select('marketers.name as firstname', 'marketers.last_name as lastname', 'campaign.id as id', 'commission_deposit.amount', 'campaign.created_at as created_at',
                'marketers.id as user_id', 'products.id as id',
                DB::raw('SUM(commission_deposit.id) as id_count'), DB::raw('SUM(commission_deposit.amount) as revenue'))
            ->where('products.id', $id)
            ->groupBy('commission_deposit.amount', 'marketers.name', 'commission_deposit.id', 'marketers.last_name', 'campaign.id', 'campaign.created_at',
                'marketers.id', 'products.id')
            ->get();

        return view('products.details', ['data' => $data, 'campaign' => $campaign, 'videos' =>$videos, 'own' =>$own]);
    }

    function saveVideo(Request $request){
        $arrRules = array(
            //'email' => ['required', 'string', 'email', 'max:255',Rule::unique('products')->where(d)],
            'title' => ['required', 'string', 'max:250'],
            'course_id' => ['required'],
            'file' => ['required',],
        );

        $objRequest = $request->all();

        try {
            $this->validate(request(), $arrRules);
        } catch (ValidationException $e) {
        }


        if ($request->hasFile('file')) {
            $fileName = null;
            $file = $request->file('file');
            $fileName = time().$file->getClientOriginalName();
            $pathmeter_correct =  date('Y').'/'. date('m').'/'. date('d').'/';
            $fileName = $pathmeter_correct.$fileName;
            $file->move('./uploads/video/'. $pathmeter_correct, $fileName);
            $objRequest['file'] = "/uploads/video/".$fileName;
        }

        // $image = $request->file('image');
        // $new_name = rand() . '.' . $image->getClientOriginalExtension();
        // $image->move(public_path('storage/app/public/images'), $new_name);

        $product = CourseVideo::create($objRequest);

        $msg='Video Added successfully.';

        return redirect()->to('/products/'.$request->course_id)->with('success', $msg);
    }

    function editVideo(Request $request){
        $arrRules = array(
            //'email' => ['required', 'string', 'email', 'max:255',Rule::unique('products')->where(d)],
            'title' => ['required', 'string', 'max:250'],
            'id' => ['required'],
            'file' => ['required',],
        );

        $objRequest = $request->all();

        $this->validate(request(), $arrRules);

        $arrData = CourseVideo::find($request->id);



        if ($request->hasFile('file')) {
            $fileName = null;
            $file = $request->file('file');
            $fileName = time().$file->getClientOriginalName();
            $pathmeter_correct =  date('Y').'/'. date('m').'/'. date('d').'/';
            $fileName = $pathmeter_correct.$fileName;
            $file->move('./uploads/video/'. $pathmeter_correct, $fileName);
            $objRequest['file'] = "/uploads/video/".$fileName;
        }

        // $image = $request->file('image');
        // $new_name = rand() . '.' . $image->getClientOriginalExtension();
        // $image->move(public_path('storage/app/public/images'), $new_name);

        $arrData->update($objRequest);

        $msg='Video Edited successfully.';

        return redirect()->to('/products/'.$arrData->course_id)->with('success', $msg);
    }

    function deleteVideo($id){
        $data = CourseVideo::find($id);
        $course = $data->course_id;
        $data->delete();

        return redirect()->to('/products/'.$course)->with('success', 'Deleted Successfully');

    }

    public function createform()
    {
        $creators = User::where('role', 'C')->get();

        return view('products.newproduct', ['title'=>'Create products', 'creators'=> $creators]);
    }

    public function edit($id)
    {
        $data= Product::find($id);

        //return $data;

        return view('products.editproduct', ['data' => $data, ]);
    }
    public function referProduct($id)
    {
        $data= Product::find($id);

        if(isset($_GET['ref'])){
            $commission = new CommissionDeposit();
            $commission->product_id = $id;
            $commission->user_id = $_GET['ref'];
            $commission->amount = $data->price *$data->commission * 0.01;
            $commission->save();

            $wallet= Wallet::where('user_id', $_GET['ref'])->first();
            $wallet->balance = $wallet->balance + $commission->amount;
            $wallet->save();
        }

        return redirect()->to(url('/').'/products/'.$id);
    }

    function newCampaign(Request $request){
        $arrRules = array(
            'user_id' => ['required'],
            'product_id' => ['required',],
        );

        $objRequest = $request->all();


        try {
            $this->validate(request(), $arrRules);
        } catch (ValidationException $e) {
        }
        $product = Campaign::create($objRequest);

        $msg='Campaign created successfully.';

        return redirect()->to('/products/'.$product->product_id)->with('success', $msg);

    }

    function store(Request $request){
        $arrRules = array(
            //'email' => ['required', 'string', 'email', 'max:255',Rule::unique('products')->where(d)],
            'name' => ['required', 'string', 'max:250'],
            'user_id' => ['required'],
            'price' => ['required',],
            'unit' => ['required',],
        );

        $objRequest = $request->all();

        if ($request->hasFile('image')) {
            $fileName = null;
            $file = $request->file('image');
            $fileName = time().$file->getClientOriginalName();
            $pathmeter_correct =  date('Y').'/'. date('m').'/'. date('d').'/';
            $fileName = $pathmeter_correct.$fileName;
            $file->move('./uploads/image/'. $pathmeter_correct, $fileName);
            $objRequest['image'] = "/uploads/image/".$fileName;
        }
        
        
        if ($request->hasFile('link')) {
            $fileName = null;
            $file = $request->file('link');
            $fileName = time().$file->getClientOriginalName();
            $pathmeter_correct =  date('Y').'/'. date('m').'/'. date('d').'/';
            $fileName = $pathmeter_correct.$fileName;
            $file->move('./uploads/image/'. $pathmeter_correct, $fileName);
            $objRequest['link'] = "/uploads/image/".$fileName;
        }
        

        try {
            $this->validate(request(), $arrRules);
        } catch (ValidationException $e) {
        }
        
     
        $product = Product::create($objRequest);

        $msg='Product created successfully.';
        
        if($product->type == 'course'){
            return redirect()->to('/courses')->with('success', 'Created Successfully!');
        }
        if($product->type == 'strategy'){
            return redirect()->to('/strategy')->with('success', 'Created Successfully!');
        }

        return redirect()->to('/products/'.$product->id)->with('success', $msg);

    }

    public function update(Request $request){
        $arrData = Product::find($request->id);
        $arrRules = array(
            'name' => ['required', 'string', 'max:250'],
            'price' => ['required',],
            'd_commission' => ['required',],
            'commission' => ['required',],
        );

        $objRequest = $request->all();

        $this->validate(request(), $arrRules);

        $objRequest = $request->all();
        
        //return $objRequest;

        if ($request->hasFile('image')) {
            //return 'has file';
            $fileName = null;
            $file = $request->file('image');
            $fileName = time().$file->getClientOriginalName();
            $pathmeter_correct =  date('Y').'/'. date('m').'/'. date('d').'/';
            $fileName = $pathmeter_correct.$fileName;
            $file->move('./uploads/image/'. $pathmeter_correct, $fileName);
            $objRequest['image'] = "/uploads/image/".$fileName;
           // return $objRequest['image'];
        }else{
            $objRequest['image'] = $arrData->image;
        }
        
        
        if ($request->hasFile('link')) {
            //return 'has file';
            $fileName = null;
            $file = $request->file('link');
            $fileName = time().$file->getClientOriginalName();
            $pathmeter_correct =  date('Y').'/'. date('m').'/'. date('d').'/';
            $fileName = $pathmeter_correct.$fileName;
            $file->move('./uploads/image/'. $pathmeter_correct, $fileName);
            $objRequest['link'] = "/uploads/image/".$fileName;
           // return $objRequest['image'];
        }else{
            $objRequest['link'] = $arrData->image;
        }
        
        //return $objRequest;
        $arrData->update($objRequest);
        $msg='Product updated successfully.';
        
        if($arrData->type == 'course'){
            return redirect()->to('/courses')->with('success', 'Updated Successfully!');
        }
        if($arrData->type == 'strategy'){
            return redirect()->to('/strategy')->with('success', 'Updated Successfully!');
        }

        return redirect()->to('/products/'.$request->id)->with('success', $msg);
    }

    public function updateStatus(Request $request){
        // return $request->all();
        $this->validate($request, [
            'email' => ['required', 'string', 'email', 'max:255'],
        ]);

        $email=$request->input('email');

        $user=Product::where('email', $email)->first();
        if(!$user)return back()->withError('user account does not exist');

        if($user->active==0)$user->active=1;
        else $user->active=0;

        if($user->save()){
            return redirect('/users')->withSuccess('products account has been updated');
        }else return back()->withError('an error occurred');
    }

    public function profile(){
        return view('user.profile');
    }

    public function updateProfile(Request $request){
        $this->validate($request, [
            'current_password'=>['required', 'String', 'min:8', 'max:20'],
            'new_password'=>['required', 'String', 'min:8', 'max:20', 'confirmed'],
        ]);

        $user=Product::find(auth()->user()->id);
        if(!$user)return back()->withError('user account does not exist');

        if(!Hash::check($request->current_password, $user->password))return back()->withError('Old password is not correct');

        $user->password=Hash::make($request->new_password);
        if($user->save())return back()->withSuccess('password has been updated');
        else return back()->withError('an error occurred');
    }

    public function signout(){
        Auth::logout();
        return redirect('/');
    }

}
