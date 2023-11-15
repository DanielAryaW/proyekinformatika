@extends('back.layout-admin.paketJasa-layout')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Edit Paket Jasa')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <h4>{{ $title }}</h4>
            <div class="box box-warning">
                <div class="box-body">
                    <form action="{{ route('admin.update', $data->id) }}" method="post">
                        @csrf
                        @method('PUT')
                        <!-- Your form fields for editing -->
                        <button type="submit" class="btn btn-sm btn-flat btn-primary">Update Data</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
