<div class="blog-single gray-bg">
    <div class="container">
        <?php foreach ($content as $hasil) : ?>
            <div class="row align-items-start">
                <div class="col-lg-8 m-15px-tb">
                    <nav aria-label="breadcrumb bg-white">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?= site_url('user') ?>">Beranda</a></li>
                            <li class="breadcrumb-item"><a href="<?= site_url('user/sub_theory/') . preg_replace("/[^a-zA-Z0-9]/", "-", $hasil->name_class)  ?>">Mata Pelajaran</a></li>
                        </ol>
                    </nav>
                    <article class="article">
                        <div class="article-title">
                            <h6><a href="#"><?= preg_replace("/[^a-zA-Z0-9]/", " ", $hasil->title) ?></a></h6>
                            <h2><?= $hasil->sub_title ?></h2>
                            <div class="media">
                                <div class="avatar">
                                    <img src="https://bootdey.com/img/Content/avatar/avatar1.png" title="" alt="">
                                </div>
                                <div class="media-body">
                                    <label>- Created by <?= $hasil->name ?></label>
                                    <span> publish <?= date('d F Y', $hasil->date_post) ?> </span>
                                </div>
                            </div>
                        </div>
                        <div class="article-content">
                            <?= $hasil->content ?>
                        </div>
                        <div class="nav tag-cloud">
                            <a href="#">Design</a>
                            <a href="#">Development</a>
                            <a href="#">Travel</a>
                            <a href="#">Web Design</a>
                            <a href="#">Marketing</a>
                            <a href="#">Research</a>
                            <a href="#">Managment</a>
                        </div>
                    </article>
                </div>
                <div class="col-lg-4 m-15px-tb blog-aside">
                    <!-- Author -->
                    <div class="widget widget-author">
                        <div class="widget-title">
                            <h3>Detail Kelas</h3>
                        </div>
                        <div class="widget-body">
                            <table>
                                <tr>
                                    <td>Nama Pengajar</td>
                                    <td>:</td>
                                    <td width=180><?= $hasil->name ?></td>
                                </tr>
                                <tr>
                                    <td>Tgl Upload</td>
                                    <td>:</td>
                                    <td><?= date('d F Y', $hasil->date_post) ?></td>

                                </tr>
                            </table>
                            <p><br></p>

                            <!-- Tulisan Tugas -->
                            </ul>
                            <h5><b>Tugas</b></h5>
                            <p><?php if ($complete == "False") { ?>
                                    <?php echo "Deadline Pengumpulan : " . $hasil->end_task ?>
                                    <?= $hasil->name_task ?>
                                <?php  } elseif ($complete == "show") { ?>
                                    <?= $hasil->name_task ?>
                                <?php   } else {
                                    echo "Tugas sudah di upload";
                                } ?>
                            </p>
                        </div>
                    </div>
                    <!-- End Author -->
                    <!-- Trending Post -->
                    <div class="widget widget-post">
                        <div class="widget-title">
                            <h3>Upload Tugas</h3>
                        </div>
                        <div class="widget-body">
                            <div class="latest-post-aside media">
                                <div class="lpa-left media-body">

                                    <div class="lpa-meta">

                                        <p class="card-text" style="color: black;">
                                            <?php if ($complete == "False") { ?>

                                        <form action="<?= site_url('user/upload_task/' . $hasil->id_subject_matter)  ?>" method="post">
                                            <input type="text" name="id" value="<?= $user['id'] ?>" hidden>
                                            <input type="text" name="sub_title" value="<?= $hasil->sub_title ?>" hidden>
                                            <input type="text" name="name_task" value="<?= $hasil->name_task ?>" hidden>
                                            <input type="text" name="title" value="<?= $hasil->title ?>" hidden>
                                            <input type="text" name="link" class="card-text form-control"><br>
                                            <button type="submit" class="btn btn-primary" <?php if ($hasil->name_task == NULL) {
                                                                                                echo "style='pointer-events: none;
                                                                                                                                            cursor: wait; background-color:red;'";
                                                                                            } ?>>Kirim</button>
                                        </form>


                                    <?php  } elseif ($complete == "show") { ?>

                                        <form action="<?= site_url('user/upload_task/' . $hasil->id_subject_matter)  ?>" method="post">
                                            <input type="text" name="id" value="<?= $user['id'] ?>" hidden>
                                            <input type="text" name="sub_title" value="<?= $hasil->sub_title ?>" hidden>
                                            <input type="text" name="name_task" value="<?= $hasil->name_task ?>" hidden>
                                            <input type="text" name="title" value="<?= $hasil->title ?>" hidden>
                                            <input type="text" name="link" class="card-text form-control"><br>
                                            <button type="submit" class="btn btn-primary" <?php if ($hasil->name_task == NULL) {
                                                                                                echo "style='pointer-events: none;
                                                                                                                                            cursor: wait; background-color:red;'";
                                                                                            } ?>>Kirim</button>
                                        </form>

                                    <?php   } else {
                                                echo "Tidak ada tugas/Tugas belom di buat oleh guru";
                                            } ?></p>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- End Trending Post -->
                    <!-- Latest Post -->

                    <!-- End Latest Post -->
                    <!-- widget Tags -->

                    <!-- End widget Tags -->
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>