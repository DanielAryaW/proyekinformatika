@extends('back.layout-login.auth-layout')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Login Role')
@section('content')
    <div class="login-box bg-white box-shadow border-radius-10">
        <div class="login-title">
            <h2 class="text-center text-primary">Anda akan masuk sebagai</h2>
        </div>
        <div class="text-center">
            <a class="btn btn-primary" href="{{ route('admin.login') }}">Admin</a>
            <a class="btn btn-primary" href="{{ route('client.login') }}">Customer</a>
            <a class="btn btn-primary" href="{{ route('pemilik.login') }}">Pemilik</a>
        </div>
    </div>
@endsection
