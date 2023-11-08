@extends('back.layout-client.pesan-layout')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Pesan Jasa')
@section('content')

    <div class="min-height-200px">
        <div class="page-header">
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <div class="title">
                        <h4>Pesan Jasa</h4>
                    </div>
                    <nav aria-label="breadcrumb" role="navigation">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="http://127.0.0.1:8000/client/pesan">Pesan Jasa</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">
                                Pesan
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>

        <div class="row">
            <!-- Large modal Cetak Amplop -->
            <div class="col-lg-4 col-md-12 mb-20">
                <div class="pd-20 card-box height-100-p">
                    <div class="card-header" style="border-radius: 10px 10px 0px 0px;"><b>Cetak Amplop</b></div>
                    <a href="#" class="btn-block" data-toggle="modal" data-target="#bd-example-modal-lg"
                        type="button">
                        <img src="https://s3-alpha-sig.figma.com/img/7ffa/a056/e38f56c360ed0ebbd0a60328a7521e56?Expires=1698624000&Signature=ik~ZlO1EQoyNxP7ciwTeCxvMNJlrNvOlcyakldOYtHb4KV5O5rBjIohkEz~IjOcF9oCabbeV2jr2mLtOX4Co7MqzJqaqhE-a7vQQta2IeersZoCqkrPFSn-mfDKBxaFj-gJvKDWNSwXJitdWXWcJx4DyNFQqvW4XlW1DGW1f6bu87ljlm6DmNME49tqXITNt15DtenofC5JyDn5q3RqGQMfCgtPcT0Udnop~tIv~ayTCSoWx0ssoeupW5i3KywhSufwJ72P4YyF9zf8RJUcbd49ZLq31~0DADcNUrqFP0eXgdFbDnieBkxq2Duin5ofOjiK03ePf~aAMurI~kfqMpw__&Key-Pair-Id=APKAQ4GOSFWCVNEHN3O4"
                            alt="modal" style="border-radius: 0px 0px 10px 10px;" />
                    </a>
                    <h5 class="card-title" style="margin-top: 10px;">Rp. 5.000/amplop</h5>
                    <p class="card-text">Cetak amplop custom dengan harga terjangkau.</p>

                    <div class="modal fade bs-example-modal-lg" id="bd-example-modal-lg" tabindex="-1" role="dialog"
                        aria-labelledby="myLargeModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg modal-dialog-centered">
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
                                        class="card-img-top" alt="Dua amplop putih"
                                        style="border-radius: 10px; max-width: 300px;">
                                    <h5 class="card-title" style="margin-top: 10px;">Rp. 5.000/amplop</h5>
                                    <p class="card-text">Cetak amplop custom dengan harga terjangkau.</p>

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
                </div>
            </div>


            {{-- Modals Cetak Banner --}}
            <div class="col-lg-4 col-md-12 mb-20">
                <div class="pd-20 card-box height-100-p">
                    <div class="card-header" style="border-radius: 10px 10px 0px 0px;"><b>Cetak Amplop</b></div>
                    <a href="#" class="btn-block" data-toggle="modal" data-target="#bd-example-modal-lg"
                        type="button">
                        <img src="https://s3-alpha-sig.figma.com/img/2d39/df56/f43dcfa0885fc87135f4e63c79c0ae87?Expires=1698624000&Signature=gZBAEyPxoniKVdQCKACZgfBBJwQGpDnYGD9oUP1WJHRrzJaGOYbXmzwUORk03zOp4S6rxkUYn-wyuVu0F9TlHP7-SkHMstze2uejmw-NrPwu-gbET0Q-4EPqDqc5yDBXCzHSf8FUM-ds0GwCnx-lfosPsXKV8CHFZZyaM350N7NjXcG0MU-R26DAoAV-1vLxWdHayjZQwHn7NZFxqVTH7oj6vuEqhGBU8j78cBLZEfQXC4J1jgWeW~taRNjBwmr2lJZ6AuVDlWK9wM~lGWuY7gv0rBus6XcktS39cWVdTXBb3m-E26V~2GncWVxos4G7qHPGEYn~fXYC3YzmP55HNg__&Key-Pair-Id=APKAQ4GOSFWCVNEHN3O4"
                            alt="modal" style="border-radius: 0px 0px 10px 10px;" />
                    </a>
                    <h5 class="card-title" style="margin-top: 10px;">Rp. 5.000/amplop</h5>
                    <p class="card-text">Cetak amplop custom dengan harga terjangkau.</p>

                    <div class="modal fade bs-example-modal-lg" id="bd-example-modal-lg" tabindex="-1" role="dialog"
                        aria-labelledby="myLargeModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg modal-dialog-centered">
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
                                        class="card-img-top" alt="Dua amplop putih"
                                        style="border-radius: 10px; max-width: 300px;">
                                    <h5 class="card-title" style="margin-top: 10px;">Rp. 5.000/amplop</h5>
                                    <p class="card-text">Cetak amplop custom dengan harga terjangkau.</p>

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
                </div>
            </div>
        </div>
    </div>



    </div>

    <div class="row">
        <div class="col-md-6 col-sm-12">
            <div class="title">
                <h4>Pesan Jasa</h4>
            </div>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-lg-4 col-md-12 mb-20">
            <div class="card">
                <div class="card-header"><b>Cetak Amplop</b></div>
                <div class="card-body">
                    <img src="https://s3-alpha-sig.figma.com/img/7ffa/a056/e38f56c360ed0ebbd0a60328a7521e56?Expires=1698624000&Signature=ik~ZlO1EQoyNxP7ciwTeCxvMNJlrNvOlcyakldOYtHb4KV5O5rBjIohkEz~IjOcF9oCabbeV2jr2mLtOX4Co7MqzJqaqhE-a7vQQta2IeersZoCqkrPFSn-mfDKBxaFj-gJvKDWNSwXJitdWXWcJx4DyNFQqvW4XlW1DGW1f6bu87ljlm6DmNME49tqXITNt15DtenofC5JyDn5q3RqGQMfCgtPcT0Udnop~tIv~ayTCSoWx0ssoeupW5i3KywhSufwJ72P4YyF9zf8RJUcbd49ZLq31~0DADcNUrqFP0eXgdFbDnieBkxq2Duin5ofOjiK03ePf~aAMurI~kfqMpw__&Key-Pair-Id=APKAQ4GOSFWCVNEHN3O4"
                        class="card-img-top" alt="Dua amplop putih" style="border-radius: 10px;">
                    <h5 class="card-title" style="margin-top: 10px;">Rp. 5.000/amplop</h5>
                    <p class="card-text">Cetak amplop custom dengan harga terjangkau.</p>
                    <a href="#" class="btn btn-primary">Pesan Sekarang</a>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-12 mb-20">
            <div class="card">
                <div class="card-header"><b>Cetak Banner</b></div>
                <div class="card-body">
                    <img src="https://s3-alpha-sig.figma.com/img/2d39/df56/f43dcfa0885fc87135f4e63c79c0ae87?Expires=1698624000&Signature=gZBAEyPxoniKVdQCKACZgfBBJwQGpDnYGD9oUP1WJHRrzJaGOYbXmzwUORk03zOp4S6rxkUYn-wyuVu0F9TlHP7-SkHMstze2uejmw-NrPwu-gbET0Q-4EPqDqc5yDBXCzHSf8FUM-ds0GwCnx-lfosPsXKV8CHFZZyaM350N7NjXcG0MU-R26DAoAV-1vLxWdHayjZQwHn7NZFxqVTH7oj6vuEqhGBU8j78cBLZEfQXC4J1jgWeW~taRNjBwmr2lJZ6AuVDlWK9wM~lGWuY7gv0rBus6XcktS39cWVdTXBb3m-E26V~2GncWVxos4G7qHPGEYn~fXYC3YzmP55HNg__&Key-Pair-Id=APKAQ4GOSFWCVNEHN3O4"
                        class="card-img-top" alt="Banner" style="border-radius: 10px;">
                    <h5 class="card-title" style="margin-top: 10px;">Rp. 120.000/meter</h5>
                    <p class="card-text">Cetak banner custom dengan harga terjangkau.</p>
                    <a href="#" class="btn btn-primary">Pesan Sekarang</a>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-12 mb-20">
            <div class="card">
                <div class="card-header"><b>Cetak Poster A3</b></div>
                <div class="card-body">
                    <img src="https://s3-alpha-sig.figma.com/img/2764/6788/271455b8a3156a71a3a159bd8dab6b01?Expires=1698624000&Signature=leBvjNgJk96edl3a3BDI8MH1HFSpTQ-02M9ehoLNAN00IHLasxad382WEJ5drDSRt5kkH2YnB2jf8aBwp7R~oSzmxBOUQcrHn11zrJa-iIL1acmgSmhdoUaZ3UBTnq-MhuigENZ02~W8Wot6kKlw7K47uYNKQtgadIbldrQFR3Q7hOZYatlrsQq9pC~AlLJK8kRf2I4ZntMdTgcJVxuWNtSgjxg7LWLt8W39wYUkgTqG0BygGhyVAr5ZLFz5pmDYBRMgkIdLGyM4Fs5APkIpgu0oJrg~FlChviOOREDHoZH0LUZRah7OR~JIw~IbENdrlbySl1MkhrNRsUYtzmNabQ__&Key-Pair-Id=APKAQ4GOSFWCVNEHN3O4"
                        class="card-img-top" alt="Poster" style="border-radius: 10px;">
                    <h5 class="card-title" style="margin-top: 10px;">Rp. 5.000/poster</h5>
                    <p class="card-text">Cetak poster custom dengan harga terjangkau.</p>
                    <a href="#" class="btn btn-primary">Pesan Sekarang</a>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-12 mb-20">
            <div class="card">
                <div class="card-header"><b>Cetak Kartu Nama</b></div>
                <div class="card-body">
                    <img src="https://s3-alpha-sig.figma.com/img/cd59/93c6/9e4c41846e4bbcdf57e0018e16a15cb7?Expires=1698624000&Signature=M7mdrXi-IlX3To~ah6V2SSbI-gkPdHKGWq3U3mbAUTVP7yibRJZDCll0N7u5SxlpCUvrGKkuZupWl8ALtX1ObXcQPlc367uzYSs8~k2JeZb65VDz7yUlNSJWEGYjyPsHO73kjicNJV1P75MDBxFy33TEqN80JeJOxglv7~pL3Xv92~I0Gl54f~51By6uUcKpfzQaoGFazlFMBUmE2yh5Y6HQzPSRUlz1Zn34W0tPCb8DfKKd1Y2dsNtv1G3FSgNjeS0wlvkC66uSnUcC5hv4~CvXlE3inhpF9Mr5eyuPnMIoU6maiCJz3510eh91nh-~Gj1QZke85DcLFCfL0iwNIg__&Key-Pair-Id=APKAQ4GOSFWCVNEHN3O4"
                        class="card-img-top" alt="Kartu Nama" style="border-radius: 10px;">
                    <h5 class="card-title" style="margin-top: 10px;">Rp. 5.000/kartu</h5>
                    <p class="card-text">Cetak kartu nama custom dengan harga terjangkau.</p>
                    <a href="#" class="btn btn-primary">Pesan Sekarang</a>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-12 mb-20">
            <div class="card">
                <div class="card-header"><b>Cetak Undangan Pernikahan</b></div>
                <div class="card-body">
                    <img src="https://s3-alpha-sig.figma.com/img/d574/bee4/4f6d96701b7b00b97bf3fbd025546888?Expires=1698624000&Signature=jvtlBvfQlHeHFu5DwOcoapQV4JjWZlSIG801-dGYh~Z4UxDUXJod-9Lgt7Fz8xm1I6M8bGwNiuSggoLiXHRBiM-V-dDOLjVRMrY6zYC2Oxu4mxDUZyRWKiXiayM1gv88zDDcHcGMM8PjM-sIovCwJYafTgbE9Zkdf-Cz-z4h5b4bWP1sCetwMZwEK8R9bIRWT~017BktkKffROVMkeYjh0N7DeW6w8-e2XVxZuxAw4KzMzxCY6AhBxpzhiYRxbsBOdcuajR4HfaVnTwL1SdDqAWKaPO2BPaqBVOiiTFTe7divnywJmHwJQJslvwThTa7wVd-RAvOh2PdWPjtKW-wGA__&Key-Pair-Id=APKAQ4GOSFWCVNEHN3O4"
                        class="card-img-top" alt="Undangan Pernikahan" style="border-radius: 10px;">
                    <h5 class="card-title" style="margin-top: 10px;">Rp. 5.000/lembar</h5>
                    <p class="card-text">Cetak undangan pernikahan anda custom dengan harga terjangkau.</p>
                    <a href="#" class="btn btn-primary">Pesan Sekarang</a>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-12 mb-20">
            <div class="card">
                <div class="card-header"><b>Cetak Sticker</b></div>
                <div class="card-body">
                    <img src="https://s3-alpha-sig.figma.com/img/427f/8ad3/e0489c7ed2d1f1a41305b5528c83a364?Expires=1698624000&Signature=VFYKUVTJajp1aAZjhshZaJKZ1Rt4hlD2VeXJ1yCP4f9JATTPJ~TrFwMBRenfqfnMgxE2jJyQmxyybOqXAvYbInnFNQ-Zavz6Y7IzRLhGkErJ7ZaV2tUYKrLeeFqRRORXhPMz51vuxy07wuE7XpaPB8C9OByreAQ72uwpmQ2~Sngp-iFN9os~EW1xRHVYC9MLqIhwGTPbzuK6nXV7mf5Zvo6Bt2q3ac6X~OnBzKVVcNrVCBVlSNKikHJkQoI8-HVe26zD444o2m1-RGBTEHOvVkZixFVB2D7pl1iNgNqNmUM~bCqRxKBWGPiGAJAFK2yd-sejLG-vfCOF~d~6Kh~OCw__&Key-Pair-Id=APKAQ4GOSFWCVNEHN3O4"
                        class="card-img-top" alt="Kartu Nama" style="border-radius: 10px;">
                    <h5 class="card-title" style="margin-top: 10px;">Rp. 1000/sticker</h5>
                    <p class="card-text">Cetak sticker custom dengan harga terjangkau.</p>
                    <a href="#" class="btn btn-primary">Pesan Sekarang</a>
                </div>
            </div>
        </div>
    </div>
@endsection
