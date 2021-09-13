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
                    <th>Nama</th>
                    <th>Username</th>
                    <th>Role</th>
                </tr>
            </thead>

            <tbody>
                <?php
                foreach ($u_siswa as $key => $value) {
                ?>
                    <tr>
                        <td><?= $value->nama ?></td>
                        <td><?= $value->username ?></td>
                        <td><?= $value->role ?></td>
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