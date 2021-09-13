<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="alert alert-dark" role="alert">
        <?= $judul ?>
    </div>

    <div class="panel-body" style="overflow-x: scroll; overflow-y:auto">
        <!-- <?= $this->session->flashdata('surat_siswa'); ?> -->
        <p class="text-center"><strong>AKHIR TAHUN AJARAN 2020/2021</strong></p>
        <table class="table table-striped table-bordered table-hover">
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Hari</th>
                    <th>Jam</th>
                    <th>Kelas</th>
                    <th>Mata Pelajaran</th>
                </tr>
            </thead>

            <tbody>
                <?php
                foreach ($jadwal_g as $key => $value) {
                ?>
                    <tr>
                        <td><?= $value->nama ?></td>
                        <td><?= $value->hari_g ?></td>
                        <td><?= $value->jam_g ?></>
                        <td><?= $value->kelas_g ?></>
                        <td><?= $value->mapel_g ?></>
                        </td>
                    </tr>
                <?php }  ?>
            </tbody>
        </table>
    </div>
</div>
<!-- /.container-fluid -->
</div>
<!-- End of Main Content -->