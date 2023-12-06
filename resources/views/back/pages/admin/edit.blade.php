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
                    <form id="updateForm" action="{{ route('admin.update', ['id' => $data->id]) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
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
                                <textarea name="deskripsi" class="form-control" id="deskripsiJasa">{{ $data->deskripsi }}</textarea>
                            </div>

                            <div class="form-group">
                                <label for="foto_desain">Foto Desain</label>
                                <input type="file" name="foto_desain" class="form-control" id="foto_desain">
                            </div>
                        </div>
                        <!-- /.box-body -->

                        <div class="box-footer">
                            <!-- Ganti type menjadi button -->
                            <button type="button" class="btn btn-primary" id="updateButton">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Script SweetAlert dan Update Formulir -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script type="text/javascript">
        // Fungsi untuk menampilkan SweetAlert saat tombol update diklik
        function confirmUpdate() {
            Swal.fire({
                title: "Do you want to save the changes?",
                showDenyButton: true,
                showCancelButton: true,
                confirmButtonText: "Save",
                denyButtonText: "Don't save"
            }).then((result) => {
                if (result.isConfirmed) {
                    // Jika dikonfirmasi, kirim formulir
                    document.getElementById('updateForm').submit();
                    Swal.fire("Saved!", "", "success");
                } else if (result.isDenied) {
                    // Jika tidak disimpan, tampilkan SweetAlert
                    Swal.fire("Changes are not saved", "", "info");
                }
            });
        }

        // Tangkap klik tombol update dan tampilkan SweetAlert
        document.getElementById('updateButton').addEventListener('click', function() {
            confirmUpdate();
        });

        // Tangkap respons JSON setelah operasi update berhasil
        function handleUpdateResponse(response) {
            if (response && response.success) {
                Swal.fire({
                    title: "Success!",
                    text: "Data berhasil diupdate",
                    icon: "success"
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Redirect langsung ke halaman view setelah SweetAlert
                        window.location.href =
                            "{{ route('admin.paketjasa') }}"; // Sesuaikan dengan path halaman view yang diinginkan
                    }
                });
            } else {
                // Tampilkan pesan kesalahan jika respons tidak sesuai
                Swal.fire({
                    title: "Error!",
                    text: response.message || "An error occurred while updating the record.",
                    icon: "error"
                });
            }
        }

        // Tangkap respons JSON setelah mengirimkan formulir
        document.getElementById('updateForm').addEventListener('submit', function(event) {
            event.preventDefault();
            const form = event.target;
            const formData = new FormData(form);

            fetch(form.action, {
                    method: 'PUT',
                    body: formData,
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    },
                })
                .then(response => response.json())
                .then(data => handleUpdateResponse(data))
                .catch(error => {
                    // Tangani kesalahan koneksi atau server
                    Swal.fire({
                        title: "Error!",
                        text: "An error occurred while updating the record.",
                        icon: "error"
                    });
                });
        });
    </script>
@endsection
