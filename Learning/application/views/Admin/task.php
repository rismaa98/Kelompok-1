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

            <table class="table table-hover" id="table_user">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Kelas</th>
                        <th scope="col">Bab Pelajaran</th>
                        <th scope="col">Tugas</th>
                        <th scope="col">Mulai</th>
                        <th scope="col">Selesai</th>
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
                            <td><?= $hasil->title ?></td>
                            <td><?php if ($hasil->name_task) {
                                    echo substr($hasil->name_task, 0, 300);
                                } else {
                                    echo "Tugas Kosong";
                                } ?></td>
                            <td><?php if ($hasil->start_task) {
                                    echo date($hasil->start_task);
                                } else {
                                    echo "Tugas Kosong";
                                } ?></td>
                            <td><?php if ($hasil->end_task) {
                                    echo date($hasil->end_task);
                                } else {
                                    echo "Tugas Kosong";
                                } ?></td>
                            <td>
                                <a href="<?= site_url('admin/form_task/') . $hasil->id_task ?>" class="bi bi-pencil-square btn btn-primary"></a>
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