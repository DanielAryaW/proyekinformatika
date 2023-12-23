@extends('back.layout-pemilik.pages-layout')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Home')
@section('content')
    <div class="title pb-20">
        <h2 class="h3 mb-0">Printwork Overview</h2>
    </div>
    <div class="row pb-10">
        <div class="col-xl-3 col-lg-3 col-md-6 mb-20">
            <div class="card-box height-100-p widget-style3">
                <div class="d-flex flex-wrap">
                    <div class="widget-data">
                        <div class="weight-700 font-24 text-dark">{{ \App\Models\Jasa::count() }}</div>
                        <div class="font-14 text-secondary weight-500">
                            Total Jasa
                        </div>
                    </div>
                    <div class="widget-icon">
                        <div class="icon" data-color="#00eccf" style="color: rgb(0, 236, 207);">
                            <i class="icon-copy dw dw-calendar1"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Tampilan Blade -->
        <div class="col-xl-3 col-lg-3 col-md-6 mb-20">
            <div class="card-box height-100-p widget-style3">
                <div class="d-flex flex-wrap">
                    <div class="widget-data">
                        <div class="weight-700 font-24 text-dark">{{ \App\Models\Pesanan::count() }}</div>
                        <div class="font-14 text-secondary weight-500">
                            Total Pengerjaan
                        </div>
                    </div>
                    <div class="widget-icon">
                        <div class="icon" data-color="#ff5b5b" style="color: rgb(255, 91, 91);">
                            <span class="icon-copy ti-settings"></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-3 col-md-6 mb-20">
            <div class="card-box height-100-p widget-style3">
                <div class="d-flex flex-wrap">
                    <div class="widget-data">
                        <div class="weight-700 font-24 text-dark">{{ \App\Models\Client::count() }}</div>
                        <div class="font-14 text-secondary weight-500">
                            Total Pengguna
                        </div>
                    </div>
                    <div class="widget-icon">
                        <div class="icon">
                            <i class="icon-copy fa fa-user" aria-hidden="true"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Tampilan Blade -->
        <div class="col-xl-3 col-lg-3 col-md-6 mb-20">
            <div class="card-box height-100-p widget-style3">
                <div class="d-flex flex-wrap">
                    <div class="widget-data">
                        <div class="weight-700 font-24 text-dark">Rp. {{ number_format($totalPendapatan, 0, ',', '.') }}
                        </div>
                        <div class="font-14 text-secondary weight-500">Uang masuk</div>
                    </div>
                    <div class="widget-icon">
                        <div class="icon" data-color="#09cc06" style="color: rgb(9, 204, 6);">
                            <i class="icon-copy fa fa-money" aria-hidden="true"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-12 mb-20">
            <div class="card-box">
                <h2 class="h4 mb-20">Grafik Pesanan Harian</h2>
                <canvas id="pesananChart" height="100"></canvas>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <!-- Script Chart.js -->
    <script>
        // Data dari server (contoh, gantilah dengan data sebenarnya)
        var dataPesanan = {
            labels: ["Hari 1", "Hari 2", "Hari 3", "Hari 4", "Hari 5"],
            datasets: [{
                label: "Jumlah Pesanan",
                backgroundColor: "rgba(0, 123, 255, 0.5)",
                borderColor: "rgba(0, 123, 255, 1)",
                borderWidth: 1,
                data: [5, 8, 15, 10, 20],
            }]
        };

        // Pengaturan grafik
        var options = {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        };

        // Ambil elemen canvas
        var ctx = document.getElementById('pesananChart').getContext('2d');

        // Inisialisasi grafik
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: dataPesanan,
            options: options
        });
    </script>
@endsection
