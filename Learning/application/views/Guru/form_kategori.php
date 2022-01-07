<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
    <div class="row">
        <div class="col-lg">
            <form action="<?= site_url('admin/edit_kategori'); ?>" method="post">
                <?php foreach ($ambil as $hasil) : ?>
                    <div class="modal-body">
                        <label for="">Nama Pelajaran</label>
                        <input type="text" name="id_kategori" value="<?= $hasil->id_kategori ?>" hidden>
                        <div class="form-group">
                            <input type="text" class="form-control" name="name_kategori" value="<?= $hasil->title ?>" disabled>
                        </div>
                        <div class="form-group">
                            <textarea name="deskripsi" id="artikel"></textarea>
                        </div>
                        <div class="form-group">
                            <select name="kategori" class="form-control">
                                <option value="Pemula">Pemula</option>
                                <option value="Expert">Expert</option>
                                <option value="Medium">Medium</option>
                            </select>
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