<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Shows;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class ShowsController extends Controller
{
    public function index()
    {
        $user = Auth::guard('web')->user();
        if($user->user_type != 'admin'){
            return redirect()->to('/');
        }
        $datalist = User::where('user_type', 'driver')->get();
        return view('shows.list', ['datalist' => $datalist, 'user' =>$user, 'message' => null]);
    }

    public function show($id)
    {
        $user = Auth::guard('web')->user();
        if($user->user_type != 'admin'){
            return redirect()->to('/');
        }
        $datalist = User::find($id);
        return view('shows.show', ['data' => $datalist]);
    }

    public function createform()
    {
        $user = Auth::guard('web')->user();
        if($user->user_type != 'admin'){
            return redirect()->to('/');
        }
        return view('shows.create', ['title'=>'title']);
    }
    public function signup()
    {
        return view('shows.signup', ['title'=>'title']);
    }
    public function homepage()
    {
        return view('homepage', ['title'=>'title']);
    }
    public function register()
    {
        return view('register', ['title'=>'title']);
    }

    public function edit($id)
    {
        $user = Auth::guard('web')->user();
        if($user->user_type != 'admin'){
            return redirect()->to('/');
        }
        $user = Auth::guard('web')->user();
        $data = User::find($id);
        return view('shows.edit', [ 'data' => $data, 'user' =>$user, 'message' => '']);
    }

    function store(Request $request)
    {
        $user = Auth::guard('web')->user();
        if($user->user_type != 'admin'){
            return redirect()->to('/');
        }
        $this->validate($request, [
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            //'invite_code' => 'required',
            'city' => 'required',
            'state' => 'required',
            'password' => 'required',
        ]);
        $name = $request->input('firstname');
        $drivers = new User();
        $drivers->name = $name;
        $drivers->lastname = $request->input('lastname');
        $drivers->email = $request->input('email');
        $drivers->phone = $request->input('phone');
        $drivers->city = $request->input('city');
        $drivers->state = $request->input('state');
        $drivers->user_type = "driver";
        $drivers->invite_code = $request->input('invite_code');
        $drivers->password = bcrypt($request->input('password'));

        if ($drivers->save()) {
            return redirect()->to('/driver');
        } else {
            return back()->withError('unable to update user detail');
        }
    }

    function update(Request $request)
    {
        $user = Auth::guard('web')->user();
        if($user->user_type != 'admin'){
            return redirect()->to('/');
        }
        $this->validate($request, [
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'city' => 'required',
            'state' => 'required',
        ]);

        $id = $request->input('id');
        $name = $request->input('firstname');
        $drivers = User::find($id);
        $drivers->name = $name;
        $drivers->lastname = $request->input('lastname');
        $drivers->email = $request->input('email');
        $drivers->phone = $request->input('phone');
        $drivers->city = $request->input('city');
        $drivers->state = $request->input('state');
        $drivers->user_type = "driver";
        $drivers->invite_code = $request->input('invite_code');
        $drivers->password = bcrypt($request->input('password'));

        //Mail::send()

        if ($drivers->save()) {
            return redirect('/driver');
        } else {
            return back()->withError('unable to update user detail');
        }
    }

    public function destroy($id)
    {
        $data = User::find($id);
        $data->delete();
        $datalist = User::all();
        return view('shows.list', ['datalist' => $datalist, 'message' => 'User Deleted Successfully']);
    }

    public function massdelete(Request $request)
    {
        foreach ($request as $item) {
            $data = User::find($item);
            $data->delete();
        }
        $datalist = User::all();
        return view('shows.list', ['datalist' => $datalist, 'message' => 'User Deleted Successfully']);
    }
}