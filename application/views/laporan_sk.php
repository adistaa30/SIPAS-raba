<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Laporan Surat Keluar</h3>
                <p class="text-subtitle text-muted">Data Surat Keluar Dapat Di lihat Pada Tabel Dibawah Ini!</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?= base_url('dashboard')?>">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Laporan</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    <!-- Basic Tables start -->
    <section class="section">
        <div class="card">

        <form action="<?= base_url()?>laporan_sk/getDataSk" method="get">
                <div class="row">
                    <div class="col-md-4 px-lg-3">
                        <div class="form-group form-control-sm">
                            <label for="basicInput">Tanggal Awal</label>
                            <input type="date" class="form-control" id="tgl_awal" name="tgl_awal">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group form-control-sm">
                            <label for="helperText">Tanggal Akhir</label>
                            <input type="date" id="tgl_akhir" class="form-control" name="tgl_akhir" >
                        </div>
                    </div>
                    <div class="col-md-4">
                        <br>
                        <div class="form-group form-control-sm">
                            <button class="btn btn-sm btn-primary" type="submit" name="filter">Filter</button>
                            <a href="<?= base_url()?>laporan_sk" class="btn btn-sm btn-warning">Reset</a>
                            <a href="<?= base_url() ?>laporan_sk/cetakLaporanSk?tgl_awal=<?= $this->input->get('tgl_awal')?>&tgl_akhir=<?= $this->input->get('tgl_akhir') ?>" class="btn btn-sm btn-success"><i class="bi bi-printer-fill"></i> Cetak</a>
                        </div>    
                    </div>
                </div>
            </form>

            <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover table-sm" id="table1">
                <thead>
                        <tr>
                            <th>No</th>
                            <th>No Surat</th>
                            <th>No Klasifikasi</th>
                            <th>No Urut</th>
                            <th>Kd Urusan</th>
                            <th>Kd Bulan</th>
                            <th>Tgl surat</th>
                            <th>Dari Bagian</th>
                            <th>Perihal</th>
                            <th>Kepada</th>
                            <th>Alamat Penerima</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                    <?php $no = 1;
                        foreach($surat_keluar as $sk) :?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $sk['no_surat'] ?></td>
                            <td><?= $sk['no_klasifikasi'] ?></td>
                            <td><?= $sk['no_urut'] ?></td>
                            <td><?= $sk['kd_urusan'] ?></td>
                            <td><?= $sk['kd_bulan'] ?></td>
                            <td><?= $sk['tgl_suratkeluar'] ?></td>
                            <td><?= $sk['dari_bagian'] ?></td>
                            <td><?= $sk['perihal_suratkeluar'] ?></td>
                            <td><?= $sk['kepada'] ?></td>
                            <td><?= $sk['alamat_penerima'] ?></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                </div>
            </div>
        </div>

    </section>
    <!-- Basic Tables end -->
</div>
