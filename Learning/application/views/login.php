<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Selamat Datang, </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= site_url('auth') ?>" method="post">
                <div class="modal-body">
                    <label for="">Email</label>
                    <div class="input-group mb-2">

                        <div class="input-group-prepend">
                            <div class="input-group-text"><i class="bi bi-person-check-fill"> </i></div>
                        </div>
                        <input type="text" class="form-control" name="email" value="<?= set_value('email') ?>" placeholder="Masukan Alamat Email" style="background-color: #F6F6F6; color:#062238;">
                    </div>
                    <label for="">Kata Sandi</label>
                    <div class="input-group mb-2">
                        <div class="input-group-prepend">
                            <div class="input-group-text"><i class="bi bi-shield-lock-fill"> </i></div>
                        </div>
                        <input type="password" class="form-control" name="password" placeholder="Masukan Kata Sandi" style="background-color: #F6F6F6; color:#062238;">
                    </div>
                    <div>
                        <p>Lupa Kata Sandi?</p>
                        <button type="submit" class=" btn btn-dongker" style="font-family:'Viga', sans-serif; border-radius:10px;">Masuk</button>
                    </div>
                </div>
                <div class="modal-footer">
                    <small id="emailHelp" class="form-text text-muted">Dengan melakukan login, Anda setuju dengan syarat & ketentuan Learning Hub.
                        This site is protected by reCAPTCHA and the Google Privacy Policy and Terms of Service apply.</small>

                </div>
            </form>
        </div>
    </div>
</div>