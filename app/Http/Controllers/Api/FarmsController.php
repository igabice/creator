<?php

namespace App\Http\Controllers\Api;

use App\Post;
use Auth;

use Illuminate\Validation\Rule;
use Mail;
use App\Mail\NewUserMail;
use App\Mail\PasswordResetMail;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class FarmsController extends Controller
{
    public function __construct(){
     //   $this->middleware('api')->except([]);
    }

    public function index(){
        //if(!auth()->user()->isAdmin())return back()->withError('cannot perform this operation');
        $user = auth('api')->user();
        $data=Post::where('user_id', $user->id)->get();


        $arrData = new Post();
        $arrData->message = "success";
        $arrData->status = 200;
        $arrData->data = $data;
        return response()->json($arrData);
    }

    function store(Request $request){
        $arrRules = array(
            'name' => ['required', 'string', 'max:200'],
            'street' => ['required'],
            'city' => ['required'],
            'lga' => ['required', 'string', 'max:255'],
            'state' => ['required'],
        );
        $objRequest = $request->all();

        if ($request->hasFile('image')) {
            $fileName = null;
            $file = $request->file('image');
            $fileName = time().$file->getClientOriginalName();
            $pathmeter_correct =  date('Y').'/'. date('m').'/'. date('d').'/';
            $fileName = $pathmeter_correct.$fileName;
            $file->move('./uploads/image/'. $pathmeter_correct, $fileName);
            $objRequest['image'] = "/uploads/image/".$fileName;
        }
        $this->validate(request(), $arrRules);

        $data = Post::create($objRequest);
        $msg='Law created successfully.';


        $arrData = new Post();
        $arrData->message = $msg;
        $arrData->status = 200;
        $arrData->data = $data;
        return response()->json($arrData);

    }

    public function update(Request $request){
        $data = Post::find($request->id);
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
        $msg='Law updated successfully.';


        $arrData = new Post();
        $arrData->message = $msg;
        $arrData->status = 200;
        $arrData->data = $data;
        return response()->json($arrData);
    }


}
