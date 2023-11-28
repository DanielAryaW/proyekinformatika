@extends('back.layout-client.pages-layout')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Home')
@section('content')

    <style>
        /* CSS untuk modals */
        .modal-container {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.7);
            z-index: 1;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .modal-content {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            width: 400px;
            /* Sesuaikan lebar modal sesuai kebutuhan */
        }

        .close {
            position: absolute;
            top: 10px;
            right: 10px;
            cursor: pointer;
        }

        /* CSS untuk tombol "Pesan" pada Card */
        .btn-pesan {
            background-color: #2156C2;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        /* CSS untuk tombol "Pesan" di dalam modals */
        .btn-pesan-modal {
            background-color: #2156C2;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        /* Sambutan Style */
        .Sambutan {
            background: linear-gradient(90deg, #00c4ff, #00597e);
            text-align: center;
            padding: 20px;
            border-radius: 20px;
        }

        .Sambutan-Title {
            color: #fff;
            font-size: 36px;
            font-weight: 700;
        }

        .Sambutan-Text {
            color: #fff;
            font-size: 18px;
            line-height: 28px;
            margin-top: 20px;
        }

        /* Card Container Style */
        .CardContainer {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
        }

        /* Card Style */
        .Card {
            width: 300px;
            margin: 20px;
            background-color: #fff;
            border: 1px solid #e0e0e0;
            border-radius: 10px;
            padding: 10px;
            text-align: center;
            transition: transform 0.2s, box-shadow 0.2s;
        }

        .Card:hover {
            transform: scale(1.05);
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
        }

        .Card img {
            max-width: 100%;
            height: auto;
            border-radius: 10px;
        }

        .Card h3 {
            color: #333;
            font-size: 24px;
            font-weight: 700;
            margin-top: 10px;
        }

        .Card p {
            color: #777;
            font-size: 18px;
            line-height: 28px;
            margin: 10px 0;
        }

        .Card a {
            display: inline-block;
            background-color: #2156C2;
            color: #fff;
            padding: 10px 20px;
            border-radius: 5px;
            text-decoration: none;
            margin: 10px 0;
            transition: background-color 0.2s;
        }

        .Card a:hover {
            background-color: #003f8f;
        }

        /* Footer Style */
        .Footer {
            background: linear-gradient(90deg, #00c4ff, #00597e);
            text-align: center;
            padding: 20px;
            border-radius: 20px 40px;
        }

        .Footer h2 {
            color: #fff;
            font-size: 24px;
            font-weight: 700;
        }

        .Footer p,
        .Footer ul {
            color: #fff;
            font-size: 18px;
            line-height: 28px;
        }

        .Footer ul {
            list-style-type: none;
            padding: 0;
        }
    </style>

    <!-- Sambutan -->
    <div class="Sambutan">
        <h2 class="Sambutan-Title">Selamat Datang di Printwork</h2>
        <p class="Sambutan-Text">
            Kami menyediakan berbagai layanan percetakan berkualitas tinggi. Pesan sekarang dan nikmati hasil terbaik!
        </p>
    </div>

    <!-- Card Layanan (6 Card) -->
    <div class="CardContainer">
        @foreach ($data as $jasa)
            <div class="Card">
                <img src="{{ asset('upload_folder/' . $jasa->foto_desain) }}" alt="Foto Desain" width="500">
                <h3>{{ $jasa->nama_jasa }}</h3>
                <p>{{ $jasa->deskripsi }}</p>
                <button class="btn-pesan" data-toggle="modal" data-target="#modal{{ $jasa->id }}">Pesan</button>
            </div>
        @endforeach
    </div>

    <!-- Add modals dynamically based on data -->
    @foreach ($data as $jasa)
        <div class="modal fade" id="modal{{ $jasa->id }}" tabindex="-1" role="dialog"
            aria-labelledby="modal-label{{ $jasa->id }}" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myLargeModalLabel">
                            {{ $jasa->nama_jasa }}
                        </h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    </div>
                    <div class="modal-body">
                        <img src="{{ asset('upload_folder/' . $jasa->foto_desain) }}" alt="Foto Desain" width="200"
                            style="border-radius: 10px; max-width: 300px;">
                        <h5 class="card-title" style="margin-top: 10px;">Rp. {{ $jasa->harga_jasa }}</h5>
                        <p class="card-text">{{ $jasa->deskripsi }}</p>
                    </div>

                    {{-- Form pesan jasa --}}
                    <form action="{{ route('client.pesan') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="customFile">Upload Desain Gambar:</label>
                            <input type="file" class="form-control-file" id="customFile">
                        </div>
                        <div class="form-group">
                            <label for="quantity">Jumlah Pesanan:</label>
                            <input type="number" class="form-control" id="quantity" placeholder="Masukkan jumlah pesanan"
                                min="0">
                        </div>
                        <div class="form-group">
                            <label for="deskripsi">Deskripsi/Ketentuan Khusus:</label>
                            <textarea class="form-control" id="deskripsi" rows="4" placeholder="Masukkan deskripsi atau ketentuan khusus"></textarea>
                        </div>
                    </form>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                        <button type="button" class="btn btn-primary"
                            onclick="pesanJasa('{{ $jasa->id_jasa }}')">Pesan</button>
                    </div>

                </div>
            </div>
        </div>
    @endforeach

    <!-- JavaScript -->
    <script>
        var btnPesan = document.querySelectorAll(".btn-pesan");
        btnPesan.forEach(function(btn) {
            btn.addEventListener("click", function() {

                // JavaScript untuk menampilkan modals saat tombol "Pesan" pada Card ditekan
                var submitButtons = document.querySelectorAll(".modal-footer .btn-primary");
                submitButtons.forEach(function(btn) {
                    btn.addEventListener("click", function() {
                        // Ambil data dari form
                        var form = btn.closest("form");
                        var fileInput = form.querySelector("#customFile");
                        var quantityInput = form.querySelector("#quantity");
                        var deskripsiInput = form.querySelector("#deskripsi");

                        // Ambil data dari tombol pesan yang dipilih
                        var namaJasa = btn.getAttribute("data-nama");
                        var hargaJasa = btn.getAttribute("data-harga");

                        // Buat objek data pesanan
                        var pesananData = {
                            file: fileInput.files[0],
                            quantity: quantityInput.value,
                            deskripsi: deskripsiInput.value,
                            namaJasa: namaJasa,
                            hargaJasa: hargaJasa
                        };

                        // Simpan data menggunakan AJAX
                        $.ajax({
                            url: "{{ route('client.pesan') }}",
                            method: "POST",
                            data: pesananData,
                            processData: false,
                            contentType: false,
                            success: function(response) {
                                // Handle response jika diperlukan
                                console.log(response);
                            },
                            error: function(error) {
                                // Handle error jika diperlukan
                                console.error(error);
                            }
                        });

                        // Tutup modal setelah submit
                        var modal = btn.closest(".modal");
                        if (modal) {
                            modal.style.display = "none";
                        }
                    });
                });
            });
        });
    </script>

    <script script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
@endsection
