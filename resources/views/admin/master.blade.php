<!DOCTYPE html>
<html lang="en">

<head>
    <title>Lava Material - Web Application and Website Multipurpose Admin Panel Template</title>
    <!--== META TAGS ==-->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
   @include('admin.includes.header')
    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
</head>

<body>
@include('admin.includes.top_nav')
<div class="container-fluid sb2">
    <div class="row">
        @include('admin.includes.side_nav')
        @yield('content')
    </div>
</div>
<!--======== SCRIPT FILES =========-->
<script src="{{asset('admin/js/jquery.min.js')}}"></script>
<script src="{{asset('admin/js/bootstrap.min.js')}}"></script>
<script src="{{asset('admin/js/materialize.min.js')}}"></script>
<script src="{{asset('admin/js/custom.js')}}"></script>
</body>

</html>
