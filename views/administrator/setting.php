<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="alert alert-dark" role="alert">
        <?= $judul ?><br>
        <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#addSetting"><i fas fa-plus>Add</i></button>
    </div>

    <div class="panel-body" style="overflow-x: scroll; overflow-y:auto">
        <?= $this->session->flashdata('pesan_set'); ?>
        <table class="table table-striped table-bordered table-hover">
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Username</th>
                    <th>Password</th>
                    <th>Role Id</th>
                    <th>Deskripsi</th>
                    <th>Action</th>
                </tr>
            </thead>

            <tbody>
                <?php
                foreach ($setting as $key => $value) {
                ?>
                    <tr>
                        <td><?= $value->nama ?></td>
                        <td><?= $value->username ?></td>
                        <td><?= $value->password ?></td>
                        <td><?= $value->role_id ?></td>
                        <td><?= $value->role ?></td>
                        <td>
                            <button class="btn btn-sm btn-success" data-toggle="modal" data-target="#edit<?= $value->id ?>"><i class="fas fa-edit"></i>Edit</button>
                            <a href="<?= base_url('setting/delete/' . $value->id) ?>" onclick="return confirm('Apa anda yakin ingin menghapus data ini?')" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i>Delete</a>
                        </td>
                    </tr>
                <?php }  ?>
            </tbody>
        </table>
    </div>
    <!-- Modal add-->
    <div class="modal fade" id="addSetting" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Users</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <?php echo form_open('setting/add'); ?>
                    <div class="form-group">
                        <label>Nama</label>
                        <input class="form-control" type="text" name="nama" pattern="[a-zA-Z ]{4,}" placeholder="Nama" required>
                        <label>Username</label>
                        <input class="form-control form-control-user" type="text" name="username" placeholder="Username" value="<?= set_value('username'); ?>" required>
                        <?= form_error('username', '<small class="text-danger pl-3">', '</small>'); ?> <br>
                        <label>Password</label>
                        <input class="form-control" type="password" name="password" minlength="4" maxlength="30" placeholder="Password" required>
                        <label>Role Id</label>
                        <select name="role_id" class="form-control" required>
                            <option>--Role Id--</option>
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                        </select>
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
    <?php foreach ($setting as $key => $value) { ?>
        <div class="modal fade" id="edit<?= $value->id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit Data Users</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <?php echo form_open('setting/edit/' . $value->id); ?>
                        <div class="form-group">
                            <label>Nama</label>
                            <input class="form-control" type="text" name="username" value="<?= $value->nama ?>" pattern="^[a-zA-Z ]{4,}" placeholder="Nama" required>
                            <label>Username</label>
                            <input class="form-control" type="text" name="username" value="<?= $value->username ?>" pattern="^[a-zA-Z ]{4,}" placeholder="Username" required readonly>
                            <label>Password</label>
                            <input class="form-control" type="password" name="password" value="<?= $value->password ?>" minlength="4" maxlength="30" placeholder="Password" required>
                            <label>Role Id</label>
                            <select name="role_id" class="form-control" required>
                                <option><?= $value->role_id ?></option>
                                <option>1</option>
                                <option>2</option>
                                <option>3</option>
                            </select>
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