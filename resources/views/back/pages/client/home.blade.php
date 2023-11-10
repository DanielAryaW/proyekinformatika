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
            <img src="https://s3-alpha-sig.figma.com/img/2d39/df56/f43dcfa0885fc87135f4e63c79c0ae87?Expires=1698624000&Signature=gZBAEyPxoniKVdQCKACZgfBBJwQGpDnYGD9oUP1WJHRrzJaGOYbXmzwUORk03zOp4S6rxkUYn-wyuVu0F9TlHP7-SkHMstze2uejmw-NrPwu-gbET0Q-4EPqDqc5yDBXCzHSf8FUM-ds0GwCnx-lfosPsXKV8CHFZZyaM350N7NjXcG0MU-R26DAoAV-1vLxWdHayjZQwHn7NZFxqVTH7oj6vuEqhGBU8j78cBLZEfQXC4J1jgWeW~taRNjBwmr2lJZ6AuVDlWK9wM~lGWuY7gv0rBus6XcktS39cWVdTXBb3m-E26V~2GncWVxos4G7qHPGEYn~fXYC3YzmP55HNg__&Key-Pair-Id=APKAQ4GOSFWCVNEHN3O4"
                alt="Layanan 2">
            <h3>Cetak Banner</h3>
            <p>Cetak banner custom dengan harga terjangkau</p>
            <button class="btn-pesan" data-toggle="modal" data-target="#banner-modal">Pesan</button>
        </div>

        <!-- Card 3 -->
        <div class="Card">
            <img src="https://s3-alpha-sig.figma.com/img/2764/6788/271455b8a3156a71a3a159bd8dab6b01?Expires=1698624000&Signature=leBvjNgJk96edl3a3BDI8MH1HFSpTQ-02M9ehoLNAN00IHLasxad382WEJ5drDSRt5kkH2YnB2jf8aBwp7R~oSzmxBOUQcrHn11zrJa-iIL1acmgSmhdoUaZ3UBTnq-MhuigENZ02~W8Wot6kKlw7K47uYNKQtgadIbldrQFR3Q7hOZYatlrsQq9pC~AlLJK8kRf2I4ZntMdTgcJVxuWNtSgjxg7LWLt8W39wYUkgTqG0BygGhyVAr5ZLFz5pmDYBRMgkIdLGyM4Fs5APkIpgu0oJrg~FlChviOOREDHoZH0LUZRah7OR~JIw~IbENdrlbySl1MkhrNRsUYtzmNabQ__&Key-Pair-Id=APKAQ4GOSFWCVNEHN3O4"
                alt="Layanan 3">
            <h3>Cetak Poster A3</h3>
            <p>Cetak poster a3 desain custom dengan harga terjangkau</p>
            <button class="btn-pesan" data-toggle="modal" data-target="#poster-modal">Pesan</button>
        </div>

        <!-- Card 4 -->
        <div class="Card">
            <img src="https://s3-alpha-sig.figma.com/img/cd59/93c6/9e4c41846e4bbcdf57e0018e16a15cb7?Expires=1698624000&Signature=M7mdrXi-IlX3To~ah6V2SSbI-gkPdHKGWq3U3mbAUTVP7yibRJZDCll0N7u5SxlpCUvrGKkuZupWl8ALtX1ObXcQPlc367uzYSs8~k2JeZb65VDz7yUlNSJWEGYjyPsHO73kjicNJV1P75MDBxFy33TEqN80JeJOxglv7~pL3Xv92~I0Gl54f~51By6uUcKpfzQaoGFazlFMBUmE2yh5Y6HQzPSRUlz1Zn34W0tPCb8DfKKd1Y2dsNtv1G3FSgNjeS0wlvkC66uSnUcC5hv4~CvXlE3inhpF9Mr5eyuPnMIoU6maiCJz3510eh91nh-~Gj1QZke85DcLFCfL0iwNIg__&Key-Pair-Id=APKAQ4GOSFWCVNEHN3O4"
                alt="Layanan 4">
            <h3>Cetak Kartu Nama</h3>
            <p>Cetak kartu nama custom dengan harga terjangkau</p>
            <button class="btn-pesan" data-toggle="modal" data-target="#kartunama-modal">Pesan</button>
        </div>

        <!-- Card 5 -->
        <div class="Card">
            <img src="https://s3-alpha-sig.figma.com/img/d574/bee4/4f6d96701b7b00b97bf3fbd025546888?Expires=1698624000&Signature=jvtlBvfQlHeHFu5DwOcoapQV4JjWZlSIG801-dGYh~Z4UxDUXJod-9Lgt7Fz8xm1I6M8bGwNiuSggoLiXHRBiM-V-dDOLjVRMrY6zYC2Oxu4mxDUZyRWKiXiayM1gv88zDDcHcGMM8PjM-sIovCwJYafTgbE9Zkdf-Cz-z4h5b4bWP1sCetwMZwEK8R9bIRWT~017BktkKffROVMkeYjh0N7DeW6w8-e2XVxZuxAw4KzMzxCY6AhBxpzhiYRxbsBOdcuajR4HfaVnTwL1SdDqAWKaPO2BPaqBVOiiTFTe7divnywJmHwJQJslvwThTa7wVd-RAvOh2PdWPjtKW-wGA__&Key-Pair-Id=APKAQ4GOSFWCVNEHN3O4"
                alt="Layanan 5">
            <h3>Cetak Undangan Pernikahan</h3>
            <p>Cetak undangan pernikahan anda, desain custom dengan harga terjangkau</p>
            <button class="btn-pesan" data-toggle="modal" data-target="#undanganpernikahan-modal">Pesan</button>
        </div>

        <!-- Card 6 -->
        <div class="Card">
            <img src="https://s3-alpha-sig.figma.com/img/427f/8ad3/e0489c7ed2d1f1a41305b5528c83a364?Expires=1698624000&Signature=VFYKUVTJajp1aAZjhshZaJKZ1Rt4hlD2VeXJ1yCP4f9JATTPJ~TrFwMBRenfqfnMgxE2jJyQmxyybOqXAvYbInnFNQ-Zavz6Y7IzRLhGkErJ7ZaV2tUYKrLeeFqRRORXhPMz51vuxy07wuE7XpaPB8C9OByreAQ72uwpmQ2~Sngp-iFN9os~EW1xRHVYC9MLqIhwGTPbzuK6nXV7mf5Zvo6Bt2q3ac6X~OnBzKVVcNrVCBVlSNKikHJkQoI8-HVe26zD444o2m1-RGBTEHOvVkZixFVB2D7pl1iNgNqNmUM~bCqRxKBWGPiGAJAFK2yd-sejLG-vfCOF~d~6Kh~OCw__&Key-Pair-Id=APKAQ4GOSFWCVNEHN3O4"
                alt="Layanan 6">
            <h3>Cetak Sticker</h3>
            <p>Cetak sticker dengan desain custom dan harga terjangkau</p>
            <button class="btn-pesan" data-toggle="modal" data-target="#sticker-modal">Pesan</button>
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
    </div>

    <!-- Modal untuk Layanan 2 -->
    <div class="modal fade" id="banner-modal" tabindex="-1" role="dialog" aria-labelledby="banner-modal-label"
        aria-hidden="true">
        <!-- Isi modal untuk Banner disini -->
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myLargeModalLabel">
                        Cetak Banner
                    </h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                        ×
                    </button>
                </div>
                <div class="modal-body">
                    <img src="https://s3-alpha-sig.figma.com/img/2d39/df56/f43dcfa0885fc87135f4e63c79c0ae87?Expires=1698624000&Signature=gZBAEyPxoniKVdQCKACZgfBBJwQGpDnYGD9oUP1WJHRrzJaGOYbXmzwUORk03zOp4S6rxkUYn-wyuVu0F9TlHP7-SkHMstze2uejmw-NrPwu-gbET0Q-4EPqDqc5yDBXCzHSf8FUM-ds0GwCnx-lfosPsXKV8CHFZZyaM350N7NjXcG0MU-R26DAoAV-1vLxWdHayjZQwHn7NZFxqVTH7oj6vuEqhGBU8j78cBLZEfQXC4J1jgWeW~taRNjBwmr2lJZ6AuVDlWK9wM~lGWuY7gv0rBus6XcktS39cWVdTXBb3m-E26V~2GncWVxos4G7qHPGEYn~fXYC3YzmP55HNg__&Key-Pair-Id=APKAQ4GOSFWCVNEHN3O4"
                        class="card-img-top" alt="Banner" style="border-radius: 10px; max-width: 300px;">
                    <h5 class="card-title" style="margin-top: 10px;">Rp. 120.000/meter</h5>
                    <p class="card-text">Cetak banner custom dengan harga terjangkau.</p>

                    <form>
                        <div class="form-group">
                            <label for="customFile">Upload Desain Gambar:</label>
                            <input type="file" class="form-control-file" id="customFile">
                        </div>
                        <div class="form-group">
                            <label for="quantity">Jumlah Pesanan:</label>
                            <input type="number" class="form-control" id="quantity"
                                placeholder="Masukkan jumlah pesanan" min="0">
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
    </div>

    <!-- Modal untuk Layanan 3 -->
    <div class="modal fade" id="poster-modal" tabindex="-1" role="dialog" aria-labelledby="poster-modal-label"
        aria-hidden="true">
        <!-- Isi modal untuk Poster A3 disini -->
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myLargeModalLabel">
                        Cetak Poster A3
                    </h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                        ×
                    </button>
                </div>
                <div class="modal-body">
                    <img src="https://s3-alpha-sig.figma.com/img/2764/6788/271455b8a3156a71a3a159bd8dab6b01?Expires=1698624000&Signature=leBvjNgJk96edl3a3BDI8MH1HFSpTQ-02M9ehoLNAN00IHLasxad382WEJ5drDSRt5kkH2YnB2jf8aBwp7R~oSzmxBOUQcrHn11zrJa-iIL1acmgSmhdoUaZ3UBTnq-MhuigENZ02~W8Wot6kKlw7K47uYNKQtgadIbldrQFR3Q7hOZYatlrsQq9pC~AlLJK8kRf2I4ZntMdTgcJVxuWNtSgjxg7LWLt8W39wYUkgTqG0BygGhyVAr5ZLFz5pmDYBRMgkIdLGyM4Fs5APkIpgu0oJrg~FlChviOOREDHoZH0LUZRah7OR~JIw~IbENdrlbySl1MkhrNRsUYtzmNabQ__&Key-Pair-Id=APKAQ4GOSFWCVNEHN3O4"
                        class="card-img-top" alt="Poster" style="border-radius: 10px; max-width: 300px;">
                    <h5 class="card-title" style="margin-top: 10px;">Rp. 5.000/poster</h5>
                    <p class="card-text">Cetak poster ukuran a3 custom dengan harga terjangkau.</p>

                    <form>
                        <div class="form-group">
                            <label for="customFile">Upload Desain Gambar:</label>
                            <input type="file" class="form-control-file" id="customFile">
                        </div>
                        <div class="form-group">
                            <label for="quantity">Jumlah Pesanan:</label>
                            <input type="number" class="form-control" id="quantity"
                                placeholder="Masukkan jumlah pesanan" min="0">
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
    </div>

    <!-- Modal untuk Layanan 4 -->
    <div class="modal fade" id="kartunama-modal" tabindex="-1" role="dialog" aria-labelledby="kartunama-modal-label"
        aria-hidden="true">
        <!-- Isi modal untuk Poster A3 disini -->
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myLargeModalLabel">
                        Cetak Kartu Nama
                    </h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                        ×
                    </button>
                </div>
                <div class="modal-body">
                    <img src="https://s3-alpha-sig.figma.com/img/cd59/93c6/9e4c41846e4bbcdf57e0018e16a15cb7?Expires=1698624000&Signature=M7mdrXi-IlX3To~ah6V2SSbI-gkPdHKGWq3U3mbAUTVP7yibRJZDCll0N7u5SxlpCUvrGKkuZupWl8ALtX1ObXcQPlc367uzYSs8~k2JeZb65VDz7yUlNSJWEGYjyPsHO73kjicNJV1P75MDBxFy33TEqN80JeJOxglv7~pL3Xv92~I0Gl54f~51By6uUcKpfzQaoGFazlFMBUmE2yh5Y6HQzPSRUlz1Zn34W0tPCb8DfKKd1Y2dsNtv1G3FSgNjeS0wlvkC66uSnUcC5hv4~CvXlE3inhpF9Mr5eyuPnMIoU6maiCJz3510eh91nh-~Gj1QZke85DcLFCfL0iwNIg__&Key-Pair-Id=APKAQ4GOSFWCVNEHN3O4"
                        class="card-img-top" alt="Kartu Nama" style="border-radius: 10px; max-width: 300px;">
                    <h5 class="card-title" style="margin-top: 10px;">Rp. 5.000/kartu</h5>
                    <p class="card-text">Cetak kartu nama dengan desain custom dan harga terjangkau.</p>

                    <form>
                        <div class="form-group">
                            <label for="customFile">Upload Desain Gambar:</label>
                            <input type="file" class="form-control-file" id="customFile">
                        </div>
                        <div class="form-group">
                            <label for="quantity">Jumlah Pesanan:</label>
                            <input type="number" class="form-control" id="quantity"
                                placeholder="Masukkan jumlah pesanan" min="0">
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
    </div>

    <!-- Modal untuk Layanan 5 -->
    <div class="modal fade" id="undanganpernikahan-modal" tabindex="-1" role="dialog"
        aria-labelledby="undanganpernikahan-modal-label" aria-hidden="true">
        <!-- Isi modal untuk Poster A3 disini -->
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myLargeModalLabel">
                        Cetak Undangan Pernikahan
                    </h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                        ×
                    </button>
                </div>
                <div class="modal-body">
                    <img src="https://s3-alpha-sig.figma.com/img/d574/bee4/4f6d96701b7b00b97bf3fbd025546888?Expires=1698624000&Signature=jvtlBvfQlHeHFu5DwOcoapQV4JjWZlSIG801-dGYh~Z4UxDUXJod-9Lgt7Fz8xm1I6M8bGwNiuSggoLiXHRBiM-V-dDOLjVRMrY6zYC2Oxu4mxDUZyRWKiXiayM1gv88zDDcHcGMM8PjM-sIovCwJYafTgbE9Zkdf-Cz-z4h5b4bWP1sCetwMZwEK8R9bIRWT~017BktkKffROVMkeYjh0N7DeW6w8-e2XVxZuxAw4KzMzxCY6AhBxpzhiYRxbsBOdcuajR4HfaVnTwL1SdDqAWKaPO2BPaqBVOiiTFTe7divnywJmHwJQJslvwThTa7wVd-RAvOh2PdWPjtKW-wGA__&Key-Pair-Id=APKAQ4GOSFWCVNEHN3O4"
                        class="card-img-top" alt="Undangan Pernikahan" style="border-radius: 10px; max-width: 300px;">
                    <h5 class="card-title" style="margin-top: 10px;">Rp. 5.000/lembar</h5>
                    <p class="card-text">Cetak undangan pernikahan anda dengan desain custom dan harga terjangkau.</p>

                    <form>
                        <div class="form-group">
                            <label for="customFile">Upload Desain Gambar:</label>
                            <input type="file" class="form-control-file" id="customFile">
                        </div>
                        <div class="form-group">
                            <label for="quantity">Jumlah Pesanan:</label>
                            <input type="number" class="form-control" id="quantity"
                                placeholder="Masukkan jumlah pesanan" min="0">
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
    </div>


    <!-- Modal untuk Layanan 6 -->
    <div class="modal fade" id="layanan6-modal" tabindex="-1" role="dialog" aria-labelledby="layanan6-modal-label"
        aria-hidden="true">
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
