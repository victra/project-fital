@extends('layouts.auth')

@section('htmlheader_title')
    Log in
@endsection

@section('content')
<body class="hold-transition login-page" style="background-color: white; background-repeat: no-repeat; background-size: cover; background-position: center; background-attachment: fixed; border-radius: 5px;position:relative">
    <div class="login-box">
        <div class="login-logo">
            <a href="{{ url('/login') }}"><b>SIAbsensi</b></a>
        </div><!-- /.login-logo -->

    <!-- @if (count($errors) > 0)
        <div class="alert alert-danger">
            <strong>Whoops!</strong> {{ trans('adminlte_lang::message.someproblems') }}<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif -->

    @if (count($errors) > 0)
        <div id="errorsMessage" class="alert alert-danger">
            <ul><center>
                @foreach ($errors->all() as $error)
                    {{ $error }}
                @endforeach
            </center></ul>
        </div>
    @endif

    <div class="login-box-body">
    <p class="login-box-msg"><b> Silahkan login terlebih dahulu. </b></p>
    <form id="formLogin" action="{{ url('/login') }}" method="post">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <!-- <label>Username</label> -->
        <div class="form-group has-feedback">
            <input type="text" autofocus="autofocus" class="form-control" placeholder="Masukan username" value="{{ old('email') }}" name="email"/>
            <span class="glyphicon glyphicon-user form-control-feedback"></span>
        </div>
        <!-- <label>Password</label> -->
        <div class="form-group has-feedback">
            <input type="password" class="form-control" placeholder="Masukan password" name="password"/>
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        </div>
        <div class="row">
            <div class="col-xs-8">
                <div class="checkbox icheck">
                    <label>
                        <input type="checkbox" name="remember"> {{ trans('adminlte_lang::message.remember') }}
                    </label>
                </div>
            </div><!-- /.col -->
            <div class="col-xs-4">
                <button type="submit" class="btn btn-primary btn-block"><i class="fa fa-sign-in"></i>     Log In</button>
            </div><!-- /.col -->
        </div>
    </form>

    {{-- @include('auth.partials.social_login') --}}

    <!--a href="{{ url('/password/reset') }}">{{ trans('adminlte_lang::message.forgotpassword') }}</a><br>
    <a href="{{ url('/register') }}" class="text-center">{{ trans('adminlte_lang::message.registermember') }}</a-->

</div><!-- /.login-box-body -->

</div><!-- /.login-box -->

    @include('layouts.partials.scripts_auth')

    <script>
        $(function () {
            $('input').iCheck({
                checkboxClass: 'icheckbox_square-blue',
                radioClass: 'iradio_square-blue',
                increaseArea: '20%' // optional
            });
        });
    </script>
</body>

@endsection
