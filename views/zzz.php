<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="alert alert-dark" role="alert">
        <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#addModal"><i fas fa-plus>Add</i></button>
    </div>

    <?= $this->session->flashdata('pesan_nilai'); ?>
    <div class="panel-body" style="overflow-x: scroll; overflow-y:auto">
        <?= $this->session->flashdata('surat'); ?>
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
                        <td><img src="<?= base_url('img/' . $value->img) ?>" width="80px;"></>
                        <td>
                            <a href="<?= base_url('data_guru/edit/' . $value->id_guru) ?>" class="btn btn-sm btn-success"><i class="fas fa-edit"></i></a>
                            <a href="<?= base_url('data_guru/delete/' . $value->id_guru) ?>" onclick="return confirm('Apa anda yakin ingin menghapus data ini?')" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>
                        </td>
                    </tr>
                <?php }  ?>
            </tbody>
        </table>
    </div>
</div>
<!-- Modal add-->
<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Nilai Mata Pelajaran</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <?php echo form_open('data_guru/add'); ?>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label>Nomor Induk</label>
                            <input class="form-control" type="number" name="nomor_induk" placeholder="Nomor induk" required>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label>Nama Guru</label>
                            <input class="form-control" type="text" name="nama" pattern="^[a-zA-Z ]{6,}" placeholder="Nama Guru" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label>Tanggal Lahir</label>
                            <input class="form-control" type="date" name="tanggal_lahir" placeholder="Tanggal Lahir" required>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label>Tempat Lahir</label>
                            <input class="form-control" type="text" name="tempat_lahir" pattern="^[a-zA-Z ]+$" placeholder="Tempat Lahir" required>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label>Agama</label>
                            <select name="agama" class="form-control" placeholder="Agama" required>
                                <option></option>
                                <option>Islam</option>
                                <option>Kristen Katolik</option>
                                <option>Kristen Protestan</option>
                                <option>Buddha</option>
                                <option>hindu</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label>Jenis Kelamin</label>
                            <select name="jk" class="form-control" placeholder="Jenis Kelamin" required>
                                <option></option>
                                <option>Laki-Laki</option>
                                <option>Perempuan</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label>Alamat</label>
                <input class="form-control" type="text" name="alamat" placeholder="Alamat" required>
            </div>
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label>Nomor Telepon</label>
                        <input class="form-control" type="number" name="no_telp" placeholder="Nomor Telepon" required>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label>Pendidikan</label>
                        <select name="pendidikan" class="form-control" placeholder="Pendidikan" required>
                            <option value=""></option>
                            <option value="S1">S1</option>
                            <option value="S2">S2</option>
                            <option value="S3">S3</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label>Foto</label>
                    <input class="form-control" type="file" name="img" required>
                </div>
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-success">Simpan</button>
                <button type="reset" class="btn btn-danger">Reset</button>
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
<?php foreach ($guru as $key => $value) { ?>
    <div class="modal fade" id="edit<?= $value->id_guru ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <?php echo form_open('data_guru/edit/' . $value->id_guru); ?>
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label>Nomor Induk</label>
                                <input class="form-control" type="number" name="nomor_induk" placeholder="Nomor induk" required>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label>Nama Guru</label>
                                <input class="form-control" type="text" name="nama" pattern="^[a-zA-Z ]{6,}" placeholder="Nama Guru" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label>Tanggal Lahir</label>
                                <input class="form-control" type="date" name="tanggal_lahir" placeholder="Tanggal Lahir" required>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label>Tempat Lahir</label>
                                <input class="form-control" type="text" name="tempat_lahir" pattern="^[a-zA-Z ]+$" placeholder="Tempat Lahir" required>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label>Agama</label>
                                <select name="agama" class="form-control" placeholder="Agama" required>
                                    <option></option>
                                    <option>Islam</option>
                                    <option>Kristen Katolik</option>
                                    <option>Kristen Protestan</option>
                                    <option>Buddha</option>
                                    <option>hindu</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label>Jenis Kelamin</label>
                                <select name="jk" class="form-control" placeholder="Jenis Kelamin" required>
                                    <option></option>
                                    <option>Laki-Laki</option>
                                    <option>Perempuan</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label>Alamat</label>
                    <input class="form-control" type="text" name="alamat" placeholder="Alamat" required>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label>Nomor Telepon</label>
                            <input class="form-control" type="number" name="no_telp" placeholder="Nomor Telepon" required>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label>Pendidikan</label>
                            <select name="pendidikan" class="form-control" placeholder="Pendidikan" required>
                                <option value=""></option>
                                <option value="S1">S1</option>
                                <option value="S2">S2</option>
                                <option value="S3">S3</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label>Foto</label>
                        <input class="form-control" type="file" name="img" required>
                    </div>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-success">Simpan</button>
                    <button type="reset" class="btn btn-danger">Reset</button>
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