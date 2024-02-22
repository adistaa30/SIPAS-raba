<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Laporan Surat Masuk</h3>
                <p class="text-subtitle text-muted">Data Surat Masuk Dapat Di lihat Pada Tabel Dibawah Ini!</p>
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

            <form action="<?= base_url()?>laporan_sm/getData" method="get">
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
                            <a href="<?= base_url()?>laporan_sm" class="btn btn-sm btn-warning">Reset</a>
                            <a href="<?= base_url() ?>laporan_sm/cetakLaporan?tgl_awal=<?= $this->input->get('tgl_awal')?>&tgl_akhir=<?= $this->input->get('tgl_akhir') ?>" class="btn btn-sm btn-success"><i class="bi bi-printer-fill"></i> Cetak</a>
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
                            <th>Tanggal Terima</th>
                            <th>Tanggal Arsipkan</th>
                            <th>Nomor Surat</th>
                            <th>Ke Bagian</th>
                            <th>Perihal</th>
                            <th>Instansi</th>
                            <th>Alamat Pengirim</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php $no = 1;
                    foreach($surat_masuk as $sm) : ?>
                        <tr>
                        <td><?= $no++; ?></td>
                            <td><?= $sm['tgl_diterima'] ?></td>
                            <td><?= $sm['tgl_diarsipkan'] ?></td>
                            <td><?= $sm['no_surat'] ?></td>
                            <td><?= $sm['ke_bagian'] ?></td>
                            <td><?= $sm['perihal_suratmasuk'] ?></td>
                            <td><?= $sm['instansi'] ?></td>
                            <td><?= $sm['alamat_pengirim'] ?></td>
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
