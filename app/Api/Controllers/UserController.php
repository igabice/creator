<?php

namespace App\Api\Controllers;

use App\Api\Transformers\UserTransformer;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
//use Validator;

class UserController extends Controller
{
    public function index()
    {
        //$currentUser = JWTAuth::parseToken()->authenticate();
        $currentUser = Auth::guard('api')->user();
        return $currentUser;
    }

    public function store(Request $request){
        $user = Auth::guard('api')->user();
        $users = User::all();
        $updatePhone = 0;
        $updateEmail = 0;
        $message = '';
        $response = [];
        //return response()->json($request->all());
        //return $request->input('phone');

        foreach ($users as $instance){
            if($instance->phone == $request->input('phone') && $instance->id != $user->id){
                $updatePhone = 1;
                $message = ' This phone number is already registered';
                $response['error'] = $message;
                return $response;
            }
            if($instance->email == $request->input('email') && $instance->id == $user->id){
                $updatePhone = 1;
                $message = $message.' this email is already registered';
                $response['error'] = $message;
                return $message;
            }
        }
        if($updateEmail == 0){
            $user->email = $request->input('email');
        }
        if($updatePhone == 0){
            $user->phone = $request->input('phone');
        }
        //name lastname phone address email password
        $user->name = $request->input('name');
        $user->lastname = $request->input('lastname');
        $user->address = $request->input('address');
        if($user->save()){
            return $user;
        }

    }

    public function updateUser(Request $request)
    {

        $user = !empty(Auth::guard('api')->user()) ? Auth::guard('api')->user() : null;
        if ($user == null) {
            return Response(['error' => 'Unauthorised'], 401);
        }
        $user->name = $request->input('name') ? $request->input('name') : $user->name;
        $user->lastname = $request->input('lastname') ? $request->input('lastname') : $user->lastname;

        if ($user->save()) {
            return $user;
        }
    }

    public function updateLocation(Request $request)
    {
        $rules = [
            'longitude' => 'required',
            'latitude' => 'required',
        ];

        $validator = validator::make($request->all(), $rules);

        $user = !empty(Auth::guard('api')->user()) ? Auth::guard('api')->user() : null;
        if ($user == null) {
            return Response(['error' => 'Unauthorised'], 401);
        }
        $user->latitude = $request->input('latitude') ? $request->input('latitude') : $user->latitude;
        $user->longitude = $request->input('longitude') ? $request->input('longitude') : $user->longitude;
        if ($user->save()) {
            return $user;
        }
    }

    public function findNearestLocation(Request $request)
    {

        $latitude= $request->input('latitude');
        $longitude = $request->input('longitude');
        $distance = $request->input('distance');

        $datalist = DB::table('users')
            ->select('id', 'name', 'lastname', 'address', 'phone', 'email', 'latitude', 'longitude', DB::raw(sprintf(
                '(6371 * acos(cos(radians(%1$.7f)) * cos(radians(latitude)) * cos(radians(longitude) - radians(%2$.7f)) + sin(radians(%1$.7f)) * sin(radians(latitude)))) AS distance',
                $request->input('latitude'),
                $request->input('longitude')
            )))
            ->having('distance', '<=', ($request->input('distance')/1000))
            ->orderBy('distance', 'asc')
            ->limit(10)
            ->get();

        return response()->json($datalist);
       // return $this->response()->item($datalist, new UserTransformer());
    }



    public function photo(Request $request){
        $user = !empty(Auth::guard('api')->user()) ? Auth::guard('api')->user() : null;
        if($user == null){
            return Response(['error'=>'Unauthorised'], 401);
        }
        $rules = [
            'image' => 'required',
        ];
        $validator = validator::make($request->all(), $rules);

        if ($request->hasFile('image')) {
            $fileName = null;
            $file = $request->file('image');
            $fileName = time().$file->getClientOriginalName();
            $pathmeter_correct =  date('Y').'/'. date('m').'/'. date('d').'/';
            $fileName = $pathmeter_correct.$fileName;
            $file->move('./uploads/image/'. $pathmeter_correct, $fileName);
            $user->image = url('/')."/uploads/image/".$fileName;
        }
        if($user->save()){
            $image = new User;
            $image->image_link = $user->image;
            return response()->json($image);
            //return $user->image;
        }

    }

    public function changePassword(Request $request){
        $user = !empty(Auth::guard('api')->user()) ? Auth::guard('api')->user() : null;
        if($user == null){
            return Response(['error'=>'Unauthorised'], 401);
        }
        $rules = [
            'old_password' => 'required',
            'new_password' => 'required',
            'confirm_password' => 'required',
        ];

        $validator = validator::make($request->all(), $rules);
        if($validator->fails())return response()->json($validator->errors(), 401);

        if(strlen($request->new_password) < 6 ){
            return Response(['error'=>'allowed minimum password length is 6'], 401);
        }
        if($request->new_password != $request->confirm_password){
            return Response(['error'=>'Passwords do not match'], 401);
        }
        //return $user->password." \n new ".bcrypt($request->old_password);
//        if(bcrypt($request->old_password) != $user->password){
//            return Response(['error'=>'The old password entered is incorrect'], 401);
//        }
        $user->password = bcrypt($request->input('new_password'));

        if($user->save()){
            return Response(['data'=>'Password changed successfully'], 200);
        }

    }

}