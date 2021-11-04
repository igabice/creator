<?php
namespace App\Http\Controllers;

use App\Bundle;

use App\Campaign;
use App\CourseOwn;
use App\Product;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class BundlesController extends Controller
{
    public function __construct(){
        $this->middleware('auth')->except([]);
    }

    public function index(){
        $data= Bundle::all();

        return view('bundles.list', compact('data'));
    }

    public function show($id)
    {
        $user = auth('web')->user();
        $data = Bundle::find($id);

        $arr = [$data->product_1, $data->product_2, $data->product_3, $data->product_4, $data->product_5];
        $products = Product::whereIn('id', $arr)->get();

       // return $arr;
        $own = CourseOwn::where('user_id', $user->id)->where('product_id', $id)->first();

        $refferal = Campaign::where('product_id', $id)->where('user_id', $user->id)->count();
        $campaign = Campaign::leftJoin('users as marketers', 'marketers.id', '=', 'campaign.user_id')
            ->join('products', 'products.id', '=', 'campaign.product_id')
            ->leftjoin('commission_deposit', 'marketers.id', '=', 'commission_deposit.user_id')
            ->select('marketers.name as firstname', 'marketers.last_name as lastname', 'campaign.id as id', 'commission_deposit.amount', 'campaign.created_at as created_at',
                'marketers.id as user_id', 'products.id as id',
                DB::raw('SUM(commission_deposit.id) as id_count'), DB::raw('SUM(commission_deposit.amount) as revenue'))
            ->where('products.id', $id)
            ->groupBy('commission_deposit.amount', 'marketers.name', 'commission_deposit.id', 'marketers.last_name', 'campaign.id', 'campaign.created_at',
                'marketers.id', 'products.id')
            ->get();


        return view('bundles.show', ['data' => $data, 'products'=> $products, 'own'=> $own,
            'campaign' => $campaign, 'refferal' => $refferal,]);
    }

    public function createform()
    {
        $products = Product::all();
        return view('bundles.create', ['title'=>'Create Bundle', 'products'=> $products]);
    }
    public function edit($id)
    {
        $data= Bundle::find($id);
        $products = Product::all();
        return view('bundles.edit', ['title'=>'Create Bundle', 'data'=>$data, 'products'=> $products]);
    }

    function store(Request $request){
        $arrRules = array(
            'title' => ['required', 'string', 'max:200'],
            'price' => ['required'],
            'image' => ['required'],
            'product_1' => ['required'],
        );
        $objRequest = $request->all();
        
        $this->validate(request(), $arrRules);
        $objRequest['created_by'] = Auth::user()->id;

        if ($request->hasFile('image')) {
            $filetitle = null;
            $file = $request->file('image');
            $filetitle = time().$file->getClientOriginalName();
            $pathmeter_correct =  date('Y').'/'. date('m').'/'. date('d').'/';
            $filetitle = $pathmeter_correct.$filetitle;
            $file->move('./uploads/images/'. $pathmeter_correct, $filetitle);
            $objRequest['image'] = "/uploads/images/".$filetitle;
        }

        $data = Bundle::create($objRequest);
        $msg='Created successfully.';
        return redirect()->to('/bundles/'.$data->id)->with('success', $msg);

    }

    public function update(Request $request){
        $arrData = Bundle::find($request->id);
        $arrRules = array(
            'title' => ['required', 'string', 'max:200'],
            'description' => ['required'],
        );

        $objRequest = $request->all();

        $this->validate(request(), $arrRules);

        if ($request->hasFile('image')) {
            $filetitle = null;
            $file = $request->file('image');
            $filetitle = time().$file->getClientOriginalName();
            $pathmeter_correct =  date('Y').'/'. date('m').'/'. date('d').'/';
            $filetitle = $pathmeter_correct.$filetitle;
            $file->move('./uploads/image/'. $pathmeter_correct, $filetitle);
            $objRequest['image'] = "/uploads/image/".$filetitle;
        }

        $arrData->update($objRequest);
        $msg='Bundle updated successfully.';

        return redirect()->to('/bundles/'.$request->id)->with('success', $msg);
    }

}
