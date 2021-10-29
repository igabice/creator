<?php

namespace App\Http\Controllers;

use App\Payment;
use Auth;

use Illuminate\Validation\Rule;
use Mail;
use App\Mail\NewUserMail;
use App\Mail\PasswordResetMail;
use Illuminate\Http\Request;
use Carbon\Carbon;

class PaymentsController extends Controller
{
    public function __construct(){
        $this->middleware('auth')->except([]);
    }

    public function index(){
        //if(!auth()->user()->isAdmin())return back()->withError('cannot perform this operation');
        $today = Carbon::today();
        $todayData= Payment::whereDate('created_at', '=', $today)->count();
        $weekData= Payment::whereDate('created_at', '<', $today->subDay(7))->count();
        $monthData= Payment::whereDate('created_at', '<', $today->subDay(30))->count();
        $prevMonthData= Payment::whereDate('created_at', '<', $today->subDay(30))->count();

        $data= Payment::all();

        return view('payment.list', compact('data', 'todayData', 'weekData', 'monthData', 'prevMonthData'));
    }

    public function show($id)
    {
        $data = Payment::find($id);
        return view('payment.show', ['data' => $data]);
    }

    public function createform()
    {
        $product = Payment::find($_GET['user_id']);
        return view('payment.create', ['title'=>'Create orders', 'product'=>$product]);
    }
    public function edit($id)
    {
        $data= Payment::find($id);
        return view('payment.edit', ['data'=>$data]);
    }

    function store(Request $request){
        $arrRules = array(
            'payment_uuid' => ['required'],
            'item' => ['required'],
            'user_id' => ['required'],
            'payment_type' => ['required'],
        );

        $objRequest = $request->all();

        $this->validate(request(), $arrRules);

         Payment::create($objRequest);


         $msg='Order created successfully.';

         return redirect()->to('/products/'.$request->user_id)->with('success', $msg);

    }



}
