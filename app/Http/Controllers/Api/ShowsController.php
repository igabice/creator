<?php

namespace App\Http\Controllers\Api;

use App\Mail\NewShowMail;
use App\User;
use Auth;
use App\Shows;
use App\ShowGuests;

use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;


use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class ShowsController extends Controller
{
    public function __construct(){
        $this->middleware('api')->except([]);
    }

    public function myShows(){

        //$user = auth('api')->user();
        //$data=Shows::where('host_id', $user->id)->orWhere('guest', $user->id)->orderBy('id','desc')->get();
        $data=Shows::where('visible', 'yes')->get();

//        $data = Shows::leftJoin('users', 'users.id', '=', 'shows.guest')
//            // ->join('meter_books', 'meter_books.cro_id', '=', 'users.id')
//            ->select(
//                'shows.id', 'shows.name as show_title', 'shows.image as show_image', 'shows.description',
//                'shows.date', 'shows.start_time', 'shows.end_time', 'shows.guest',
//                'shows.guest_status', 'users.email as guest_email', 'users.phone as guest_phone',
//                'users.states as guest_expertise')
//            ->where('host_id', $user->id)->orWhere('guest', $user->id)->get();

        $arrData = new Shows();
        $arrData->message = "success";
        $arrData->status = 200;
        $arrData->data = $data;
        return response()->json($arrData);
    }
    public function todayShows(){
        $now = date('d-m-Y');
        $user = auth('api')->user();
       // $data=Shows::where('host_id', $user->id)->orWhere('guest', $user->id)->where('date', $now)->orderBy('id','desc')->get();
       $data=Shows::where('host_id', $user->id)->orWhere('guest', $user->id)->where('visible', 'yes')->orderBy('start_time','desc')->get();

        $arrData = new Shows();
        $arrData->message = "success";
        $arrData->status = 200;
        $arrData->data = $data;
        return response()->json($arrData);
    }

    public function showGuest(){
        $data = ShowGuests::select('guest_id')->where('show_id', request()->show_id)->get();

        $arr = array();
        foreach($data as $d){
            $arr[] = $d->guest_id;
        }
        $data = User::whereIn('id', $arr)->get();
        $arrData = new Shows();
        $arrData->message = "success";
        $arrData->status = 200;
        $arrData->data = $data;
        return response()->json($arrData);
    }

    public function allHosts()
    {
        //$data =User::where('role', 'host')->get();
        $data = User::leftJoin('states', 'states.id', '=', 'users.states')
            // ->join('meter_books', 'meter_books.cro_id', '=', 'users.id')
            ->select('users.*', 'states.name as guest_expertise')
            ->where('role', 'host')->get();
        $arrData = new Shows();
        $arrData->message = "success";
        $arrData->status = 200;
        $arrData->data = $data;
        return response()->json($arrData);
    }
    public function allGuests()
    {
        $data = User::leftJoin('states', 'states.id', '=', 'users.states')
            // ->join('meter_books', 'meter_books.cro_id', '=', 'users.id')
            ->select('users.*', 'states.name as guest_expertise')
            ->where('role', 'guest')->get();
        $arrData = new Shows();
        $arrData->message = "success";
        $arrData->status = 200;
        $arrData->data = $data;
        return response()->json($arrData);
    }



    function store(Request $request){
        $arrRules = array(
            'name' => ['required', 'string', 'max:250'],
            'host_id' => ['required'],
            'date' => ['required'],
            'start_time' => ['required',],
            //'end_time' => ['required'],
        );

        $objRequest = $request->all();
        try {
            $this->validate(request(), $arrRules);
        } catch (ValidationException $e) {
        }

        $date = Carbon::parse($request->date);
        $arrData = new Shows();
        $arrData->status = 400;
        $arrData->data = null;
        $arrData->message = "Invalid date entered. you can't create a show for the past.";
        if($date < Carbon::today()){
            return response()->json($arrData, 400);
        }
        $start = Carbon::parse( $request->start_time);
//        return $start;

        $end = Carbon::parse($request->end_time);
        $arrData->message = "start time can't be the same as end time";
        if($start == $end){
            return response()->json($arrData, 400);
        }

        // $find_guests = Shows::where('guest', $request->guest)->where('visible', 'yes')->where('date', $request->date)->get();
        // foreach ($find_guests as $guest){
        //     $date1 = Carbon::parse($guest->start_time);
        //     $date2 = Carbon::parse($guest->end_time);
        //     $arrData->message = "The selected date and time isn't available for the guest, please reschedule your show.";
        //     $arrData->data = $guest;
        //     if($start == $date1){
        //         return response()->json($arrData, 400);
        //     }else if($start > $date1 & $start < $date2){
        //         return response()->json($arrData, 400);
        //     }
        // }

        $arrData->status = 200;
        $arrData->message = "success";
        $objRequest['date'] = Carbon::createFromFormat('d-m-Y', $objRequest['date'])->format('Y-m-d');

        $data = Shows::create($objRequest);

        $arrData->data = $data;

        if($objRequest['guest']){
            foreach($objRequest['guest'] as $guest_id){
                $guest = ShowGuests::create(['guest_id'=>$guest_id, 'show_id'=>$data->id]);
            }
        }



        $guest = User::find($request->guest);
        if($guest){
            try{
                Mail::to($guest->email)->send(new NewShowMail($guest, $arrData->data));
            }catch(\Exception $ex){
                //return $ex->getMessage();
            }
        }
        $arrData->message='Tv Show created successfully.';
        return response()->json($arrData);
    }

    public function hideShow($id)
    {
        $data= Shows::find($id);
        $data->visible = "no";
        $data->save();

        $msg='Tv Show deleted successfully.';

        $arrData = new Shows();
        $arrData->status = 200;
        $arrData->message = $msg;
        $arrData->data = $data;
        return response()->json($arrData);
    }


    public function update(Request $request){
        $data = Shows::find($request->id);
        $arrRules = array(
            'name' => ['required', 'string', 'max:250'],
            'host_id' => ['required'],
            'start_time' => ['required',],
           // 'end_time' => ['required'],
        );

        $objRequest = $request->all();

        $this->validate(request(), $arrRules);

        $data->update($objRequest);
        $msg='Tv Show  updated successfully.';

        $arrData = new Shows();
        $arrData->status = 200;
        $arrData->message = $msg;
        $arrData->data = $data;
        return response()->json($arrData);
    }

}
