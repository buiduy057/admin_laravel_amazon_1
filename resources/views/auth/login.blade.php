@extends('layouts.app')
@section('head')
    <meta
      content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no"
      name="viewport"
    />
    <link rel="stylesheet" href="admin/bootstrap/css/bootstrap.min.css" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css"
    />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css"
    />
    <link rel="stylesheet" href="admin/dist/css/AdminLTE.min.css" />
    <link rel="stylesheet" href="admin/plugins/iCheck/square/blue.css" />
@endsection
@section('content')
    <body class="hold-transition login-page">
        <div class="login-box">
            <div class="login-logo">
            <a href="admin/index2.html"><b>Admin</b>Atok</a>
            </div>
            <div class="login-box-body">
            <p class="login-box-msg">Sign in</p>
            <form action="{{ route('login') }}" method="POST">
                @csrf
                <div class="form-group has-feedback">
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                <span
                    class="glyphicon glyphicon-envelope form-control-feedback"
                ></span>
                </div>
                <div class="form-group has-feedback">
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                </div>
                <div class="row">
                
                <div class="col-xs-12">
                    <button type="submit" class="btn btn-primary btn-block btn-flat">
                    Sign In
                    </button>
                </div>
                </div>
            </form>
            </div>
        </div>
        @section('script')
        <script src="admin/plugins/jQuery/jQuery-2.2.0.min.js"></script>
            <script src="admin/bootstrap/js/bootstrap.min.js"></script>
            <script src="admin/plugins/iCheck/icheck.min.js"></script>
            <script>
            // $(function () {
            //     $("input").iCheck({
            //     checkboxClass: "icheckbox_square-blue",
            //     radioClass: "iradio_square-blue",
            //     increaseArea: "20%", // optional
            //     });
            // });
            </script>
        @endsection
    </body>
@endsection
