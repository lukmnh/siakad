<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="alert alert-success" role="alert">
        <i class="fas fa-fw fa-tachometer-alt"></i> <?= $judul ?>
    </div>

    <div class="alert alert-success" role="alert">
        <h4 class="alert-heading">Selamat Datang</h4>
        <p>Selamat datang di Sistem Informasi Akademik SDN MEKAR BAKTI 1</strong></p>
        <a>Siswa dengan username <?= $this->session->userdata('username'); ?> telah login. </a>
        <hr>
        <p>Dalam Halaman Guru Kamu Hanya Bisa Mengedit Biodata, Melihat Jadwal Mengajar, Meninput Nilai Siswa, Mengedit nilai Siswa, Menghapus nilai siswa dan melihat Username pada Siswa</p>
    </div>

    <!-- Button trigger modal -->

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->