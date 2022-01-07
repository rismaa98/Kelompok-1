<header id="header" class="header" style="margin-top: 90px;">
    <div class="container">
        <div class="row">

            <!-- Single Advisor-->
            <div class="col-12 col-sm-6 col-lg-3">
                <div class="single_advisor_profile wow fadeInUp" data-wow-delay="0.3s" style="visibility: visible; animation-delay: 0.3s; animation-name: fadeInUp;">
                    <!-- Team Thumb-->
                    <div class="advisor_thumb">
                        <?php foreach ($content as $hasil) : ?>
                            <img src="<?= base_url('./assets/images/profile/') . $hasil->image ?>" alt="">
                        <?php endforeach;  ?>
                        <!-- Social Info-->
                        <div class="social-info"><a href="#"><i class="fa fa-facebook"></i></a><a href="#"><i class="fa fa-twitter"></i></a><a href="#"><i class="fa fa-linkedin"></i></a></div>
                    </div>
                    <!-- Team Details https://bootdey.com/img/Content/avatar/avatar3.png -->
                    <div class="single_advisor_details_info">
                        <h6><?= $user['name']; ?></h6>
                        <p class="designation">UI Designer</p>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-12 col-lg-8">
                <div class="text-container">
                    <h2>Biodata Diri</h2>
                    <?php foreach ($content as $t) :
                        # code... 
                    ?>
                        <ul class="list-unstyled li-space-lg">
                            <li class="media">
                                <i class="fas fa-square"></i>
                                <div class="media-body"><strong>Nama</strong> <?= $user['name'] ?></div>
                            </li>
                            <li class="media">
                                <i class="fas fa-square"></i>
                                <div class="media-body"><strong>Tempat, Tanggal Lahir</strong> <?php
                                                                                                if ($t->place_birth && $hasil->date_birth) {
                                                                                                    echo $t->place_birth . ',' . $hasil->date_birth;
                                                                                                } else {
                                                                                                    echo "Silahkan update data profil";
                                                                                                } ?></div>
                            </li>
                            <li class="media">
                                <i class="fas fa-square"></i>
                                <div class="media-body"><strong>Pendidikan Terakhir</strong> <?php

                                                                                                if ($t->last_education) {
                                                                                                    echo $t->last_education;
                                                                                                } else {
                                                                                                    echo "Silahkan update data profil";
                                                                                                } ?></div>
                            </li>
                            <li class="media">
                                <i class="fas fa-square"></i>
                                <div class="media-body"><strong>Email</strong><?php

                                                                                if ($t->email) {
                                                                                    echo  $t->email;
                                                                                } else {
                                                                                    echo "Silahkan update data profil";
                                                                                } ?> </div>
                            </li>
                            <li class="media">
                                <i class="fas fa-square"></i>
                                <div class="media-body"><strong>Alamat</strong>
                                    <?php if ($t->address) {
                                        echo $t->address;
                                    } else {
                                        echo "Silahkan update data profil";
                                    } ?></div>
                            </li>
                        </ul>
                    <?php endforeach ?>
                </div> <!-- end of text-container -->
            </div> <!-- end of col -->


        </div>
    </div>
</header>



<div class="row">
    <div class="col-3">
        <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
            <a class="nav-link active" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-settings" role="tab" aria-controls="v-pills-settings" aria-selected="false">Data Nilai</a>
            <a class="nav-link " id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="false">Edit Profile</a>
            <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">Change Password</a>
        </div>
    </div>
    <div class="col-9">
        <div class="tab-content" id="v-pills-tabContent">
            <div class="tab-pane fade show active" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">


                <table class="table table-hover" id="table_user">
                    <thead>
                        <tr>
                            <th scope=" col">No</th>
                            <th scope="col">Kelas</th>
                            <th scope="col">Mata Pelajaran</th>
                            <th scope="col">Nama Tugas</th>
                            <th scope="col">Nilai</th>
                            <th scope="col">Serifikat</th>
                        </tr>
                    </thead>
                    <?php
                    $i = 1;
                    foreach ($task as $hasil) : ?>
                        <tbody>

                            <tr>
                                <th scope="row"><?= $i ?></th>
                                <td><?= $hasil->name_class ?></td>
                                <td><?= $hasil->sub_title ?></td>
                                <td><?= $hasil->name_task ?></td>
                                <td><?= $hasil->poin ?></td>
                                <td>Sertifikat</td>
                            </tr>

                        </tbody>
                    <?php
                        $i++;
                    endforeach; ?>
                </table>

            </div>

            <div class="tab-pane fade" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                <div class="col-sm-12">

                </div>
                <?php foreach ($content as $hasil) : ?>
                    <form action="<?= site_url('user/c_edit') ?>" method="post" enctype="multipart/form-data">
                        <div class="modal-body">
                            <label for="">Nama</label>
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="bi bi-person-check-fill"> </i></div>
                                </div>
                                <input type="text" name="id" value="<?= $user['id'] ?>" hidden>
                                <input type="text" class="form-control" name="name" value="<?= $hasil->name ?>" style="background-color: #F6F6F6; color:#062238;">
                            </div>
                            <label for="">Email</label>
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="bi bi-shield-lock-fill"> </i></div>
                                </div>
                                <input type="text" class="form-control" name="email" value="<?= $hasil->email ?>" style="background-color: #F6F6F6; color:#062238;">
                            </div>
                            <label for="">Tempat Lahir</label>
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="bi bi-shield-lock-fill"> </i></div>
                                </div>
                                <input type="text" class="form-control" name="place_birth" value="<?= $hasil->place_birth ?>" style="background-color: #F6F6F6; color:#062238;">
                            </div>
                            <label for="">Tanggal Lahir</label>
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="bi bi-shield-lock-fill"> </i></div>
                                </div>
                                <input type="text" class="form-control" name="date_birth" style="background-color: #F6F6F6; color:#062238;">
                            </div>
                            <label for="">Upload</label>
                            <div class="row">
                                <div class="col-sm-3">
                                    <img src="<?= base_url('assets/images/profile/') . $hasil->image ?>" class="img-thumbnail">
                                </div>
                            </div>

                            <div class="custom-file">

                                <input type="file" class="custom-file-input" id="image" name="image">
                                <label class="custom-file-label" for="image">Upload file</label>
                            </div>

                            <label for="">Gender</label>
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="bi bi-shield-lock-fill"> </i></div>
                                </div>
                                <select name="jk">
                                    <option value="Pria">Pria</option>
                                    <option value="Wanita">Wanita</option>
                                </select>
                            </div>
                            <label for="">Address</label>
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="bi bi-shield-lock-fill"> </i></div>
                                </div>
                                <input type="text" class="form-control" name="address" value="<?= $hasil->address ?>" style="background-color: #F6F6F6; color:#062238;">
                            </div>
                            <label for="">Pendidikan Terakhir</label>
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="bi bi-shield-lock-fill"> </i></div>
                                </div>
                                <input type="text" class="form-control" name="last_education" value="<?= $hasil->last_education ?>" style="background-color: #F6F6F6; color:#062238;">
                            </div>
                            <div>
                                <button type="submit" class="btn btn-dongker" style="font-family:'Viga', sans-serif; border-radius:10px;">Change</button>
                            </div>
                        </div>

                    </form>
                <?php endforeach; ?>
            </div>

            <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                <div class="row">
                    <div class="col-lg-6">
                        <form action="<?= site_url('user/change_password'); ?>" method="post">
                            <div class="form-group">
                                <label for="current_password">Current Password</label>
                                <input type="text" name="id" value="<?= $user['id'] ?>" hidden>
                                <input type="password" class="form-control" id="current_password" name="current_password">
                                <?= form_error('current_password', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <label for="new_password1">New Password</label>
                                <input type="password" class="form-control" id="new_password1" name="new_password1">
                                <?= form_error('new_password1', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <label for="new_password2">Repeat Password</label>
                                <input type="password" class="form-control" id="new_password2" name="new_password2">
                                <?= form_error('new_password2', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Change Password</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>