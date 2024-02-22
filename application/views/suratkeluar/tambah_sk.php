<nav class="navbar navbar-light">
    <div class="container d-block">
        <a href="<?= base_url()?>sk"><i class="bi bi-chevron-left"></i> Kembali</a>
    </div>
</nav>

<section class="section">
        <div class="card mx-3">
            <div class="card-header">
                <h4 class="card-title">Tambah Surat Keluar</h4>
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
                <form action="addSk" method="post" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="basicInput">No Surat</label>
                            <input type="text" class="form-control" id="no_surat" name="no_surat">
                            <small class="form-text text-danger"><?= form_error('no_surat'); ?></small>
                        </div>

                        <div class="form-group">
                            <label for="basicInput">No Klasifikasi</label>
                            <input type="text" class="form-control" id="klasifikasi" name="klasifikasi">
                            <small class="form-text text-danger"><?= form_error('klasifikasi'); ?></small>
                        </div>

                        <div class="form-group">
                            <label for="helperText">No Urut</label>
                            <input type="text" id="no_urut" class="form-control" name="no_urut" >
                            <small class="form-text text-danger"><?= form_error('no_urut'); ?></small>
                        </div>

                        <div class="form-group">
                            <label for="helperText">Kode Urusan</label>
                            <input type="text" id="kd_urusan" class="form-control" name="kd_urusan" >
                            <small class="form-text text-danger"><?= form_error('kd_urusan'); ?></small>
                        </div>

                        <div class="form-group">
                            <label for="helperText">Kode Bulan</label>
                            <input type="text" id="kd_bulan" class="form-control" name="kd_bulan" >
                            <small class="form-text text-danger"><?= form_error('kd_bulan'); ?></small>
                        </div>

                    </div>
                    <!-- batas colom -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="helperText">Tanggal Surat</label>
                            <input type="date" id="tgl_surat" class="form-control" name="tgl_surat" >
                            <small class="form-text text-danger"><?= form_error('tgl_surat'); ?></small>
                        </div>

                        <div class="form-group">
                        <label for="disabledInput">Dari Bagian</label>
                            <fieldset class="form-group">
                                <select class="form-select" id="bagian" name="bagian">
                                    <?php foreach ($bagian as $b ) : ?>
                                        <option value="<?= $b ?>"><?= $b ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </fieldset>
                            <small class="form-text text-danger"><?= form_error('bagian'); ?></small>
                        </div>

                        <div class="form-group">
                            <label for="disabledInput">Perihal</label>
                            <!-- <input type="text" class="form-control" id="readonlyInput" name="perihal" > -->
                            <div class="col-sm-2">
                                <textarea type="text" name="perihal" id="perihal" cols="41" rows="4"></textarea>
                            </div>
                            <small class="form-text text-danger"><?= form_error('perihal'); ?></small>
                        </div>

                        <div class="form-group">
                            <label for="disabledInput">Kepada</label>
                            <input type="text" class="form-control" id="kepada" name="kepada" >
                            <small class="form-text text-danger"><?= form_error('kepada'); ?></small>
                        </div>

                        <div class="form-group">
                            <label for="disabledInput">Alamat</label>
                            <!-- <input type="text" class="form-control" id="alamat" name="alamat" > -->
                            <div class="col-sm-2">
                            <textarea type="text" name="alamat" id="" cols="41" rows="4"></textarea></div>
                            <small class="form-text text-danger"><?= form_error('alamat'); ?></small>
                        </div>

                        <div class="form-group">
                            <label for="FormFileSm">Upload</label>
                            <input class="form-control" id="formFileSk" type="file" name="file_sk">
                            <p><small class="text-muted">Upload File Maksimal 1Mb</small></p>
                        </div>

                        <button type="submit" name="tambah" class="btn btn-primary">Tambah</button>
                        <button type="reset" name="reset" class="btn btn-warning">Reset</button>

                    </div>
                </div>
                </form>
            </div>
        </div>
    </section>

    <!-- end -->