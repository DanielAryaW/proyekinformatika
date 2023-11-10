@extends('back.layout-pemilik.auth-layout')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Pemilik Login')
@section('content')
    <div class="login-box bg-white box-shadow border-radius-10">
        <div class="login-title">
            <h2 class="text-center text-primary">Pemilik Login</h2>
        </div>
        <form action="{{ route('pemilik.login_handler') }}" method="POST">
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

            @error('login_id')
                <div class="d-block text-danger" stlye="margin-top: -25px;margin-button: 15px;">
                    {{ $message }}
                </div>
            @enderror
            <div class="input-group custom">
                <input type="text" class="form-control form-control-lg" placeholder="Email" name="login_id"
                    value="{{ old('login_id') }}">
                <div class="input-group-append custom">
                    <span class="input-group-text"><i class="icon-copy dw dw-user1"></i></span>
                </div>
            </div>

            @error('password')
                <div class="d-block text-danger" stlye="margin-top: -25px;margin-button: 15px;">
                    {{ $message }}
                </div>
            @enderror
            <div class="input-group custom">
                <input type="password" class="form-control form-control-lg" placeholder="Password" name="password">
                <div class="input-group-append custom">
                    <span class="input-group-text"><i class="dw dw-padlock1"></i></span>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="input-group mb-0">
                        <input class="btn btn-primary btn-lg btn-block" type="submit" value="Sign In">
                        {{-- <a class="btn btn-primary btn-lg btn-block" href="index.html">Sign In</a> --}}
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
