<section style="margin-top: 50px;">
    <div class="container">
        <div class="col-sm-12 text-left">
            <span style="font-size:30px; font-family: 'Viga', sans-serif;"></br>Daftar Akun Baru</span>
            <br>
            <?php
            if ($this->session->flashdata('regist')) {
            ?>
                <div class="alert alert-success" role="alert">
                    <?= $this->session->flashdata('regist') ?>
                </div>
            <?php } ?>
        </div>
        <div class="row">
            <div class="col-sm-8">
                <form action="<?= site_url('auth/registration') ?>" method="POST">
                    <div class="form-group">
                        <label>Nama Lengkap</label>
                        <input type="text" class="form-control col-sm-8" name="name">
                        <small class="form-text text-muted">Masukan nama lengkap anda sebagai profile</small>
                        <small class="form-text" style="color: red;"><?= form_error('name') ?></small>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Email</label>
                        <input type="email" class="form-control col-sm-8" name="email">
                        <small class="form-text text-muted">Pastikan email anda benar , untuk pemberithaun aktivasi ataupun info lainnya</small>
                        <small class="form-text" style="color: red;"><?= form_error('email') ?></small>
                    </div>
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="exampleInputPassword1">Password</label>
                                <input type="password" class="form-control" name="password1">
                                <small class="form-text text-muted">Masukan password kombinasi angka,huruf kapital,dan tambahkan charakter khusus</small>
                                <small class="form-text" style="color: red;"><?= form_error('password1') ?></small>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <label for="exampleInputPassword1">Cek - Password</label>
                            <input type="password" class="form-control" name="password2">
                            <small class="form-text text-muted">Masukan password kombinasi angka,huruf kapital,dan tambahkan charakter khusus</small>
                            <small class="form-text" style="color: red;"><?= form_error('password2') ?></small>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-dongker btn-lg" data-toggle="modal" data-target="#register">Submit</button>
                    <div class="form-group">
                        </br>
                        <label for="exampleCheck1">Sudah punya akun? <a href="<?= site_url('/') ?>home"> Masuk sekarang</a></label>
                        <hr>
                        <small class="form-text text-muted">Dengan melakukan pendaftaran, Anda setuju dengan syarat & ketentuan Learning Hub.
                            This site is protected by reCAPTCHA and the Google Privacy Policy and Terms of Service apply. </small>

                    </div>

                </form>

            </div>
            <div class="col-sm-4">
                <img src="<?= base_url() ?>assets/images/regist.png" alt="" width="300">

            </div>
        </div>
    </div>

</section>