<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-secondary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('h_siswa') ?>">
        <div class="sidebar-brand-icon">
            <i class="fas fa-school"></i>
        </div>
        <div class="sidebar-brand-text mx-1">SDN MEKAR BAKTI 1</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Administrator
    </div>

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="<?= base_url('h_siswa') ?>">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>



    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Siswa
    </div>

    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('lihat_siswa') ?>">
            <i class="fas fa-3x fa-user-graduate"></i>
            <span>Biodata Siswa</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('jadwal_hs') ?>">
            <i class="fas fa-calendar-alt"></i></i>
            <span>Jadwal Siswa</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('nilai_siswa'); ?>">
            <i class="fas fa-book-reader"></i>
            <span>Data Nilai</span></a>
    </li>
    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('auth/logout'); ?>">
            <i class="fas fa-fw fa-sign-out-alt"></i>
            <span>Logout</span></a>
    </li>


</ul>
<!-- End of Sidebar -->