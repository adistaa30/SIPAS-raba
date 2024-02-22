<nav class="navbar navbar-light">
        <div class="container d-block">
            <a href="javascript:history.back()"><i class="bi bi-chevron-left"></i> Kembali</a>
        </div>
    </nav>

 <!-- Horizontal Input start -->
 <!-- <section id="horizontal-input">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Input Surat Masuk</h4>
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
                        <form action="add" method="post" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row align-items-center">
                                    <div class="col-lg-3 col-2">
                                        <label class="col-form-label">Tanggal Terima</label>
                                    </div>
                                    <div class="col-lg-9 col-9">
                                        <input type="date" id="tgl_terima" class="form-control" name="tgl_terima" placeholder="dd/mm/yy">
                                        <small class="form-text text-danger"><?= form_error('tgl_terima'); ?></small>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row align-items-center">
                                    <div class="col-lg-3 col-2">
                                        <label class="col-form-label">Tanggal Arsipkan</label>
                                    </div>
                                    <div class="col-lg-9 col-9">
                                        <input type="date" id="tgl_arsipkan" class="form-control" name="tgl_arsipkan"
                                            placeholder="dd/mm/yy">
                                            <small class="form-text text-danger"><?= form_error('tgl_arsipkan'); ?></small>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row align-items-center">
                                    <div class="col-lg-3 col-2">
                                        <label class="col-form-label">Nomor Surat</label>
                                    </div>
                                    <div class="col-lg-9 col-9">
                                        <input type="text" id="nomor_surat" class="form-control" name="nomor_surat"
                                            placeholder="Nomor Surat">
                                            <small class="form-text text-danger"><?= form_error('nomor_surat'); ?></small>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row align-items-center">
                                    <div class="col-lg-3 col-2">
                                        <label class="col-form-label">Ke Bagian</label>
                                    </div>
                                    <div class="col-lg-9 col-9">
                                    <fieldset class="form-group">
                                        <select class="form-select" id="basicSelect" name="bagian">
                                            <option>IT</option>
                                            <option>Blade Runner</option>
                                            <option>Thor Ragnarok</option>
                                        </select>
                                    </fieldset>
                                    <small class="form-text text-danger"><?= form_error('bagian'); ?></small>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row align-items-center">
                                    <div class="col-lg-3 col-2">
                                        <label class="col-form-label">Perihal</label>
                                    </div>
                                    <div class="col-lg-9 col-9">
                                        <textarea type="text" name="perihal" id="perihal" class="form-control" cols="54" rows="5"></textarea>
                                        <small class="form-text text-danger"><?= form_error('perihal'); ?></small>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row align-items-center">
                                    <div class="col-lg-3 col-2">
                                        <label class="col-form-label">Instansi</label>
                                    </div>
                                    <div class="col-lg-9 col-9">
                                        <input type="text" id="instansi" class="form-control" name="instansi"
                                            placeholder="Instansi">
                                            <small class="form-text text-danger"><?= form_error('instansi'); ?></small>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row align-items-center">
                                    <div class="col-lg-3 col-2">
                                        <label class="col-form-label">Alamat</label>
                                    </div>
                                    <div class="col-lg-9 col-9">
                                            <textarea type="text" name="alamat" id="alamat" class="form-control" cols="54" rows="5"></textarea>
                                            <small class="form-text text-danger"><?= form_error('alamat'); ?></small>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row align-items-center">
                                    <div class="col-lg-3 col-2">
                                    <label for="formFileSm" class="form-label">Upload Surat</label>
                                    </div>
                                    <div class="col-lg-9 col-9">
                                        <input class="form-control" id="formFileSm" type="file" name="file_sm">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row align-items-center">
                                    <div class="col-lg-3 col-2">
                                    
                                    </div>
                                    <div class="col-lg-9 col-9">
                                     
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row align-items-center">
                                    <div class="col-lg-3 col-2">
                                  
                                    </div>
                                    <div class="col-lg-9 col-9">
                                        <button type="submit" name="tambah" class="btn btn-primary">Tambah</button>
                                        <button type="reset" name="reset" class="btn btn-warning">Reset</button>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section> -->
    <!-- Horizontal Input end -->

    <!-- Input -->

    <section class="section">
        <div class="card mx-3">
            <div class="card-header">
                <h4 class="card-title">Tambah Surat Masuk</h4>
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
                <form action="add" method="post" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="basicInput">Tanggal Terima</label>
                            <input type="date" class="form-control" id="basicInput" name="tgl_terima" placeholder="dd/mm/yy">
                            <small class="form-text text-danger"><?= form_error('tgl_terima'); ?></small>
                        </div>

                        <div class="form-group">
                            <label for="helpInputTop">Tanggal Diarsipkan</label>
                            <input type="date" class="form-control" id="helpInputTop" name="tgl_arsipkan" placeholder="dd/mm/yy" >
                            <small class="form-text text-danger"><?= form_error('tgl_arsipkan'); ?></small>
                        </div>

                        <div class="form-group">
                            <label for="helperText">Nomor Surat</label>
                            <input type="text" id="helperText" class="form-control" name="nomor_surat" >
                            <small class="form-text text-danger"><?= form_error('nomor_surat'); ?></small>
                        </div>
                        <div class="form-group">
                            <label for="disabledInput">Ke Bagian</label>
                            <fieldset class="form-group">
                                <select class="form-select" id="bagian" name="bagian">
                                    <?php foreach ($bagian as $b ) : ?>
                                        <option value="<?= $b ?>"><?= $b ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </fieldset>
                            <small class="form-text text-danger"><?= form_error('bagian'); ?></small>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="disabledInput">Perihal</label>
                            <!-- <input type="text" class="form-control" id="readonlyInput" name="perihal" > -->
                            <div class="col-sm-2">
                                <textarea type="text" name="perihal" id="perihal" cols="38" rows="4"></textarea>
                            </div>
                            <small class="form-text text-danger"><?= form_error('perihal'); ?></small>
                        </div>
                        <div class="form-group">
                            <label for="disabledInput">Instansi</label>
                            <input type="text" class="form-control" id="readonlyInput" name="instansi" >
                            <small class="form-text text-danger"><?= form_error('instansi'); ?></small>
                        </div>
                        <div class="form-group">
                            <label for="disabledInput">Alamat</label>
                            <!-- <input type="text" class="form-control" id="alamat" name="alamat" > -->
                            <div class="col-sm-2">
                            <textarea type="text" name="alamat" id="" cols="38" rows="4"></textarea></div>
                            <small class="form-text text-danger"><?= form_error('alamat'); ?></small>
                        </div>
                        <div class="form-group">
                            <label for="FormFileSm">Upload</label>
                            <input class="form-control" id="formFileSm" type="file" name="file_sm">
                            <p><small class="text-muted"><b>Upload File Maksimal 1Mb ( jpg, jpeg, png, pdf, doc, docx )</b></small></p>
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