@extends('master',['from' => 'BLOG_POST'])
@section('title',$post->title)
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>
                    {{$post->title}}
                </h1>
                <!--<p>{{\Carbon\Carbon::parse($post->created_at)->format('M d,Y')}}</p>-->
            </div>
        </div>
        <br>
        <br>
        <div class="row">
            <div class="col-md-12">
                {!! $post->body !!}
            </div>
        </div>
    </div>
@endsection
