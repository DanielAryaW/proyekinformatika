@extends('back.layout-admin.paketJasa-layout')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Tambah Paket Jasa')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <h4>{{ $title }}</h4>
            <div class="box box-warning">
                <div class="box-header">
                    <p></p>
                </div>
                <div class="box-body">
                    <form id="addForm" action="{{ route('admin.add') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="box-body">
                            <div class="form-group">
                                <label for="namaJasa">Nama</label>
                                <input type="text" name="nama" class="form-control" id="namaJasa"
                                    placeholder="Nama Jasa">
                            </div>

                            <div class="form-group">
                                <label for="hargaJasa">Harga Jasa</label>
                                <input type="number" name="harga" class="form-control" id="hargaJasa"
                                    placeholder="Harga">
                            </div>

                            <div class="form-group">
                                <label for="deskripsiJasa">Deskripsi</label>
                                <textarea name="deskripsi" class="form-control" id="deskripsiJasa" placeholder="Deskripsi Jasa"></textarea>
                            </div>

                            <div class="form-group">
                                <label for="foto_desain">Foto Desain</label>
                                <input type="file" name="foto_desain" class="form-control" id="foto_desain">
                            </div>
                        </div>
                        <!-- /.box-body -->

                        <div class="box-footer">
                            <button type="button" class="btn btn-primary" id="submitButton"
                                onclick="confirmSubmit()">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Script SweetAlert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    <script type="text/javascript">
        // Fungsi untuk menampilkan SweetAlert saat formulir disubmit
        function confirmSubmit() {
            Swal.fire({
                title: "Do you want to submit?",
                showDenyButton: true,
                showCancelButton: true,
                confirmButtonText: "Submit",
                denyButtonText: "Don't submit"
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire("Saved!", "", "success");
                    // Jika dikonfirmasi, kirim formulir
                    document.getElementById('addForm').submit();
                } else if (result.isDenied) {
                    Swal.fire("Changes are not saved", "", "info");
                }
            });
        }
    </script>
@endsection
