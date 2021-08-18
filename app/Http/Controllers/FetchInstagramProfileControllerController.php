<?php

namespace App\Http\Controllers;

use Illuminate\Http\Client\ConnectionException;
use Illuminate\Http\Client\HttpClientException;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class FetchInstagramProfileControllerController extends Controller
{
    public function getUserProfile($user_id,Request $request)
    {
        try {
            $profile = $this->fetchAll($user_id);
            if (!$profile)  return redirect('/not-found');
            return view('home',compact('profile'));
        }catch (\Exception $exception){
            return redirect('/error');
        }
    }

    private function fetchAll($user_id)
    {
        try {
            $response  = Http::timeout(10)->withHeaders([
                'ig' => $user_id,
                'x-rapidapi-key' => env('RAPIDAPI_API_KEY'),
                'x-rapidapi-host' => 'instagram-bulk-profile-scrapper.p.rapidapi.com'
            ])->get('https://instagram-bulk-profile-scrapper.p.rapidapi.com/clients/api/ig/bulk_profile', [
                'ig' => $user_id,
                'response_type' => 'feeds',
                'corsEnabled' => 'true'
            ]);
            $response = $response->body();
            $response = collect(json_decode($response))->first();
            if (isset($response->error_code) && $response->error_code == 'IgExactUserNotFoundError')
                return [];
            return $this->prepareResponse($response);
        }catch (ConnectionException $exception){
            $key = env('RAPIDAPI_API_KEY');
            $response  = Http::withHeaders([
                'ig' => $user_id,
                'x-rapidapi-key' => $key,
                'x-rapidapi-host' => 'instagram85.p.rapidapi.com'
            ])->get("https://instagram85.p.rapidapi.com/account/$user_id/info");
            $response = $response->body();
            $response = json_decode($response);
            return $this->prepareSecondAPIResponse($response);
            //return second API
        }catch(\Exception $exception){
            dd($exception);
        }


    }

    private function prepareSecondAPIResponse($response)
    {
        if (!isset($response->data->id)) return [];
        $response = $response->data;
        $profile = [
            'id' => $response->id,
            'user_name' => $response->username,
            'full_name' => $response->full_name,
            'biography' => $response->biography,
            'profile_picture' => $this->imageToBase64($response->profile_picture->hd),
            'number_of_published_post' => $response->figures->posts,
            'number_of_followers' => $response->figures->followers,
            'number_of_follows' => $response->figures->followings,
            'is_private' => $response->is_private,
        ];
        $medias = $this->getMediasFromSecondAPI($response->username);
        $profile['medias'] = $medias;
        return $profile;
    }

    private function getMediasFromSecondAPI($user_id)
    {
        $key = env('RAPIDAPI_API_KEY');
        $medias = [];
        $response  = Http::withHeaders([
            'ig' => $user_id,
            'x-rapidapi-key' => $key,
            'x-rapidapi-host' => 'instagram85.p.rapidapi.com'
        ])->get("https://instagram85.p.rapidapi.com/account/$user_id/feed",[
            'by' =>  'username',
        ]);
        $response = $response->body();
        $response = json_decode($response);
        foreach ($response->data as $index => $media) {
            if ($index == 13) break;
            if (isset($media->images)){
                $medias[] = [
                    'id' => $media->id,
                    'image' => $media->images->original->low ? $this->imageToBase64($media->images->original->low) : null,
                    'caption' => $media->caption ?? null
                ];
            }
        }
        return $medias;
    }

    private function prepareResponse($response)
    {
        $profile = [
            'id' => $response->pk,
            'user_name' => $response->username,
            'full_name' => $response->full_name,
            'biography' => $response->biography,
            'profile_picture' => $response->profile_pic_url,
            'number_of_published_post' => $response->media_count,
            'number_of_followers' => $response->follower_count,
            'number_of_follows' => $response->following_count,
            'is_private' => $response->is_private,
            'medias' => []
        ];
        $medias = [];
        if ($response->feed->data != null) {
            foreach ($response->feed->data as $media) {
                if (isset($media->image_versions2)){
                    $medias[] = [
                        'id' => $media->pk,
                        'image' => $media->image_versions2->candidates[1]->url ?? $media->image_versions2->candidates[0]->url,
                        'caption' => $media->caption->text ?? null
                    ];
                }
            }
        }
        $profile['medias'] = $medias;
        return $profile;
    }

    private function imageToBase64($image)
    {
        $content = base64_encode(file_get_contents($image));
        return 'data:image/png;base64, '.$content;
    }

    public function getPhotos($user_id)
    {
        $response = null;
        $photos = Cookie::get('photos');
        dd($photos);
        $photos = json_decode($photos);
        if (!$photos) return response()->json(['photos' => '']);
        foreach ($photos as $photo)
        {
            $response .= '<div class="col-md-3 mb-4">'.
                '<a href="'.$photo->image.'"><img src="'.$photo->image.'"></a>'.
            '</div>';
        }
        return response()->json(['photos' => $response]);
    }

    public function getStories($user_id)
    {
        $story_response = null;
        $response  = Http::withHeaders([
            'ig' => $user_id,
            'x-rapidapi-key' => env('RAPIDAPI_API_KEY'),
            'x-rapidapi-host' => 'instagram-bulk-profile-scrapper.p.rapidapi.com'
        ])->get('https://instagram-bulk-profile-scrapper.p.rapidapi.com/clients/api/ig/ig_profile', [
            'ig' => $user_id,
            'response_type' => 'story',
            'corsEnabled' => 'true'
        ]);
        $response = $response->body();
        $response = collect(json_decode($response))->first();
        foreach ($response->story->data as $story)
        {
            $story_response .= '<div class="col-md-3 mb-4">'.
                '<a href="'.$story->video_versions[0]->url.'"><img src="'.$story->video_versions[0]->url.'"></a>'.
                '</div>';
        }

        return response()->json(['stories' => $story_response]);
    }
}
