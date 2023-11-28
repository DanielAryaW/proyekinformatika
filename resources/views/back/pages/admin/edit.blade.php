@extends('back.layout-admin.paketJasa-layout')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Edit Paket Jasa')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <h4>{{ $title }}</h4>
            <div class="box box-warning">
                <div class="box-header">
                    <p></p>
                </div>
                <div class="box-body">
                    <form action="{{ route('admin.add') }}" method="POST" enctype="multipart/form-data">
                        @if (Session::has('success'))
                            <div class="alert alert-success">
                                {{ Session::get('success') }}
                            </div>
                        @endif
                        @csrf
                        <div class="box-body">

                            <div class="form-group">
                                <label for="namaJasa">Nama</label>
                                <input type="text" name="nama" class="form-control" id="namaJasa"
                                    value="{{ $data->nama_jasa }}">
                            </div>

                            <div class="form-group">
                                <label for="hargaJasa">Harga Jasa</label>
                                <input type="number" name="harga" class="form-control" id="hargaJasa"
                                    value="{{ $data->harga_jasa }}">
                            </div>

                            <div class="form-group">
                                <label for="deskripsiJasa">Deskripsi</label>
                                <textarea name="deskripsi" class="form-control" id="deskripsiJasa" value="{{ $data->deskripsi }}"></textarea>
                            </div>

                            <div class="form-group">
                                <label for="foto_desain">Foto Desain</label>
                                <input type="file" name="foto_desain" class="form-control" id="foto_desain"
                                    value="{{ $data->foto_desain }}">
                            </div>

                        </div>
                        <!-- /.box-body -->

                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    <script type="text/javascript">
        function confirmDelete() {
            Swal.fire({
                title: "Are you sure?",
                text: "You will not be able to recover this imaginary file!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Yes, delete it!",
                closeOnConfirm: false
            }).then(function(result) {
                if (result.isConfirmed) {
                    // Perform the delete action here
                    Swal.fire("Deleted!", "Your imaginary file has been deleted.", "success");
                }
            });
        }
    @endsection
