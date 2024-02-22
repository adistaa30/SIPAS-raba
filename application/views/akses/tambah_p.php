<!-- <nav class="navbar navbar-light">
    <div class="container d-block">
        <a href="<?= base_url()?>sk"><i class="bi bi-chevron-left"></i> Kembali</a>
    </div>
</nav> -->

<section class="section">
        <div class="card mx-3">
            <div class="card-header">
                <h4 class="card-title">Tambah Pengguna</h4>
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
                <form action="addPengguna" method="post">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="basicInput">Nama</label>
                            <input type="text" class="form-control" id="nama" name="nama">
                            <small class="form-text text-danger"><?= form_error('nama'); ?></small>
                        </div>

                        <div class="form-group">
                            <label for="basicInput">Nip</label>
                            <input type="text" class="form-control" id="nip" name="nip">
                            <small class="form-text text-danger"><?= form_error('nip'); ?></small>
                        </div>

                        <div class="form-group">
                            <label for="helperText">Jabatan</label>
                            <input type="text" id="jabatan" class="form-control" name="jabatan" >
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
                                        <option value="<?= $l ?>"><?= $l ?></option>
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
                                        <option value="<?= $a ?>"><?= $a ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </fieldset>
                            <small class="form-text text-danger"><?= form_error('active'); ?></small>
                        </div>
                        <div class="form-group">
                            <label for="disabledInput">Username</label>
                            <input type="text" class="form-control" id="username" name="username" >
                            <small class="form-text text-danger"><?= form_error('username'); ?></small>
                        </div>

                        <div class="form-group">
                            <label for="disabledInput">Password</label>
                            <input type="password" class="form-control" id="password" name="password" >
                            <small class="form-text text-danger"><?= form_error('password'); ?></small>
                        </div>


                        <button type="submit" name="tambah" class="btn btn-sm btn-primary">Tambah</button>
                        <a href="<?= base_url()?>pengguna" class="btn btn-sm btn-warning">Close</a>

                    </div>
                </div>
                </form>
            </div>
        </div>
    </section>

    <!-- end -->