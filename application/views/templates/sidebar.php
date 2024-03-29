<body>
<div class="loader-wrapper">
    <div class="loader"></div>
</div>
    <div id="app">
        <div id="sidebar" class="active">
            <div class="sidebar-wrapper active">
    <div class="sidebar-header position-relative">
        <div class="d-flex justify-content-center align-items-center">
            <img src="<?= base_url()?>assets\template\assets\images\faces\bartim.png" alt="" style="width: 20%; height: 20%;">
            <div class="align-item-center mx-2">
                <h3>SIPAS</h3>
                <!-- <h6 class="text-center"></h6> -->
            </div>
            <div class="sidebar-toggler x">
                <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
            </div>
        </div>
    </div>

    <!-- start menu -->
    <div class="sidebar-menu">
        <ul class="menu">
            <li class="sidebar-title">Menu</li>
            <!-- kondisi admin login -->
            <?php if($level['level_user'] == 'admin'): ?>
                <li
                    class="sidebar-item <?php echo ($this->uri->segment(1) == 'dashboard') ? 'active' : ''; ?>">
                    <a href="<?= base_url()?>dashboard" class='sidebar-link'>
                        <i class="bi bi-grid-fill"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li class="sidebar-item has-sub <?php echo ($this->uri->segment(1) == 'sm' || $this->uri->segment(1) == 'sk') ? 'active' : ''; ?>">
                    <a href="#" class='sidebar-link'>
                        <i class="bi bi-stack"></i>
                        <span>Surat</span>
                    </a>
                    <ul class="submenu">
                        <li class="submenu-item <?php echo ($this->uri->segment(1) == 'sm') ? 'active' : ''; ?>">
                            <a href="<?= base_url()?>sm">Surat Masuk</a>
                        </li>
                        <li class="submenu-item <?php echo ($this->uri->segment(1) == 'sk') ? 'active' : ''; ?>">
                            <a href="<?= base_url ()?>sk">Surat Keluar</a>
                        </li>
                    </ul>
                </li>
            
            <li
                class="sidebar-item  has-sub <?php echo ($this->uri->segment(1) == 'laporan_sm' || $this->uri->segment(1) == 'laporan_sk') ? 'active' : ''; ?>">
                <a href="#" class='sidebar-link'>
                    <i class="bi bi-book-fill"></i>
                    <span>Laporan</span>
                </a>
                <ul class="submenu ">
                    <li class="submenu-item <?php echo ($this->uri->segment(1) == 'laporan_sm') ? 'active' : ''; ?>">
                        <a href="<?= base_url ()?>laporan_sm">Laporan Surat Masuk</a>
                    </li>
                    <li class="submenu-item <?php echo ($this->uri->segment(1) == 'laporan_sk') ? 'active' : ''; ?>">
                        <a href="<?= base_url ()?>laporan_sk">Laporan Surat Keluar</a>
                    </li>
                </ul>
            </li>
            
            <li
                class="sidebar-item <?php echo ($this->uri->segment(1) == 'pengguna') ? 'active' : ''; ?>">
                <a href="<?= base_url ()?>pengguna" class='sidebar-link'>
                    <i class="bi bi-people-fill"></i>
                    <span>Pengguna</span>
                </a>
            </li>
            
            <li class="sidebar-title">Pengaturan</li>
            
            <li
                class="sidebar-item <?php echo ($this->uri->segment(1) == 'profil') ? 'active' : ''; ?>">
                <a href="<?= base_url ()?>profil" class='sidebar-link'>
                    <i class="bi bi-person-circle"></i>
                    <span>Profil</span>
                </a>
            </li>
            
            <li
                class="sidebar-item  ">
                <a href="<?= base_url()?>login/logout" class='sidebar-link'>
                    <i class="bi bi-box-arrow-in-left"></i>
                    <span>Logout</span>
                </a>
            </li>
            <!-- kondisi pimpinan login -->
                <?php elseif($level['level_user'] == 'pimpinan'): ?>
                    <li
                    class="sidebar-item <?php echo ($this->uri->segment(1) == 'dashboard') ? 'active' : ''; ?>">
                    <a href="<?= base_url()?>dashboard" class='sidebar-link'>
                        <i class="bi bi-grid-fill"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li class="sidebar-item has-sub <?php echo ($this->uri->segment(1) == 'sm' || $this->uri->segment(1) == 'sk') ? 'active' : ''; ?>">
                    <a href="#" class='sidebar-link'>
                        <i class="bi bi-stack"></i>
                        <span>Surat</span>
                    </a>
                    <ul class="submenu">
                        <li class="submenu-item <?php echo ($this->uri->segment(1) == 'sm') ? 'active' : ''; ?>">
                            <a href="<?= base_url()?>sm">Surat Masuk</a>
                        </li>
                        <li class="submenu-item <?php echo ($this->uri->segment(1) == 'sk') ? 'active' : ''; ?>">
                            <a href="<?= base_url ()?>sk">Surat Keluar</a>
                        </li>
                    </ul>
                </li>
            
                <li
                class="sidebar-item  has-sub <?php echo ($this->uri->segment(1) == 'laporan_sm' || $this->uri->segment(1) == 'laporan_sk') ? 'active' : ''; ?>">
                <a href="#" class='sidebar-link'>
                    <i class="bi bi-book-fill"></i>
                    <span>Laporan</span>
                </a>
                <ul class="submenu ">
                    <li class="submenu-item <?php echo ($this->uri->segment(1) == 'laporan_sm') ? 'active' : ''; ?>">
                        <a href="<?= base_url ()?>laporan_sm">Laporan Surat Masuk</a>
                    </li>
                    <li class="submenu-item <?php echo ($this->uri->segment(1) == 'laporan_sk') ? 'active' : ''; ?>">
                        <a href="<?= base_url ()?>laporan_sk">Laporan Surat Keluar</a>
                    </li>
                </ul>
            </li>

            <li class="sidebar-title">Pengaturan</li>
            
            <li
                class="sidebar-item <?php echo ($this->uri->segment(1) == 'profil') ? 'active' : ''; ?>">
                <a href="<?= base_url ()?>profil" class='sidebar-link'>
                    <i class="bi bi-person-circle"></i>
                    <span>Profil</span>
                </a>
            </li>
            
            <li
                class="sidebar-item  ">
                <a href="<?= base_url()?>login/logout" class='sidebar-link'>
                    <i class="bi bi-box-arrow-in-left"></i>
                    <span>Logout</span>
                </a>
            </li>
            <!-- kondisi kasi login -->
                    <?php elseif($level['level_user'] == 'kasi'): ?>
                        <li
                    class="sidebar-item <?php echo ($this->uri->segment(1) == 'dashboard') ? 'active' : ''; ?>">
                    <a href="<?= base_url()?>dashboard" class='sidebar-link'>
                        <i class="bi bi-grid-fill"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li class="sidebar-item has-sub <?php echo ($this->uri->segment(1) == 'sm' || $this->uri->segment(1) == 'sk') ? 'active' : ''; ?>">
                    <a href="#" class='sidebar-link'>
                        <i class="bi bi-stack"></i>
                        <span>Surat</span>
                    </a>
                    <ul class="submenu">
                        <li class="submenu-item <?php echo ($this->uri->segment(1) == 'sm') ? 'active' : ''; ?>">
                            <a href="<?= base_url()?>sm">Surat Masuk</a>
                        </li>
                        <li class="submenu-item <?php echo ($this->uri->segment(1) == 'sk') ? 'active' : ''; ?>">
                            <a href="<?= base_url ()?>sk">Surat Keluar</a>
                        </li>
                    </ul>
                </li>
            <li class="sidebar-title">Pengaturan</li>
            
            <li
                class="sidebar-item <?php echo ($this->uri->segment(1) == 'profil') ? 'active' : ''; ?>">
                <a href="<?= base_url ()?>profil" class='sidebar-link'>
                    <i class="bi bi-person-circle"></i>
                    <span>Profil</span>
                </a>
            </li>
            
            <li
                class="sidebar-item  ">
                <a href="<?= base_url()?>login/logout" class='sidebar-link'>
                    <i class="bi bi-box-arrow-in-left"></i>
                    <span>Logout</span>
                </a>
            </li>
                        <?php endif;?>
                        <!-- end kondisi -->
        </ul>
        <!-- end menu -->

        <!-- Punya Terang/Gelap -->
        <div class="theme-toggle d-flex gap-1  align-items-center mt-2 justify-content-center">
                           <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img" class="iconify iconify--system-uicons" width="20" height="20" preserveAspectRatio="xMidYMid meet" viewBox="0 0 21 21"><g fill="none" fill-rule="evenodd" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"><path d="M10.5 14.5c2.219 0 4-1.763 4-3.982a4.003 4.003 0 0 0-4-4.018c-2.219 0-4 1.781-4 4c0 2.219 1.781 4 4 4zM4.136 4.136L5.55 5.55m9.9 9.9l1.414 1.414M1.5 10.5h2m14 0h2M4.135 16.863L5.55 15.45m9.899-9.9l1.414-1.415M10.5 19.5v-2m0-14v-2" opacity=".3"></path><g transform="translate(-210 -1)"><path d="M220.5 2.5v2m6.5.5l-1.5 1.5"></path><circle cx="220.5" cy="11.5" r="4"></circle><path d="m214 5l1.5 1.5m5 14v-2m6.5-.5l-1.5-1.5M214 18l1.5-1.5m-4-5h2m14 0h2"></path></g></g></svg>
                        <div class="form-check form-switch fs-6">
                           <input class="form-check-input  me-0" type="checkbox" id="toggle-dark" >
                           <label class="form-check-label" ></label>
                        </div>
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img" class="iconify iconify--mdi" width="20" height="20" preserveAspectRatio="xMidYMid meet" viewBox="0 0 24 24"><path fill="currentColor" d="m17.75 4.09l-2.53 1.94l.91 3.06l-2.63-1.81l-2.63 1.81l.91-3.06l-2.53-1.94L12.44 4l1.06-3l1.06 3l3.19.09m3.5 6.91l-1.64 1.25l.59 1.98l-1.7-1.17l-1.7 1.17l.59-1.98L15.75 11l2.06-.05L18.5 9l.69 1.95l2.06.05m-2.28 4.95c.83-.08 1.72 1.1 1.19 1.85c-.32.45-.66.87-1.08 1.27C15.17 23 8.84 23 4.94 19.07c-3.91-3.9-3.91-10.24 0-14.14c.4-.4.82-.76 1.27-1.08c.75-.53 1.93.36 1.85 1.19c-.27 2.86.69 5.83 2.89 8.02a9.96 9.96 0 0 0 8.02 2.89m-1.64 2.02a12.08 12.08 0 0 1-7.8-3.47c-2.17-2.19-3.33-5-3.49-7.82c-2.81 3.14-2.7 7.96.31 10.98c3.02 3.01 7.84 3.12 10.98.31Z"></path></svg>
                        </div>
                        <!-- Tutup Terang Gelap -->
    </div>
</div>
        </div>
        <div id="main" class='layout-navbar'>
            <header class='mb-3'>
                <nav class="navbar navbar-expand navbar-light navbar-top">
                    <div class="container-fluid">
                        <a href="#" class="burger-btn d-block">
                            <i class="bi bi-justify fs-3"></i>
                        </a>

                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <!-- xaxax -->
                            <ul class="navbar-nav ms-auto mb-lg-0">
                                <!-- <li class="nav-item dropdown me-1">
                                    <a class="nav-link active dropdown-toggle text-gray-600" href="#" data-bs-toggle="dropdown"
                                        aria-expanded="false">
                                        <i class='bi bi-envelope bi-sub fs-4'></i>
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton">
                                        <li>
                                            <h6 class="dropdown-header">Mail</h6>
                                        </li>
                                        <li><a class="dropdown-item" href="#">No new mail</a></li>
                                    </ul>
                                </li> -->
                                <!-- <li class="nav-item dropdown me-3">
                                    <a class="nav-link active dropdown-toggle text-gray-600" href="#" data-bs-toggle="dropdown" data-bs-display="static" aria-expanded="false">
                                        <i class='bi bi-bell bi-sub fs-4'></i>
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-end notification-dropdown" aria-labelledby="dropdownMenuButton">
                                        <li class="dropdown-header">
                                            <h6>Notifications</h6>
                                        </li> -->
                                        <!-- <li class="dropdown-item notification-item">
                                            <a class="d-flex align-items-center" href="#">
                                                <div class="notification-icon bg-primary">
                                                    <i class="bi bi-cart-check"></i>
                                                </div>
                                                <div class="notification-text ms-4">
                                                    <p class="notification-title font-bold">Successfully check out</p>
                                                    <p class="notification-subtitle font-thin text-sm">Order ID #256</p>
                                                </div>
                                            </a>
                                        </li> -->
                                        <!-- <li class="dropdown-item notification-item">
                                            <a class="d-flex align-items-center" href="#">
                                                <div class="notification-icon bg-success">
                                                    <i class="bi bi-file-earmark-check"></i>
                                                </div>
                                                <div class="notification-text ms-4">
                                                    <p class="notification-title font-bold">Homework submitted</p>
                                                    <p class="notification-subtitle font-thin text-sm">Algebra math homework</p>
                                                </div>
                                            </a>
                                        </li> -->
                                        <!-- <li>
                                            <p class="text-center py-2 mb-0"><a href="#">See all notification</a></p>
                                        </li> -->
                                    </ul>
                                </li>
                            </ul>
                            <!-- xaxax -->
                            <div class="dropdown">
                                <a href="#" data-bs-toggle="dropdown" aria-expanded="false">
                                    <div class="user-menu d-flex">
                                        <div class="user-name text-end me-3">
                                            <h6 class="mb-0 text-gray-600"><?= $tb_user['nama_user'];?></h6>
                                            <p class="mb-0 text-sm text-gray-600"><?= $tb_user['level_user'];?></p>
                                        </div>
                                        <div class="user-img d-flex align-items-center">
                                            <div class="avatar avatar-md">
                                            <?php
                                                // Memeriksa apakah file foto pengguna tidak kosong
                                                if (!empty($pengguna['foto_user'])) {
                                                    $gambar = base_url('./file_foto/' . $pengguna['foto_user']);
                                                } else {
                                                    // Jika file foto kosong, menggunakan bingkai gambar
                                                    $gambar = base_url('assets\template\assets\images\faces\1.jpg'); // Ganti path ini sesuai dengan path bingkai gambar Anda
                                                }
                                                ?>

                                                <img src="<?= $gambar ?>" alt="Foto Pengguna">
                                                <!-- <img src="<?= base_url('./file_foto/' . $pengguna['foto_user'])?>"> -->
                                            </div>
                                        </div>
                                    </div>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton" style="min-width: 11rem;">
                                    <li>
                                        <h6 class="dropdown-header">Hello, <?= $tb_user['nama_user'];?></h6>
                                    </li>
                                    <li><a class="dropdown-item" href="<?= base_url()?>profil"><i class="icon-mid bi bi-person me-2"></i> My
                                            Profile</a></li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li><a class="dropdown-item" href="<?= base_url()?>login/logout"><i
                                                class="icon-mid bi bi-box-arrow-left me-2"></i> Logout</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </nav>
            </header>
<div id="main-content">
    <div class="page-heading">
        <div class="page-title">

        