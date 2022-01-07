<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
    <?php
    if ($this->session->flashdata('content_info')) {
    ?>
        <div class="alert alert-success" role="alert">
            <?= $this->session->flashdata('content_info') ?>
        </div>
    <?php } ?>



    <div class="row">
        <div class="col-lg">

            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Kelas</th>
                        <th scope="col">Nama Siswa</th>
                        <th scope="col">Bab Pelajaran</th>
                        <th scope="col">Tugas</th>
                        <th scope="col">Nilai</th>
                        <th scope="col">Status</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <?php
                $i = 1;
                foreach ($content as $hasil) : ?>
                    <tbody>

                        <tr>
                            <th scope="row"><?= $i ?></th>
                            <td><?= $hasil->name_class ?></td>
                            <td><?= $hasil->name ?></td>
                            <td><?= $hasil->sub_title ?></td>
                            <td><?php if ($hasil->name_task) {
                                    echo substr($hasil->name_task, 0, 100);
                                } else {
                                    echo "Tugas Kosong";
                                } ?></td>

                            <td><?= $hasil->poin ?></td>
                            <td><?php
                                $nilai =  $hasil->poin;
                                if ($nilai >= 80) {
                                    echo "Lulus";
                                } elseif($nilai == 0){
                                    echo "Belum dinilai";
                                } else {
                                    echo "Tidak Lulus";
                                } ?></td>
                            <td>
                                <?php
                                $nilai =  $hasil->poin;
                                if ($nilai >= 80) { ?>
                                    <button type="button" class="btn btn-warning bi bi-send" data-toggle="tooltip" data-placement="bottom" title="Ajukan Sertifikat" onclick="return confirm('Apakah anda yakin untuk mengajukan sertifikat ke admin dengan data pelajaran  <?= $hasil->sub_title . ' dengan mata kelas ' .  $hasil->name_class . '' ?> ? ');">

                                    </button>
                                <?php } else { ?>
                                    <a class="btn btn-warning bi bi-send" data-toggle="tooltip" data-placement="bottom" title="Ajukan Sertifikat" disabled>
                                    </a>
                                <?php } ?>

                            </td>
                        </tr>

                    </tbody>
                <?php
                    $i++;
                endforeach; ?>
            </table>


        </div>
    </div>



</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<!-- Modal -->
<script>
    $(function() {
        $('[data-toggle="tooltip"]').tooltip()
    })
</script>