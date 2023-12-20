<!-- resources/views/back/layout-client/transaksi-layout.blade.php -->

@extends('back.layout-client.transaksi-layout')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Transaksi')
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
                        <th>No Pesanan</th>
                        <th>Nama Jasa</th>
                        <th>Tanggal</th>
                        <th>Total</th>
                        <th>Status Pemesanan</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pesanan as $dt)
                        @if (Auth::id() == $dt->client->id)
                            <tr class="status-{{ strtolower($dt->status) }}">
                                <td class="table-plus">{{ $dt->no_pesanan }}</td>
                                <td>{{ $dt->jasa->nama_jasa }}</td>
                                <td>{{ $dt->created_at }}</td>
                                <td>Rp.{{ number_format($dt->harga_total, 2) }}</td>
                                <td>{{ $dt->status }}</td>
                            </tr>
                        @endif
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
