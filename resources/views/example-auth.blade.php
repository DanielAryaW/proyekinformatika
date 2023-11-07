@extends('back.layout-admin.auth-layout')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Page title here')
@section('content')
    <div class="login-box bg-white box-shadow border-radius-10">
        <div class="login-title">
            <h2 class="text-center text-primary">Choose Your Role</h2>
        </div>
        <div class="text-center">
            <a class="btn btn-primary" href="{{ route('admin.login') }}">Admin</a>
            <a class="btn btn-primary" href="{{ route('client.login') }}">Customer</a>
            <a class="btn btn-primary" href="{{ route('pemilik.login') }}">Pemilik</a>
        </div>
    </div>
@endsection
