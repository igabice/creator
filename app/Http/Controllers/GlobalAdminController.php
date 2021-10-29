<?php

namespace App\Http\Controllers;

use App\Post;
use App\Models\Actions;
use App\Models\BypassCapture;
use App\Models\Clockin;
use App\Models\Order;
use App\Models\Store;
use App\Models\Faultymeter;
use App\Models\Categories;
use App\Models\Metering;
use App\Models\Product;
use App\Models\Revisitevaluation;
use App\Models\Sealcertificate;
use App\Newsletter;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GlobalAdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
        public function __construct(){
       $this->middleware('auth')->except(['newsletter']);
    }


    public function index()
    {
        $today = Carbon::now();
        $day3 = $today->subDays(3);
        $week = $today->subWeek();
        $month = $today->subMonth();
        return view('actionlist', [ 'today' =>$today, 'day3' =>$day3, 'week' =>$week]);
    }

    function newsletter(Request $request){

        $arrRules = array(
            'email' => ['required'],
        );

        $objRequest = $request->all();

        $this->validate(request(), $arrRules);

        Newsletter::create($objRequest);
        $msg='Email saved successfully. you will be notified of new events in the coming days.';
        return redirect()->to('/')->with('success', $msg);

    }


}
