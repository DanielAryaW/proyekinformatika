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
                                        Cetak Amplop
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


            {{-- Larges modals Cetak Banner --}}
            <div class="col-lg-4 col-md-12 mb-20">
                <div class="pd-20 card-box height-100-p">
                    <div class="card-header" style="border-radius: 10px 10px 0px 0px;"><b>Cetak Banner</b></div>
                    <a href="#" class="btn-block" data-toggle="modal" data-target="#bd-example-modal-lg"
                        type="button">
                        <img src="https://s3-alpha-sig.figma.com/img/2d39/df56/f43dcfa0885fc87135f4e63c79c0ae87?Expires=1698624000&Signature=gZBAEyPxoniKVdQCKACZgfBBJwQGpDnYGD9oUP1WJHRrzJaGOYbXmzwUORk03zOp4S6rxkUYn-wyuVu0F9TlHP7-SkHMstze2uejmw-NrPwu-gbET0Q-4EPqDqc5yDBXCzHSf8FUM-ds0GwCnx-lfosPsXKV8CHFZZyaM350N7NjXcG0MU-R26DAoAV-1vLxWdHayjZQwHn7NZFxqVTH7oj6vuEqhGBU8j78cBLZEfQXC4J1jgWeW~taRNjBwmr2lJZ6AuVDlWK9wM~lGWuY7gv0rBus6XcktS39cWVdTXBb3m-E26V~2GncWVxos4G7qHPGEYn~fXYC3YzmP55HNg__&Key-Pair-Id=APKAQ4GOSFWCVNEHN3O4"
                            alt="modal" style="border-radius: 0px 0px 10px 10px;" />
                    </a>
                    <h5 class="card-title" style="margin-top: 10px;">Rp. 120.000/meter</h5>
                    <p class="card-text">Cetak Banner custom dengan harga terjangkau.</p>

                    <div class="modal fade bs-example-modal-lg" id="bd-example-modal-lg" tabindex="-1" role="dialog"
                        aria-labelledby="myLargeModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg modal-dialog-centered">
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
                                    <img src="https://s3-alpha-sig.figma.com/img/7ffa/a056/e38f56c360ed0ebbd0a60328a7521e56?Expires=1698624000&Signature=ik~ZlO1EQoyNxP7ciwTeCxvMNJlrNvOlcyakldOYtHb4KV5O5rBjIohkEz~IjOcF9oCabbeV2jr2mLtOX4Co7MqzJqaqhE-a7vQQta2IeersZoCqkrPFSn-mfDKBxaFj-gJvKDWNSwXJitdWXWcJx4DyNFQqvW4XlW1DGW1f6bu87ljlm6DmNME49tqXITNt15DtenofC5JyDn5q3RqGQMfCgtPcT0Udnop~tIv~ayTCSoWx0ssoeupW5i3KywhSufwJ72P4YyF9zf8RJUcbd49ZLq31~0DADcNUrqFP0eXgdFbDnieBkxq2Duin5ofOjiK03ePf~aAMurI~kfqMpw__&Key-Pair-Id=APKAQ4GOSFWCVNEHN3O4"
                                        class="card-img-top" alt="Dua amplop putih"
                                        style="border-radius: 10px; max-width: 300px;">
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

        </div>
    </div>
@endsection
