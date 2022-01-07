<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>



    <div class="row">
        <div class="col-lg">
            <table class="table table-hover" id="table_user">
                <thead>
                    <tr>
                        <th scope=" col">#</th>
                        <th scope="col">No</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Email</th>
                        <th scope="col">Tempat,Tanggal Lahir</th>
                        <th scope="col">Jenis kelamin</th>
                        <th scope="col">Alamat</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <?php
                $i = 1;
                foreach ($content as $hasil) : ?>
                    <tbody>

                        <tr>
                            <th scope="row"><?= $i ?></th>
                            <td><?= $hasil->name ?></td>
                            <td><?= $hasil->email ?></td>
                            <td><?= $hasil->date_birth ?></td>
                            <td><?= $hasil->jk ?></td>
                            <td><?= $hasil->address ?></td>
                            <td><?php if ($hasil->is_active == 1) {
                                    echo "<span class='fas fa-circle' style='color:green;'></span>"; ?> <?php } else {
                                                                                                        echo "<span class='fas fa-circle' style='color:red;'></span>" ?><?php } ?></td>
                            <td>
                                <button href="" type="submit" class="bi bi-power btn btn-primary" style="list-style-type: none;">&nbsp</button>
                                <button href="" type="submit" class="bi bi-arrow-clockwise btn btn-success"></button>
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
<div class="modal fade" id="newSubMenuModal" tabindex="-1" role="dialog" aria-labelledby="newSubMenuModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newSubMenuModalLabel">Add New Content</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= site_url('admin/add_user'); ?>" method="post">

                <div class="modal-body">

                    <div class="form-group">
                        <input type="text" class="form-control " name="id" value="<?= $user['id'] ?>" hidden>
                    </div>
                    <div class="form-group ">
                        <input type="text" class="form-control" name="title" placeholder="Pelajaran">
                    </div>
                    <label for="">Email</label>
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