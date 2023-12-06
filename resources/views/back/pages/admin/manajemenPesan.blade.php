@extends('back.layout-admin.manajemenPesan-layout')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Manajemen Pesan')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <h4>{{ $title }}</h4>
            <br>
            <div class="card-box mb-30">
                <div class="pb-20">
                    <table class="data-table table stripe hover nowrap">
                        <thead>
                            <tr>
                                <th>Id Pesanan</th>
                                <th class="table-plus datatable-nosort">Nama Pemesan</th>
                                <th>Nama Jasa</th>
                                <th>Deskripsi</th>
                                <th>Foto Desain</th>
                                <th>Created at</th>
                                <th>Bukti Bayar</th>
                                <th class="datatable-nosort">Status Pemesanan</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $dt)
                                <tr>
                                    <td class="table-plus">{{ $dt->no_pesanan }}</td>
                                    <td>{{ $dt->nama_jasa }}</td>
                                    <td>{{ $dt->nama_pemesan }}</td>
                                    <td>{{ $dt->hargaJasa }}</td>
                                    <td>{{ $dt->jumlah }}</td>
                                    <td>{{ $dt->hargaTotal }}</td>
                                    <td>{{ $dt->deskripsi }}</td>
                                    <td>
                                        <img src="{{ asset('storage/' . $dt->fotoDesain) }}" alt="Foto Desain"
                                            style="max-width: 100px;">
                                    </td>
                                    <td>{{ $dt->created_at }}</td>
                                    <td>
                                        <div class="dropdown">
                                            <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle"
                                                href="#" role="button" data-toggle="dropdown">
                                                <i class="dw dw-more"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                                                <a class="dropdown-item" href="#"><i class="dw dw-edit2"></i>
                                                    Edit</a>
                                                <a class="dropdown-item" href="#"><i class="dw dw-delete-3"></i>
                                                    Delete</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        @endsection
