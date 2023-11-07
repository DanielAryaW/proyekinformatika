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
                        <th>No Transaksi</th>
                        <th>Nama Jasa</th>
                        <th>Tanggal</th>
                        <th>Total</th>
                        <th>Metode</th>
                        <th>Status Pemesanan</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="table-plus">12345</td>
                        <td>54321</td>
                        <td>Cetak Banner</td>
                        <td>29-03-2018</td>
                        <td>Rp.100.000</td>
                        <td>Bayar Ditempat</td>
                        <td>Selesai</td>
                    </tr>
                    <tr>
                        <td class="table-plus">83738</td>
                        <td>12324</td>
                        <td>Cetak Poster</td>
                        <td>29-03-2020</td>
                        <td>Rp.500.000</td>
                        <td>Bayar Ditempat</td>
                        <td>Pending</td>
                    </tr>
                    <tr>
                        <td class="table-plus">03234</td>
                        <td>91023</td>
                        <td>Cetak Sticker</td>
                        <td>21-03-2019</td>
                        <td>Rp.100.000</td>
                        <td>BCA</td>
                        <td>Proses</td>
                    </tr>
                    <tr>
                        <td class="table-plus">43422</td>
                        <td>12413</td>
                        <td>Cetak Undangan Pernikahan</td>
                        <td>15-07-2021</td>
                        <td>Rp.1.000.000</td>
                        <td>BCA</td>
                        <td>Selesai</td>
                    </tr>
                    <tr>
                        <td class="table-plus">43151</td>
                        <td>81034</td>
                        <td>Cetak Poster</td>
                        <td>29-03-2019</td>
                        <td>Rp.500.000</td>
                        <td>Bayar Ditempat</td>
                        <td>Batal</td>
                    </tr>
                    <tr>
                        <td class="table-plus">52323</td>
                        <td>09124</td>
                        <td>Cetak Amplop</td>
                        <td>29-03-2018</td>
                        <td>Rp.300.000</td>
                        <td>BCA</td>
                        <td>Selesai</td>
                    </tr>
                    <tr>
                        <td class="table-plus">32523</td>
                        <td>15354</td>
                        <td>Cetak Kartu Nama</td>
                        <td>17-03-2020</td>
                        <td>Rp.600.000</td>
                        <td>Bayar Ditempat</td>
                        <td>Selesai</td>
                    </tr>
                    <tr>
                        <td class="table-plus">12345</td>
                        <td>54321</td>
                        <td>Cetak Banner</td>
                        <td>29-03-2018</td>
                        <td>Rp.100.000</td>
                        <td>Bayar Ditempat</td>
                        <td>Selesai</td>
                    </tr>
                    <tr>
                        <td class="table-plus">12345</td>
                        <td>54321</td>
                        <td>Cetak Banner</td>
                        <td>29-03-2018</td>
                        <td>Rp.100.000</td>
                        <td>Bayar Ditempat</td>
                        <td>Selesai</td>
                    </tr>
                    <tr>
                        <td class="table-plus">12345</td>
                        <td>54321</td>
                        <td>Cetak Banner</td>
                        <td>29-03-2018</td>
                        <td>Rp.100.000</td>
                        <td>Bayar Ditempat</td>
                        <td>Selesai</td>
                    </tr>
                    <tr>
                        <td class="table-plus">12345</td>
                        <td>54321</td>
                        <td>Cetak Banner</td>
                        <td>29-03-2018</td>
                        <td>Rp.100.000</td>
                        <td>Bayar Ditempat</td>
                        <td>Selesai</td>
                    </tr>
                    <tr>
                        <td class="table-plus">12345</td>
                        <td>54321</td>
                        <td>Cetak Banner</td>
                        <td>29-03-2018</td>
                        <td>Rp.100.000</td>
                        <td>Bayar Ditempat</td>
                        <td>Selesai</td>
                    </tr>
                    <tr>
                        <td class="table-plus">12345</td>
                        <td>54321</td>
                        <td>Cetak Banner</td>
                        <td>29-03-2018</td>
                        <td>Rp.100.000</td>
                        <td>Bayar Ditempat</td>
                        <td>Selesai</td>
                    </tr>

                </tbody>
            </table>
        </div>
    </div>
    </div>
@endsection
