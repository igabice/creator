<?php

namespace App\Http\Controllers\Api;

use App\Withdrawal;
use App\Post;
use Auth;

use Illuminate\Validation\Rule;
use Mail;
use App\Mail\NewUserMail;
use App\Mail\PasswordResetMail;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProductsController extends Controller
{
    public function __construct(){
     //   $this->middleware('api')->except([]);
    }

    public function index(){
        //if(!auth()->user()->isAdmin())return back()->withError('cannot perform this operation');
        $user = auth('api')->user();
        $data=Withdrawal::where('user_id', $user->id)->get();


        $arrData = new Withdrawal();
        $arrData->message = "success";
        $arrData->status = 200;
        $arrData->data = $data;
        return response()->json($arrData);
    }

    public function farmProducts(){
        //if(!auth()->user()->isAdmin())return back()->withError('cannot perform this operation');
        $data=Withdrawal::where('farm_id', request()->farm_id)->get();

        $arrData = new Withdrawal();
        $arrData->message = "success";
        $arrData->status = 200;
        $arrData->data = $data;
        return response()->json($arrData);
    }

    function store(Request $request){
        $arrRules = array(
            //'email' => ['required', 'string', 'email', 'max:255',Rule::unique('products')->where(d)],
            'name' => ['required', 'string', 'max:250'],
            'farm_id' => ['required'],
            'price' => ['required',],
            'unit' => ['required',],
        );

        $objRequest = $request->all();
        $farm = Post::find($request->farm_id);
        $objRequest['user_id']  = $farm->user_id;
        //if($objRequest['password'] != $objRequest['password2'])return back()->withError('passwords do not match');

        if ($request->hasFile('image')) {
            $fileName = null;
            $file = $request->file('image');
            $fileName = time().$file->getClientOriginalName();
            $pathmeter_correct =  date('Y').'/'. date('m').'/'. date('d').'/';
            $fileName = $pathmeter_correct.$fileName;
            $file->move('./uploads/image/'. $pathmeter_correct, $fileName);
            $objRequest['image'] = "/uploads/image/".$fileName;
        }

        // try {
        //     $this->validate(request(), $arrRules);
        // } catch (ValidationException $e) {
        // }
        $data = Withdrawal::create($objRequest);
        $msg='Product created successfully.';

        $arrData = new Withdrawal();
        $arrData->message = $msg;
        $arrData->status = 200;
        $arrData->data = $data;
        return response()->json($arrData);

    }


    public function update(Request $request){
        $data = Withdrawal::find($request->id);
        $arrRules = array(
            'name' => ['required', 'string', 'max:200'],
            'street' => ['required'],
            'city' => ['required'],
            'lga' => ['required', 'string', 'max:255'],
            'state' => ['required'],
        );
        $objRequest = $request->all();
        //if($objRequest['password'] != $objRequest['password2'])return back()->withError('passwords do not match');
        $this->validate(request(), $arrRules);

        if ($request->hasFile('image')) {
            $fileName = null;
            $file = $request->file('image');
            $fileName = time().$file->getClientOriginalName();
            $pathmeter_correct =  date('Y').'/'. date('m').'/'. date('d').'/';
            $fileName = $pathmeter_correct.$fileName;
            $file->move('./uploads/image/'. $pathmeter_correct, $fileName);
            $objRequest['image'] = "/uploads/image/".$fileName;
        }
        $data->update($objRequest);
        $this->validate(request(), $arrRules);

        $data->update($objRequest);
        $msg='Withdrawal updated successfully.';


        $arrData = new Withdrawal();
        $arrData->message = $msg;
        $arrData->status = 200;
        $arrData->data = $data;
        return response()->json($arrData);
    }


}
