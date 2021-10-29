<?php

namespace App\Http\Controllers;

use App\Article;
use App\Collection;
use App\Post;
use App\Withdrawal;
use App\State;

use Mail;

//
//use Illuminate\Support\Collection;
//use Illuminate\Pagination\Paginator;
//use Illuminate\Pagination\LengthAwarePaginator;



class DashboardController extends Controller
{

    public function index(){
        $user = auth('web')->user();
        //$data=Withdrawal::all();
        return view('welcome', compact('data', 'user'));
    }

    public function dashboard(){
        $user = auth('web')->user();
        $data = Post::where('citation', $_GET['category'])->paginate(10);

        //$data = (new Collection($data))->paginate(20);
        //return $data;
        return view('dashboard.index', compact('data', 'user'));
    }

    public function chapters(){
        $user = auth('web')->user();

        $law = Post::find($_GET['id']);

        $data = Withdrawal::where('law_id', $_GET['id'])->get();
        foreach ($data as $chapter){
            $subchapters = Withdrawal::where('sub_section', $chapter->id)->get();
            $chapter->sub_sections = $subchapters;
            $chapter->sub_count = count($subchapters);

        }
        //return $data;
        return view('dashboard.chapters', compact('data', 'user', 'law'));
    }

    public function details(){
        $user = auth('web')->user();
        $data = Post::find($_GET['id']);

//        $data = Withdrawal::where('law_id', $_GET['id'])->get();
//        foreach ($data as $chapter){
//            $subchapters = Withdrawal::where('sub_section', $chapter->id)->get();
//            $chapter->sub_sections = $subchapters;
//            $chapter->sub_count = count($subchapters);
//        }
        //return $data;
        return view('dashboard.details', compact('data', 'user'));

    }

    public function categories(){
        $user = auth('web')->user();
        return view('select-category');
    }


    public function blogs(){
        //if(!auth()->user()->isAdmin())return back()->withError('cannot perform this operation');

//        $today = Carbon::today();
//        $todayData= Article::whereDate('created_at', '=', $today)->count();
//        $weekData= Article::whereDate('created_at', '<', $today->subDay(7))->count();
//        $monthData= Article::whereDate('created_at', '<', $today->subDay(30))->count();
//        $prevMonthData= Article::whereDate('created_at', '<', $today->subDay(30))->count();
        $data= Article::all();
        $user = auth('web')->user();

        return view('dashboard.blog-list', compact('data', 'user'));
    }

    public function blog($id)
    {
        $data = Article::find($id);
        $user = auth('web')->user();
        return view('dashboard.blog-detail', compact('data', 'user'));
    }



}

