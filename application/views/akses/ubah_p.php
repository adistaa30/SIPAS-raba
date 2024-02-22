<!-- <nav class="navbar navbar-light">
    <div class="container d-block">
        <a href="<?= base_url()?>sk"><i class="bi bi-chevron-left"></i> Kembali</a>
    </div>
</nav> -->

<section class="section">
        <div class="card mx-3">
            <div class="card-header">
                <h4 class="card-title">Ubah Data Pengguna</h4>
                <?php if($this->session->flashdata('error_message') ) : ?>
                        <div class="row mt-2">
                            <div class="col-md-6">
                                <div class="alert alert-danger alert-dismissible show fade">
                                    <?= $this->session->flashdata('error_message'); ?>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            </div>
                        </div>
                <?php endif; ?>
            </div>

            <div class="card-body">
                <form action="<?=base_url();?>pengguna/editPengguna" method="post">
                <input type="hidden" name="id_user" value="<?= $penggunaP['id_user']; ?>">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="basicInput">Nama</label>
                            <input type="text" class="form-control" id="nama" name="nama" value="<?= $penggunaP['nama_user']; ?>">
                            <small class="form-text text-danger"><?= form_error('nama'); ?></small>
                        </div>

                        <div class="form-group">
                            <label for="basicInput">Nip</label>
                            <input type="text" class="form-control" id="nip" name="nip" value="<?= $penggunaP['nip_user']; ?>">
                            <small class="form-text text-danger"><?= form_error('nip'); ?></small>
                        </div>

                        <div class="form-group">
                            <label for="helperText">Jabatan</label>
                            <input type="text" id="jabatan" class="form-control" name="jabatan" value="<?= $penggunaP['jabatan_user']; ?>">
                            <small class="form-text text-danger"><?= form_error('jabatan'); ?></small>
                        </div>

                    </div>
                    <!-- batas colom -->
                    <div class="col-md-6">

                        <div class="form-group">
                        <label for="disabledInput">Level</label>
                            <fieldset class="form-group">
                                <select class="form-select" id="level" name="level">

                                    <?php foreach ($level_user as $l ) : ?>

                                        <?php if( $l == $penggunaP['level_user'] ) : ?>
                                            <option value="<?= $l ?>" selected><?= $l ?></option>
                                        <?php else : ?>
                                            <option value="<?= $l ?>"><?= $l ?></option>
                                        <?php endif;?>

                                    <?php endforeach; ?>

                                </select>
                            </fieldset>
                            <small class="form-text text-danger"><?= form_error('level'); ?></small>
                        </div>

                        <div class="form-group">
                        <label for="disabledInput">Activasi</label>
                            <fieldset class="form-group">
                                <select class="form-select" id="active" name="active">

                                    <?php foreach ($active as $a ) : ?>

                                        <?php if( $a == $penggunaP['is_active'] ) : ?>
                                            <option value="<?= $a ?>" selected><?= $a ?></option>
                                        <?php else : ?>
                                            <option value="<?= $a ?>"><?= $a ?></option>
                                        <?php endif;?>

                                    <?php endforeach; ?>

                                </select>
                            </fieldset>
                            <small class="form-text text-danger"><?= form_error('active'); ?></small>
                        </div>

                        <div class="form-group">
                            <label for="disabledInput">Username</label>
                            <input type="text" class="form-control" id="username" name="username" value="<?= $penggunaP['username']; ?>">
                            <small class="form-text text-danger"><?= form_error('username'); ?></small>
                        </div>

                        <div class="form-group">
                            <label for="disabledInput">Password</label>
                            <input type="password" class="form-control" id="password" name="password" value="<?= $penggunaP['password']; ?>">
                            <small class="form-text text-danger"><?= form_error('password'); ?></small>
                        </div>

                        <button type="submit" name="update" class="btn btn-sm btn-primary">Update</button>
                        <a href="<?= base_url()?>pengguna" class="btn btn-sm btn-warning">Close</a>
                        <!-- <button type="reset" name="reset" class="btn btn-warning">Reset</button> -->

                    </div>
                </div>
                </form>
            </div>
        </div>
    </section>

    <!-- end -->