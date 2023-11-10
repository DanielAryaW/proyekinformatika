<!-- resources/views/back/pages/client/auth/forget-password.blade.php -->
@extends('back.layout-client.auth-layout')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Forget Password')

@section('content')
    <div class="login-box bg-white box-shadow border-radius-10">
        <div class="login-title">
            <h2 class="text-center text-primary">Forget Password</h2>
        </div>
        <form action="{{ route('client.login') }}" method="POST">
            @csrf
            @if (Session::get('status'))
                <div class="alert alert-success">
                    {{ Session::get('status') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif

            @if ($errors->has('email'))
                <div class="alert alert-danger">
                    {{ $errors->first('email') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif

            <div class="input-group custom">
                <input type="text" class="form-control form-control-lg" placeholder="Email" name="email"
                    value="{{ old('email') }}">
                <div class="input-group-append custom">
                    <span class="input-group-text"><i class="icon-copy dw dw-user1"></i></span>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-12">
                    <div class="input-group mb-0">
                        <input class="btn btn-primary btn-lg btn-block" type="submit" value="Reset Password">
                    </div>
                    <a class="btn btn-link btn-block" href="{{ route('client.login') }}">Back to Login</a>
                </div>
            </div>
        </form>
    </div>
@endsection
