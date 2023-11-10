<!-- resources/views/back/pages/client/auth/login.blade.php -->

@extends('back.layout-client.auth-layout')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Customer Login')
@section('content')
    <div class="login-box bg-white box-shadow border-radius-10">
        <div class="login-title">
            <h2 class="text-center text-primary">Customer Login</h2>
        </div>
        <form action="{{ route('client.check') }}" method="POST">
            @csrf
            @if (Session::get('fail'))
                <div class="alert alert-danger">
                    {{ Session::get('fail') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif

            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif

            <!-- Add forget password link -->
            <div class="text-right mb-3">
                <a href="{{ route('client.forget-password') }}">Forget Password?</a>
            </div>

            @error('login_id')
                <div class="d-block text-danger" style="margin-top: -25px; margin-bottom: 15px;">
                    {{ $message }}
                </div>
            @enderror
            <div class="input-group custom">
                <input type="text" class="form-control form-control-lg" placeholder="Email" name="email"
                    value="{{ old('email') }}">
                <div class="input-group-append custom">
                    <span class="input-group-text"><i class="icon-copy dw dw-user1"></i></span>
                </div>
            </div>

            @error('password')
                <div class="d-block text-danger" style="margin-top: -25px; margin-bottom: 15px;">
                    {{ $message }}
                </div>
            @enderror
            <div class="input-group custom">
                <input type="password" class="form-control form-control-lg" placeholder="Password" name="password"
                    value="{{ old('password') }}">
                <div class="input-group-append custom">
                    <span class="input-group-text"><i class="dw dw-padlock1"></i></span>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="input-group mb-0">
                        <input class="btn btn-primary btn-lg btn-block" type="submit" value="Sign In">
                    </div>
                    <a class="btn btn-link btn-block" href="{{ route('client.register') }}">Register</a>
                </div>
            </div>
        </form>
    </div>
@endsection
