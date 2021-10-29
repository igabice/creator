<?php

namespace App\Http\Controllers;

use App\Withdrawal;

use App\State;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SectionsController extends Controller
{
    public function __construct(){
        $this->middleware('auth')->except([]);
    }

    public function index(){
        $user = Auth::user();
        $data=Withdrawal::all();

        return view('sections.list', compact('data'));
    }

    public function show($id)
    {
        $data = Withdrawal::find($id);
        $sections = collect();

        if($data->section_type == 'section'){
            $sections = Withdrawal::where('law_id', $data->id)->where('section_type', 'section')->get();

        }elseif($data->section_type == 'sub-section'){
            $sections = Withdrawal::where('law_id', $data->id)->where('section_type', 'section')->get();

        }elseif($data->section_type == 'sub-paragraph'){

        }
        return view('sections.show', ['data' => $data,  'sections' => $sections]);
    }

    public function createform()
    {
        $state = collect();
        $user = Auth::user();
        if($user->role == 'admin'){
            $state = State::all();
        }
        return view('sections.create', ['title'=>'Create Withdrawal', 'state'=> $state, 'user'=> $user]);
    }
    public function edit($id)
    {
        $data= Withdrawal::find($id);
        return view('sections.edit', ['data'=>$data,]);
    }

    function store(Request $request){

        $arrRules = array(
            'caption' => ['required'],
            'content' => ['required'],
            'section_type' => ['required'],
        );
        
        $objRequest = $request->all();
        
        $this->validate(request(), $arrRules);

        //return $objRequest;

        $arrData = Withdrawal::create($objRequest);
        $msg='Withdrawal created successfully.';
        if($arrData->section_type == 'section'){
            return redirect()->to('/laws/'.$arrData->law_id)->with('success', $msg);
        }else{
            return redirect()->to('/sections/'.$arrData->section)->with('success', $msg);
        }
    }

    public function update(Request $request){
        $arrData = Withdrawal::find($request->id);
        $arrRules = array(
            'caption' => ['required'],
            'content' => ['required'],
        );

        $objRequest = $request->all();
        $this->validate(request(), $arrRules);

        $arrData->update($objRequest);
        $msg='Withdrawal updated successfully.';

        if($arrData->section_type == 'section'){
            return redirect()->to('/laws/'.$arrData->law_id)->with('success', $msg);
        }else{
            return redirect()->to('/sections/'.$arrData->section)->with('success', $msg);
        }

    }

}
