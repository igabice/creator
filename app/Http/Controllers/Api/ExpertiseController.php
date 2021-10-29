<?php

namespace App\Http\Controllers\Api;

use App\Expertise;
use Auth;

use Illuminate\Validation\Rule;
use Mail;
use App\Mail\NewUserMail;
use App\Mail\PasswordResetMail;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ExpertiseController extends Controller
{
    public function __construct(){
     //   $this->middleware('api')->except([]);
    }

    public function index(){
        //if(!auth()->user()->isAdmin())return back()->withError('cannot perform this operation');

        $data=Expertise::all();


        $arrData = new Expertise();
        $arrData->message = "success";
        $arrData->status = 200;
        $arrData->data = $data;
        return response()->json($arrData);
    }

    function store(Request $request){
        $arrRules = array(
            'name' => ['required', 'string', 'max:255'],
        );
        $objRequest = $request->all();

        $this->validate(request(), $arrRules);

        $data = Expertise::create($objRequest);
        $msg='Expertise created successfully.';


        $arrData = new Expertise();
        $arrData->message = $msg;
        $arrData->status = 200;
        $arrData->data = $data;
        return response()->json($arrData);
    }

    public function update(Request $request){
        $data = Expertise::find($request->id);
        $arrRules = array(
            'name' => ['required', 'string', 'max:255'],
        );
        $objRequest = $request->all();

        $this->validate(request(), $arrRules);

        $data->update($objRequest);
        $msg='Expertise updated successfully.';


        $arrData = new Expertise();
        $arrData->message = $msg;
        $arrData->status = 200;
        $arrData->data = $data;
        return response()->json($arrData);    }


}
