<?php

namespace App\Http\Controllers;

use App\Notifications\NewAction;
use Illuminate\Notifications\Notifiable;
use App\Cart;
use App\CommissionDeposit;
use App\Mail\NewproductMail;
use App\Product;
use App\Rating;
use App\User;
use App\Wallet;
use Auth;
use App\Post;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

use Illuminate\Validation\Rule;
use App\Mail\NewUserMail;
use App\productGuests;
use App\Campaign;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Carbon\Carbon;

class CartsController extends Controller
{
    use Notifiable;

    public function __construct(){
        //$this->middleware('auth')->except(['declineproduct', 'acceptproduct']);
    }

    public function index(){
        $user = auth('web')->user();
        $data=Cart::leftJoin('products', 'products.id', '=', 'cart.product_id')
            ->select('*')
        ->where('cart.user_id', $user->id)->where('cart.status', 'pending')->get();

        $products = Product::all();

        $sum = 0;
        foreach ($data as $datum){
            $sum += $datum->price;
        }
  return view('cart.cart', compact('data', 'user', 'sum', 'products'));
    }
    public function campaigns(){
        $user = auth('web')->user();
        $data=Campaign::leftJoin('products', 'products.id', '=', 'campaign.product_id')
            ->select('products.*', 'campaign.id as cid')
        ->where('campaign.user_id', $user->id)->get();

  return view('campaign.list', compact('data', 'user',));
    }

    public function show($id){

        $user = auth('web')->user();

        $objRequest['product_id'] = $id;
        $objRequest['user_id'] = $user->id;

        $item = Cart::where('product_id', $objRequest['product_id'])->where('product_id', $objRequest['product_id'])->first();

        if($item == null){
            Cart::create($objRequest);
        }

        $msg='Product added to cart.';


        return redirect()->to('/products')->with('success', $msg);
    }

    public function createform()
    {
        $creators = User::where('role', 'C')->get();

        return view('products.create', ['title'=>'Create products', 'creators'=> $creators]);
    }

    public function edit($id)
    {
        $data= Product::find($id);

        return view('products.edit', ['data'=>$data, ]);
    }
    public function deleteProduct($id)
    {
        $data= Cart::where('product_id', $id)->where('user_id', Auth::user()->id)->delete();

        $msg='Product removed from cart.';

        return redirect()->to('/cart')->with('success', $msg);
    }


    function store(Request $request){
        $arrRules = array(
            //'email' => ['required', 'string', 'email', 'max:255',Rule::unique('products')->where(d)],
            'name' => ['required', 'string', 'max:250'],
            'user_id' => ['required'],
            'price' => ['required',],
            'unit' => ['required',],
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

        try {
            $this->validate(request(), $arrRules);
        } catch (ValidationException $e) {
        }
        $product = Product::create($objRequest);

        $msg='Product created successfully.';

        $this->notify(new NewAction('Your product was created successfully', 'New Product added'));

        return redirect()->to('/products/'.$product->id)->with('success', $msg);

    }




}
