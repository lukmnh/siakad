<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="alert alert-dark" role="alert">
        <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#addJadwal"><i fas fa-plus>Add</i></button>
    </div>

    <?= $this->session->flashdata('pesan_jdg'); ?>
    <div class="panel-body">
        <table class="table table-striped table-bordered table-hover">
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Hari</th>
                    <th>Jam</th>
                    <th>Kelas</th>
                    <th>Mata Pelajaran</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $id_jdg = 1;
                foreach ($jadwal_g as $key => $value) {
                ?>
                    <tr>
                        <!-- <td><?= $id_jdg++; ?></td> -->
                        <td><?= $value->nama ?></td>
                        <td><?= $value->hari_g ?></td>
                        <td><?= $value->jam_g ?></td>
                        <td><?= $value->kelas_g ?></td>
                        <td><?= $value->mapel_g ?></td>
                        <td>
                            <button class="btn btn-sm btn-success" data-toggle="modal" data-target="#edit<?= $value->id_jdg ?>"><i class="fas fa-edit"></i>Edit</button>
                            <a href="<?= base_url('jadwal_g/delete/' . $value->id_jdg) ?>" onclick="return confirm('Apa anda yakin ingin menghapus data ini?')" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i>Delete</a>
                        </td>
                    </tr>
                <?php }  ?>
            </tbody>
        </table>
    </div>
</div>
<!-- /.container-fluid -->
<!-- Modal add-->
<div class="modal fade" id="addJadwal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Jadwal Guru</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <?php echo form_open('jadwal_g/add'); ?>
                <div class="form-group">
                    <label>Username</label>
                    <input class="form-control" type="text" name="username_guru" pattern="^[a-zA-Z ]{6,}" placeholder="Username" required>
                    <label>Hari</label>
                    <select name="hari_g" class="form-control" required>
                        <option></option>
                        <option>Senin</option>
                        <option>Selasa</option>
                        <option>Rabu</option>
                        <option>Kamis</option>
                        <option>Jumat</option>
                        <option>Sabtu</option>
                    </select>
                    <label>Jam</label>
                    <select name="jam_g" class="form-control" required>
                        <option></option>
                        <option>07:00 - 9:00</option>
                        <option>07:30 - 09:30</option>
                        <option>09:30 - 11:30</option>
                        <option>10:00 - 12:00</option>
                    </select>
                    <label>Kelas</label>
                    <select name="kelas_g" class="form-control" required>
                        <option></option>
                        <option>1A</option>
                        <option>1B</option>
                        <option>2A</option>
                        <option>2B</option>
                        <option>3A</option>
                        <option>3B</option>
                        <option>4A</option>
                        <option>4B</option>
                        <option>5A</option>
                        <option>5B</option>
                        <option>6A</option>
                        <option>6B</option>
                    </select>
                    <label>Mata Pelajaran</label>
                    <input class="form-control" type="text" name="mapel_g" placeholder="Mata Pelajaran" required>
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
<?php foreach ($jadwal_g as $key => $value) { ?>
    <div class="modal fade" id="edit<?= $value->id_jdg ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Jadwal Guru</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <?php echo form_open('jadwal_g/edit/' . $value->id_jdg); ?>
                    <div class="form-group">
                        <label>Username</label>
                        <input class="form-control" type="text" name="username_guru" pattern="^[a-zA-Z ]{4,}" value="<?= $value->username_guru ?>" placeholder="Username" required>
                        <label>Hari</label>
                        <select name="hari_g" class="form-control" required>
                            <option><?= $value->hari_g ?></option>
                            <option>Senin</option>
                            <option>Selasa</option>
                            <option>Rabu</option>
                            <option>Kamis</option>
                            <option>Jumat</option>
                            <option>Sabtu</option>
                        </select>
                        <label>Jam</label>
                        <select name="jam_g" class="form-control" required>
                            <option><?= $value->jam_g ?></option>
                            <option>07:00 - 9:00</option>
                            <option>07:30 - 09:30</option>
                            <option>09:30 - 11:30</option>
                            <option>10:00 - 12:00</option>
                        </select>
                        <label>Kelas</label>
                        <select name="kelas_g" class="form-control" required>
                            <option><?= $value->kelas_g ?></option>
                            <option>1A</option>
                            <option>1B</option>
                            <option>2A</option>
                            <option>2B</option>
                            <option>3A</option>
                            <option>3B</option>
                            <option>4A</option>
                            <option>4B</option>
                            <option>5A</option>
                            <option>5B</option>
                            <option>6A</option>
                            <option>6B</option>
                        </select>
                        <label>Mata Pelajaran</label>
                        <input class="form-control" type="text" name="mapel_g" value="<?= $value->mapel_g ?>" placeholder="Mata Pelajaran" required>
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
<!-- End of Main Content -->