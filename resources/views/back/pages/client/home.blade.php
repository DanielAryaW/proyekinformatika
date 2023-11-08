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
        <!-- Card 1 -->
        <div class="Card">
            <img src="https://s3-alpha-sig.figma.com/img/7ffa/a056/e38f56c360ed0ebbd0a60328a7521e56?Expires=1698624000&Signature=ik~ZlO1EQoyNxP7ciwTeCxvMNJlrNvOlcyakldOYtHb4KV5O5rBjIohkEz~IjOcF9oCabbeV2jr2mLtOX4Co7MqzJqaqhE-a7vQQta2IeersZoCqkrPFSn-mfDKBxaFj-gJvKDWNSwXJitdWXWcJx4DyNFQqvW4XlW1DGW1f6bu87ljlm6DmNME49tqXITNt15DtenofC5JyDn5q3RqGQMfCgtPcT0Udnop~tIv~ayTCSoWx0ssoeupW5i3KywhSufwJ72P4YyF9zf8RJUcbd49ZLq31~0DADcNUrqFP0eXgdFbDnieBkxq2Duin5ofOjiK03ePf~aAMurI~kfqMpw__&Key-Pair-Id=APKAQ4GOSFWCVNEHN3O4"
                alt="Layanan 1">
            <h3>Cetak Amplop</h3>
            <p>Cetak amplop custom dengan harga terjangkau</p>
            <button class="btn-pesan" data-toggle="modal" data-target="#amplop-modal">Pesan</button>
        </div>

        <!-- Card 2 -->
        <div class="Card">
            <img src="/path/to/service2-image.jpg" alt="Layanan 2">
            <h3>Layanan 2</h3>
            <p>Deskripsi singkat layanan 2.</p>
            <button class="btn-pesan" data-toggle="modal" data-target="#layanan2-modal">Pesan</button>
        </div>

        <!-- Card 3 -->
        <div class="Card">
            <img src="/path/to/service3-image.jpg" alt="Layanan 3">
            <h3>Layanan 3</h3>
            <p>Deskripsi singkat layanan 3.</p>
            <button class="btn-pesan" data-toggle="modal" data-target="#layanan3-modal">Pesan</button>
        </div>

        <!-- Card 4 -->
        <div class="Card">
            <img src="/path/to/service4-image.jpg" alt="Layanan 4">
            <h3>Layanan 4</h3>
            <p>Deskripsi singkat layanan 4.</p>
            <button class="btn-pesan" data-toggle="modal" data-target="#layanan4-modal">Pesan</button>
        </div>

        <!-- Card 5 -->
        <div class="Card">
            <img src="/path/to/service5-image.jpg" alt="Layanan 5">
            <h3>Layanan 5</h3>
            <p>Deskripsi singkat layanan 5.</p>
            <button class="btn-pesan" data-toggle="modal" data-target="#layanan5-modal">Pesan</button>
        </div>

        <!-- Card 6 -->
        <div class="Card">
            <img src="/path/to/service6-image.jpg" alt="Layanan 6">
            <h3>Layanan 6</h3>
            <p>Deskripsi singkat layanan 6.</p>
            <button class="btn-pesan" data-toggle="modal" data-target="#layanan6-modal">Pesan</button>
        </div>
    </div>

    <!-- Modals -->
    <!-- Modal untuk Amplop -->
    <div class="modal fade" id="amplop-modal" tabindex="-1" role="dialog" aria-labelledby="amplop-modal-label"
        aria-hidden="true">
        <!-- Isi modal untuk Amplop disini -->
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myLargeModalLabel">
                        Cetak Poster
                    </h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                        ×
                    </button>
                </div>
                <div class="modal-body">
                    <img src="https://s3-alpha-sig.figma.com/img/7ffa/a056/e38f56c360ed0ebbd0a60328a7521e56?Expires=1698624000&Signature=ik~ZlO1EQoyNxP7ciwTeCxvMNJlrNvOlcyakldOYtHb4KV5O5rBjIohkEz~IjOcF9oCabbeV2jr2mLtOX4Co7MqzJqaqhE-a7vQQta2IeersZoCqkrPFSn-mfDKBxaFj-gJvKDWNSwXJitdWXWcJx4DyNFQqvW4XlW1DGW1f6bu87ljlm6DmNME49tqXITNt15DtenofC5JyDn5q3RqGQMfCgtPcT0Udnop~tIv~ayTCSoWx0ssoeupW5i3KywhSufwJ72P4YyF9zf8RJUcbd49ZLq31~0DADcNUrqFP0eXgdFbDnieBkxq2Duin5ofOjiK03ePf~aAMurI~kfqMpw__&Key-Pair-Id=APKAQ4GOSFWCVNEHN3O4"
                        class="card-img-top" alt="Dua amplop putih" style="border-radius: 10px; max-width: 300px;">
                    <h5 class="card-title" style="margin-top: 10px;">Rp. 5.000/amplop</h5>
                    <p class="card-text">Cetak amplop custom dengan harga terjangkau.</p>

                    <form>
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

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">
                        Tutup
                    </button>
                    <button type="button" class="btn btn-primary">
                        Pesan
                    </button>
                </div>
            </div>
        </div>

        <!-- Modal untuk Layanan 2 -->
        <div class="modal fade" id="layanan2-modal" tabindex="-1" role="dialog" aria-labelledby="layanan2-modal-label"
            aria-hidden="true">
            <!-- Isi modal untuk Layanan 2 disini -->
        </div>

        <!-- Modal untuk Layanan 3 -->
        <div class="modal fade" id="layanan3-modal" tabindex="-1" role="dialog" aria-labelledby="layanan3-modal-label"
            aria-hidden="true">
            <!-- Isi modal untuk Layanan 3 disini -->
        </div>

        <!-- Modal untuk Layanan 4 -->
        <div class="modal fade" id="layanan4-modal" tabindex="-1" role="dialog" aria-labelledby="layanan4-modal-label"
            aria-hidden="true">
            <!-- Isi modal untuk Layanan 4 disini -->
        </div>

        <!-- Modal untuk Layanan 5 -->
        <div class="modal fade" id="layanan5-modal" tabindex="-1" role="dialog"
            aria-labelledby="layanan5-modal-label" aria-hidden="true">
            <!-- Isi modal untuk Layanan 5 disini -->
        </div>

        <!-- Modal untuk Layanan 6 -->
        <div class="modal fade" id="layanan6-modal" tabindex="-1" role="dialog"
            aria-labelledby="layanan6-modal-label" aria-hidden="true">
            <!-- Isi modal untuk Layanan 6 disini -->
        </div>

        <!-- JavaScript -->
        <script>
            // JavaScript untuk menampilkan modals saat tombol "Pesan" pada Card ditekan
            var btnPesan = document.querySelectorAll(".btn-pesan");
            btnPesan.forEach(function(btn) {
                btn.addEventListener("click", function() {
                    var targetModalId = btn.getAttribute("data-target");
                    var modal = document.querySelector(targetModalId);
                    if (modal) {
                        modal.style.display = "block";
                    }
                });
            });
        </script>
        <script script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


    @endsection
