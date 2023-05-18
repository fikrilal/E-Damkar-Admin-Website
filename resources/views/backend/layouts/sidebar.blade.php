<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

<ul class="sidebar-nav" id="sidebar-nav">

  <li class="nav-item">
    <a class="nav-link collapsed <?php echo (Request::is('dashboard')) ? 'active' : ''; ?>" href="{{ url('dashboard')}}">
        <i class="bi bi-grid"></i>
        <span>Dashboard</span>
    </a>
</li><!-- End Dashboard Nav -->

<li class="nav-item <?php echo (Request::is('laporanmasuk') || Request::is('laporan')) ? 'active' : ''; ?>">
    <a class="nav-link collapsed" data-bs-target="#icons-nav" data-bs-toggle="collapse" href="#">
        <i class="bi bi-journal-text"></i><span>Laporan</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <ul id="icons-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
        <li>
            <a href="{{ url('laporanmasuk')}}" class="<?php echo (Request::is('laporanmasuk')) ? 'active' : ''; ?>">
                <i class="bi bi-circle"></i><span>Laporan Masuk</span>
            </a>
        </li>
        <li>
            <a href="{{ url('laporan')}}" class="<?php echo (Request::is('laporan')) ? 'active' : ''; ?>">
                <i class="bi bi-circle"></i><span>Laporan Selesai</span>
            </a>
        </li>
    </ul>
</li><!-- End Icons Nav -->


<li class="nav-item">
    <a class="nav-link collapsed <?php echo (Request::is('berita*')) ? 'active' : ''; ?>" href="{{ url('berita')}}">
        <i class="bi bi-layout-text-window-reverse"></i><span>Berita</span>
    </a>
</li><!-- End Tables Nav -->

<li class="nav-item">
    <a class="nav-link collapsed <?php echo (Request::is('edukasi*')) ? 'active' : ''; ?>" href="{{ url('edukasi')}}">
        <i class="bi bi-book"></i><span>Edukasi</span>
    </a>
</li><!-- End Charts Nav -->

<li class="nav-item">
    <a class="nav-link collapsed <?php echo (Request::is('agenda*')) ? 'active' : ''; ?>" href="{{ url('agenda')}}">
        <i class="bi bi-calendar-event"></i><span>Agenda</span>
    </a>
</li><!-- End Charts Nav -->
@if($kedudukans_id == 1)
    <li class="nav-item">
        <a class="nav-link collapsed <?php echo (Request::is('pengaturan*') || Request::is('kelolaadmin*')) ? 'active' : ''; ?>" data-bs-target="#icons-setting" data-bs-toggle="collapse" href="#">
            <i class="bi bi-gear"></i><span>Pengaturan</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="icons-setting" class="nav-content collapse" data-bs-parent="#sidebar-nav">
            <li>
                <a href="{{ url('pengaturan')}}" class="<?php echo (Request::is('pengaturan*')) ? 'active' : ''; ?>">
                    <i class="bi bi-circle"></i><span>Data</span>
                </a>
            </li>
            <li>
                <a href="{{ url('kelolaadmin')}}" class="<?php echo (Request::is('kelolaadmin*')) ? 'active' : ''; ?>">
                    <i class="bi bi-circle"></i><span>Admin</span>
                </a>
            </li>
        </ul>
    </li><!-- End Icons Nav -->
@elseif($kedudukans_id == 2)
    <li class="nav-item">
        <a class="nav-link collapsed <?php echo (Request::is('pengaturan*')) ? 'active' : ''; ?>" href="{{ url('pengaturan')}}">
            <i class="bi bi-gear"></i>
            <span>Pengaturan</span>
        </a>
    </li><!-- End Profile Page Nav -->
@endif

<li class="nav-item">
    <a class="nav-link collapsed <?php echo (Request::is('logout')) ? 'active' : ''; ?>" href="#" data-bs-toggle="modal" data-bs-target="#largeModalLog">
        <i class="bi bi-box-arrow-right"></i>
        <span>Keluar</span>
    </a>
</li><!-- End Profile Page Nav -->


</ul>


</aside><!-- End Sidebar-->