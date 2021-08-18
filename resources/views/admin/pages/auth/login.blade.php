<!DOCTYPE html>
<html lang="en">

<head>
    <title>Lava Material - Web Application and Website Multipurpose Admin Panel Template</title>
    <!--== META TAGS ==-->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    @include('admin.includes.header')
</head>

<body>
<div class="">
    <div class="blog-login-in">
        <form method="POST" action="{{route('post.admin.login')}}">
            @csrf
            <center><h1>Admin Login</h1></center>
{{--            <img src="{{asset('admin/images/logo.png')}}" alt="" />--}}
            <div class="row">
                <div class="input-field col s12">
                    <input name="email" type="text" class="validate">
                    <label for="">Email</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <input name="password" type="password" class="validate">
                    <label for="">Password</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <button class="waves-effect waves-light btn-large btn-log-in" style="width: 100%">Login</button>
                </div>
            </div>
{{--            <a href="#" class="for-pass">Forgot Password?</a>--}}
        </form>
    </div>
</div>

<!--======== SCRIPT FILES =========-->
{{--<script src="{{asset('admin/js/jquery.min.js')}}"></script>--}}
{{--<script src="admin/js/bootstrap.min.js"></script>--}}
{{--<script src="admin/js/materialize.min.js"></script>--}}
{{--<script src="admin/js/custom.js"></script>--}}
</body>

</html>
