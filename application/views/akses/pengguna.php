<style>
        /* CSS untuk memberi warna pada kolom tabel */
        .active {
            color: blue; /* Warna teks biru untuk nilai 'enable' */
        }

        .noactive {
            color: red; /* Warna teks merah untuk nilai 'disable' */
        }
        
    </style>

<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Pengguna</h3>
                <p class="text-subtitle text-muted">Data Pengguna Dapat Di lihat Pada Tabel Dibawah Ini!</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?= base_url('dashboard')?>">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Pengguna</li>
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
                Data Pengguna <strong>Berhasil</strong> <?= $this->session->flashdata('flash'); ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
    </div>
    <?php endif; ?>
    <!-- end sweet alert -->

    <!-- Basic Tables start -->
    <section class="section">
        <div class="card">
            <div class="card-header">
                <a href="<?= base_url();?>pengguna/tambahPengguna" class="btn icon icon-right btn-primary">Tambah <i class="bi bi-person-plus-fill"></i></a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                <table class="table" id="table1">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Nip</th>
                            <th>Jabatan</th>
                            <th>Level</th>
                            <th>Username</th>
                            <th>Password</th>
                            <th>Activasi</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php $no = 1;
                    foreach ($penggunaP as $p ) : ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $p['nama_user'] ?></td>
                            <td><?= $p['nip_user'] ?></td>
                            <td><?= $p['jabatan_user'] ?></td>
                            <td><?= $p['level_user'] ?></td>
                            <td><?= $p['username'] ?></td>
                            <td><?= $p['password'] ?></td>
                            <?php if ($p['is_active'] == 'active'): ?>
                            <td class="active"><?= $p['is_active']?></td>
                            <?php else: ?>
                            <td class="noactive"><?= $p['is_active']?></td>
                            <?php endif;?>
                            <td>
                                <a href="<?= base_url(); ?>pengguna/ubahPengguna/<?= $p['id_user'];?>" class="my-2 btn btn-sm btn-success" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit"><i class="bi bi-pencil-square"></i></a>
                                <a href="<?= base_url(); ?>pengguna/hapusPengguna/<?= $p['id_user'];?>" class="btn btn-sm btn-danger" data-bs-toggle="tooltip" data-bs-placement="top" title="Hapus" onclick="return confirm('Yakin Menghapus Data ?');"><i class="bi bi-trash3-fill"></i></a>
                            </td>
                        </tr>
                        <?php endforeach;?>
                    </tbody>
                </table>
                </div>
            </div>
        </div>

    </section>
    <!-- Basic Tables end -->
</div>
