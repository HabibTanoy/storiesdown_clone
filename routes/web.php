<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home');
});

Route::get('/error',function (\Illuminate\Http\Request $request){
    return view('errors.500',$request->all());
});

Route::get('/not-found',function (){
    return view('errors.404');
});


Route::get('user/{profile}',[\App\Http\Controllers\FetchInstagramProfileControllerController::class,'getUserProfile'])
    ->name('profile');
//    ->middleware('throttle:fetcher');


Route::get('/search',function (){
    return view('search.search');
});


Route::get('/contact-us',function (){
    return view('contact_us');
});

Route::get('/privacy-policy',function (){
    return view('privacy');
});

Route::get('/terms-and-conditions',function (){
    return view('terms_and_conditions');
});

Route::get('/blog/search',[\App\Http\Controllers\BlogController::class,'search'])->name('search.post');
Route::get('/blog',[\App\Http\Controllers\BlogController::class,'index'])->name('show.blog');
Route::get('/blog/{post}',[\App\Http\Controllers\BlogController::class,'show'])->name('show.post');
Route::get('/blog/from/month',[\App\Http\Controllers\BlogController::class,'showMonthlyPosts'])->name('show.post.by.month');


Route::group(['prefix'=> 'admin'],function (){
    Route::get('/login',[\App\Http\Controllers\AdminController::class,'showLogin'])
        ->name('show.admin.login');
    Route::post('/login',[\App\Http\Controllers\AdminController::class,'postLogin'])
        ->name('post.admin.login');
    Route::group(['middleware' => 'admin'],function (){
        Route::get('/dashboard',[\App\Http\Controllers\AdminController::class,'showDashboard'])
            ->name('admin.dashboard')
            ->middleware('auth');
        Route::get('/logout',[\App\Http\Controllers\AdminController::class,'logout'])
            ->middleware('auth')
            ->name('post.admin.logout');
        Route::get('/blogs',[\App\Http\Controllers\AdminController::class,'showAllBlogs'])
            ->name('show.admin.blogs');
        Route::get('/blog/create',[\App\Http\Controllers\AdminController::class,'showCreateBlog'])
            ->name('show.admin.create.blog');
        Route::post('/blog/create',[\App\Http\Controllers\AdminController::class,'createBlog'])
            ->name('admin.create.blog');
        Route::get('/blog/{post}',[\App\Http\Controllers\AdminController::class,'editBlogPost'])
            ->name('admin.edit.blog.post');
        Route::put('/blog/{post}',[\App\Http\Controllers\AdminController::class,'updateBlogPost'])
            ->name('admin.update.blog.post');
        Route::delete('/blog/{post}',[\App\Http\Controllers\AdminController::class,'deleteBlogPost'])
            ->name('admin.delete.blog.post');
    });
});
