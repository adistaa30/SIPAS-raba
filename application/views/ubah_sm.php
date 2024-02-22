<nav class="navbar navbar-light">
        <div class="container d-block">
            <a href="javascript:history.back()"><i class="bi bi-chevron-left"></i> Kembali</a>
        </div>
    </nav>

<section class="section">
        <div class="card mx-3">
            <div class="card-header">
                <h4 class="card-title">Ubah Data Surat Masuk</h4>
            </div>

            <div class="card-body">
                <form action="<?= base_url()?>sm/editSm" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?= $surat_masuk['id_suratmasuk']; ?>">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="basicInput">Tanggal Terima</label>
                            <input type="date" class="form-control" id="tgl_terima" name="tgl_terima" value="<?= $surat_masuk['tgl_diterima']; ?>" >
                        </div>

                        <div class="form-group">
                            <label for="helpInputTop">Tanggal Diarsipkan</label>
                            <input type="date" class="form-control" id="htgl_arsipkan" name="tgl_arsipkan" value="<?= $surat_masuk['tgl_diarsipkan']; ?>" >
                        </div>

                        <div class="form-group">
                            <label for="helperText">Nomor Surat</label>
                            <input type="text" id="no_surat" class="form-control" name="nomor_surat" value="<?= $surat_masuk['no_surat'];?>" >
                        </div>
                        <div class="form-group">
                            <label for="disabledInput">Ke Bagian</label>
                            <fieldset class="form-group">
                                <select class="form-select" id="bagian" name="bagian">
                                    <option value="<?= $surat_masuk['ke_bagian']?>"><?= $surat_masuk['ke_bagian']?></option>
                                    <?php foreach ($bagian as $b ) : ?>

                                        <?php if( $b == $surat_masuk['bagian'] ) : ?>
                                            <option value="<?= $b ?>" selected><?= $b ?></option>
                                        <?php else : ?>
                                            <option value="<?= $b ?>"><?= $b ?></option>
                                        <?php endif;?>

                                    <?php endforeach; ?>
                                </select>
                            </fieldset>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="formInput">Perihal</label>
                            <input type="text" class="form-control" id="perihal" name="perihal" value="<?= $surat_masuk['perihal_suratmasuk']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="formInput">Instansi</label>
                            <input type="text" class="form-control" id="instansi" name="instansi" value="<?= $surat_masuk['instansi']; ?>" >
                        </div>
                        <div class="form-group">
                            <label for="formInput">Alamat</label>
                            <input type="text" class="form-control" id="alamat" name="alamat" value="<?= $surat_masuk['alamat_pengirim']; ?>" >
                        </div>
                        <div class="form-group">
                            <label for="FormFileSm">Upload :<span>
                                <?php if($surat_masuk['file_surat'] == NULL) {
                                echo "Tidak ada file!";
                            }else{
                                echo $surat_masuk['file_surat'];
                            } ?></span></label>
                            <input class="form-control" id="formFileSm" type="file" name="file_sm">
                            <p><small class="text-muted">Upload File Maksimal 1Mb</small></p>
                            <!-- <p><?= $surat_masuk['file_surat']; ?></p> -->
                        </div>
                        <button type="submit" name="update" class="btn btn-primary">Update</button>
                        <a href="<?= base_url();?>sm" class="btn btn-warning">Close</a>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </section>