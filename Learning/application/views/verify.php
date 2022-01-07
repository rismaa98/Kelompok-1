<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $judul ?></title>
    <link rel="stylesheet" href="<?= base_url() ?>assets/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/bootstrap/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Viga&display=swap" rel="stylesheet">
    <link rel="shortcut icon" href="<?= base_url() ?>assets/images/iconic.ico" type="image/x-icon">
</head>

<body>


    <nav class="navbar fixed-top navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="<?= site_url('home') ?>">
                <img src="<?= base_url() ?>assets/images/logoku.png" alt="">
                Learning Hub</a>
        </div>
    </nav>
    <section style="margin-top: 50px;">
        <div class="kotak6">
            <div class="container">
                <div class="col-sm-12 text-left">
                    <span style="font-size:30px; font-family: 'Viga', sans-serif;"></br>Verification</span>
                    <br>
                </div>
                <div class="row">
                    <div class="col-sm-8">
                        <form action="<?= site_url('auth/prosesverify') ?>" method="POST">
                            <div class="form-group">
                                <label>Code Verification</label>
                                <input type="hidden" name="email" value="<?= $email ?>">
                                <input type="text" class="form-control col-sm-8" name="token">
                                <small class="form-text text-muted">Masukan Token yang sesuai di email</small>
                                <small class="form-text" style="color: red;"><?= form_error('name') ?></small>
                            </div>
                            <button type="submit" class="btn btn-dongker btn-lg">Submit</button>
                        </form>

                    </div>
                    <div class="col-sm-4">
                        <img src="<?= base_url() ?>assets/images/regist.png" alt="" width="300">

                    </div>
                </div>
            </div>
        </div>
    </section>


    <footer id="footer" class="footer">
        <div class="container-fluid text-center pt-2 pb-2" style="background-color: #2aacf4; color:white;">
            <div class="copyright">
                &copy; 2021 <strong><span>Muda Berkarya Creative <i clas="image">With<img src="<?= base_url() ?>assets/images/hati.gif" alt=""></i></span></strong>.All Rights Reserved
                <div class="social-links">
                    <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
                    <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
                    <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
                    <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
                </div>
            </div>
        </div>
    </footer><!-- End Footer -->

    <script src="<?= base_url() ?>assets/plugins/typed.js"></script>
    <script src="<?= base_url() ?>assets/plugins/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="<?= base_url() ?>assets/bootstrap/js/bootstrap.min.js"></script>

</body>

</html>