<?php
namespace App\Http\Controllers;

use App\Article;
use App\User;
use App\Withdrawal;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\Rule;
use App\Mail\NewUserMail;
use Carbon\Carbon;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ArticlesController extends Controller
{
    public function __construct(){
        $this->middleware('auth')->except([]);
    }

    public function index(){
        //if(!auth()->user()->isAdmin())return back()->withError('cannot perform this operation');

//        $today = Carbon::today();
//        $todayData= Article::whereDate('created_at', '=', $today)->count();
//        $weekData= Article::whereDate('created_at', '<', $today->subDay(7))->count();
//        $monthData= Article::whereDate('created_at', '<', $today->subDay(30))->count();
//        $prevMonthData= Article::whereDate('created_at', '<', $today->subDay(30))->count();
        $data= Article::all();

        return view('articles.list', compact('data'));
    }

    public function show($id)
    {
        $data = Article::find($id);
        return view('articles.show', ['data' => $data,]);
    }

    public function createform()
    {
        return view('articles.create', ['title'=>'Create Article']);
    }
    public function edit($id)
    {
        $data= Article::find($id);
        return view('articles.edit', ['data'=>$data]);
    }

    function store(Request $request){
        $arrRules = array(
            'title' => ['required', 'string', 'max:200'],
            'description' => ['required'],
        );
        $objRequest = $request->all();
        
        $this->validate(request(), $arrRules);
        $objRequest['created_by'] = Auth::user()->id;

        if ($request->hasFile('file_1')) {
            $filetitle = null;
            $file = $request->file('file_1');
            $filetitle = time().$file->getClientOriginaltitle();
            $pathmeter_correct =  date('Y').'/'. date('m').'/'. date('d').'/';
            $filetitle = $pathmeter_correct.$filetitle;
            $file->move('./uploads/images/'. $pathmeter_correct, $filetitle);
            $objRequest['file_1'] = "/uploads/images/".$filetitle;
        }

        $data = Article::create($objRequest);
        $msg='Created successfully.';
        return redirect()->to('/articles/'.$data->id)->with('success', $msg);

    }

    public function update(Request $request){
        $arrData = Article::find($request->id);
        $arrRules = array(
            'title' => ['required', 'string', 'max:200'],
            'description' => ['required'],
        );

        $objRequest = $request->all();

        $this->validate(request(), $arrRules);

        if ($request->hasFile('file_1')) {
            $filetitle = null;
            $file = $request->file('file_1');
            $filetitle = time().$file->getClientOriginaltitle();
            $pathmeter_correct =  date('Y').'/'. date('m').'/'. date('d').'/';
            $filetitle = $pathmeter_correct.$filetitle;
            $file->move('./uploads/file_1/'. $pathmeter_correct, $filetitle);
            $objRequest['file_1'] = "/uploads/file_1/".$filetitle;
        }

        $arrData->update($objRequest);
        $msg='Article updated successfully.';

        return redirect()->to('/articles/'.$request->id)->with('success', $msg);
    }

}
