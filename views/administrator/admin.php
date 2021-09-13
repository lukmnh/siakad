<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="alert alert-success" role="alert">
        <i class="fas fa-fw fa-tachometer-alt"></i> Dashboard
    </div>

    <div class="alert alert-success" role="alert">
        <h4 class="alert-heading">Dashboard</h4>
        <p><strong> Selamat datang di Sistem Informasi Akademik SDN MEKAR BAKTI 1</strong></p>
        <p>Dashboard halaman admin menampilkan data data akademik pada Sekolah Dasar Negeri Mekar Bakti 1</p>
        <br>
        <br>
        <br>
        <div class="card-group">
            <div class="card bg-info">
                <div class="card-body text-xl-center">
                    <h5 class="card-title font-weight-bold"><i class="fas fa-users">Data Users</i></h5>
                    <a class="card-text text-black-50">
                        <font size="5"><?= $jml_users ?></font>
                    </a>
                </div>
            </div>
            <div class="card bg-info">
                <div class="card-body text-xl-center">
                    <h5 class="card-title font-weight-bold"><i class="fas fa-chalkboard-teacher">Data Guru</i></h5>
                    <a class="card-text text-black-50">
                        <font size="5"><?= $jml_guru ?></font>
                    </a>
                </div>
            </div>
            <div class="card bg-info">
                <div class="card-body text-xl-center">
                    <h5 class="card-title font-weight-bold"><i class="fas fa-user-graduate">Data Siswa</i></h5>
                    <a class="card-text text-black-50">
                        <font size="5"><?= $jml_siswa ?></font>
                    </a>
                </div>
            </div>
        </div>
        <br>
        <br>
        <br>
        <hr>
    </div>
    <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->