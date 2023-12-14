@extends('back.layout-client.transaksi-layout')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Transaksi')
@section('content')
    <div class="min-height-100px">
        <div class="page-header">
            <div class="row">
                <div class="col-md-6 col-sm-12">
                    <div class="title">
                        <h4>Transaksi Pesanan</h4>
                    </div>
                    <nav aria-label="breadcrumb" role="navigation">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="http://127.0.0.1:8000/client/transaksi">Transaksi</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">
                                Transaksi Pesanan
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <!-- Export Datatable start -->
    <div class="card-box mb-30">
        <div class="pd-20">
            <h4 class="text-blue h4">Data Pemesanan</h4>
        </div>
        <div class="pb-20">
            <table class="table hover multiple-select-row data-table-export nowrap">
                <thead>
                    <tr>
                        <th>No Pesanan</th>
                        <th>Nama Jasa</th>
                        <th>Tanggal</th>
                        <th>Total</th>
                        <th>Status Pemesanan</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="table-plus">12345</td>
                        <td>Cetak Banner</td>
                        <td>29-03-2018</td>
                        <td>Rp.100.000</td>
                        <td>Selesai</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    </div>
@endsection
