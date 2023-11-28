@extends('back.layout-client.pesan-layout')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Pesanan Jasa')
@section('content')

    <div class="min-height-200px">
        <div class="page-header">
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <div class="title">
                        <h4>Pesanan</h4>
                    </div>
                    <nav aria-label="breadcrumb" role="navigation">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{ route('client.pesan') }}">Pesanan</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">
                                Pesan
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>

        <div class="row">
            <table class="data-table table stripe hover nowrap">
                <thead>
                    <tr>
                        <th class="table-plus datatable-nosort">No Pesanan</th>
                        <th class="table-plus datatable-nosort">No Transaksi</th>
                        <th>Nama Jasa</th>
                        <th>Harga</th>
                        <th>Jumlah</th>
                        <th>Deskripsi</th>
                        <th>Foto Desain</th>
                        <th>Created at</th>
                        <th class="datatable-nosort">Action</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
    </div>
@endsection
