    <nav class="navbar navbar-light">
        <div class="container d-block">
            <a href="javascript:history.back()"><i class="bi bi-chevron-left"></i> Kembali</a>
        </div>
    </nav>

<section class="section">
        <div class="card mx-3">
            <div class="card-header">
                <h4 class="card-title">Detail Surat Masuk</h4>
            </div>

            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="col-form-label" for="basicInput"><b>Tanggal Terima :</b></label>
                            <input type="text" id="basicInput" placeholder="<?= $surat_masuk['tgl_diterima']; ?>" readonly class="form-control-plaintext">
                        </div>

                        <div class="form-group">
                            <label for="helpInputTop"><b>Tanggal Diarsipkan :</b></label>
                            <input type="text" id="helpInputTop" placeholder="<?= $surat_masuk['tgl_diarsipkan']; ?>" readonly class="form-control-plaintext">
                        </div>

                        <div class="form-group">
                            <label for="helperText"><b>Nomor Surat :</b></label>
                            <input type="text" id="helperText" placeholder="<?= $surat_masuk['no_surat'];?>" readonly class="form-control-plaintext">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="disabledInput"><b>Ke Bagian :</b></label>
                            <input type="text" id="disabledInput" placeholder="<?= $surat_masuk['ke_bagian'];?>" readonly class="form-control-plaintext">
                        </div>
                        <div class="form-group">
                            <label for="disabledInput"><b>Perihal :</b></label>
                            <input type="text" id="readonlyInput" placeholder="<?= $surat_masuk['perihal_suratmasuk']; ?>" readonly class="form-control-plaintext">
                        </div>
                        <div class="form-group">
                            <label for="disabledInput"><b>Instansi :</b></label>
                            <input type="text" id="readonlyInput" placeholder="<?= $surat_masuk['instansi']; ?>" readonly class="form-control-plaintext">
                        </div>
                        <div class="form-group">
                            <label for="disabledInput"><b>Alamat :</b></label>
                            <input type="text" id="readonlyInput" placeholder="<?= $surat_masuk['alamat_pengirim']; ?>" readonly class="form-control-plaintext">
                        </div>
                        <!-- <button type="submit" name="unduh" class="btn btn-primary">Unduh</button> -->
                        <a href="<?= base_url();?>sm" class="btn btn-warning">Close</a>
                    </div>
                </div>
            </div>
        </div>
    </section>