<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="alert alert-dark" role="alert">
        <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#addJadwal"><i fas fa-plus>Add</i></button>
    </div>

    <?= $this->session->flashdata('pesan_jad'); ?>
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
                <?php $id_jds = 1;
                foreach ($jadwal_s as $key => $value) {
                ?>
                    <tr>
                        <!-- <td><?= $id_jds++; ?></td> -->
                        <td><?= $value->nama ?></td>
                        <td><?= $value->hari ?></td>
                        <td><?= $value->jam ?></td>
                        <td><?= $value->kelas ?></td>
                        <td><?= $value->mapel ?></td>
                        <td>
                            <button class="btn btn-sm btn-success" data-toggle="modal" data-target="#edit<?= $value->id_jds ?>"><i class="fas fa-edit"></i>Edit</button>
                            <a href="<?= base_url('jadwal_s/delete/' . $value->id_jds) ?>" onclick="return confirm('Apa anda yakin ingin menghapus data ini?')" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i>Delete</a>
                        </td>
                    </tr>
                <?php }  ?>
            </tbody>
        </table>
    </div>

    <!-- Modal add-->
    <div class="modal fade" id="addJadwal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Jadwal Siswa</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <?php echo form_open('jadwal_s/add'); ?>
                    <div class="form-group">
                        <label>Username</label>
                        <input class="form-control" type="text" name="username_jadwal" pattern="^[a-zA-Z ]{4,}" placeholder="Username" required>
                        <label>Hari</label>
                        <select name="hari" class="form-control" required>
                            <option></option>
                            <option>Senin</option>
                            <option>Selasa</option>
                            <option>Rabu</option>
                            <option>Kamis</option>
                            <option>Jumat</option>
                            <option>Sabtu</option>
                        </select>
                        <label>Jam</label>
                        <select name="jam" class="form-control" required>
                            <option></option>
                            <option>07:00 - 9:00</option>
                            <option>07:30 - 09:30</option>
                            <option>09:30 - 11:30</option>
                            <option>10:00 - 12:00</option>
                        </select>
                        <label>Kelas</label>
                        <select name="kelas" class="form-control" required>
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
                        <input class="form-control" type="text" name="mapel" placeholder="Mata Pelajaran" required>
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
    <?php foreach ($jadwal_s as $key => $value) { ?>
        <div class="modal fade" id="edit<?= $value->id_jds ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit Jadwal Siswa</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <?php echo form_open('jadwal_s/edit/' . $value->id_jds); ?>
                        <div class="form-group">
                            <label>Username</label>
                            <input class="form-control" type="text" name="username_jadwal" value="<?= $value->username_jadwal ?>" pattern="^[a-zA-Z ]{4,}" placeholder="Username" required>
                            <label>Hari</label>
                            <select name="hari" class="form-control" required>
                                <option><?= $value->hari ?></option>
                                <option>Senin</option>
                                <option>Selasa</option>
                                <option>Rabu</option>
                                <option>Kamis</option>
                                <option>Jumat</option>
                                <option>Sabtu</option>
                            </select>
                            <label>Jam</label>
                            <select name="jam" class="form-control" required>
                                <option><?= $value->jam ?></option>
                                <option>07:00 - 9:00</option>
                                <option>07:30 - 09:30</option>
                                <option>09:30 - 11:30</option>
                                <option>10:00 - 12:00</option>
                            </select>
                            <label>Kelas</label>
                            <select name="kelas" class="form-control" required>
                                <option><?= $value->kelas ?></option>
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
                            <input class="form-control" type="text" name="mapel" value="<?= $value->mapel ?>" placeholder="Mata Pelajaran" required>
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