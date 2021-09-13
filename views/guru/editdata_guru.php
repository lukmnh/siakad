<!-- Begin Page Content -->
<div class="container-fluid">


    <!-- Page Heading -->

    <div class="alert alert-primary" role="alert">
        <a class=" btn btn-info" href="<?= base_url('hdata_guru') ?>"><i class="fas fa-hand-point-left"></i> Kembali</a>
    </div>
    <div class="panel-body">
        <?php

        echo validation_errors('<div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert">&times;</button>', '</div>');
        if (isset($error_upload)) {
            echo '<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert">&times;</button>' . $error_upload . '</div>';
        }
        echo form_open_multipart('hdata_guru/edit/' . $guru->id_guru);
        ?>
        <?= $this->session->flashdata('surat_error'); ?>
        <div class="row">
            <div class="col-6">
                <div class="form-group">
                    <label>Nomor Induk</label>
                    <input class="form-control" value="<?= $guru->nomor_induk; ?>" type="number" name="nomor_induk" pattern="[0-9 ]{8,12}" placeholder="Nomor induk" required>
                </div>
            </div>
            <div class="col-6">
                <div class="form-group">
                    <label>Nama Guru</label>
                    <input class="form-control" type="text" name="nama" value="<?= $guru->nama ?>" pattern="^[a-zA-Z ]{6,}" placeholder="Nama Guru" required>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-6">
                <div class="form-group">
                    <label>Tanggal Lahir</label>
                    <input class="form-control" type="date" name="tanggal_lahir" value="<?= $guru->tanggal_lahir ?>" placeholder="Tanggal Lahir" required>
                </div>
            </div>
            <div class="col-6">
                <div class="form-group">
                    <label>Tempat Lahir</label>
                    <input class="form-control" type="text" name="tempat_lahir" value="<?= $guru->tempat_lahir ?>" pattern="^[a-zA-Z ]{4,}" placeholder="Tempat Lahir" required>
                </div>
            </div>
            <div class="col-6">
                <div class="form-group">
                    <label>Agama</label>
                    <select name="agama" class="form-control" required>
                        <option><?= $guru->agama ?></option>
                        <option>Islam</option>
                        <option>Kristen Katolik</option>
                        <option>Kristen Protestan</option>
                        <option>Buddha</option>
                        <option>hindu</option>
                    </select>
                </div>
            </div>
            <div class=" col-6">
                <div class="form-group">
                    <label>Jenis Kelamin</label>
                    <select name="jk" class="form-control" required>
                        <option><?= $guru->jk ?></option>
                        <option>Laki-Laki</option>
                        <option>Perempuan</option>
                    </select>
                </div>
            </div>
        </div>
    </div>
    <div class="form-group">
        <label>Alamat</label>
        <input class="form-control" type="text" name="alamat" value="<?= $guru->alamat ?>" placeholder="Alamat" required>
    </div>
    <div class="row">
        <div class="col-6">
            <div class="form-group">
                <label>Nomor Telepon</label>
                <input class="form-control" type="number" name="no_telp" value="<?= $guru->no_telp ?>" pattern="[0-9 ]{11,13}" placeholder="Nomor Telepon" required>
            </div>
        </div>
        <div class="col-6">
            <div class="form-group">
                <label>Pendidikan</label>
                <select name="pendidikan" class="form-control" placeholder="Pendidikan" required>
                    <option><?= $guru->pendidikan ?></option>
                    <option value="S1">S1</option>
                    <option value="S2">S2</option>
                    <option value="S3">S3</option>
                </select>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            <img src="<?= base_url('img/' . $guru->img) ?>" width="100px;">
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            <b style="color: black;">Ganti Foto</b>
            <input class="form-control" type="file" name="img">
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