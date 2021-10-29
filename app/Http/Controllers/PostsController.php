<?php

namespace App\Http\Controllers;

use App\Notifications\NewPostNotify;
use App\Post;
use App\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;


class PostsController extends Controller
{
    public function __construct(){
        $this->middleware('auth')->except([]);
    }

    public function index(){
        $data=Post::all();

        return view('posts.list', compact('data'));
    }

    public function show($id)
    {
        $data = Post::find($id);

        return view('posts.show', ['data' => $data]);
    }



    public function createform()
    {
        $user = Auth::user();
        
        return view('posts.create', ['title'=>'Create Post', 'user'=> $user]);
    }
    public function edit($id)
    {
        $data= Post::find($id);
        return view('posts.edit', ['data'=>$data,]);
    }

    public function store(Request $request)
    {
        $arrRules = array(
            'title' => ['required'],
            'content' => ['required'],
            'created_by' => ['required'],
        );

        $objRequest = $request->all();

        $this->validate(request(), $arrRules);

        $post = Post::create($objRequest);

        //$subscribers = User::all();//where('school_id', $request->school_id)->get(); //Retrieving all subscribers

        $subscribers = User::where('email', 'ayodamolaoluayoola@gmail.com')->orWhere('email', 'izzygabice@gmail.com')->get(); //Retrieving all subscribers
        foreach($subscribers as $subscriber){
            Notification::route('mail' , $subscriber->email) //Sending mail to subscriber
            ->notify(new NewPostNotify($request->title, $request->body, $subscriber)); //With new post

            return redirect()->to('/posts')->with('success', 'Messages sent Successfully!');
        }
    }
    

    public function update(Request $request){
        $arrData = Post::find($request->id);
        $arrRules = array(
            'title' => ['required'],
            'content' => ['required'],
        );

        $objRequest = $request->all();
        $this->validate(request(), $arrRules);

        //return $objRequest;

        $arrData->update($objRequest);
        $msg='Post updated successfully.';

        return redirect()->to('/posts')->with('success', $msg);
    }

}
