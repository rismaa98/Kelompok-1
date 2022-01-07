<!--<section style="margin-top: 50px;">
    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 kotak">
                    hasil
                </div>
                <div class="col-sm-6">
                    <div class="card">
                        <h5 class="card-header">Rank</h5>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-4">
                                  
                                </div>
                                <div class="col-sm-8">
                                    Status rank anda saat ini adalah <b> Mytical</b> , semangat untuk berjuang belajar demi tercipta sdm luar biasa
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="container justify-content-center">
            <div class="row mt-4 ">
                <div class="col-6 col-sm-4">
                    <button class="btn btn-primary">Sertifikat</button>
                </div>
                <div class="col-6 col-sm-4">
                    <button class="btn btn-dongker">Latihan</button>
                </div>
                <div class="col-6 col-sm-4">
                    <button class="btn btn-warning">Quiz</button>
                </div>

            </div>
        </div>

    </div>
</section> -->


<!--<div id="details" class="basic-1 bg-dark-blue">

    <div class="slider-1">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="slider-container">
                        <div class="swiper-container card-slider">
                            <div class="swiper-wrapper">

                                <div class="swiper-slide">
                                    <div class="card">
                                        <img class="card-image" src="images/testimonial-1.jpg" alt="alternative">
                                        <div class="card-body">
                                            <p class="testimonial-text">I just finished my trial period and was so amazed with the support and results that I quickly purchased the app</p>
                                            <p class="testimonial-author">Jude Thorn - Designer</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="card">
                                        <img class="card-image" src="images/testimonial-2.jpg" alt="alternative">
                                        <div class="card-body">
                                            <p class="testimonial-text">I don't know how I managed to get work done without Revo. The speed of this application is amazing!</p>
                                            <p class="testimonial-author">Roy Smith - Developer</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="card">
                                        <img class="card-image" src="images/testimonial-3.jpg" alt="alternative">
                                        <div class="card-body">
                                            <p class="testimonial-text">This app has the potential of becoming a mandatory tool in every developer's day to day regular operations</p>
                                            <p class="testimonial-author">Marsha Singer - Marketer</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="card">
                                        <img class="card-image" src="images/testimonial-4.jpg" alt="alternative">
                                        <div class="card-body">
                                            <p class="testimonial-text">Searching for a great prototyping and layout design app was difficult but thankfully I found Revo suite</p>
                                            <p class="testimonial-author">Tim Shaw - Designer</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="card">
                                        <img class="card-image" src="images/testimonial-5.jpg" alt="alternative">
                                        <div class="card-body">
                                            <p class="testimonial-text">Revo's support team is amazing. They've helped me with some issues and I am so grateful to the entire team</p>
                                            <p class="testimonial-author">Lindsay Spice - Designer</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="card">
                                        <img class="card-image" src="images/testimonial-6.jpg" alt="alternative">
                                        <div class="card-body">
                                            <p class="testimonial-text">Who would have thought that Revo can provide such amazing results in just a few weeks of normal basic use</p>
                                            <p class="testimonial-author">Ann Black - Developer</p>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="swiper-button-next"></div>
                            <div class="swiper-button-prev"></div>


                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>


</div>-->


<div class="blog-single gray-bg">
    <div class="container">
        <div class="jumbotron bg-white">
            <div class="row">
                <div class="col-12 col-sm-6 col-lg-3">
                    <div class="single_advisor_profile wow fadeInUp" data-wow-delay="0.3s" style="visibility: visible; animation-delay: 0.3s; animation-name: fadeInUp;">
                        <!-- Team Thumb-->
                        <div class="advisor_thumb"><img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="">
                            <!-- Social Info-->
                            <div class="social-info"><a href="#"><i class="fa fa-facebook"></i></a><a href="#"><i class="fa fa-twitter"></i></a><a href="#"><i class="fa fa-linkedin"></i></a></div>
                        </div>
                        <!-- Team Details-->
                        <div class="single_advisor_details_info">
                            <h6>Muda Berkarya Creative</h6>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-12 col-lg-8">
                    <div class="widget-title">
                        <h3>Learning Hub ,</h3>
                    </div>
                    <p class="lead">Selamat Datang,<?= $user['name'] ?></p>

                    <p> </p>
                    <p class="lead">
                        <i>Hai , senang berkenalan denganmu , mari belajar bersama diruang learning hub , semoga materi kami membantu masa depan anda</i>
                    </p>
                </div>


            </div>
        </div>
        <h3 style="color:#FC9918;">Materi Pembelajaran</h3>
        <div class="row align-items-start">
            <?php foreach ($content as $hasil) : ?>
                <div class="col-lg-4 m-15px-tb">
                    <article class="article">
                        <div class="article-title">
                            <h2><?= preg_replace("/[^a-zA-Z0-9]/", " ", $hasil->name_class) ?></h2>
                            <div class="media">
                            </div>
                        </div>
                        <div class="article-content">
                            <?= $hasil->deskripsi;  ?>
                            <a href="<?= site_url('user/sub_theory/') . preg_replace("/[^a-zA-Z0-9]/", "-", $hasil->name_class)  ?>" class="btn btn-primary">Baca Materi</a>

                        </div>

                    </article>
                </div>
            <?php endforeach; ?>
        </div>

        <div class="jumbotron bg-white">

            <p class="lead text-center text-muted">- Semangat Belajar, lawan mu sedang berjuang , masa kalah wkwk :)</p>
            <hr class="my-2">

        </div>

    </div>
</div>