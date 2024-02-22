<nav class="navbar navbar-light">
    <div class="container d-block">
        <a href="<?= base_url()?>sk"><i class="bi bi-chevron-left"></i> Kembali</a>
    </div>
</nav>

<section class="section">
        <div class="card mx-3">
            <div class="card-header">
                <h4 class="card-title">Detail Surat Keluar</h4>
            </div>

            <div class="card-body">
                <form action="" method="post">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="basicInput"><b>No Surat</b></label>
                            <input type="text" id="no_surat" name="no_surat" value="<?= $surat_keluar['no_surat']; ?>" readonly class="form-control-plaintext">
                        </div>

                        <div class="form-group">
                            <label for="basicInput"><b>No Klasifikasi</b></label>
                            <input type="text" id="klasifikasi" name="klasifikasi" value="<?= $surat_keluar['no_klasifikasi']; ?>" readonly class="form-control-plaintext">
                        </div>

                        <div class="form-group">
                            <label for="helperText"><b>No Urut</b></label>
                            <input type="text" id="no_urut" name="no_urut" value="<?= $surat_keluar['no_urut']; ?>" readonly class="form-control-plaintext">
                        </div>

                        <div class="form-group">
                            <label for="helperText"><b>Kode Urusan</b></label>
                            <input type="text" id="kd_urusan" name="kd_urusan" value="<?= $surat_keluar['kd_urusan']; ?>" readonly class="form-control-plaintext">
                        </div>

                        <div class="form-group">
                            <label for="helperText"><b>Kode Bulan</b></label>
                            <input type="text" id="kd_bulan" name="kd_bulan" value="<?= $surat_keluar['kd_bulan']; ?>" readonly class="form-control-plaintext">
                        </div>

                    </div>
                    <!-- batas colom -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="helperText"><b>Tanggal Surat</b></label>
                            <input type="date" id="tgl_surat" name="tgl_surat" value="<?= $surat_keluar['tgl_suratkeluar']; ?>" readonly class="form-control-plaintext">
                        </div>

                        <div class="form-group">
                        <label for="disabledInput"><b>Dari Bagian</b></label>
                            <fieldset class="form-group">
                                <select  id="bagian" name="bagian" readonly class="form-control-plaintext" disabled>

                                <!-- <option value=""><?= $surat_keluar['ke_bagian']; ?></option> -->

                                    <?php foreach ($bagian as $bg ) : ?>

                                        <?php if( $bg == $surat_keluar['dari_bagian'] ) : ?>
                                            <option value="<?= $bg ?>" selected><?= $bg ?></option>
                                        <?php else : ?>
                                            <option value="<?= $bg ?>"><?= $bg ?></option>
                                        <?php endif;?>

                                    <?php endforeach; ?>
                                </select>
                            </fieldset>
                        </div>

                        <div class="form-group">
                            <div class="form-group">
                                <label for="disabledInput"><b>Perihal</b></label>
                                <textarea type="text" name="perihal" id="perihal" cols="41" rows="4" placeholder="<?= $surat_keluar['perihal_suratkeluar']; ?>" readonly class="form-control-plaintext"></textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="disabledInput"><b>Kepada</b></label>
                            <input type="text" id="kepada" name="kepada" value="<?= $surat_keluar['kepada']; ?>" readonly class="form-control-plaintext">
                        </div>

                        <div class="form-group">
                            <div class="form-group">
                                <label for="disabledInput"><b>Alamat</b></label>
                            <textarea type="text" name="alamat" id="" cols="41" rows="4" placeholder="<?= $surat_keluar['alamat_penerima']; ?>" readonly class="form-control-plaintext"></textarea></div>
                        </div>

                        <a href="<?= base_url();?>sk" class="btn btn-warning">Close</a>

                    </div>
                </div>
                </form>
            </div>
        </div>
    </section>

    <!-- end -->