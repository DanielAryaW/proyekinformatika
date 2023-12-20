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
                                    <th class="datatable-nosort">Status</th>
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
                                        <td>
                                            <button type="button" class="btn btn-primary" data-toggle="modal"
                                                data-target="#statusModal{{ $dt->id }}">
                                                Change Status
                                            </button>
                                            <!-- Modal -->
                                            <div class="modal fade" id="statusModal{{ $dt->id }}" tabindex="-1"
                                                role="dialog" aria-labelledby="statusModalLabel{{ $dt->id }}"
                                                aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title"
                                                                id="statusModalLabel{{ $dt->id }}">Change Status
                                                            </h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <!-- Radio buttons for status selection -->
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="radio"
                                                                    name="status{{ $dt->id }}"
                                                                    id="pending{{ $dt->id }}" value="pending"
                                                                    {{ $dt->status == 'pending' ? 'checked' : '' }}>
                                                                <label class="form-check-label"
                                                                    for="pending{{ $dt->id }}">Pending</label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="radio"
                                                                    name="status{{ $dt->id }}"
                                                                    id="proses{{ $dt->id }}" value="proses"
                                                                    {{ $dt->status == 'proses' ? 'checked' : '' }}>
                                                                <label class="form-check-label"
                                                                    for="proses{{ $dt->id }}">Proses</label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="radio"
                                                                    name="status{{ $dt->id }}"
                                                                    id="selesai{{ $dt->id }}" value="selesai"
                                                                    {{ $dt->status == 'selesai' ? 'checked' : '' }}>
                                                                <label class="form-check-label"
                                                                    for="selesai{{ $dt->id }}">Selesai</label>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <!-- Submit button and close button -->
                                                            <button type="button" class="btn btn-primary"
                                                                onclick="updateStatus({{ $dt->id }})">Update</button>

                                                            <button type="button" class="btn btn-secondary"
                                                                data-dismiss="modal">Close</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
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

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

    <script>
        function updateStatus(id) {
            $.ajax({
                url: "{{ route('admin.manajemenPesan', ['id' => ':id']) }}".replace(':id', id),
                method: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    status: $("input[name='status" + id + "']:checked").val()
                },
                success: function(response) {
                    console.log(response);
                    $('#statusModal' + id).modal('hide');
                },
                error: function(error) {
                    console.error(error);
                }
            });
        }
    </script>

@endsection




{{-- @extends('back.layout-admin.manajemenPesan-layout')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Manajemen Pesan')
@section('content')
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
                                    <th class="table-plus datatable-nosort">Foto Desain</th>
                                    <th class="table-plus datatable">Jumlah</th>
                                    <th>Deskripsi</th>
                                    <th class="table-plus datatable-nosort">Bukti Pembayaran </th>
                                    <th class="table-plus datatable">Created at</th>
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
                                            <img src="{{ asset('upload_folder/' . $dt->foto_desain) }}" alt="Foto Desain"
                                                width="70">
                                        </td>
                                        <td class="table-plus">{{ $dt->jumlah }}</td>
                                        <td>{{ $dt->deskripsi }}</td>
                                        <td>
                                            <img src="{{ asset('upload_folder/' . $dt->foto_desain) }}" alt="Foto Desain"
                                                width="70">
                                        </td>
                                        <td class="table-plus">{{ $dt->created_at }}</td>
                                        <td>
                                            <button type="button" class="btn btn-primary" data-toggle="modal"
                                                data-target="#statusModal">
                                                Change Status
                                            </button>
                                            <!-- Modal -->
                                            <div class="modal fade" id="statusModal" tabindex="-1" role="dialog"
                                                aria-labelledby="statusModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="statusModalLabel">Change Status</h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <!-- Radio buttons for status selection -->
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="radio"
                                                                    name="status" id="proses" value="proses">
                                                                <label class="form-check-label" for="proses">
                                                                    Proses
                                                                </label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="radio"
                                                                    name="status" id="belum_bayar" value="belum_bayar">
                                                                <label class="form-check-label" for="belum_bayar">
                                                                    Belum Bayar
                                                                </label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="radio"
                                                                    name="status" id="selesai" value="selesai">
                                                                <label class="form-check-label" for="selesai">
                                                                    Selesai
                                                                </label>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <!-- Submit button and close button -->
                                                            <button type="button" class="btn btn-primary">Submit</button>
                                                            <button type="button" class="btn btn-secondary"
                                                                data-dismiss="modal">Close</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        @endsection --}}



{{-- @extends('back.layout-admin.manajemenPesan-layout')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Manajemen Pesan')
@section('content')
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
                                    <th class="table-plus datatable-nosort">Foto Desain</th>
                                    <th class="table-plus datatable">Jumlah</th>
                                    <th>Deskripsi</th>
                                    <th class="table-plus datatable-nosort">Bukti Pembayaran </th>
                                    <th class="table-plus datatable">Created at</th>
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
                                            <img src="{{ asset('upload_folder/' . $dt->foto_desain) }}" alt="Foto Desain"
                                                width="70">
                                        </td>
                                        <td class="table-plus">{{ $dt->jumlah }}</td>
                                        <td>{{ $dt->deskripsi }}</td>
                                        <td>
                                            <img src="{{ asset('upload_folder/' . $dt->foto_desain) }}" alt="Foto Desain"
                                                width="70">
                                        </td>
                                        <td class="table-plus">{{ $dt->created_at }}</td>
                                        <td>
                                            <button type="button" class="btn btn-primary" data-toggle="modal"
                                                data-target="#statusModal">
                                                Change Status
                                            </button>
                                            <!-- Modal -->
                                            <div class="modal fade" id="statusModal" tabindex="-1" role="dialog"
                                                aria-labelledby="statusModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="statusModalLabel">Change Status</h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <!-- Radio buttons for status selection -->
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="radio"
                                                                    name="status" id="proses" value="proses">
                                                                <label class="form-check-label" for="proses">
                                                                    Proses
                                                                </label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="radio"
                                                                    name="status" id="belum_bayar" value="belum_bayar">
                                                                <label class="form-check-label" for="belum_bayar">
                                                                    Belum Bayar
                                                                </label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="radio"
                                                                    name="status" id="selesai" value="selesai">
                                                                <label class="form-check-label" for="selesai">
                                                                    Selesai
                                                                </label>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <!-- Submit button and close button -->
                                                            <button type="button" class="btn btn-primary">Submit</button>
                                                            <button type="button" class="btn btn-secondary"
                                                                data-dismiss="modal">Close</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        @endsection --}}
