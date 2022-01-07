<section style="margin-top: 50px;">
    <div class="kotak6">
        <div class="container">
            <div class="col-sm-12 text-left">
                <span style="font-size:30px; font-family: 'Viga', sans-serif;"></br>Login</span>
                <br>
                <?php
                if ($this->session->flashdata('notif_login')) {
                ?>
                    <div class="alert alert-success" role="alert">
                        <?= $this->session->flashdata('notif_login') ?>
                    </div>
                <?php } ?>

            </div>
            <div class="row">
                <div class="col-sm-8">
                    <form action="<?= site_url('auth') ?>" method="post">
                        <div class="modal-body">
                            <label for="">Email</label>
                            <div class="input-group mb-2">

                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="bi bi-person-check-fill"> </i></div>
                                </div>
                                <input type="text" class="form-control" name="email" value="<?= set_value('email') ?>" placeholder="Masukan Alamat Email" style="background-color: #F6F6F6; color:#062238;">

                            </div>
                            <?= form_error('email', '<small class="text-danger pl-3">', ' </small>') ?><br>
                            <label for="">Kata Sandi</label>
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="bi bi-shield-lock-fill"> </i></div>
                                </div>
                                <input type="password" class="form-control" name="password" placeholder="Masukan Kata Sandi" style="background-color: #F6F6F6; color:#062238;">
                            </div>
                            <?= form_error('password', '<small class="text-danger pl-3">', ' </small>') ?><br>
                            <div>
                                <p>Lupa Kata Sandi?</p>
                                <button type="submit" id="log" class=" btn btn-dongker" data-toggle="modal" data-target="#login_failed" style="font-family:'Viga', sans-serif; border-radius:10px;">Masuk</button>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <small id="emailHelp" class="form-text text-muted">Dengan melakukan login, Anda setuju dengan syarat & ketentuan Learning Hub.
                                This site is protected by reCAPTCHA and the Google Privacy Policy and Terms of Service apply.</small>

                        </div>
                    </form>

                </div>
                <div class="col-sm-4">
                    <img src="<?= base_url() ?>assets/images/regist.png" alt="" width="300">

                </div>
            </div>
        </div>
    </div>
</section>

<div class="modal fade" id="register" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Notification</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <?php
                if ($this->session->flashdata('regist')) {
                ?>
                    <div class="alert alert-success" role="alert">
                        <?= $this->session->flashdata('regist') ?>
                    </div>
                <?php } ?>

            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        setTimeout(function() {
            $('#register').modal('hide');

        }, 2000)
    });
</script>