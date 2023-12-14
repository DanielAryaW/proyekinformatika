@extends('back.layout-client.pesan-layout')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Pesanan Jasa')
@section('content')
    <style>
        .action-buttons {
            display: flex;
            gap: 10px;
            /* Adjust the gap as needed */
        }

        .edit-button,
        .delete-button,
        .pay-button {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background-color: rgb(20, 20, 20);
            border: none;
            font-weight: 600;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.164);
            cursor: pointer;
            transition-duration: 0.3s;
            overflow: hidden;
            position: relative;
            color: white;
            /* Set the color to white */
        }

        .edit-svgIcon,
        .delete-svgIcon,
        .pay-svgIcon {
            width: 17px;
            transition-duration: 0.3s;
        }

        .edit-svgIcon path,
        .delete-svgIcon path,
        .pay-svgIcon path {
            fill: white;
        }

        .edit-button:hover,
        .delete-button:hover,
        .pay-button:hover {
            width: 120px;
            border-radius: 50px;
            transition-duration: 0.3s;
            background-color: rgb(255, 69, 69);
            align-items: center;
        }

        .edit-button:hover .edit-svgIcon,
        .delete-button:hover .delete-svgIcon,
        .pay-button:hover .pay-svgIcon {
            width: 20px;
            transition-duration: 0.3s;
            transform: translateY(60%);
            -webkit-transform: rotate(360deg);
            -moz-transform: rotate(360deg);
            -o-transform: rotate(360deg);
            -ms-transform: rotate(360deg);
            transform: rotate(360deg);
        }

        .pay-button::before {
            display: none;
            content: "Down Payment";
            color: white;
            transition-duration: 0.3s;
            font-size: 2px;
        }

        .pay-button:hover::before {
            display: block;
            padding-right: 10px;
            font-size: 13px;
            opacity: 1;
            transform: translateY(0px);
            transition-duration: 0.3s;
        }

        .edit-button::before {
            display: none;
            content: "Edit";
            color: white;
            transition-duration: 0.3s;
            font-size: 2px;
        }

        .edit-button:hover::before {
            display: block;
            padding-right: 10px;
            font-size: 13px;
            opacity: 1;
            transform: translateY(0px);
            transition-duration: 0.3s;
        }

        .delete-button::before {
            display: none;
            content: "Delete";
            color: white;
            transition-duration: 0.3s;
            font-size: 2px;
        }

        .delete-button:hover::before {
            display: block;
            padding-right: 10px;
            font-size: 13px;
            opacity: 1;
            transform: translateY(0px);
            transition-duration: 0.3s;
        }

        .modal {
            /* Other styles... */
            display: none;
            justify-content: center;
            align-items: center;
        }

        .modal-content {
            /* Other styles... */
            width: 60%;
            /* Adjust the width as needed */
            z-index: 1000;
            /* Adjust the value as needed */
        }

        .close {
            /* Other styles... */
            top: 5%;
            /* Adjust the top position as needed */
            right: 5%;
            /* Adjust the right position as needed */
        }

        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }

        /* Modal Form Styles */
        form {
            /* Other styles... */
            max-width: 100%;
        }

        .label-input-group {
            display: flex;
            flex-direction: column;
            margin-bottom: 15px;
        }

        .label-input-group label {
            margin-bottom: 5px;
        }

        .input-group {
            display: flex;
            align-items: center;
        }

        .input-group input {
            flex: 1;
            padding: 10px;
        }

        /* Modal Buttons Styles */
        .modal-buttons {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
        }

        .modal-buttons button {
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
        }

        .modal-buttons button[type="submit"] {
            background-color: #2156C2;
            color: #fff;
            border: none;
        }

        .modal-buttons button[type="button"] {
            background-color: #aaa;
            color: #fff;
            border: none;
        }

        .modal-buttons button[type="submit"]:hover,
        .modal-buttons button[type="button"]:hover {
            background-color: #003f8f;
        }

        .resizable-image {
            max-width: 100%;
            /* Set the maximum width */
            max-height: 400px;
            /* Set the maximum height */
            width: auto;
            /* Maintain aspect ratio */
            height: auto;
            /* Maintain aspect ratio */
            margin-top: 3px;
        }

        .file-upload-form {
            width: fit-content;
            height: fit-content;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .file-upload-label input {
            display: none;
        }

        .file-upload-label svg {
            height: 40px;
            fill: rgb(82, 82, 82);
            margin-bottom: 10px;
        }

        .file-upload-label {
            cursor: pointer;
            background-color: #ddd;
            padding: 30px 70px;
            border-radius: 40px;
            border: 2px dashed rgb(82, 82, 82);
            box-shadow: 0px 0px 200px -50px rgba(0, 0, 0, 0.719);
        }

        .file-upload-design {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            gap: 5px;
        }

        .browse-button {
            background-color: rgb(82, 82, 82);
            padding: 5px 15px;
            border-radius: 10px;
            color: white;
            transition: all 0.3s;
        }

        .browse-button:hover {
            background-color: rgb(14, 14, 14);
        }

        .vue-uploadbox-file-button {
            font-size: 9px;
            /* Ukuran font yang lebih kecil */
            padding: 1px 2px;
            /* Padding yang lebih kecil */
        }

        .file-upload-label {
            padding: 5px 10px;
            /* Ubah padding sesuai kebutuhan */
        }

        .file-upload-label svg {
            height: 40px;
            /* Ubah tinggi ikon sesuai kebutuhan */
            margin-bottom: 10px;
            /* Sesuaikan margin bottom sesuai kebutuhan */
        }

        .browse-button {
            padding: 5px 15px;
            /* Sesuaikan padding tombol sesuai kebutuhan */
            font-size: 10px;
            /* Sesuaikan ukuran font tombol sesuai kebutuhan */
        }

        .file-upload-form {
            padding: 30px;
            /* Sesuaikan padding formulir sesuai kebutuhan */
        }

        .data-table img {
            max-width: 70px;
            /* Set the maximum width for images */
            max-height: 70px;
            /* Set the maximum height for images */
        }

        .action-buttons {
            display: flex;
            gap: 10px;
        }

        /* Payment Modal Styles */
        #payModal {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0, 0, 0, 0.4);
            padding-top: 60px;

        }

        #payModal .modal-content {
            background-color: #fefefe;
            margin: auto;
            margin-top: 30px;
            padding: 20px;
            border: 1px solid #888;
            box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.164);
            border-radius: 10px;
            width: 500px;
            /* Sesuaikan lebar modal sesuai kebutuhan */
        }

        #payModal .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
            position: center;
            top: 10%;
            left: 10%;
            cursor: pointer;
        }

        #payModal .close:hover,
        #payModal .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }

        /* Additional styles for the Payment Modal */
        #payModal h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        #payModal img.resizable-image {
            max-width: 100%;
            max-height: 400px;
            width: auto;
            height: auto;
            margin-top: 20px;
            margin-bottom: 20px;
        }

        #payModal form {
            display: flex;
            flex-direction: column;
        }

        #payModal label {
            margin-top: 10px;
            text-align: left;
            margin-right: auto;
        }

        #payModal input {
            margin-bottom: 10px;
            padding: 8px;
        }

        #payModal .modal-buttons {
            display: flex;
            justify-content: flex-end;
            margin-top: 20px;
        }

        #payModal .modal-buttons button {
            padding: 10px;
            margin-left: 10px;
            cursor: pointer;
        }

        #payModal .modal-buttons button[type="submit"] {
            background-color: #2156C2;
            color: #fff;
            border: none;
            border-radius: 5px;
        }

        #payModal .modal-buttons button[type="button"] {
            background-color: #aaa;
            color: #fff;
            border: none;
            border-radius: 5px;
        }

        #payModal .modal-buttons button[type="submit"]:hover,
        #payModal .modal-buttons button[type="button"]:hover {
            background-color: #003f8f;
        }
    </style>
    <style>
        .red-text {
            color: red;
        }
    </style>

    <div class="row">
        <div class="col-md-12">
            <h4>{{ $title }}</h4>
            <br>
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
                                <th class="table-plus datatable-nosort">Foto</th>
                                <th class="table-plus datatable">Jumlah</th>
                                <th>Deskripsi</th>
                                <th class="table-plus datatable-nosort">Bukti Pembayaran</th>
                                <th class="table-plus datatable">Tanggal Pesan</th>
                                <th class="datatable-nosort">Status Pemesanan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $dt)
                                @if (Auth::id() == $dt->client->id)
                                    <!-- Menambahkan pengecekan apakah pengguna yang login adalah pemilik pesanan -->
                                    <tr>
                                        <td class="table-plus">{{ $dt->no_pesanan }}</td>
                                        <td class="table-plus">{{ $dt->jasa->nama_jasa }}</td>
                                        <td class="table-plus">Rp. {{ number_format($dt->jasa->harga_jasa, 0, ',', '.') }}
                                        </td>
                                        <td class="table-plus">{{ $dt->client->name }}</td>
                                        <td class="table-plus">Rp. {{ number_format($dt->harga_total, 0, ',', '.') }}</td>
                                        <td>
                                            <img src="{{ asset('upload_folder/' . $dt->foto_desain) }}" alt="Foto Desain"
                                                width="100">
                                        </td>
                                        <td class="table-plus">{{ $dt->jumlah }}</td>
                                        <td>{{ $dt->deskripsi }}</td>
                                        <td>
                                            @if ($dt->bukti_pembayaran)
                                                <img src="{{ asset('bukti_pembayaran/' . $dt->bukti_pembayaran) }}"
                                                    alt="Bukti Pembayaran" width="70">
                                            @else
                                                <span style="color: red;">Belum ada bukti pembayaran</span>
                                            @endif
                                        </td>

                                        <td class="table-plus">{{ $dt->created_at }}</td>
                                        <td>
                                            <div class="action-buttons">
                                                <a href="{{ route('client.edit', ['id' => $dt->id]) }}" class="edit-button"
                                                    onclick="editAction('{{ $dt->id }}')">
                                                    <svg class="edit-svgIcon" viewBox="0 0 512 512">
                                                        <path
                                                            d="M410.3 231l11.3-11.3-33.9-33.9-62.1-62.1L291.7 89.8l-11.3 11.3-22.6 22.6L58.6 322.9c-10.4 10.4-18 23.3-22.2 37.4L1 480.7c-2.5 8.4-.2 17.5 6.1 23.7s15.3 8.5 23.7 6.1l120.3-35.4c14.1-4.2 27-11.8 37.4-22.2L387.7 253.7 410.3 231zM160 399.4l-9.1 22.7c-4 3.1-8.5 5.4-13.3 6.9L59.4 452l23-78.1c1.4-4.9 3.8-9.4 6.9-13.3l22.7-9.1v32c0 8.8 7.2 16 16 16h32zM362.7 18.7L348.3 33.2 325.7 55.8 314.3 67.1l33.9 33.9 62.1 62.1 33.9 33.9 11.3-11.3 22.6-22.6 14.5-14.5c25-25 25-65.5 0-90.5L453.3 18.7c-25-25-65.5-25-90.5 0zm-47.4 168l-144 144c-6.2 6.2-16.4 6.2-22.6 0s-6.2-16.4 0-22.6l144-144c6.2-6.2 16.4-6.2 22.6 0s6.2 16.4 0 22.6z">
                                                        </path>
                                                    </svg>
                                                </a>

                                                </button>

                                                <form id="delete-form-{{ $dt->id }}"
                                                    action="{{ route('client.delete', ['id' => $dt->id]) }}" method="post"
                                                    style="display:inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="button" class="delete-button btn-hapus"
                                                        id="delete-{{ $dt->id }}" data-id="{{ $dt->id }}">
                                                        <svg class="delete-svgIcon" viewBox="0 0 448 512">
                                                            <path
                                                                d="M135.2 17.7L128 32H32C14.3 32 0 46.3 0 64S14.3 96 32 96H416c17.7 0 32-14.3 32-32s-14.3-32-32-32H320l-7.2-14.3C307.4 6.8 296.3 0 284.2 0H163.8c-12.1 0-23.2 6.8-28.6 17.7zM416 128H32L53.2 467c1.6 25.3 22.6 45 47.9 45H346.9c25.3 0 46.3-19.7 47.9-45L416 128z">
                                                            </path>
                                                        </svg>
                                                    </button>
                                                </form>

                                                <div class="action-buttons">
                                                    <button class="pay-button"
                                                        onclick="openPayModal('{{ $dt->id }}')">
                                                        $
                                                    </button>

                                                </div>

                                                {{-- <form
                                                    id="payment-form-{{ $dt->id }}"action="{{ route('client.payment', ['id' => $dt->id]) }}"
                                                    method="post" style="display:inline;">
                                                    <div class="action-buttons">
                                                        <button class="pay-button" onclick="openPayModal()">
                                                            $
                                                        </button>
                                                    </div>
                                                </form> --}}
                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Modal Content -->
            <div id="payModal" class="modal">
                <div class="modal-content">
                    <span class="close" onclick="closePayModal()">&times;</span>
                    <h2>Payment Details</h2>
                    <img src="/back/vendors/images/pay.jpg" alt="Payment" class="resizable-image">

                    <form id="payment-form" action="{{ route('client.pesan') }}" method="POST" style="display:inline;"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <!-- Add a button for uploading file or photo -->
                            <label for="uploadFile">Upload Bukti Pembayaran Uang Muka:</label>
                            <input type="file" id="uploadFile" name="bukti_pembayaran">
                        </div>

                        <!-- Add hidden input for pesanan_id -->
                        <input type="hidden" name="pesanan_id" id="pesanan_id" value="">

                        <!-- Your existing form content -->
                        <div class="modal-buttons">
                            <button type="button" onclick="closePayModal()">Tutup</button>
                            <button type="button" onclick="submitForm()">Submit</button>
                        </div>
                    </form>
                </div>
            </div>

            <script>
                function confirmDelete(id) {
                    Swal.fire({
                        title: "Are you sure?",
                        text: "You won't be able to revert this!",
                        icon: "warning",
                        showCancelButton: true,
                        confirmButtonColor: "#3085d6",
                        cancelButtonColor: "#d33",
                        confirmButtonText: "Yes, delete it!"
                    }).then((result) => {
                        if (result.isConfirmed) {
                            // Send DELETE request to the server
                            fetch('/client/delete/' + id, {
                                    method: 'DELETE',
                                    headers: {
                                        'Content-Type': 'application/json',
                                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                                    }
                                })
                                .then(response => response.json())
                                .then(data => {
                                    // Tampilkan SweetAlert konfirmasi penghapusan berhasil
                                    Swal.fire({
                                        title: "Deleted!",
                                        text: data.message,
                                        icon: "success"
                                    }).then(() => {
                                        // Redirect atau lakukan tindakan lain setelah penghapusan berhasil
                                        window.location.href = "/client/pesan";
                                    });
                                })
                                .catch(error => {
                                    // Tampilkan SweetAlert jika terjadi kesalahan
                                    Swal.fire({
                                        title: "Error!",
                                        text: "An error occurred while deleting the record.",
                                        icon: "error"
                                    });
                                });
                        }
                    });
                }

                // Menghubungkan SweetAlert ke setiap tombol hapus
                document.querySelectorAll('.btn-hapus').forEach(button => {
                    button.addEventListener('click', () => {
                        // Mendapatkan id dari data yang akan dihapus
                        let id = button.getAttribute('data-id');
                        // Menampilkan SweetAlert konfirmasi hapus
                        confirmDelete(id);
                    });
                });
            </script>

            <script>
                function openPayModal(id) {
                    var modal = document.getElementById('payModal');
                    modal.style.display = 'block';
                    // Update the action attribute with the correct route and id
                    document.getElementById('payment-form').action = "/client/pesan" + id;
                }

                function closePayModal() {
                    var modal = document.getElementById('payModal');
                    modal.style.display = 'none';
                }

                function submitForm() {
                    var form = document.getElementById('payment-form');
                    form.submit();
                }

                window.onclick = function(event) {
                    var modal = document.getElementById('payModal');
                    if (event.target === modal) {
                        modal.style.display = 'none';
                    }
                };

                function editAction(id) {
                    // Assuming you have a route named 'client.edit'
                    window.location.href = '/client/edit/' + id;

                    fetch('/client/edit/' + id, {
                            method: 'GET',
                            headers: {
                                'Accept': 'application/json',
                                'Content-Type': 'application/json',
                            },
                        })
                        .then(response => response.json())
                        .then(data => {
                            // Handle the data returned from the server
                            console.log(data);
                        })
                        .catch(error => {
                            // Handle errors
                            console.error('Error:', error);
                        });
                }
            </script>



        @endsection
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.18.0/font/bootstrap-icons.css">
