<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>



    <div class="row">
        <div class="col-lg">

            <table class="table table-hover" id="table_user">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama Siswa</th>
                        <th scope="col">Email</th>
                        <th scope="col">Nilai</th>
                        <th scope="col">Status</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <?php
                $i = 1;
                foreach ($a as $hasil) : ?>
                    <tbody>

                        <tr>
                            <th scope="row"><?= $i ?></th>
                            <td><?= $hasil->name ?></td>
                            <td><?= $hasil->email ?></td>
                            <td><?= substr($hasil->nilai,0,5)  ?></td>
                            <td><?php

                                if ($hasil->nilai >= 80) {
                                    echo "Lulus";
                                } else {
                                    echo "Tidak Lulus";
                                } ?></td>
                            <td>
                                <?php

                                if ($hasil->nilai >= 80) { ?>
                                    <a href="<?= site_url('admin/sertifikat/') . $hasil->id ?>" class="bi bi-send btn btn-primary" onclick="return confirm('Apakah anda yakin untuk mengirim sertifikat ke user member atas nama  <?= $hasil->name ?> ? ');"></a>
                                <?php  } else { ?>
                                    <button href="<?= site_url('admin/form_kategori/') . $hasil->id ?>" class="bi bi-send btn btn-danger" onclick="return confirm('Apakah anda yakin untuk mengirim sertifikat ke email  <?= $hasil->email ?> ? ');" disabled></button>

                                <?php     } ?>
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
            <form action="<?= site_url('admin/class'); ?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control" name="class" placeholder="Kelas Pelajaran">
                    </div>
                    <div class="form-group">
                        <select name="id" class="form-control">
                            <?php foreach ($content as $hasil) : ?>
                                <option value="<?= $hasil->id ?>"><?= $hasil->name ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <textarea name="deskripsi" id="artikel"></textarea>
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



