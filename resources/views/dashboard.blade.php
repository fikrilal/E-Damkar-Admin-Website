@extends('backend/layouts.template')
@section('content')

<main id="main" class="main">

    <div class="pagetitle">
        <h1>Dashboard</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="">Home</a></li>
                <li class="breadcrumb-item active">Dashboard</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    {{-- menampilkan error validasi --}}
    @if ($errors->any())
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <section class="section dashboard">
        <div class="row">

            <!-- Left side columns -->
            <div class="col-lg-12">
                <div class="row">

                    <!-- Sales Card -->
                    <div class="col-xxl-4 col-md-6">
                        <div class="card info-card sales-card">

                            <div class="filter">
                                <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                            </div>

                            <div class="card-body">
                                <h5 class="card-title">Laporan Masuk</h5>

                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-journal-text"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6>{{ $dataMasuk }}</h6>
                                        <span class="text-muted small pt-2 ps-1"><a href="/laporanmasuk">Cek Selengkapnya</span>
                                            <i class="bi bi-arrow-right-circle"></i></a>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div><!-- End Sales Card -->

                    <!-- Revenue Card -->
                    <div class="col-xxl-4 col-md-6">
                        <div class="card info-card revenue-card">

                            <div class="filter">
                                <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                            </div>

                            <div class="card-body">
                                <h5 class="card-title">Laporan Selesai</span></h5>

                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-journal-text"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6>{{ $dataSelesai }}</h6>
                                        <span class="text-muted small pt-2 ps-1"><a href="/laporan">Cek Selengkapnya</span>
                                            <i class="bi bi-arrow-right-circle"></i></a>

                                    </div>
                                </div>
                            </div>

                        </div>
                    </div><!-- End Revenue Card -->

                    <!-- Customers Card -->
                    <div class="col-xxl-4 col-xl-12">

                        <div class="card info-card customers-card">

                            <div class="filter">
                                <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                            </div>

                            <div class="card-body">
                                <h5 class="card-title">Total Berita</span></h5>

                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-layout-text-window-reverse"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6>{{ $totalBerita }}</h6>
                                        <span class="text-muted small pt-2 ps-1"><a href="/berita">Cek Selengkapnya</span>
                                            <i class="bi bi-arrow-right-circle"></i></a>

                                    </div>
                                </div>

                            </div>
                        </div>

                    </div><!-- End Customers Card -->

                    <!-- Reports -->
                      <div class="col-12">
                        <div class="card">
                            <div class="filter">
                                <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">Grafik Laporan Keseluruhan</span></h5>
                                <!-- Line Chart -->
                      <div id="reportsChart"></div>
                      <script>
    document.addEventListener("DOMContentLoaded", () => {
        var dataMasuk = {{ $dataMasuk }};
        var dataSelesai = {{ $dataSelesai }};
        var totalBerita = {{ $totalBerita }};
        var tanggalLaporanMasuk = @json($tanggalLaporanMasuk);
        var tanggalLaporanSelesai = @json($tanggalLaporanSelesai);
        var tanggalBerita = @json($tanggalBerita);

        // Convert date strings to JavaScript Date objects
        tanggalLaporanMasuk = tanggalLaporanMasuk.map(date => formatDate(date));
        tanggalLaporanSelesai = tanggalLaporanSelesai.map(date => formatDate(date));
        tanggalBerita = tanggalBerita.map(date => formatDate(date));

        function formatDate(date) {
            var d = new Date(date);
            var day = d.getDate();
            var month = d.getMonth() + 1;
            var year = d.getFullYear();
            return `${day < 10 ? '0' + day : day}-${month < 10 ? '0' + month : month}-${year}`;
        }

        // Get the last 7 days
        var currentDate = new Date();
        var daysOfWeek = [];
        for (var i = 6; i >= 0; i--) {
            var date = new Date(currentDate);
            date.setDate(date.getDate() - i);
            daysOfWeek.push(formatDate(date));
        }

        // Group data by day of the week
        var dataByDay = daysOfWeek.map((day, index) => {
            return {
                x: day,
                y: [
                    tanggalLaporanMasuk.filter(date => date === day).length,
                    tanggalBerita.filter(date => date === day).length,
                    tanggalLaporanSelesai.filter(date => date === day).length,
                    0
                ]
            };
        });

        new ApexCharts(document.querySelector("#reportsChart"), {
            series: [
                {
                    name: 'Laporan Masuk',
                    data: dataByDay.map(data => data.y[0]),
                },
                {
                    name: 'Laporan Selesai',
                    data: dataByDay.map(data => data.y[2]),
                },
                {
                    name: 'Berita',
                    data: dataByDay.map(data => data.y[1]),
                }
            ],
            chart: {
                height: 350,
                type: 'area',
                toolbar: {
                    show: false
                }
            },
            markers: {
                size: 4
            },
            colors: ['#4154f1', '#2eca6a', '#ff771d'],
            fill: {
                type: "gradient",
                gradient: {
                    shadeIntensity: 1,
                    opacityFrom: 0.3,
                    opacityTo: 0.4,
                    stops: [0, 90, 100]
                }
            },
            dataLabels: {
                enabled: true
            },
            stroke: {
                curve: 'smooth',
                width: 2
            },
            xaxis: {
                type: 'category',
                categories: daysOfWeek,
                labels: {
                    show: true
                }
            },
            tooltip: {
                x: {
                    format: 'dd-MM-yyyy'
                }
            }
        }).render();
    });
</script>


                      <!-- End Line Chart -->
                        </div>
                    </div>
                  </div><!-- End Reports -->
                </div>
            </div>
        </section>
    </main><!-- End #main -->

@endsection
