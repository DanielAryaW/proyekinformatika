@extends('back.layout-pemilik.laporanTransaksi-layout')
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
                        <td>1</td>
                        <td>JC001</td>
                        <td>Alice</td>
                        <td>Kartu Nama</td>
                        <td>100</td>
                        <td>Rp. 500.000</td>
                        <td>17-12-2023</td>
                        <td>DP 50%</td>
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
@endsection
