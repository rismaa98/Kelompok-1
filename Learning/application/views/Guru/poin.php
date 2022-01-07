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
                        <th scope="col">No</th>
                        <th scope="col">Kelas</th>
                        <th scope="col">Nama Siswa</th>
                        <th scope="col">Bab Pelajaran</th>
                        <th scope="col">Tugas</th>
                        <th scope="col">Link</th>
                        <th scope="col">Nilai</th>
                        <th scope="col">Deadline Tugas</th>
                        <th scope="col">Tanggal Pengerjaan</th>
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
                            <td><?php if ($hasil->link) {
                                    echo '<a href="' . $hasil->link . '"style="text-decoration:none">' . substr($hasil->link, 0, 50) . '</a>';
                                } else {
                                    echo "Belom upload link tugas";
                                } ?></td>
                            <td><?php
                                $upload = $hasil->created_at;
                                $deadline = strtotime($hasil->end_task);
                                if ($upload > $deadline) {
                                    echo "0";
                                } elseif ($hasil->poin) {
                                    echo $hasil->poin;
                                } elseif ($hasil->poin == 0) {
                                    echo "Belum dinilai";
                                } else {
                                    echo "Belum upload";
                                } ?></td>
                            <td><?= $hasil->end_task ?></td>
                            <td><?php if ($hasil->created_at) {
                                    echo date('d-m-Y', $hasil->created_at);
                                } else {
                                    echo "Belum upload";
                                } ?></td>
                            <td>
                                <?php
                                $upload = $hasil->created_at;
                                $deadline = strtotime($hasil->end_task);
                                if ($upload >= $deadline) { ?>
                                    <button type="submit" href="<?= site_url('guru/form_poin/') . $hasil->id_completed_task ?>" class="bi bi-pencil-square btn btn-danger" disabled></button>
                                <?php } elseif ($hasil->poin) { ?>
                                    <a href="<?= site_url('guru/form_poin/') . $hasil->id_completed_task ?>" class="bi bi-pencil-square btn btn-primary"></a>
                                <?php } elseif ($hasil->poin == 0) { ?>
                                    <a href="<?= site_url('guru/form_poin/') . $hasil->id_completed_task ?>" class="bi bi-pencil-square btn btn-primary"></a>
                                <?php } else {
                                    echo "Belom upload";
                                } ?>

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

<!--
<div class="modal fade" id="newSubMenuModal" tabindex="-1" role="dialog" aria-labelledby="newSubMenuModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newSubMenuModalLabel">Add New Content</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="" method="post">

                <div class="modal-body">
                    <label for="">Tugas Pelajaran</label>
                    <div class="form-group">
                        <input type="text" name="id_completed_task" value="" hidden>
                        <input type="text" class="form-control" name="name" value="" disabled>
                    </div>
                    <label for="">Mulai Mengerjakan</label>
                    <div class="form-group">
                        <input type="text" class="form-control" name="name_class" value="" disabled>
                    </div>
                    <label for="">Selesai Mengerjakan</label>
                    <div class="form-group">
                        <input type="text" class="form-control" name="sub_title" value="" disabled>
                    </div>
                    <label for="">Selesai Mengerjakan</label>
                    <div class="form-group">
                        <input type="text" class="form-control" name="poin" 
                                                                                echo 'placeholder="Masukan Nilai"';
                                                                            } else {
                                                                                echo 'value="' . $hasil->poin . '"';
                                                                            } ?>>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Add</button>
                </div>

            </form>
        </div>
    </div>
</div>