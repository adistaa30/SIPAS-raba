<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Surat Keluar</h3>
                <p class="text-subtitle text-muted">Data Surat Keluar Dapat Di lihat Pada Tabel Dibawah Ini!</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?= base_url('dashboard')?>">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Surat Keluar</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    <!-- sweet alert -->
    <?php if($this->session->flashdata('flash') ) : ?>
    <div class="row mt-2">
        <div class="col-md-6">
            <div class="alert alert-success alert-dismissible show fade">
                <strong>Data Surat </strong> <?= $this->session->flashdata('flash'); ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
    </div>
    <?php endif; ?>

    <!-- Basic Tables start -->
    <section class="section">
        <div class="card">
            <div class="card-header">
            <?php if($level['level_user'] == 'admin'): ?>
                <a href="<?= base_url()?>sk/tambahSk" class="btn icon icon-right btn-primary">Tambah <i class="bi bi-plus-circle-fill"></i></a>
            <?php endif; ?>
            </div>
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
                            <th>Aksi</th>
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
                            <td>
                            <?php if($level['level_user'] == 'admin'): ?>
                                <a href="<?= base_url(); ?>sk/detailSk/<?= $sk['id_suratkeluar'];?>" class="btn btn-sm btn-primary" data-bs-toggle="tooltip" data-bs-placement="top" title="Detail"><i class="bi bi-eye-fill"></i></a>
                                <a href="<?= base_url(); ?>sk/ubahSk/<?= $sk['id_suratkeluar'];?>" class="my-2 btn btn-sm btn-success" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit"><i class="bi bi-pencil-square"></i></a>
                                <a href="<?= base_url(); ?>sk/hapusSk/<?= $sk['id_suratkeluar'];?>" class="btn btn-sm btn-danger" data-bs-toggle="tooltip" data-bs-placement="top" title="Hapus" onclick="return confirm('Yakin Menghapus Data ?');"><i class="bi bi-trash3-fill"></i></a>
                                <form action="<?= base_url()?>sk/unduhSk" method="post">
                                        <input type="HIDDEN" name="file_sk" value="<?=$sk['file_sk']?>">
                                        <button type="submit" class="my-2 btn btn-sm btn-secondary" data-bs-toggle="tooltip" data-bs-placement="top" title="Unduh">
                                        <i class="bi bi-download"></i>
                                    </button>
                                    </form>
                                    <form action="<?= base_url()?>sk/unduhDisposisiSk" method="post">
                                        <input type="HIDDEN" name="file_disposisisk" value="<?=$sk['file_disposisisk'];?>">
                                        <button type="submit" class="my-2 btn btn-sm btn-light" data-bs-toggle="tooltip" data-bs-placement="top" title="Unduh Disposisi">
                                        <i class="bi bi-download"></i>
                                    </button>
                                    </form>
                                <?php elseif($level['level_user'] == 'pimpinan'): ?>
                                    <a href="<?= base_url(); ?>sk/detailSk/<?= $sk['id_suratkeluar'];?>" class="btn btn-sm btn-primary" data-bs-toggle="tooltip" data-bs-placement="top" title="Detail"><i class="bi bi-eye-fill"></i></a>
                                    <form action="<?= base_url()?>sk/unduhSk" method="post">
                                        <input type="HIDDEN" name="file_sk" value="<?=$sk['file_sk']?>">
                                        <button type="submit" class="my-2 btn btn-sm btn-success" data-bs-toggle="tooltip" data-bs-placement="top" title="Unduh">
                                        <i class="bi bi-download"></i>
                                    </button>
                                    </form>
                                    <button type="button" class="btn btn-sm btn-light uploadDisposisiSk" data-file="<?= $sk['file_disposisisk']?>" data-id="<?= $sk['id_suratkeluar'];?>" data-bs-toggle="modal" data-bs-target="#default" title="Upload Disposisi"><i class="bi bi-upload"></i></button>
                                    <?php elseif($level['level_user'] == 'kasi'): ?>
                                        <a href="<?= base_url(); ?>sk/detailSk/<?= $sk['id_suratkeluar'];?>" class="btn btn-sm btn-primary" data-bs-toggle="tooltip" data-bs-placement="top" title="Detail"><i class="bi bi-eye-fill"></i></a>
                                        <form action="<?= base_url()?>sk/unduhSk" method="post">
                                        <input type="HIDDEN" name="file_sk" value="<?=$sk['file_sk']?>">
                                        <button type="submit" class="my-2 btn btn-sm btn-success" data-bs-toggle="tooltip" data-bs-placement="top" title="Unduh">
                                        <i class="bi bi-download"></i>
                                    </button>
                                    </form>
                                        <form action="<?= base_url()?>sk/unduhDisposisiSk" method="post">
                                        <input type="HIDDEN" name="file_disposisisk" value="<?=$sk['file_disposisisk'];?>">
                                        <button type="submit" class="my-2 btn btn-sm btn-light" data-bs-toggle="tooltip" data-bs-placement="top" title="Unduh Disposisi">
                                        <i class="bi bi-download"></i>
                                    </button>
                                    </form>
                                        <?php endif;?>
                            </td>
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

 <!--Basic Modal -->
                        <div class="modal fade text-left" id="default" tabindex="-1" role="dialog"
                            aria-labelledby="myModalLabel1" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-scrollable" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="myModalLabel1">Upload Disposisi</h5>
                                    </div>
                                    <div class="modal-body">
                                        <!-- upload -->
                                    <form action="<?= base_url()?>sk/disposisiSk/<?= $sk['id_suratkeluar'];?>" method="post" enctype="multipart/form-data">
                                    <input type="hidden" name="id" id="id_sk">
                                        <div class="form-group">
                                            <label for="FormFileSm">Upload :<span id="nama-filesk"></span></label>
                                            <input class="form-control form-control-sm" type="file" name="file_disposisisk">
                                            <p><small class="text-muted"><b>Upload File Maksimal 1Mb ( jpg, jpeg, png, pdf, doc, docx )</b></small></p>
                                        </div>
                                        <div class="form-actions d-flex justify-content-end">
                                            <button type="submit" class="btn btn-success me-1 btn-sm"><i class="bi bi-upload"></i> Upload</button>
                                        </div>
                                    </form>
                                    <!-- end up -->
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn" data-bs-dismiss="modal">
                                            <i class="bx bx-x d-block d-sm-none"></i>
                                            <span class="d-none d-sm-block">Close</span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>

<script>
    $(document).ready(function() {
        $('.uploadDisposisiSk').on('click', function() {
            const id = $(this).data('id');
            var file = $(this).data('file');
            
            $('#id_sk').val(id);
            if(file == '') {
                $('#nama-filesk').html('Tidak ada file');
            }else{
                $('#nama-filesk').html(file);
            }
        });
    });
</script>