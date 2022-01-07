<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
    <div class="row">
        <div class="col-lg">
            <form action="<?= site_url('guru/edit_task'); ?>" method="post">
                <?php foreach ($ambil as $hasil) : ?>
                    <div class="modal-body">
                        <label for="">Nama Pelajaran</label>
                        <input type="text" name="id_task" value="<?= $hasil->id_task ?>" hidden>
                        <input type="text" name="id" value="<?= $user['id'] ?>" hidden>

                        <label for="">Tugas Pelajaran</label>
                        <div class="form-group">
                            <textarea name="name_task" id="artikel"></textarea>
                        </div>
                        <label for="">Mulai Mengerjakan</label>
                        <div class="form-group">
                            <input type="date" name="start_task" class="form-control">
                        </div>
                        <label for="">Selesai Mengerjakan</label>
                        <div class="form-group">
                            <input type="date" name="end_task" class="form-control">
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