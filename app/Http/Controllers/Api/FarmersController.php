<?php

namespace App\Http\Controllers\Api;

use App\User;
use Auth;

use Illuminate\Validation\Rule;
use Mail;
use App\Mail\NewUserMail;
use App\Mail\PasswordResetMail;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class FarmersController extends Controller
{
    public function __construct(){
     //   $this->middleware('api')->except([]);
    }

    public function index(){
        //if(!auth()->user()->isAdmin())return back()->withError('cannot perform this operation');
        $data = auth('api')->user();

        $arrData = new User();
        $arrData->message = "success";
        $arrData->status = 200;
        $arrData->data = $data;
        return response()->json($arrData);
    }

    function store(Request $request){
        $arrRules = array(
            'email' => ['required', 'string', 'email', 'max:255',Rule::unique('users')],
            'name' => ['required', 'string', 'max:200'],
            'last_name' => ['max:200'],
            'user' => ['required'],
            'phone' => ['required', 'string', 'max:255'],
            'password' => ['required','min:6'],
        );

        $user=User::where('email', $request->input('email'))->first();
        if($user != null){
            if($user->id != $request->id)return back()->withError('email address already registered with another user');
        }
        $objRequest = $request->all();
        //if($objRequest['password'] != $objRequest['password2'])return back()->withError('passwords do not match');

        $this->validate(request(), $arrRules);

        $objRequest['password'] = Hash::make(request('password'));
        $objRequest['role'] = 'farmer';
        if ($request->hasFile('image')) {
            $fileName = null;
            $file = $request->file('image');
            $fileName = time().$file->getClientOriginalName();
            $pathmeter_correct =  date('Y').'/'. date('m').'/'. date('d').'/';
            $fileName = $pathmeter_correct.$fileName;
            $file->move('./uploads/image/'. $pathmeter_correct, $fileName);
            $objRequest['image'] = "/uploads/image/".$fileName;
        }
        if($objRequest['phone']) $objRequest['phone']=str_replace(' ', '', $objRequest['phone']);

        $user = User::create($objRequest);
        // try{
        //     Mail::to($user->email)->send(new NewUserMail($user));
        // }catch(\Exception $ex){
        //     //return $ex->getMessage();
        // }
        $msg='account created successfully.';


        $arrData = new User();
        $arrData->message = $msg;
        $arrData->status = 200;
        $arrData->data = $user;
        return response()->json($arrData);

    }

    public function update(Request $request){
        $data = User::find($request->id);
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
        $msg='User updated successfully.';


        $arrData = new User();
        $arrData->message = $msg;
        $arrData->status = 200;
        $arrData->data = $data;
        return response()->json($arrData);
    }


}
