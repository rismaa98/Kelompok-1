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

            <a href="" class="bi bi-plus-circle btn btn-primary mb-3" data-toggle="modal" data-target="#newSubMenuModal"> Tambah User</a>

            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Mata Pelajaran</th>
                        <th scope="col">Bab Pelajaran</th>
                        <th scope="col">Materi</th>
                        <th scope="col">Status</th>
                        <th scope="col">Tanggal Upload</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <?php
                $i = 1;
                foreach ($content as $hasil) : ?>
                    <tbody>

                        <tr>
                            <th scope="row"><?= $i ?></th>
                            <td><?= $hasil->name_class ?></td>
                            <td><?= $hasil->sub_title ?></td>
                            <td><?= substr($hasil->content, 0, 100) ?></td>
                            <td></td>
                            <td><?= $hasil->status ?></td>
                            <td><?= $hasil->date_post ?></td>
                            <td>
                                <button href="" class="bi bi-pencil-square btn btn-primary"></button>
                                <a href="<?= site_url('admin/del_content/') . $hasil->id_subject_matter . '/' . $hasil->id_task ?>" onclick="return confirm('Kamu yakin akan menghapus materi <?= $hasil->sub_title . ' dengan mata kelas ' .  $hasil->name_class . '' ?> ?  otomatis data tugas tersebut juga akan hilang');" class="bi bi-trash btn btn-danger"></a>
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

<!-- Modal -->
<div class="modal fade" id="newSubMenuModal" tabindex="-1" role="dialog" aria-labelledby="newSubMenuModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newSubMenuModalLabel">Add New Content</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= site_url('admin/c_content'); ?>" method="post">

                <div class="modal-body">
                    <div class="form-group">
                        <select name="id" class="form-control">
                            <?php foreach ($show as $hasil) : ?>
                                <option value="<?= $hasil->id ?>"><?= $hasil->name_class ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="title" placeholder="Pelajaran">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="sub_title" placeholder="Bab Pelajaran">
                    </div>
                    <div class="form-group">
                        <textarea name="content" id="artikel"></textarea>
                    </div>
                    <div class="form-group">
                        <select name="status" class="form-control">
                            <option value="Coming Soon">Coming Soon</option>
                            <option value="Aktif">Aktif</option>
                            <option value="Non-Aktif">Non-Aktif</option>
                        </select>
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