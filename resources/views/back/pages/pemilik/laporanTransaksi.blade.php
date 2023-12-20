{{-- @extends('back.layout-pemilik.laporanTransaksi-layout')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Laporan Transaksi')
@section('content')

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Laporan Transaksi Penjualan Jasa Cetak</title>
        <!-- CSS only -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-KyZXEAg3QhqLMpG8r+Knujsl5/5vR62n4gBj1EeXsI3bXZK0JgWuLjOxnM+Z9UjP79bZN0DWvKbqTUHxbNt"
            crossorigin="anonymous">
    </head>

    <body>
        <div class="container">
            <h2 class="text-center mt-4">Laporan Transaksi Penjualan Jasa Cetak</h2>
            <table class="table table-striped mt-4">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>ID Transaksi</th>
                        <th>Nama Pelanggan</th>
                        <th>Nama Jasa</th>
                        <th>Jumlah</th>
                        <th>Total Harga</th>
                        <th>Tanggal Transaksi</th>
                        <th>Status Pembayaran</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        @foreach ($pesanan as $dt)
                    <tr>

                        <td class="table-plus">{{ $dt->id }}</td>
                        <td class="table-plus">{{ $dt->no_pesanan }}</td>
                        <td class="table-plus">{{ optional($dt->jasa)->nama_jasa }}</td>
                        <td class="table-plus">Rp. {{ number_format($dt->jasa->harga_jasa, 0, ',', '.') }}
                        </td>
                        <td class="table-plus">{{ optional($dt->client)->name }}</td>
                        <td class="table-plus">Rp. {{ number_format($dt->harga_total, 0, ',', '.') }}</td>
                        <td>
                            @if ($dt->bukti_pembayaran)
                                <img src="{{ asset('bukti_pembayaran/' . $dt->bukti_pembayaran) }}" alt="Bukti Pembayaran"
                                    width="70">
                            @else
                                <span style="color: red;">Belum ada bukti pembayaran</span>
                            @endif
                        </td>
                        <td class="table-plus">{{ $dt->jumlah }}</td>
                        <td>{{ $dt->deskripsi }}</td>
                        <td>
                            <img src="{{ asset('upload_folder/' . $dt->foto_desain) }}" alt="Foto Desain" width="70">
                        </td>
                        <td class="table-plus">{{ $dt->created_at }}</td>
                        <td class="table-plus status-{{ strtolower($dt->status) }}">
                            <!-- Formulir untuk mengubah status -->
                            <form action="{{ route('admin.updateStatus', ['id' => $dt->id]) }}" method="post"
                                class="status-form">
                                @csrf
                                @method('patch')

                                <select name="status"
                                    class="form-control status-select status-select-{{ strtolower($dt->status) }}">
                                    <option value="Pending" {{ $dt->status == 'Pending' ? 'selected' : '' }}>
                                        Pending</option>
                                    <option value="Proses" {{ $dt->status == 'Proses' ? 'selected' : '' }}>
                                        Proses</option>
                                    <option value="Selesai" {{ $dt->status == 'Selesai' ? 'selected' : '' }}>
                                        Selesai</option>
                                </select>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>JC002</td>
                        <td>Ahmad</td>
                        <td>Amplop</td>
                        <td>500</td>
                        <td>Rp. 250.000</td>
                        <td>17-05-2023</td>
                        <td>Lunas</td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>JC003</td>
                        <td>Suciman</td>
                        <td>Mug Custom</td>
                        <td>35</td>
                        <td>Rp. 150.000</td>
                        <td>08-09-2023</td>
                        <td>Cancel</td>
                    </tr>
                    <!-- Tambahkan data transaksi lainnya di sini -->
                </tbody>
            </table>
        </div>

        <!-- JavaScript Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-Rr8o3KW8EjTvPx15gEKC5m3uHJNWfGmMkFuHKTfMzDlcTvPXgJg12TZtRpz1h0DjDmhLxIxLyDwWrFg/dG0n0rP/eUJ"
            crossorigin="anonymous"></script>
    </body>

    </html>
@endsection --}}


<!-- resources/views/back/layout-client/transaksi-layout.blade.php -->

@extends('back.layout-pemilik.laporanTransaksi-layout')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Laporan Transaksi')
@section('content')

    <style>
        .status-pending {
            background-color: #FFA07A;
            /* Light Salmon */
        }

        .status-proses {
            background-color: #ADD8E6;
            /* Light Blue */
        }

        .status-selesai {
            background-color: #90EE90;
            /* Light Green */
        }
    </style>

    <div class="min-height-100px">
        <!-- ... (kode sebelumnya) ... -->
    </div>

    <!-- Export Datatable start -->
    <div class="card-box mb-30">
        <div class="pd-20">
            <h4 class="text-blue h4">{{ $title }}</h4>
        </div>
        <div class="pb-20">
            <table class="table hover multiple-select-row data-table-export nowrap">
                <thead>
                    <tr>
                        <th>No. </th>
                        <th>No Pesanan</th>
                        <th>Nama Jasa</th>
                        <th>Nama Pemesan</th>
                        <th>Tanggal</th>
                        <th>Total</th>
                        <th>Status Pemesanan</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $totalPendapatan = 0;
                    @endphp
                    @foreach ($pesanan as $dt)
                        @if (in_array(strtolower($dt->status), ['proses', 'selesai']))
                            <tr class="status-{{ strtolower($dt->status) }}">
                                <td class="table-plus">{{ $dt->id }}</td>
                                <td class="table-plus">{{ $dt->no_pesanan }}</td>
                                <td>{{ $dt->jasa->nama_jasa }}</td>
                                <td>{{ $dt->client->name }}</td>
                                <td>{{ $dt->created_at }}</td>
                                <td>Rp.{{ number_format($dt->harga_total, 2) }}</td>
                                <td>{{ $dt->status }}</td>
                            </tr>
                            @php
                                $totalPendapatan += $dt->harga_total;
                            @endphp
                        @endif
                    @endforeach
                </tbody>
            </table>
            <div class="text-right">
                <strong>Total Pendapatan: Rp.{{ number_format($totalPendapatan, 2) }}</strong>
            </div>
        </div>
    </div>
@endsection
