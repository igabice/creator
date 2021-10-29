<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Location;
use Illuminate\Http\Request;

class LocationCrudController extends Controller
{
    public function index()
    {
        $datalist = Location::all();
        return view('location.list', ['datalist' =>$datalist, 'message'=> null]);
    }

    public function show($id)
    {
        $datalist = Location::find($id);
        return view('location.show', ['data' => $datalist]);
    }

    public function createform()
    {
        $datalist = Location::all();
        return view('location.create', ['location' =>$datalist, 'title'=>'Create ']);
    }
    public function edit($id)
    {
        $data= Location::find($id);
        $datalist = Location::all();
        return view('location.edit', ['location' =>$datalist, 'data'=>$data]);
    }

    function create(Request $request){
        $datalist = Location::all();
        // ['title', 'comment', 'image', 'parent_category', 'account_number', 'address', 'property_use', 'user_id', 'store_id', 'ibedc_rep_id'];

        $this->validate($request, [
            'name'=>'required',
            'lat'=>'required',
            'lng'=>'required',
            'state'=>'required',
        ]);

        $name=$request->input('name');
        $lat=$request->input('lat');
        $lng=$request->input('lng');
        $state=$request->input('state');

        $location = new Location();
        $location->name=$name;
        $location->lat=$lat;
        $location->lng=$lng;
        $location->state=$state;

//        $datalist = Location::all();
        if($location->save()){
            //return view('location.list', ['datalist' =>$datalist, 'message'=> 'Location Created Successfully']);
            //return redirect()->to('/locationcapture/')->content();
            return $this->index();
        }else{
            return back()->withError('unable to update user detail');
        }
    }

    function update(Request $request){
        $this->validate($request, [
            'name'=>'required',
            'lat'=>'required',
            'lng'=>'required',
            'state'=>'required',
        ]);

        $name=$request->input('name');
        $lat=$request->input('lat');
        $lng=$request->input('lng');
        $state=$request->input('state');

        $id=$request->input('id');


        $location = Location::find($id);
        $location->name=$name;
        $location->lat=$lat;
        $location->lng=$lng;
        $location->state=$state;

        $datalist = Location::all();
        if($location->save()){
            //return view('location.list', ['datalist' =>$datalist, 'message'=> 'Location Created Successfully']);
            return $this->index();
        }else{
            //echo $location;
            return back()->withError('unable to update user detail');
            //return view('location.edit', ['location' =>$datalist, 'data'=>$data, 'message'=>'Something went wrong']);

        }

    }

    public function destroy($id)
    {
        $data = Location::find($id);
        $data->delete();
        $datalist = Location::all();
        return view('location.list', ['datalist' =>$datalist, 'message'=> 'Location Deleted Successfully']);
    }
    public function massdelete(Request $request)
    {
        foreach ($request as $item){
            $data = Location::find($item);
            $data->delete();
        }
        $datalist = Location::all();
        return view('location.list', ['datalist' =>$datalist, 'message'=> 'Location Deleted Successfully']);
    }
}