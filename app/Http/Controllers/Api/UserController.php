<?php

namespace App\Http\Controllers\Api;

use Auth;
use App\User;

use Illuminate\Validation\Rule;
use Mail;
use App\Mail\NewUserMail;
use App\Mail\PasswordResetMail;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function __construct(){
        $this->middleware('auth')->except([]);
    }

    public function index(){
        //if(!auth()->user()->isAdmin())return back()->withError('cannot perform this operation');

        $data=User::where('role', 'host')->get();

        return view('hosts.list', compact('data'));
    }

    public function show($id)
    {
        $data = User::find($id);
        return view('hosts.show', ['data' => $data]);
    }

    public function createform()
    {
        return view('hosts.create', ['title'=>'Create Hosts']);
    }
    public function edit($id)
    {
        $data= User::find($id);
        return view('hosts.edit', ['data'=>$data]);
    }

    function store(Request $request){
        $arrRules = array(
            'email' => ['required', 'string', 'email', 'max:255',Rule::unique('users')],
            'name' => ['required', 'string', 'max:200'],
            'last_name' => ['max:200'],
            'phone' => ['required', 'string', 'max:255'],
            'password' => ['required','min:6'],
        );

        $user=User::where('email', $request->input('email'))->first();
        if($user)return back()->withError('email address already exist');
        $objRequest = $request->all();
        //if($objRequest['password'] != $objRequest['password2'])return back()->withError('passwords do not match');

        $this->validate(request(), $arrRules);

        $objRequest['password'] = Hash::make(request('password'));
        $objRequest['role'] = 'host';
        $objRequest['phone']=str_replace(' ', '', $objRequest['phone']);

        User::create($objRequest);
        $msg='Hosts created successfully.';

        return redirect()->route('hosts')->with('success', $msg);

    }

//    public function load_data(Datatables $datatables, $id = 0) {
//        $items = User::leftjoin('departments', 'users.department_id', '=', 'departments.id')
//            ->leftjoin('stores', 'users.store_id', '=', 'stores.id')
//            ->leftjoin('account_types', 'users.account_type', '=', 'account_types.id')
//            ->leftjoin('store_levels', 'users.role_level', '=', 'store_levels.id')
//            ->leftjoin('status', 'users.status', '=', 'status.id')
//            ->select(['users.*', 'departments.name as department_name', 'stores.name as store_name', 'account_types.name as account_name','store_levels.name as role_name', 'status.name as status_name'])
//            ->where("users.status",'!=',2);
//
//        return $datatables->eloquent($items)
//            ->addColumn('action', function ($data) {
//                if($data->id==auth()->user()->id)return '';
//                else
//                    return '<a class="delete btn-delete" data-remote="' . route('user_delete', ['id' => $data->id]) . '"><i class="dripicons-trash del"></i></a>
//                                    <a href="' . route('user_edit', $data->id) . '" class="edit"><i class="ti-pencil-alt"></i></a>';
//            })
//            ->rawColumns(['id', 'status', 'action'])
//            ->make(true);
//    }


    public function update(Request $request){
        $arrData = User::find($request->id);
        $arrRules = array(
            'email' => ['required', 'string', 'email', 'max:255'],
            'name' => ['required', 'string', 'max:200'],
            'last_name' => ['max:200'],
            'phone' => ['required', 'string', 'max:255'],
           // 'password' => ['required','min:6'],
        );

        $user=User::where('email', $request->input('email'))->first();
        if($user != null){
            if($user->id != $request->id)return back()->withError('email address already registered with another user');
        }        $objRequest = $request->all();
        //if($objRequest['password'] != $objRequest['password2'])return back()->withError('passwords do not match');

        $this->validate(request(), $arrRules);

        $objRequest['password'] = Hash::make(request('password'));
        $objRequest['role'] = 'host';

        $objRequest['phone']=str_replace(' ', '', $objRequest['phone']);

        $arrData->update($objRequest);
        $msg='Hosts updated successfully.';

        return redirect()->to('/hosts')->with('success', $msg);
    }

    public function updateStatus(Request $request){
        // return $request->all();
        $this->validate($request, [
            'email' => ['required', 'string', 'email', 'max:255'],
        ]);

        $email=$request->input('email');

        $user=User::where('email', $email)->first();
        if(!$user)return back()->withError('user account does not exist');

        if($user->active==0)$user->active=1;
        else $user->active=0;

        if($user->save()){
            return redirect('/users')->withSuccess('User account has been updated');
        }else return back()->withError('an error occurred');
    }

    public function saves(Request $request){
        $this->validate($request, [
            'surname' => ['required', 'string', 'max:255'],
            'other_names' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:255'],
            'department' => ['required', 'string', 'max:255'],
            'role_level' => ['required', 'integer', 'max:255'],
            'store_id' => ['required', 'integer', 'max:255'],
            'account_type' => ['required', 'integer', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        ]);

        $user=User::where('email', $request->input('email'))->first();
        if($user != null){
            if($user->id != $request->id)return back()->withError('email address already registered with another user');
        }

        $password = UserController::generatePassword(10);
        $user=new User();

        $user->surname = $request->input('surname');
        $user->other_names = $request->input('other_names');
        $user->phone = $request->input('phone');
        $user->department = $request->input('department');
        $user->role_level = $request->input('role_level');
        $user->store_id = $request->input('store_id');
        $user->email = $request->input('email');
        $user->account_type = $request->input('account_type');
        $user->password=Hash::make($request->input('email'));
        if($request->input('ad'))$user->admin=1;

        if($user->save()){
            $user->password=$password;
            try{
                Mail::to($user->email)->send(new NewUserMail($user));
            }catch(\Exception $ex){
                // $data=$user;
                // return view('mail.newuser', compact('data'));
                return $ex->getMessage();
            }
            return redirect('/users')->withSuccess('User account has been created');
        }else return back()->withError('an error occurred');
    }

    static function generatePassword($length){
        $token = "";
        $codeAlphabet = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
        $codeAlphabet.= "abcdefghijklmnopqrstuvwxyz";
        $codeAlphabet.= "0123456789";
        $max = strlen($codeAlphabet); // edited

        for ($i=0; $i < $length; $i++) {
            $token .= $codeAlphabet[random_int(0, $max-1)];
        }

        return $token;
    }

    public function profile(){
        return view('user.profile');
    }

    public function updateProfile(Request $request){
        $this->validate($request, [
            'current_password'=>['required', 'String', 'min:8', 'max:20'],
            'new_password'=>['required', 'String', 'min:8', 'max:20', 'confirmed'],
        ]);

        $user=User::find(auth()->user()->id);
        if(!$user)return back()->withError('user account does not exist');

        if(!Hash::check($request->current_password, $user->password))return back()->withError('Old password is not correct');

        $user->password=Hash::make($request->new_password);
        if($user->save())return back()->withSuccess('password has been updated');
        else return back()->withError('an error occurred');
    }

    public function signout(){
        Auth::logout();
        return redirect('/');
    }

}
