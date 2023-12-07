<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Clothes Go~ Shop - 2022</title>

    <!-- Custom fonts for this template-->
    <link href="<?= base_url('assets/') ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?= base_url('assets/') ?>css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="<?= base_url('assets/') ?>vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-warning sidebar sidebar-warning accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="">
                <div class="sidebar-brand-icon">
                    <i class="fas fa-shopping-bag"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Clothes Go~</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <?php
            if ($user['role'] == 'Admin') {
            ?>
                <li class="nav-item">
                    <a class="nav-link collapsed" href="<?= site_url('dashboard/') ?>">
                        <i class="fab fa-steam"></i>
                        <span>Chart</span></a>
                </li>
            <?php
            }
            ?>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Akses Fitur
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <?php
            if ($user['role'] == 'Admin') {
            ?>
                <li class="nav-item">
                    <a class="nav-link collapsed" href="<?= site_url('Shift/') ?>">
                        <i class="fas fa-calendar-alt"></i>
                        <span>Shift</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link collapsed" href="<?= site_url('Admin/') ?>">
                        <i class="fas fa-users"></i>
                        <span>Admin</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link collapsed" href="<?= site_url('Baju/') ?>">
                        <i class="fas fa-shopping-bag"></i>
                        <span>Clothes</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link collapsed" href="<?= site_url('Penjualan/') ?>">
                        <i class="fas fa-dolly"></i>
                        <span>Selling</span>
                    </a>
                </li>
                <li class="bg-gradient-light my-lg-5 nav-item">
                    <a class="dropdown-item" href="" data-toggle="modal" data-target="#logoutModal">
                        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                        Logout
                    </a>
                </li>
            <?php
            } else {
            ?>
                <li class="nav-item">
                    <a class="nav-link collapsed" href="<?= site_url('Profil/') ?>">
                        <i class="fas fa-user-injured"></i>
                        <span>Profil</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link collapsed" href="<?= site_url('Profil/baju/') ?>">
                        <i class="fas fa-shopping-bag"></i>
                        <span>Clothes</span>
                    </a>
                </li>

                <li class="bg-gradient-light my-lg-5 nav-item">
                    <a class="dropdown-item" href="" data-toggle="modal" data-target="#logoutModal">
                        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                        Logout
                    </a>
                </li>
            <?php
            }
            ?>


            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>

        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar bg-gradient-warning navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Search -->
                    <h5 class="text-danger">
                        <marquee scrollamount="15" width="810" height="25" direction="right"> "Selamat Datang di Pakaian Lokal Kami, Rasakan Penampilan Berbeda di Sini" </marquee>
                    </h5>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>

                        <!-- Nav Item - Alerts -->


                        <!-- Nav Item - Messages -->
                        <?php
                        if ($user['role'] == 'User') {
                        ?>
                            <!-- Nav Item - Alerts -->
                            <li class="nav-item dropdown no-arrow mx-1">
                                <a class="nav-link dropdown-toggle" href="<?= base_url('Profil/pembelian'); ?>">
                                    <i class="fas fa-history fa-fw"></i>
                                    <!-- Counter - Alerts -->
                                    <span class="badge badge-danger badge-counter">
                                        !
                                    </span>
                                </a>
                                <!-- Dropdown - Alerts -->
                            </li>
                            <li class="nav-item dropdown no-arrow mx-1">
                                <a class="nav-link dropdown-toggle" href="<?= base_url('Profil/detail'); ?>">
                                    <i class="fas fa-shopping-cart fa-fw"></i>
                                    <!-- Counter - Alerts -->
                                    <span class="badge badge-danger badge-counter">
                                        <?= $jlh ?>
                                    </span>
                                </a>
                                <!-- Dropdown - Alerts -->
                            </li>

                        <?php } ?>

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-secondary small"><?= $user['nama']; ?></span>
                                <img class="img-profile rounded-circle" src="<?= base_url('assets/img/profile/') . $user['gambar']; ?>">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>