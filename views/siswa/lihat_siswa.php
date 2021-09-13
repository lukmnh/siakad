<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="alert alert-dark" role="alert">
        Data Siswa
    </div>

    <div class="panel-body" style="overflow-x: scroll; overflow-y:auto">
        <?= $this->session->flashdata('surat_siswa'); ?>
        <table class="table table-striped table-bordered table-hover">
            <thead>
                <tr>
                    <th>Nomor</th>
                    <th>Nomor Induk</th>
                    <th>Nama Siswa</th>
                    <th>Agama</th>
                    <th>Gender</th>
                    <th>Tanggal Lahir</th>
                    <th>Tempat Lahir</th>
                    <th>Alamat</th>
                    <th>No. Telp</th>
                    <th>Photo</th>
                    <th>Action</th>
                </tr>
            </thead>

            <tbody>
                <?php $id_siswa = 1;
                foreach ($siswa as $key => $value) {
                ?>
                    <tr>
                        <td><?= $id_siswa++; ?></td>
                        <td><?= $value->nomor_induk ?></>
                        <td><?= $value->nama ?></td>
                        <td><?= $value->agama ?></td>
                        <td><?= $value->jk ?></td>
                        <td><?= $value->tanggal_lahir ?></td>
                        <td><?= $value->tempat_lahir ?></td>
                        <td><?= $value->alamat ?></td>
                        <td><?= $value->no_telp ?></td>
                        <td><img src="<?= base_url('img_siswa/' . $value->img_siswa) ?>" width="80px;"></td>
                        <td>
                            <a href="<?= base_url('lihat_siswa/edit/' . $value->id_siswa) ?>" class="btn btn-sm btn-success"><i class="fas fa-edit"></i></a>
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