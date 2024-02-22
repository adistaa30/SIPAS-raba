<style>
    .card-header img {
    width: 30%;
    /* height: 300px; */
    background-color: #40a977;
    border-radius: 50%;
    float: left;
  }
  .card-header .detail-pic{
    width:200px;
    height:200px;
    border-radius:50%;
    background-size:cover;
    background-position:50% 5%;
    background-repeat:no-repeat;
    /* background-color:red; */
  }
</style>
<div class="page-content">
    <section class="row">
        <div class="col-12 col-lg-12">
            <div class="row d-flex justify-content-lg-around">
                <div class="col-12 col-lg-6 col-md-6">
                    <!-- sweet alert -->
                    <?php if($this->session->flashdata('flash') ) : ?>
                        <div class="row mt-3">
                            <div class="col-md-6">
                                <div class="alert alert-success alert-dismissible show fade">
                                    <strong>Data Profil </strong> <?= $this->session->flashdata('flash'); ?>
                                    <button type="button" class="btn-close btn-sm" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            </div>
                        </div>
                        <?php endif; ?>
                        <!-- end sweet alert -->
                        <!-- xaxaxax -->
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
                            <!-- xxaxax -->
                    <div class="card">
                        <div class="card-header d-flex justify-content-center">
                        <?php
                            // Memeriksa apakah file foto pengguna tidak kosong
                            if (!empty($pengguna['foto_user'])) {
                                $gambar = base_url('./file_foto/' . $pengguna['foto_user']);
                            } else {
                                // Jika file foto kosong, menggunakan bingkai gambar
                                $gambar = base_url('assets/template/assets/images/faces/1.jpg'); // Ganti path ini sesuai dengan path bingkai gambar Anda
                            }
                            ?>
                            <div class="detail-pic" style="background-image:url(<?= $gambar ?>);"></div>

                            <!-- <div class="detail-pic" style="background-image:url(<?= base_url('./file_foto/' . $pengguna['foto_user'])?>);"></div> -->
                        </div>

                        <div class="d-flex justify-content-center">
                            <div class="form-group col-lg-8 align-items-center">
                                <!-- <input class="form-control form-control-sm" type="file" id="formFile"> -->
                            </div>
                        </div>
                        <div class="card-content">
                                <div class="card-body">
                                   <form class="" method="">
                                   <input type="hidden" name="id" value="<?= $pengguna['id_user']; ?>">
                                   <div class="form-group row">
                                        <label for="forminput" class="col-sm-3 col-form-label">Nama</label>
                                        <div class="col-sm-6">
                                        <input type="text" readonly class="form-control-plaintext" id="nama" name="nama" value="<?= $pengguna['nama_user']; ?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="forminput" class="col-sm-3 col-form-label">Nip</label>
                                        <div class="col-sm-6">
                                        <input type="text" readonly class="form-control-plaintext" id="nip" name="nip" value="<?= $pengguna['nip_user']; ?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="forminput" class="col-sm-3 col-form-label">Jabatan</label>
                                        <div class="col-sm-6">
                                        <input type="text" readonly class="form-control-plaintext" id="jabatan" name="jabatan" value="<?= $pengguna['jabatan_user']; ?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="forminput" class="col-sm-3 col-form-label">Username</label>
                                        <div class="col-sm-6">
                                        <input type="text" readonly class="form-control-plaintext" id="username" name="username" value="<?= $pengguna['username']; ?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="forminput" class="col-sm-3 col-form-label">Password</label>
                                        <div class="col-sm-6">
                                        <input type="text" readonly class="form-control-plaintext" id="password" name="password" value="<?= $pengguna['password']; ?>">
                                        </div>
                                    </div>
                            </form>
                            <!-- upload -->
                                    <form action="<?= base_url()?>profil/uploadFoto" method="post" enctype="multipart/form-data">
                                    <input type="hidden" name="id_user" value="<?= $pengguna['id_user']; ?>">
                                        <div class="form-group">
                                            <label for="FormFileSm">Upload:<span>
                                                <?php if($pengguna['foto_user'] == NULL) {
                                                echo "Tidak ada file!";
                                            }else{
                                                echo $pengguna['foto_user'];
                                            } ?></span></label>
                                            <input class="form-control form-control-sm" id="formFileFoto" type="file" name="file_foto">
                                            <p><small class="text-muted"><b>Upload File Maksimal 1Mb ( jpg, jpeg, png )</b></small></p>
                                        </div>
                                        <div class="form-actions d-flex justify-content-end">
                                            <button type="submit" class="btn btn-success me-1 btn-sm" value="Update Profile"><i class="bi bi-upload"></i> Upload</button>
                                        </div>
                                    </form>
                                    <!-- end up -->
                            </div>
                        </div>
                        </div>
                    </div>

                <div class="col-12 col-lg-5 col-md-6">
                <div class="card">
                    <div class="card-content">
                        <div class="card-body">
                            <h4 class="card-title">Update Form</h4>
                            <form action="<?= base_url();?>profil/update_profile" method="post">
                            <input type="hidden" name="id_user" value="<?= $pengguna['id_user']; ?>">
                                <div class="form-body">
                                    <div class="form-group">
                                        <label for="formInput" >Nama</label>
                                        <input type="text" id="feedback1" class="form-control" placeholder=""
                                            name="nama" value="<?= $pengguna['nama_user']; ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="formInput" >Nip</label>
                                        <input type="text" id="feedback4" class="form-control" placeholder=""
                                            name="nip" value="<?= $pengguna['nip_user']; ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="formInput" >Jabatan</label>
                                        <input type="text" id="jabatan" class="form-control" placeholder=""
                                            name="jabatan" value="<?= $pengguna['jabatan_user']; ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="formInput">Username</label>
                                        <input type="text" id="jabatan" class="form-control" placeholder=""
                                            name="username" value="<?= $pengguna['username']; ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="formInput">Password</label>
                                        <input type="password" class="form-control" id="password" name="password" value="<?= $pengguna['password']; ?>">
                                    </div>
                                    
                                </div>
                                <div class="form-actions d-flex justify-content-end">
                                    <button type="submit" class="btn btn-sm btn-primary me-1" value="Update Profile">Update</button>
                                </div>
                                
                            </form>
                        </div>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </section>
</div>