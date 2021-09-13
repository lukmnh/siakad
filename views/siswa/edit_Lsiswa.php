<!-- Begin Page Content -->
<div class="container-fluid">


    <!-- Page Heading -->

    <div class="alert alert-primary" role="alert">
        <a class=" btn btn-info" href="<?= base_url('lihat_siswa') ?>"><i class="fas fa-hand-point-left"></i> Kembali</a>
    </div>
    <div class="panel-body">
        <?php

        echo validation_errors('<div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert">&times;</button>', '</div>');
        if (isset($error_upload)) {
            echo '<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert">&times;</button>' . $error_upload . '</div>';
        }
        echo form_open_multipart('lihat_siswa/edit/' . $siswa->id_siswa);
        ?>
        <?= $this->session->flashdata('surat_error'); ?>
        <div class="row">
            <div class="col-6">
                <div class="form-group">
                    <label>Nomor Induk</label>
                    <input class="form-control" value="<?= $siswa->nomor_induk; ?>" type="number" name="nomor_induk" pattern="[0-9 ]{,12}" placeholder="Nomor induk" required>
                </div>
            </div>
            <div class="col-6">
                <div class="form-group">
                    <label>Nama Siswa</label>
                    <input class="form-control" type="text" name="nama" value="<?= $siswa->nama ?>" pattern="^[a-zA-Z ]{6,}" placeholder="Nama Guru" required>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-6">
                <div class="form-group">
                    <label>Tanggal Lahir</label>
                    <input class="form-control" type="date" name="tanggal_lahir" value="<?= $siswa->tanggal_lahir ?>" placeholder="Tanggal Lahir" required>
                </div>
            </div>
            <div class="col-6">
                <div class="form-group">
                    <label>Tempat Lahir</label>
                    <input class="form-control" type="text" name="tempat_lahir" value="<?= $siswa->tempat_lahir ?>" pattern="^[a-zA-Z ]{4,}" placeholder="Tempat Lahir" required>
                </div>
            </div>
            <div class="col-6">
                <div class="form-group">
                    <label>Agama</label>
                    <select name="agama" class="form-control" required>
                        <option><?= $siswa->agama ?></option>
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
                        <option><?= $siswa->jk ?></option>
                        <option>Laki-Laki</option>
                        <option>Perempuan</option>
                    </select>
                </div>
            </div>
        </div>
    </div>
    <div class="form-group">
        <label>Alamat</label>
        <input class="form-control" type="text" name="alamat" value="<?= $siswa->alamat ?>" placeholder="Alamat" required>
    </div>
    <div class="row">
        <div class="col-6">
            <div class="form-group">
                <label>Nomor Telepon</label>
                <input class="form-control" type="number" name="no_telp" value="<?= $siswa->no_telp ?>" pattern="[0-9 ]{,13}" placeholder="Nomor Telepon" required>
            </div>
        </div>
    </div>

    <div class="col-m3">
        <div class="form-group">
            <img src="<?= base_url('img_siswa/' . $siswa->img_siswa) ?>" width="100px;">
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            <b style="color: black;">Ganti Foto</b>
            <input class="form-control" type="file" name="img_siswa">
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