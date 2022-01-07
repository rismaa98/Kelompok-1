<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
    <div class="row">
        <div class="col-lg">
            <form action="<?= site_url('guru/poin_add'); ?>" method="post">
                <?php foreach ($content as $hasil) : ?>
                    <div class="modal-body">
                        <label for="">Nama Pelajaran</label>
                        <input type="text" name="id_completed_task" value="<?= $hasil->id_completed_task ?>" hidden>
                        <input type="text" name="id" value="<?= $user['id'] ?>" hidden>


                        <label for="">Selesai Mengerjakan</label>
                        <div class="form-group">
                            <input type="text" class="form-control" name="poin" <?php if ($hasil->poin == 0) {
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
                <?php endforeach; ?>
            </form>
        </div>
    </div>

</div>