<!-- Begin Page Content -->
<div class="container-fluid">


    <!-- Page Heading -->

    <div class="alert alert-primary" role="alert">
        <a class=" btn btn-info" href="<?= base_url('data_guru') ?>"><i class="fas fa-hand-point-left"></i> Kembali</a>
    </div>
    <div class="panel-body">
        <?php

        echo validation_errors('<div class="alert alert-danger alert-dismissible">
<button type="button" class="close" data-dismiss="alert">&times;</button>', '</div>');
        if (isset($error)) {
            echo '<div class="alert alert-danger alert-dismissible">
        <button type="button" class="close" data-dismiss="alert">&times;</button>' . $error . '</div>';
        }


        echo form_open_multipart('data_guru/add');
        ?>

        <div class="col-6">
            <div class="form-group">
                <label>Nomor Induk</label>
                <input class="form-control" type="text" name="nomor_induk" pattern="^[0-9 ]{8,12}" placeholder="Nomor induk" required>
            </div>
        </div>
        <div class="row">
            <div class="col-6">
                <div class="form-group">
                    <label>Username guru</label>
                    <input class="form-control" type="text" name="username_guru" value="<?= set_value('username_guru') ?>" pattern="^[a-zA-Z ]{4,}" placeholder="Username Guru" required>
                </div>
            </div>
            <div class="col-6">
                <div class="form-group">
                    <label>Nama Guru</label>
                    <input class="form-control" type="text" name="nama" pattern="^[a-zA-Z ]{4,}" placeholder="Nama Guru" required>
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
                    <input class="form-control" type="text" name="tempat_lahir" pattern="^[a-zA-Z ]{4,}" placeholder="Tempat Lahir" required>
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
                <input class="form-control" type="text" name="no_telp" pattern="^[0-9 ]{11,13}" placeholder="Nomor Telepon" required>
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
            <small>You must insert only JPG|PNG|GIF</small><br>
            <small>Max size 10MB</small>
        </div>
    </div>

    <div class="form-group">
        <button type="submit" class="btn btn-success">Simpan</button>
        <button type="reset" class="btn btn-danger">Reset</button>
    </div>
</div>


<?php
echo form_close();
?>
</div>
</div>
</div>