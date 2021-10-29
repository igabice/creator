<?php

namespace App\Http\Controllers\Api;

use App\CommissionDeposit;
use App\Withdrawal;
use Auth;

use Illuminate\Validation\Rule;
use Mail;
use App\Mail\NewUserMail;
use App\Mail\PasswordResetMail;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class OrdersController extends Controller
{
    public function __construct(){
     //   $this->middleware('api')->except([]);
    }

    public function index(){
        //if(!auth()->user()->isAdmin())return back()->withError('cannot perform this operation');
        $user = auth('api')->user();
        $data=CommissionDeposit::where('user_id', $user->id)->get();


        $arrData = new CommissionDeposit();
        $arrData->message = "success";
        $arrData->status = 200;
        $arrData->data = $data;
        return response()->json($arrData);
    }
    public function mySales(){
        //if(!auth()->user()->isAdmin())return back()->withError('cannot perform this operation');
        $user = auth('api')->user();
        $data=CommissionDeposit::where('seller_id', $user->id)->get();


        $arrData = new CommissionDeposit();
        $arrData->message = "success";
        $arrData->status = 200;
        $arrData->data = $data;
        return response()->json($arrData);
    }

    function store(Request $request){
        $arrRules = array(
            'delivery_address' => ['required'],
            'quantity' => ['required'],
            'product_id' => ['required'],
            'payment_type' => ['required'],
        );
        $product = Withdrawal::find($request->product_id);


        $objRequest = $request->all();
        $objRequest['seller_id']  = $product->user_id;


        $this->validate(request(), $arrRules);

         $data= CommissionDeposit::create($objRequest);
         $product->quantity_sold = $product->quantity_sold + $objRequest['quantity'];
         $product->save();

         $msg='Order created successfully.';

        $arrData = new CommissionDeposit();
        $arrData->message = $msg;
        $arrData->status = 200;
        $arrData->data = $data;
        return response()->json($arrData);

    }



}
