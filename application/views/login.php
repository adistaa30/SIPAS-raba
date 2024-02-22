<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="<?= base_url ('assets/template/assets/css/main/app.css')?>">
    <link rel="stylesheet" href="<?= base_url ('assets/template/assets/css/main/style.css')?>">
    <link rel="stylesheet" href="<?= base_url ('assets/template/assets/css/main/app-dark.css')?>">
    <link rel="shortcut icon" href="<?= base_url ('assets/template/assets/images/logo/favicon.svg')?>" type="image/x-icon">
    <link rel="shortcut icon" href="<?= base_url ('assets/template/assets/images/logo/favicon.png')?>" type="image/png">
    
    <link rel="stylesheet" href="<?= base_url ('assets/template/assets/css/pages/fontawesome.css')?>">
    <link rel="stylesheet" href="<?= base_url ('assets/template/assets/extensions/datatables.net-bs5/css/dataTables.bootstrap5.min.css')?>">
    <link rel="stylesheet" href="<?= base_url ('assets/template/assets/css/pages/datatables.css')?>">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
  <title>Login Form</title>
  <style>
    body {
      display: flex;
      align-items: center;
      justify-content: center;
      height: 100vh;
      margin: 0;
    }
    .card img {
      display: block;
      margin: auto;
      width: 100px; /* Sesuaikan dengan lebar gambar yang diinginkan */
      margin-top: 1rem;
    }
    .title{
        display: flex;
      align-items: center;
      justify-content: center;
      margin-top: 1rem;
      font-size: 10px;
    }
    span{
        display: flex;
      align-items: center;
      justify-content: center;
      font-size: 12px;
    }
  </style>
</head>
<body>

<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-4 col-mx-4">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title text-center">LOGIN</h5>
          <img src="<?= base_url()?>assets\template\assets\images\faces\bartim.png">
          <span class="title"><b>SISTEM INFORMASI PENGARSIPAN SURAT MASUK DAN KELUAR</b></span>
          <span>KECAMATAN RAREN BATUAH</span>

          <!-- <?php if($this->session->flashdata('error_message') ) : ?>
                        <div class="row mt-2">
                            <div class="col-md-6">
                                <div class="alert alert-danger alert-dismissible show fade">
                                    <?= $this->session->flashdata('error_message'); ?>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            </div>
                        </div>
                <?php endif; ?> -->

                <!-- <?= $this->session->flashdata('message'); ?> -->
          <form action="<?= base_url()?>login" method="post">
            <div class="form-group position-relative has-icon-left mb-4 mt-3">
                    <input type="text" class="form-control form-control-m" placeholder="Username" name="username" value="<?php if(isset($_COOKIE["loginId"])) { echo $_COOKIE["loginId"]; } else { echo set_value('username'); }?>">
                    <div class="form-control-icon">
                        <i class="bi bi-person"></i>
                    </div>
                    <?= form_error('username', '<small class="text-danger pl-3">', '</small>');?>
                </div>
                <div class="form-group position-relative has-icon-left mb-4">
                    <input type="password" class="form-control form-control-m" placeholder="Password" name="password" value="<?php if(isset($_COOKIE["loginPass"])) { echo $_COOKIE["loginPass"]; } ?>">
                    <div class="form-control-icon">
                        <i class="bi bi-shield-lock"></i>
                    </div>
                    <?= form_error('password', '<small class="text-danger pl-3">', '</small>');?>
                </div>
                <div class="form-check form-check-lg d-flex align-items-end">
                    <input class="form-check-input me-1" type="checkbox" id="save_id" name="save_id" <?php if(isset($_COOKIE["loginId"])) { echo "checked"; } ?>>
                    <label class="form-check-label text-gray-600" for="save_id">
                        Remember Me
                    </label>
                </div>
            <button type="submit" class="btn btn-primary btn-block mt-3">Login</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

<script src="<?= base_url()?>assets/template/assets/js/bootstrap.js"></script>
    <script src="<?= base_url()?>assets/template/assets/js/app.js"></script>
    
<script src="<?= base_url()?>assets/template/assets/extensions/jquery/jquery.min.js"></script>
<script src="https://cdn.datatables.net/v/bs5/dt-1.12.1/datatables.min.js"></script>
<script src="<?= base_url()?>assets/template/assets/js/pages/datatables.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
  // Hide the loader and show the content when the page is fully loaded
  var loaderWrapper = document.querySelector('.loader-wrapper');
  var content = document.querySelector('#app');

  setTimeout(function() {
    loaderWrapper.style.display = 'none';
    content.style.display = 'block';
  }, 2000); // You can adjust the delay time as needed
});

</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
    <?php if ($this->session->flashdata('message')): ?>
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            html: '<?= $this->session->flashdata('message'); ?>',
        });
    <?php endif; ?>
</script>
</body>
</html>
