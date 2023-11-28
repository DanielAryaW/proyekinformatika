@extends('back.layout-admin.paketJasa-layout')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Paket Jasa')
@section('content')
    @if (Session::has('success'))
        <div class="alert alert-success">
            {{ Session::get('success') }}
        </div>
    @endif
    <div class="row">
        <div class="col-md-12">
            <h4>{{ $title }}</h4>
            <div class="box box-warning">
                <div class="box-header">
                    <br>
                    <p>
                        <a href="{{ Route('admin.add') }}" class="btn btn-sm btn-flat btn-primary"><i class="fa fa-plus"></i>
                            Tambah Data</a>
                    </p>
                </div>
                <div class="card-box mb-30">
                    <div class="pb-20">
                        <table class="data-table table stripe hover nowrap">
                            <thead>
                                <tr>
                                    <th class="table-plus datatable">Nama</th>
                                    <th>Harga</th>
                                    <th class="table-plus datatable-nosort">Deskripsi</th>
                                    <th class="table-plus datatable-nosort">Foto</th>
                                    <th class="table-plus datatable">Created at</th>
                                    <th class="table-plus datatable">Update at</th>
                                    <th class="datatable-nosort">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $dt)
                                    <tr>
                                        <td class="table-plus">{{ $dt->nama_jasa }}</td>
                                        <td>{{ $dt->harga_jasa }}</td>
                                        <td>{{ $dt->deskripsi }}</td>
                                        <td>
                                            <img src="{{ asset('upload_folder/' . $dt->foto_desain) }}" alt="Foto Desain"
                                                width="70">
                                        </td>
                                        <td>{{ $dt->created_at }}</td>
                                        <td>{{ $dt->updated_at }}</td>
                                        <td>

                                            <div>
                                                <a href="{{ route('admin.edit', ['id' => $dt->id]) }}"
                                                    class="btn btn-warning btn-xs btn-edit" id="edit">
                                                    <i class="fa fa-pencil-square-o"></i>
                                                </a>
                                                <form action="{{ route('admin.delete', ['id' => $dt->id]) }}"
                                                    method="post" style="display:inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" onclik="return confirm('Are you Sure ?')"
                                                        class="btn btn-danger btn-xs btn-hapus" id="delete">
                                                        <i class="fa fa-trash-o"></i>
                                                    </button>
                                                </form>

                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        @endsection
