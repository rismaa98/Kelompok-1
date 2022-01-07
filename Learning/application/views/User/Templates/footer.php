<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Sign Out</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Apakah anda yakin akan keluar di session ini ?</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-primary" href="<?= site_url('auth/logout'); ?>">Logout</a>
            </div>
        </div>
    </div>
</div>

<footer class="sticky-footer bg-white">
    <div class="container my-auto">
        <div class="copyright text-center my-auto">
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

<script src="<?= base_url() ?>assets/js/jquery.min.js"></script> <!-- jQuery for Bootstrap's JavaScript plugins -->
<script src="<?= base_url() ?>assets/js/bootstrap.min.js"></script> <!-- Bootstrap framework -->
<script src="<?= base_url() ?>assets/js/jquery.easing.min.js"></script> <!-- jQuery Easing for smooth scrolling between anchors -->
<script src="<?= base_url() ?>assets/js/swiper.min.js"></script> <!-- Swiper for image and text sliders -->
<script src="<?= base_url() ?>assets/js/jquery.magnific-popup.js"></script> <!-- Magnific Popup for lightboxes -->
<script src="<?= base_url() ?>assets/js/scripts.js"></script> <!-- Custom scripts -->
<script src="<?= base_url() ?>assets/plugins/typed.js"></script> <!-- Custom scripts -->

<script>
    $('.custom-file-input').on('change', function() {
        let fileName = $(this).val().split('\\').pop();
        $(this).next('.custom-file-label').addClass("selected").html(fileName);
    });
    var typed = new Typed('.element', {
        strings: ["Berkarya..", "Berinovasi...", "Berimanjinasi...."],
        typeSpeed: 60,
        backspeed: 60,
        loop: true
    });


    $(function() {
        $('#myTab a:last').tab('show')
    })
</script>


</body>

</html>