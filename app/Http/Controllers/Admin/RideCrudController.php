<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Ride;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RideCrudController extends Controller
{
    public function __construct()
    {
        $user = Auth::guard('web')->user();
        if($user->user_type != 'admin'){
            return redirect()->to('/');
        }
    }

    public function index()
    {

        $user = Auth::guard('web')->user();
        $datalist = Ride::where('user_type', 'ride')->get();
        return view('ride.list', ['datalist' => $datalist, 'user' =>$user, 'message' => null]);
    }

    public function show($id)
    {
        $user = Auth::guard('web')->user();
        $datalist = Ride::find($id);
        return view('ride.show', ['data' => $datalist]);
    }

    public function createform()
    {
        $user = Auth::guard('web')->user();
        return view('ride.create', ['title'=>'Create Clockin']);
    }

    public function edit($id)
    {
        $user = Auth::guard('web')->user();
        $data = Ride::find($id);
        return view('ride.edit', [ 'data' => $data, 'user' =>$user, 'message' => '']);
    }

    function store(Request $request)
    {
        $this->validate($request, [
            'distance' => 'required',
            'cost' => 'required',
            'start_point' => 'required|start_point',
            'destination' => 'required',
            'user_id' => 'required',
            'duration' => 'required',
            'stops' => 'required',
            'password' => 'required',
        ]);
        $user = Auth::guard('web')->user();
        
        $ride = new Ride();
        $ride->cost = $request->input('cost');
        $ride->start_point = $request->input('start_point');
        $ride->destination = $request->input('destination');
        $ride->duration = $request->input('duration');
        $ride->stops = $request->input('stops');
        $ride->distance = $request->input('distance');
        $ride->payment_type = $request->input('payment_type');
        $ride->coupon_id = $request->input('coupon_id');
        $ride->user_id = $request->input('user_id');
        $ride->driver_id = $user->id;

        if ($ride->save()) {
            return redirect()->to('/ride');
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
            'distance' => 'required',
            'cost' => 'required',
            'start_point' => 'required|start_point',
            'destination' => 'required',
            'duration' => 'required',
            'stops' => 'required',
        ]);

        $id = $request->input('id');
        $ride = Ride::find($id);
        $ride->cost = $request->input('cost');
        $ride->start_point = $request->input('start_point');
        $ride->destination = $request->input('destination');
        $ride->duration = $request->input('duration');
        $ride->stops = $request->input('stops');
        $ride->distance = $request->input('distance');
        $ride->payment_type = $request->input('payment_type');
        $ride->coupon_id = $request->input('coupon_id');
        $ride->user_id = $request->input('user_id');

        if ($ride->save()) {
            return redirect('/ride');
        } else {
            return back()->withError('unable to update user detail');
        }
    }

    public function destroy($id)
    {
        $data = Ride::find($id);
        $data->delete();
        $datalist = Ride::all();
        return view('ride.list', ['datalist' => $datalist, 'message' => 'Ride Deleted Successfully']);
    }

    public function massdelete(Request $request)
    {
        foreach ($request as $item) {
            $data = Ride::find($item);
            $data->delete();
        }
        $datalist = Ride::all();
        return view('ride.list', ['datalist' => $datalist, 'message' => 'Ride Deleted Successfully']);
    }
}