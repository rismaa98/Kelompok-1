<div class="blog-single gray-bg">
    <div class="container">

        <div class="row align-items-start">
            <div class="col-lg-8 m-15px-tb">
                <nav aria-label="breadcrumb bg-white">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?= site_url('user') ?>">Beranda</a></li>
                        <li class="breadcrumb-item"><a href="#">&nbsp</a></li>
                    </ol>
                </nav>
                <?php foreach ($content as $hasil) : ?>
                    <article class="article">
                        <div class="article-title">
                            <h6>
                                <p href="#"><?= date('d F Y', $hasil->date_post) ?></p>
                            </h6>

                            <h2> <?= preg_replace("/[^a-zA-Z0-9]/", " ", $hasil->title) ?></h2>

                            <div class="media">

                                <div class="media-body">
                                    <?= $hasil->sub_title ?>
                                </div>
                            </div>
                        </div>
                        <div class="article-content">

                            <a href="<?= site_url('user/theory/') . $hasil->id_subject_matter ?>" class="btn btn-primary">Baca Materi</a>
                        </div>
                    </article>
                <?php endforeach ?>
            </div>
            <div class="col-lg-4 m-15px-tb blog-aside">
                <div class="widget widget-latest-post">
                    <div class="widget-title">
                        <h3>Materi Yang Akan Datang</h3>
                    </div>
                    <div class="widget-body">
                        <div class="latest-post-aside media">
                            <div class="lpa-left media-body">
                                <div class="lpa-title">
                                    <h4><?php ?></h4>
                                    <h6>Codeigniter 4</h6>
                                </div>
                                <div class="lpa-meta">
                                    <a class="name" href="#">
                                        Penulis : Tuti Wiyarsih,M.kom
                                    </a>
                                    <a class="date" href="#">
                                        Upload : Comingsoon
                                    </a>
                                </div>
                            </div>
                        </div>

                        <div class="latest-post-aside media">
                            <div class="lpa-left media-body">
                                <div class="lpa-title">
                                    <h4><?php ?></h4>
                                    <h6>Pemograman Orientasi Objek</h6>
                                </div>
                                <div class="lpa-meta">
                                    <a class="name" href="#">
                                        Penulis : Siti Salamah,S.kom
                                    </a>
                                    <a class="date" href="#">
                                        Upload : Comingsoon
                                    </a>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

    </div>
</div>