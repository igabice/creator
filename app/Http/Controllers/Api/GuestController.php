<?php

namespace App\Http\Controllers\Api;

use App\Expertise;
use Auth;
use App\User;
use App\Shows;

use Illuminate\Validation\Rule;
use Mail;
use App\Mail\NewUserMail;
use App\Mail\PasswordResetMail;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class GuestController extends Controller
{
    public function __construct(){
        $this->middleware('api')->except([]);
    }


    public function search()
    {
        $data = User::leftJoin('states', 'states.id', '=', 'users.states')
            // ->join('meter_books', 'meter_books.cro_id', '=', 'users.id')
            ->select('users.*', 'states.name as guest_expertise')
            ->where('role', 'guest');
            if(request()->query){
                $data->orWhere('users.name', 'LIKE', '%'.request()->query.'%')
                ->orWhere('users.lastname', 'LIKE', '%'.request()->query.'%');
            }
            if(request()->rating){
                $data->orWhere('users.rating', '>=', request()->rating);
            }
            if(request()->expertise){
                $data->orWhere('users.states', request()->expertise);
            }
            
            $data->get();
        $arrData = new Shows();
        $arrData->message = "success";
        $arrData->status = 200;
        $arrData->data = $data;
        return response()->json($arrData);
    }    

    function store(Request $request){
        $arrRules = array(
            'email' => ['required', 'string', 'email', 'max:255',Rule::unique('users')],
            'name' => ['required', 'string', 'max:200'],
            'lastname' => ['required', 'string', 'max:200'],
            'last_name' => ['max:200'],
            'states' => ['required'],
            'phone' => ['required', 'string', 'max:255'],
            'password' => ['required','min:6'],
        );

        $user=User::where('email', $request->input('email'))->first();
        if($user != null){
            if($user->id != $request->id)return back()->withError('email address already registered with another user');
        }
        $objRequest = $request->all();
        //if($objRequest['password'] != $objRequest['password2'])return back()->withError('passwords do not match');

        //$this->validate(request(), $arrRules);

        $objRequest['password'] = Hash::make(request('password'));
        $objRequest['role'] = 'guest';
        $objRequest['phone']=str_replace(' ', '', $objRequest['phone']);

        $data = User::create($objRequest);
        $msg='account created successfully.';


        $arrData = new Shows();
        $arrData->message = $msg;
        $arrData->status = 200;
        $arrData->data = $data;
        return response()->json($arrData);
    }

}
