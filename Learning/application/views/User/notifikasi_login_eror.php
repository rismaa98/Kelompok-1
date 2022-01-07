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
                if ($this->session->flashdata('notif_login')) {
                ?>
                    <div class="alert alert-success" role="alert">
                        <?= $this->session->flashdata('notif_login') ?>
                    </div>
                <?php } ?>

            </div>
        </div>
    </div>
</div>