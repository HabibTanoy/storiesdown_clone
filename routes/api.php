<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('api/private-images',function (Request $request){
$total = $request->total > 40 ? 40 : $request->total;
    $private_images = [];
    $image_string = '';
   // $files = Storage::disk('public')->allFiles('images');
   $files = \File::files(public_path('/storage/images'));
    while (true)
    {
        $random_file = $files[rand(0, count($files) - 1)];
        if (!in_array($random_file,$private_images)) {
            $private_images[] = $random_file;
            $random_file = str_replace('/home/private-viewer.com/public_html/insta-fetcher/public','',$random_file);
            $image_string .=    "<div class='col-md-3'>" .
                "<div style='position: relative; margin-bottom: 30px;border:1px solid gray;overflow:hidden;border-radius: 6px;'>" .
                "<img src='".$random_file."' width='200px' height='200px;' style='border-radius: 6px; filter: blur(30px);' alt=''>" .
                "</div>" .
                "</div>";
        }
        if (count($private_images) == $total) break;
    }
    return response()->json([
        'images' => $image_string
    ]);

})->name('get-private-images');


Route::post('/upload/image',[\App\Http\Controllers\AdminController::class,'uploadImage'])
    ->middleware('throttle:api')
    ->name('admin.upload.image');


Route::get('/get/images/{user_id}',[\App\Http\Controllers\FetchInstagramProfileControllerController::class,'getPhotos'])->name('get.photos');
Route::get('/get/stories/{user_id}',[\App\Http\Controllers\FetchInstagramProfileControllerController::class,'getStories'])->name('get.stories');
