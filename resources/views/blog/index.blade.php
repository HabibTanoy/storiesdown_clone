@extends('master',['from' => 'BLOG'])
@section('title','Blog')
@section('content')
    <style>
        .list-group-item{
            border: none;
            padding: 5px;
        }
    </style>
    <br>
    <br>
    <div class="container">
        <div class="row">
            <div class="col-md-9">
               <div class="row">
                   @foreach($blogs  as $post)
                       <div class="col-md-6 justify-content-center">
                           @if($post->cover_image)
                               <img src="{{$post->cover_image}}" alt="" height="300px" width="300px">
                           @endif
                           <h3 style="color: #05bcbf">
                               <a href="{{route('show.post',$post->slug)}}">
                                   {{$post->title}}
                               </a>
                           </h3>
                           <!--<p>{{\Carbon\Carbon::parse($post->created_at)->format('M d,Y')}}</p>-->
                           <p class="body">
                                @php
                                   $string =  strip_tags($post->body);
                                    $result = substr($string, 0, 300);
                                    echo $result.'....'.'<a href="'.route('show.post',$post->slug).'">Read More</a>';
                                @endphp
                           </p>
                       </div>
                   @endforeach
               </div>
            </div>
            <div class="col-md-3">
                @php

                    $result = \Carbon\CarbonPeriod::create(\Carbon\Carbon::now()->subMonth(8)->toDateString(), '1 month', \Carbon\Carbon::now()->toDateString());

                @endphp
                <div class="list-group">
                    <form action="{{route('search.post')}}" method="GET">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder="Search" name="q">
                            <div class="input-group-append">
                                <button class="input-group-text" id="basic-addon2">
                                    <i class="fa fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                    <br>
                    @foreach ($result as $dt)
                        <a href="{{route('show.post.by.month',['date' => $dt->toDateString()])}}" class="list-group-item list-group-item-action"  style="color:#05bcbf;cursor: pointer">{{$dt->format("M,Y")}}</a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
