@extends('admin.master')
@section('content')
    <div class="sb2-2" style="height: 90vh">
        <!--== breadcrumbs ==-->
        <div class="sb2-2-2">
            <ul>
                <li><a href=""><i class="fa fa-home" aria-hidden="true"></i> Blog</a>
                </li>
                <li class="active-bre"><a href="#"> Create</a>
                </li>
            </ul>
        </div>
        <div class="sb2-2-1" >
            <form action="{{route('admin.update.blog.post',$post->id)}}" method="POST">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="input-field col s12">
                        <input id="title" name="title" type="text" class="validate" value="{{$post->title}}">
                        <label for="title">Blog Title</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <input type="hidden" name="cover_image" id="cover_image" value="{{$post->cover_image}}">
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <textarea class="tinymce" name="body">
                            {!! $post->body !!}
                        </textarea>
                    </div>
                </div>
                <button class="btn-success" type="submit" style="width: 100%;margin-top: 10px;padding: 10px">
                    Create
                </button>
            </form>
        </div>
    </div>
    <script>
        tinymce.init({
            selector: '.tinymce',
            plugins: 'print preview fullpage searchreplace autolink directionality visualblocks visualchars fullscreen image link media template codesample table charmap hr pagebreak nonbreaking anchor toc insertdatetime advlist lists textcolor wordcount imagetools contextmenu colorpicker textpattern help',
            toolbar1: 'undo redo|image|formatselect | bold italic strikethrough forecolor backcolor | link | alignleft aligncenter alignright alignjustify  | numlist bullist outdent indent  | removeformat',
            height : "400",
            images_upload_handler: function (blobInfo, success, failure) {
                var xhr, formData;
                xhr = new XMLHttpRequest();
                xhr.withCredentials = false;
                xhr.open('POST', '{{route('admin.upload.image')}}');
                xhr.onload = function() {
                    var json;
                    if (xhr.status != 200) {
                        failure('HTTP Error: ' + xhr.status);
                        return;
                    }
                    json = JSON.parse(xhr.responseText);
                    if (!json || typeof json.location != 'string') {
                        failure('Invalid JSON: ' + xhr.responseText);
                        return;
                    }
                    $('#cover_image').val(json.location)
                    success(json.location);
                };
                formData = new FormData();
                formData.append('file', blobInfo.blob(), blobInfo.filename());
                xhr.send(formData);
            }
        });
    </script>
@endsection
