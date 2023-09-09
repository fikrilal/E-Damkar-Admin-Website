<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>{{ $title ?? config('app.name') }}</title>
  <meta content="" name="description">
  <meta content="" name="keywords">
 <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Favicons -->
  <link href="{{ asset('frontend2/assets/img/logobolo.png')}}" rel="icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ asset('backend/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('backend/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
  <link href="{{ asset('backend/assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
  <link href="{{ asset('backend/assets/vendor/quill/quill.snow.css') }}" rel="stylesheet">
  <link href="{{ asset('backend/assets/vendor/quill/quill.bubble.css') }}" rel="stylesheet">
  <link href="{{ asset('backend/assets/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
  <link href="{{ asset('backend/assets/vendor/simple-datatables/style.css') }}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{ asset('backend/assets/css/style.css') }}" rel="stylesheet">

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

  <!-- =======================================================
  * Template Name: NiceAdmin
  * Updated: Mar 09 2023 with Bootstrap v5.2.3
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="/dashboard" class="logo d-flex align-items-center">
        <img src="/" alt="">
        <span class="d-none d-lg-block">E-DAMKAR Nganjuk</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->

    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">

        <li class="nav-item dropdown">

        <li class="nav-item dropdown pe-3">

    <li class="nav-item dropdown">

<a class="nav-link nav-icon" href="/laporanmasuk">
  <i class="bi bi-bell"></i>
  <div id="data-container">
  <span class="badge bg-primary badge-number"><span id="laporan-masuk"></span>

  <script>
    var audio1 = new Audio('{{ route("audio-kategori1") }}'); // Ganti dengan path audio untuk kategori 1
    var audio2 = new Audio('{{ route("audio-kategori2") }}'); // Ganti dengan path audio untuk kategori 2

    var lastNotificationCount = 0;

    function playAudio(audio) {
        audio.pause();
        audio.currentTime = 0; // Mengatur posisi audio ke awal
        audio.play();
    }

    function updateLaporanMasukCount() {
        $.ajax({
            url: '/api/get-laporan-masuk',
            method: 'GET',
            success: function(data) {
                $('#laporan-masuk').text(data.count);
		console.log(data.count);
                if (data.count > 0 && data.count != lastNotificationCount ) {
                    // Notifikasi baru masuk, putar audio berdasarkan kategori
                    lastNotificationCount = data.count;
  			$.ajax({
                        url: '/api/get-laporan-kategori', // Endpoint untuk mengambil kategori laporan
                        method: 'GET',
                        success: function(data) {
console.log(data.kategori);
                             if (data.kategori == '1') {
				console.log("ada audio kategori1");
                                playAudio(audio1);
                            } else {
				console.log("ada audio kategori 2");
                                playAudio(audio2);
                            }
                        }
                    });                
}
            },
            complete: function() {
                // Melanjutkan polling setelah permintaan selesai (rekursif)
                setTimeout(updateLaporanMasukCount, 1000); // Contoh: update setiap 1 detik (1000 milidetik)
            }
        });
    }

    // Memanggil fungsi updateLaporanMasukCount() untuk memulai polling
    updateLaporanMasukCount();
	
</script>



    </div>
</a><!-- End Notification Icon -->


</li>
          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
		<i class="bi bi-person-circle"></i>
                       <span class="d-none d-md-block dropdown-toggle ps-2">{{ Auth::user()->nama_lengkap }}</span>
          </a><!-- End Profile Iamge Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
              <h6>{{ Auth::user()->nama_lengkap }}</h6>
              <span>
                @php
                $kedudukans_id = Auth::user()->kedudukans_id;

                if ($kedudukans_id == 1) {
                    echo "SuperAdmin";
                } elseif ($kedudukans_id == 2) {
                    echo "Admin";
                } else {
                    echo "Peran tidak ditemukan";
                }
                @endphp
            </span>

            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
            <a class="dropdown-item d-flex align-items-center" href="#"  data-bs-toggle="modal" data-bs-target="#myModalinfo">
              <i class="bi bi-person"></i>
              <span>Pengaturan Profil</span>
            </a>

            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="#" data-bs-toggle="modal" data-bs-target="#largeModalLog">
                <i class="bi bi-box-arrow-right"></i>
                <span>Keluar</span>
              </a>
            </li>

          </ul><!-- End Profile Dropdown Items -->
        </li><!-- End Profile Nav -->

      </ul>
    </nav><!-- End Icons Navigation -->

  </header><!-- End Header -->

  @include('backend/layouts.sidebar')

  @yield('content')

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    <div class="copyright">
      &copy; Copyright <strong><span>E-Damkar Nganjuk</span></strong>. All Rights Reserved
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="{{ asset('backend/assets/vendor/apexcharts/apexcharts.min.js') }}"></script>
  <script src="{{ asset('backend/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('backend/assets/vendor/chart.js/chart.umd.js') }}"></script>
  <script src="{{ asset('backend/assets/vendor/echarts/echarts.min.js') }}"></script>
  <script src="{{ asset('backend/assets/vendor/quill/quill.min.js') }}"></script>
  <script src="{{ asset('backend/assets/vendor/simple-datatables/simple-datatables.js') }}"></script>
  <script src="{{ asset('backend/assets/vendor/tinymce/tinymce.min.js') }}"></script>
  <script src="{{ asset('backend/assets/vendor/php-email-form/validate.js') }}"></script>

  <!-- Template Main JS File -->
  <script src="{{ asset('backend/assets/js/main.js') }}"></script>


<!-- Tampilan Modal -->
<div class="modal fade" id="myModalinfo" tabindex="-1">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Pengaturan Profil</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                          <!-- Bagian body modal -->
                  <div class="modal-body">
                    <form>
                    <div class="row mb-3">
                    <label for="inputText" class="col-sm-2 col-form-label"><strong>Nama:</strong></label>
                    <div class="col-sm-10">
                      <p>{{ Auth::user()->nama_lengkap }}</p>
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="inputText" class="col-sm-2 col-form-label"><strong>Email:</strong></label>
                    <div class="col-sm-10">
                      <p>{{ Auth::user()->email }}</p>
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="inputText" class="col-sm-2 col-form-label"><strong>No HP:</strong></label>
                    <div class="col-sm-10">
                      <p>{{ Auth::user()->noHp }}</p>
                    </div>
                  </div>
                    </form>
                  </div>
      <!-- Bagian footer modal -->
      <div class="modal-footer">

        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
        <button type="submit" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModalinfoupdate">Update</button>
      </div>
                    </div>
                </div>
            </div>


<!-- Tampilan Modal -->
<div class="modal fade" id="myModalinfoupdate" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Update Profil</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <!-- Bagian body modal -->
      <div class="modal-body">
        <form method="POST" action="{{ route('pengaturan.updateprofil') }}" enctype="multipart/form-data">
          @csrf

                <input type="hidden" name="id" value="{{ Auth::user()->id }}">
      <div class="row mb-3">
        <label for="inputText" class="col-sm-2 col-form-label"><strong>Nama*</strong></label>
        <div class="col-sm-10">
          <input type="text" name="nama_lengkap" id="nama_lengkap" value="{{ Auth::user()->nama_lengkap }}"
            class="form-control" required>
        </div>
      </div>

      <div class="row mb-3">
        <label for="inputText" class="col-sm-2 col-form-label"><strong>Email*</strong></label>
        <div class="col-sm-10">
          <input type="email" name="email" id="email" value="{{ Auth::user()->email }}"
            class="form-control" required>
        </div>
      </div>

      <div class="row mb-3">
        <label for="inputText" class="col-sm-2 col-form-label"><strong>No HP*</strong></label>
        <div class="col-sm-10">
          <input type="text" name="no_hp" id="no_hp" value="{{ Auth::user()->noHp }}"
            class="form-control" required>
        </div>
      </div>

      <div class="row mb-3">
        <label for="inputText" class="col-sm-2 col-form-label"><strong>Kata Sandi</strong></label>
        <div class="col-sm-10">
          <input type="password" name="password" id="password" class="form-control" >
        </div>
      </div>


          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
            <button type="submit" class="btn btn-primary">Simpan</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>



   <!-- Tampilan Modal -->
   <div class="modal fade" id="largeModalLog" tabindex="-1">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Konfirmasi Keluar</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form id="logout-form" action="{{ url('logout') }}" method="POST">
                          @csrf
                          <div class="modal-body">
                              <p>Apakah Anda yakin ingin keluar halaman admin?</p>
                          </div>
                          <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tidak</button>
                              <button type="submit" class="btn btn-primary">Keluar</button>
                          </div>
                      </form>
                    </div>
                </div>
            </div>



          

</body>

</html>