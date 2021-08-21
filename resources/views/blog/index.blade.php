@extends('master',['from' => 'BLOG'])
@section('title','Blog')
@section('content')

      <div class="text-center my-5 for_h2">
        <h2>StoriesDown's Blog</h2>
      </div>
      <div class="container mt-4">
        <div class="row">
        @foreach($blogs  as $post)
        <div class="col-12 col-md-6 col-lg-4 mb-3 for_atag">
            <a href="{{route('show.post',$post->slug)}}">
              <div class="inner-img text-center">
              @if($post->cover_image)
                <img src="{{$post->cover_image}}" />
                @endif
                <p class="for_p mt-2">{{$post->title}}</p>
                <div class="short-desc">
                <p class="body">
                    @php
                    $string = explode('.',strip_tags($post->body));
                    echo isset($string[0]) ? $string[0].'.' : '';          
                    @endphp
                </p>
                </div>
            </div>
            </a>
          </div>
          @endforeach
        </div>
      </div>
    </section>

@endsection
