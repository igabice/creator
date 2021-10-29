<?php

namespace App\Http\Controllers;

use App\State;
use Auth;
use App\User;
use App\Withdrawal;

use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\Rule;
use App\Mail\NewUserMail;
use App\Mail\PasswordResetMail;
use Carbon\Carbon;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class StatesController extends Controller
{
    public function __construct(){
        $this->middleware('auth')->except([]);
    }

    public function index(){
        //if(!auth()->user()->isAdmin())return back()->withError('cannot perform this operation');
        
        $data= State::all();

        return view('states.list', compact('data'));
    }

    public function show($id)
    {
        $data = State::find($id);
        $admin = User::find($data->admin_id);
        return view('states.show', ['data' => $data, 'admin'=>$admin]);
    }

    public function createform()
    {
        $user = User::where('role', 'state-admin')->get();

        return view('states.create', ['title'=>'Create State', 'users'=>$user]);
    }
    public function edit($id)
    {
        $data= State::find($id);
        $users = User::where('role', 'state-admin')->get();
        return view('states.edit', ['data'=>$data, 'users'=> $users]);
    }

    function store(Request $request){
        $arrRules = array(
            'name' => ['required', 'string', 'max:200'],
            'admin_id' => ['required'],
        );
        $this->validate(request(), $arrRules);

        $objRequest = $request->all();

        $state = State::where('name', $request->name)->get();

        if(count($state) > 0){
            return back()->withError('State already exists');
        }
        $user = User::find($request->admin_id);

        $user = State::create($objRequest);
        try{
            Mail::to($user->email)->send(new NewUserMail($user));
        }catch(\Exception $ex){
            //return $ex->getMessage();
        }
        $msg='account created successfully.';

        return redirect()->to('/states/')->with('success', $msg);

    }

    public function update(Request $request){
        $arrData = State::find($request->id);
        $arrRules = array(
            'name' => ['required', 'string', 'max:200'],
            'admin_id' => ['required']
        );

        $objRequest = $request->all();

        $this->validate(request(), $arrRules);

        $state = State::where('name', $request->name)->where('id', '!=', $arrData->id)->get();

        if(count($state) > 0){
            return back()->withError('State already exists');
        }

        $arrData->update($objRequest);
        $msg='State updated successfully.';

        return redirect()->to('/states/')->with('success', $msg);
    }


}
