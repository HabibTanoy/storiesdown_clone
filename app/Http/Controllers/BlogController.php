<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Carbon\Carbon;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        $blogs = Post::paginate(10);
        return view('blog.index',compact('blogs'));
    }

    public function show($post)
    {
        $post = Post::where('slug',$post)->first();
        return view('blog.post',compact('post'));
    }

    public function showMonthlyPosts(Request $request)
    {
        $date = $request->date;
        $start = Carbon::parse($date)->startOfMonth()->toDateString();
        $end = Carbon::parse($date)->endOfMonth()->toDateString();
        $blogs = Post::whereDate('created_at','>=',$start)
            ->whereDate('created_at','<=',$end)
            ->paginate(10);
        return view('blog.index',compact('blogs'));
    }

    public function search(Request $request)
    {
        $blogs = Post::where('title','like',"%$request->q%")
            ->paginate(10);
        return view('blog.index',compact('blogs'));
    }
}
