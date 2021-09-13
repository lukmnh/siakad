<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="alert alert-info" role="alert">
        <?= $judul ?>
    </div>

    <div class="panel-body">
        <table class="table table-striped table-bordered table-hover">
            <thead>
                <tr>
                    <th>Nomor</th>
                    <th>Nama Siswa</th>
                    <th>Mata Pelajaran</th>
                    <th>Tugas1</th>
                    <th>TUGAS2</th>
                    <th>UTS</th>
                    <th>UAS</th>
                    <th>Nilai</th>
                </tr>
            </thead>
            <tbody>
                <?php $id_nilai = 1;
                foreach ($nilai as $key => $value) { ?>
                    <tr>
                        <td><?= $id_nilai++; ?></>
                        <td><?= $value->nama_siswa ?></td>
                        <td><?= $value->mapel ?></td>
                        <td><?= $value->tugas1 ?></td>
                        <td><?= $value->tugas2 ?></td>
                        <td><?= $value->uts ?></td>
                        <td><?= $value->uas ?></td>
                        <td><?= round($value->nilai); ?></>
                    </tr>
                <?php }  ?>
            </tbody>
        </table>
    </div>



    <!-- Button trigger modal -->


    <!-- Modal -->


</div>
<!-- /.container-fluid -->
</div>
<!-- End of Main Content -->