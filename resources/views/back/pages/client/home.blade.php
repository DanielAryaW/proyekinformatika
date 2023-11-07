@extends('back.layout-client.pages-layout')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Home')
@section('content')
    <div class="Logo"
        style="width: 100%; height: 100%; padding: 20px 18px 20px 14px; background: #2156C2; display: flex; justify-content: center; align-items: center; gap: 10px; border-radius: 20px">
        <img src="https://s3-alpha-sig.figma.com/img/3919/6768/800b71c29b2a4443e4df0addc59c09ba?Expires=1698019200&Signature=mtf6~C3HgV-1Tzr7mbxJRgpqWfTEKrafOf5R2vNVx4HrwggcNRI~Vcv1AD-Qf9YXYWS4Qxyy9GMxvVqRFRFMdAPfywZQfukr7R14~Lb2oEnt~mIEI6aa2DdLzGtcAS91H98Md7SqD5P~VtgpjZrUbu2N6Szr4DNczXqErFXauGikoNocMqHd3RntgkSrsTpeQfnnuADeqWwd620RqV8WEeAxVL5zAv1zfMX5QEbEh2NaC52yh0YrAy-ba3CweFNges84v4zrdd6Jybhso8BvzeCvdrVVF4JiYSjwGw0zBjhGKmgDxEF7MT0amxUE~ycp811MJsiVIZl~6r8wtr0TmA__&Key-Pair-Id=APKAQ4GOSFWCVNEHN3O4"
            class="Logo" style="width: 421px; height: 137px; border-radius: 8px;"
            src="https://via.placeholder.com/421x137" />
    </div>

    <div class="Description" style="padding: 20px;">
        <h2
            style="color: #fff; font-size: 24px; font-family: 'Helvetica', sans-serif; font-weight: 700; line-height: 32px; background: linear-gradient(90deg, #2156C2, #ffffff); padding: 10px 20px; border-radius: 20px 40px;">
            Tentang Kami
        </h2>
        <ul
            style="font-family: 'Helvetica', sans-serif; font-size: 18px; font-weight: 400; line-height: 28px; text-align: Justify; text-indent: 30px; margin-top: 20px;">
            Printwork adalah platform percetakan online yang berbasis di Yogyakarta. Diluncurkan pada tahun 2023, Printwork
            berkomitmen untuk memberikan pengalaman percetakan online yang mudah, aman, dan cepat bagi pelanggan. Kami
            menggabungkan inovasi teknologi dengan pelayanan pelanggan yang berkualitas.
        </ul>
        <br>
        <h2
            style="color: #fff; font-size: 24px; font-family: 'Helvetica', sans-serif; font-weight: 700; line-height: 32px; background: linear-gradient(90deg, #2156C2, #ffffff); padding: 10px 20px; border-radius: 20px 40px;">
            Visi dan Misi
        </h2>
        <p
            style="font-family: 'Helvetica', sans-serif; font-size: 18px; font-weight: 400; line-height: 28px; text-indent: 30px; margin-top: 20px;">
            <strong>Visi:</strong>
        </p>
        <ul style="list-style-type: disc; padding-left: 50px;">
            <li style="font-family: 'Helvetica', sans-serif; font-size: 18px; font-weight: 400; line-height: 28px;">
                Menjadi platform percetakan online terdepan di Indonesia yang memberikan kemudahan dan kualitas.
            </li>
        </ul>
        <br>
        <p
            style="font-family: 'Helvetica', sans-serif; font-size: 18px; font-weight: 400; line-height: 15px; text-indent: 30px;">
            <strong>Misi:</strong>
        </p>
        <ul style="list-style-type: disc; padding-left: 50px;">
            <li style="font-family: 'Helvetica', sans-serif; font-size: 18px; font-weight: 400; line-height: 28px;">
                Memberikan layanan percetakan online yang dapat diakses dengan nyaman dan fleksibel.</li>
            <li style="font-family: 'Helvetica', sans-serif; font-size: 18px; font-weight: 400; line-height: 28px;">
                Menghemat waktu dan biaya pelanggan melalui pemesanan online yang efisien.</li>
            <li style="font-family: 'Helvetica', sans-serif; font-size: 18px; font-weight: 400; line-height: 28px;">
                Menyediakan berbagai pilihan produk, ukuran, desain, dan harga secara langsung.</li>
        </ul>
        <br>
        <h2
            style="color: #fff; font-size: 24px; font-family: 'Helvetica', sans-serif; font-weight: 700; line-height: 32px; background: linear-gradient(90deg, #2156C2, #ffffff); padding: 10px 20px; border-radius: 20px 40px;">
            Nilai-Nilai Kami
        </h2>
        <ul style="list-style-type: disc; padding-left: 50px; margin-top: 20px;">
            <li style="font-family: 'Helvetica', sans-serif; font-size: 18px; font-weight: 400; line-height: 28px;">
                Kualitas: Kami berkomitmen untuk memberikan percetakan berkualitas tinggi.</li>
            <li style="font-family: 'Helvetica', sans-serif; font-size: 18px; font-weight: 400; line-height: 28px;">Inovasi:
                Kami terus mengembangkan layanan kami dengan teknologi terbaru.</li>
            <li style="font-family: 'Helvetica', sans-serif; font-size: 18px; font-weight: 400; line-height: 28px;">
                Pelayanan Pelanggan: Keinginan pelanggan adalah yang utama bagi kami.</li>
        </ul>
        <br>
        <!-- Carousel Section -->
        <h2
            style="color: #fff; font-size: 24px; font-family: 'Helvetica', sans-serif; font-weight: 700; line-height: 32px; background: linear-gradient(90deg, #2156C2, #ffffff); padding: 10px 20px; border-radius: 20px 40px;">
            Galeri Kami
        </h2>
        <div class="Carousel" style="display: flex; flex-direction: column; align-items: center;">
            <br>
            <div class="col-md-6 col-lg-9">
                <div id="carouselExampleIndicators" class="carousel slide mx-auto" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner" style="border-radius: 10px;">
                        <div class="carousel-item active">
                            <img class="d-block w-100" src="/back/vendors/images/img3.jpg" alt="First slide">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block w-100" src="/back/vendors/images/img4.jpg" alt="Second slide">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block w-100" src="/back/vendors/images/img5.jpg" alt="Third slide">
                        </div>
                    </div>
                    <a class="carousel-control-prev text-center" href="#carouselExampleIndicators" role="button"
                        data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next text-center" href="#carouselExampleIndicators" role="button"
                        data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
