<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="alert alert-dark" role="alert">
        <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModal"><i fas fa-plus>Add</i></button>
    </div>

    <?= $this->session->flashdata('pesan_nilai'); ?>
    <div class="panel-body">
        <table class="table table-striped table-bordered table-hover">
            <thead>
                <tr>
                    <th>Nomor</th>
                    <th>Nama Siswa</th>
                    <th>Mata Pelajaran</th>
                    <th>Tugas1</th>
                    <th>Tugas2</th>
                    <th>UTS</th>
                    <th>UAS</th>
                    <th>Nilai</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $id_nilai = 1;
                foreach ($nilai as $key => $value) {

                    // $hasil = ($value->bahasa_indonesia + $value->matematika + $value->ipa +
                    //     $value->bahasa_inggris + $value->ips + $value->agama_islam +
                    //     $value->pkn);
                    // $rata = round($hasil / 7);

                ?>
                    <tr>
                        <td><?= $id_nilai++; ?></td>
                        <td><?= $value->nama_siswa ?></td>
                        <td><?= $value->mapel ?></td>
                        <td><?= $value->tugas1 ?></td>
                        <td><?= $value->tugas2 ?></td>
                        <td><?= $value->uts ?></td>
                        <td><?= $value->uas ?></td>
                        <td><?= $value->nilai ?></>
                        <td>
                            <button class="btn btn-sm btn-success" data-toggle="modal" data-target="#edit<?= $value->id_nilai ?>"><i class="fas fa-edit"></i>Edit</button>
                            <a href="<?= base_url('input_nilai/delete/' . $value->id_nilai) ?>" onclick="return confirm('Apa anda yakin ingin menghapus data ini?')" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i>Delete</a>
                        </td>
                    </tr>
                <?php }  ?>
            </tbody>
        </table>
    </div>

    <!-- Modal add-->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Nilai Mata Pelajaran</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <?php echo form_open('input_nilai/add'); ?>
                    <div class="form-group">
                        <label>Nama Siswa</label>
                        <input class="form-control" type="text" name="nama_siswa" pattern="^[a-zA-Z ]{4,}" placeholder="Nama Siswa" required>
                        <label>Username Siswa</label>
                        <input class="form-control" type="text" name="id_username" placeholder="Username Siswa" required>
                        <label>Mata Pelajaran</label>
                        <input class="form-control" type="text" name="mapel" value="" placeholder="Mata Pelajaran" required>
                        <label>Tugas1</label>
                        <input class="form-control" type="number" name="tugas1" value="" placeholder="Tugas" required>
                        <label>Tugas2</label>
                        <input class="form-control" type="number" name="tugas2" value="" placeholder="Tugas" required>
                        <label>UTS</label>
                        <input class="form-control" type="number" name="uts" value="" placeholder="UTS" required>
                        <label>UAS</label>
                        <input class="form-control" type="number" name="uas" value="" placeholder="uas" required>
                        <!-- <label>Total Nilai</label>
                        <input class="form-control" type="number" name="nilai" value="" placeholder="Total Nilai" required> -->
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
                <?php echo form_close(); ?>
            </div>
        </div>
    </div>

    <!-- Modal Edit-->
    <?php foreach ($nilai as $key => $value) { ?>
        <div class="modal fade" id="edit<?= $value->id_nilai ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <?php echo form_open('input_nilai/edit/' . $value->id_nilai); ?>
                        <div class="form-group">
                            <label>Nama Siswa</label>
                            <input class="form-control" type="text" name="nama_siswa" pattern="^[a-zA-Z ]{4,}" value="<?= $value->nama_siswa ?>" placeholder="Nama Siswa" required>
                            <label>Username</label>
                            <input class="form-control" type="text" name="id_username" value="<?= $value->id_username ?>" placeholder="Mata pelajaran" required>
                            <label>Mata Pelajaran</label>
                            <input class="form-control" type="text" name="mapel" value="<?= $value->mapel ?>" placeholder="Mata pelajaran" required>
                            <label>Tugas1</label>
                            <input class="form-control" type="number" name="tugas1" value="<?= $value->tugas1 ?>" placeholder="Tugas" required>
                            <label>Tugas2</label>
                            <input class="form-control" type="number" name="tugas2" value="<?= $value->tugas2 ?>" placeholder="TUgas" required>
                            <label>UTS</label>
                            <input class="form-control" type="number" name="uts" value="<?= $value->uts ?>" placeholder="Bahasa Inggris" required>
                            <label>UAS</label>
                            <input class="form-control" type="number" name="uas" value="<?= $value->uas ?>" placeholder="IPS" required>

                            <!-- <label>Total Nilai</label>
                            <input class="form-control" type="number" name="nilai" value="<?= $value->nilai ?>" placeholder="Total Nilai" required> -->
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                    <?php echo form_close(); ?>
                </div>
            </div>
        </div>
    <?php } ?>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->