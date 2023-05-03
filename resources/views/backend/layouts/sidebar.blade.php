<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

<ul class="sidebar-nav" id="sidebar-nav">

  <li class="nav-item">
    <a class="nav-link" href="{{ url('dashboard')}}">
      <i class="bi bi-grid"></i>
      <span>Dashboard</span>
    </a>
  </li><!-- End Dashboard Nav -->

  <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#icons-nav" data-bs-toggle="collapse" href="#">
        <i class="bi bi-journal-text"></i><span>Laporan</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="icons-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{ url('laporanmasuk')}}">
              <i class="bi bi-circle"></i><span>Laporan Masuk</span>
            </a>
          </li>
          <li>
            <a href="{{ url('laporan')}}">
              <i class="bi bi-circle"></i><span>Laporan Selesai</span>
            </a>
          </li>
        </ul>
      </li><!-- End Icons Nav -->

  <li class="nav-item">
  <a class="nav-link collapsed" href="{{ url('berita')}}">
      <i class="bi bi-layout-text-window-reverse"></i><span>Berita</span>
    </a>
  </li><!-- End Tables Nav -->

  <li class="nav-item">
  <a class="nav-link collapsed" href="{{ url('edukasi')}}">
      <i class="bi bi-book"></i><span>Edukasi</span>
    </a>
  </li><!-- End Charts Nav -->

  <li class="nav-item">
    <a class="nav-link collapsed" href="{{ url('pengaturan')}}">
      <i class="bi bi-gear"></i>
      <span>Pengaturan</span>
    </a>
  </li><!-- End Profile Page Nav -->

  <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-bs-toggle="modal" data-bs-target="#largeModalLog">
    <i class="bi bi-box-arrow-right"></i>
      <span>Keluar</span>
    </a>
  </li><!-- End Profile Page Nav -->

</ul>


</aside><!-- End Sidebar-->