@extends('back.layout-admin.manajemenPesan-layout')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Manajemen Pesan')
@section('content')
    <style>
        .red-text {
            color: red;
        }

        /* Tambahkan gaya untuk warna status Pemesanan */
        .status-pending {
            color: orange;
        }

        .status-proses {
            color: blue;
        }

        .status-selesai {
            color: green;
        }

        /* Tambahkan gaya untuk warna dropdown yang diganti */
        .status-select-pending {
            background-color: #FFA07A;
            /* Light Salmon */
        }

        .status-select-proses {
            background-color: #ADD8E6;
            /* Light Blue */
        }

        .status-select-selesai {
            background-color: #90EE90;
            /* Light Green */
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
                                    <th class="datatable-nosort">Status Pemesanan</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pesanan as $dt)
                                    <tr>
                                        <td class="table-plus">{{ $dt->no_pesanan }}</td>
                                        <td class="table-plus">{{ optional($dt->jasa)->nama_jasa }}</td>
                                        <td class="table-plus">Rp. {{ number_format($dt->jasa->harga_jasa, 0, ',', '.') }}
                                        </td>
                                        <td class="table-plus">{{ optional($dt->client)->name }}</td>
                                        <td class="table-plus">Rp. {{ number_format($dt->harga_total, 0, ',', '.') }}</td>
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
                                        <td class="table-plus status-{{ strtolower($dt->status) }}">
                                            <!-- Formulir untuk mengubah status -->
                                            <form action="{{ route('admin.updateStatus', ['id' => $dt->id]) }}"
                                                method="post" class="status-form">
                                                @csrf
                                                @method('patch')

                                                <select name="status"
                                                    class="form-control status-select status-select-{{ strtolower($dt->status) }}">
                                                    <option value="Pending"
                                                        {{ $dt->status == 'Pending' ? 'selected' : '' }}>
                                                        Pending</option>
                                                    <option value="Proses" {{ $dt->status == 'Proses' ? 'selected' : '' }}>
                                                        Proses</option>
                                                    <option value="Selesai"
                                                        {{ $dt->status == 'Selesai' ? 'selected' : '' }}>
                                                        Selesai</option>
                                                </select>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Tambahkan script di bawah ini -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script>
        $(document).ready(function() {
            // Tanggapi perubahan pada dropdown
            $('.status-select').change(function() {
                $(this).closest('form').submit(); // Kirim formulir ketika dropdown berubah
            });
        });
    </script>
@endsection
