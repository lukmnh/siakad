<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="alert alert-dark" role="alert">
        <?= $judul ?>
    </div>

    <div class="panel-body" style="overflow-x: scroll; overflow-y:auto">
        <?= $this->session->flashdata('surat_guru'); ?>
        <table class="table table-striped table-bordered table-hover">
            <thead>
                <tr>
                    <th>Nomor</th>
                    <th>Nomor Induk</th>
                    <th>Nama Guru</th>
                    <th>Tanggal Lahir</th>
                    <th>Tempat Lahir</th>
                    <th>Agama</th>
                    <th>Gender</th>
                    <th>Alamat</th>
                    <th>No. Telp</th>
                    <th>Pendidikan</th>
                    <th>Photo</th>
                    <th>Action</th>
                </tr>
            </thead>

            <tbody>
                <?php $id_guru = 1;
                foreach ($guru as $key => $value) {
                ?>
                    <tr>
                        <td><?= $id_guru++; ?></td>
                        <td><?= $value->nomor_induk ?></>
                        <td><?= $value->nama ?></td>
                        <td><?= $value->tanggal_lahir ?></td>
                        <td><?= $value->tempat_lahir ?></td>
                        <td><?= $value->agama ?></td>
                        <td><?= $value->jk ?></td>
                        <td><?= $value->alamat ?></td>
                        <td><?= $value->no_telp ?></td>
                        <td><?= $value->pendidikan ?></td>
                        <td><img src="<?= base_url('img/' . $value->img) ?>" width="80px;"></td>
                        <td>
                            <a href="<?= base_url('hdata_guru/edit/' . $value->id_guru) ?>" class="btn btn-sm btn-success"><i class="fas fa-edit"></i></a>
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