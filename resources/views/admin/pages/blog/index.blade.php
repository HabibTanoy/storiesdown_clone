@extends('admin.master')
@section('content')
    <div class="sb2-2" style="height: 90vh">
        <!--== breadcrumbs ==-->
        <div class="sb2-2-2">
            <ul>
                <li><a href=""><i class="fa fa-home" aria-hidden="true"></i> Blog</a>
                </li>
                <li class="active-bre"><a href="#"> All</a>
                </li>
            </ul>
        </div>
        <style>
            table tr td:last-child{
                text-align: center;
            }
            nav{
                background: none;
                box-shadow: none;
            }
            button{
                outline: none !important;
                border: 1px solid gray;
                padding: 5px 10px 5px 10px;
            }
        </style>
        <div class="sb2-2-1" >
            <table class="table">
                <thead>
                    <tr>
                        <td style="width: 70%">Title</td>
                        <td>Action</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach($blogs as $post)
                        <tr>
                            <td>{{$post->title}}</td>
                            <td>
                                <div style="width: 100%;display:flex;justify-content: center">
                                    <div style="float: left;margin: 5px" class="border">
                                        <form action="{{route('admin.edit.blog.post',$post->id)}}" method="GET">
                                            <button class="btn-primary" type="submit">
                                                <i class="fa fa-edit"></i>
                                            </button>
                                        </form>
                                    </div>
                                    <div style="float: left;margin: 5px" class="border">
                                        <form action="{{route('admin.delete.blog.post',$post->id)}}" method="POST" style="float: left" class="m-1">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn-danger" type="submit">
                                                <i class="fa fa-trash-o"></i>
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{$blogs->links()}}
        </div>
    </div>
@endsection
