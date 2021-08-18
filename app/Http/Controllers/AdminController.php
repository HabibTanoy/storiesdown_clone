<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class AdminController extends Controller
{
    public function showDashboard()
    {
        return view('admin.pages.dashboard.index');
    }

    public function showLogin()
    {
        return view('admin.pages.auth.login');
    }

    public function postLogin(Request $request)
    {
        if (Auth::attempt([
            'email' => $request->email,
            'password' => $request->password
        ])){
            return redirect()->route('admin.dashboard');
        }
        return back()->withErrors(['message' => 'Invalid credentials.']);
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('show.admin.login');
    }

    public function showAllBlogs()
    {
        $blogs = Post::paginate(10);
        return view('admin.pages.blog.index',compact('blogs'));
    }

    public function showCreateBlog()
    {
        return view('admin.pages.blog.create');
    }

    public function uploadImage(Request $request)
    {
        $file = $request->file('file');
        $file_name = Str::random(10).'.'.$file->getClientOriginalExtension();
        $location = '/posts/'.$file_name;
        Storage::disk('public')->put($location,file_get_contents($file));
        return response()->json([
            'location' => asset('storage'.$location)
        ]);
    }

    public function createBlog(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'body' => 'required'
        ]);
        $slug = Str::slug($request->title, '-');
        if(Post::where('slug',$slug)->exists()) $slug .= '-'.Str::random(5);
        Post::create([
            'title' => $request->title,
            'cover_image' => $request->cover_image,
            'body' => $request->body,
            'slug' => $slug
        ]);

        return redirect()->route('show.admin.blogs');
    }

    public function editBlogPost($post)
    {
        $post = Post::where('slug',$post)->first();
        return view('admin.pages.blog.edit',compact('post'));
    }

    public function updateBlogPost($post,Request $request)
    {
        $post = Post::where('slug',$post)->first();
        $post->title = $request->title;
        $post->cover_image = $request->cover_image;
        $post->body = $request->body;
        $post->save();
        return redirect()->route('show.admin.blogs');
    }


    public function deleteBlogPost(Post $post)
    {
        $post->delete();
        return redirect()->route('show.admin.blogs');
    }
}
