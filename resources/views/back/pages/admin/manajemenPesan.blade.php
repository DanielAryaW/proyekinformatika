@extends('back.layout-admin.manajemenPesan-layout')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Manajemen Pesan')
@section('content')
    <style>
        .red-text {
            color: red;
        }
    </style>
    <div class="row">
        <div class="col-md-12">
            <h4>{{ $title }}</h4>
            <div class="box box-warning">
                <div class="box-header">
                    <br>
                </div>
                <div class="card-box mb-30">
                    <div class="pb-20">
                        <table class="data-table table stripe hover nowrap">
                            <thead>
                                <tr>
                                    <th class="datatable-nosort">No Pesanan</th>
                                    <th class="table-plus datatable-nosort">Nama Jasa</th>
                                    <th class="table-plus datatable-nosort">Harga</th>
                                    <th class="table-plus datatable-nosort">Nama Pemesan</th>
                                    <th class="table-plus datatable-nosort">Harga total</th>
                                    <th class="table-plus datatable-nosort">Bukti Pembayaran</th>
                                    <th class="table-plus datatable">Jumlah</th>
                                    <th>Deskripsi</th>
                                    <th class="table-plus datatable-nosort">Foto</th>
                                    <th class="table-plus datatable">Tanggal Pesan</th>
                                    <th class="datatable-nosort">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pesanan as $dt)
                                    <tr>
                                        <td class="table-plus">{{ $dt->no_pesanan }}</td>
                                        <td class="table-plus">{{ optional($dt->jasa)->nama_jasa }}</td>
                                        <td class="table-plus">{{ number_format($dt->jasa->harga_jasa, 0, ',', '.') }}</td>
                                        <td class="table-plus">{{ optional($dt->client)->name }}</td>
                                        <td class="table-plus">{{ number_format($dt->harga_total, 0, ',', '.') }}</td>
                                        <td>
                                            @if ($dt->bukti_pembayaran)
                                                <img src="{{ asset('bukti_pembayaran/' . $dt->bukti_pembayaran) }}"
                                                    alt="Bukti Pembayaran" width="70">
                                            @else
                                                <span style="color: red;">Belum ada bukti pembayaran</span>
                                            @endif
                                        </td>
                                        <td class="table-plus">{{ $dt->jumlah }}</td>
                                        <td>{{ $dt->deskripsi }}</td>
                                        <td>
                                            <img src="{{ asset('upload_folder/' . $dt->foto_desain) }}" alt="Foto Desain"
                                                width="70">
                                        </td>
                                        <td class="table-plus">{{ $dt->created_at }}</td>
                                        <td>
                                            <div class="dropdown">
                                                <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle"
                                                    href="#" role="button" data-toggle="dropdown">
                                                    <i class="dw dw-more"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                                                    <a class="dropdown-item" href="#"><i class="dw dw-edit2"></i>
                                                        Pending</a>
                                                    <a class="dropdown-item" href="#"><i class="dw dw-delete-3"></i>
                                                        Proses</a>
                                                    <a class="dropdown-item" href="#"> <i class="dw dw-money"></i>
                                                        Selesai</a>
                                                </div>
                                            </div>
                                        </td>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        @endsection
