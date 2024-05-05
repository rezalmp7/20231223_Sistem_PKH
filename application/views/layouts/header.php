<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8" />
        <title>Program Keluarga Harapan</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="A fully responsive admin theme which can be used to build CRM, CMS,ERP etc." name="description" />
        <meta content="Techzaa" name="author" />

        <!-- App favicon -->
        <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/assets/images/favicon.ico">

        <!-- Daterangepicker css -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/assets/vendor/daterangepicker/daterangepicker.css">

        <!-- Vector Map css -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/assets/vendor/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.css">

        <!-- Theme Config Js -->
        <script src="<?php echo base_url(); ?>assets/assets/js/config.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/4.2.0/remixicon.css" integrity="sha512-OQDNdI5rpnZ0BRhhJc+btbbtnxaj+LdQFeh0V9/igiEPDiWE2fG+ZsXl0JEH+bjXKPJ3zcXqNyP4/F/NegVdZg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

		<!-- Datatables css -->
		<link href="<?php echo base_url(); ?>assets/assets/vendor/datatables.net-bs5/css/dataTables.bootstrap5.min.css" rel="stylesheet" type="text/css" />
		<link href="<?php echo base_url(); ?>assets/assets/vendor/datatables.net-responsive-bs5/css/responsive.bootstrap5.min.css" rel="stylesheet" type="text/css" />
		<link href="<?php echo base_url(); ?>assets/assets/vendor/datatables.net-fixedcolumns-bs5/css/fixedColumns.bootstrap5.min.css" rel="stylesheet" type="text/css" />
		<link href="<?php echo base_url(); ?>assets/assets/vendor/datatables.net-fixedheader-bs5/css/fixedHeader.bootstrap5.min.css" rel="stylesheet" type="text/css" />
		<link href="<?php echo base_url(); ?>assets/assets/vendor/datatables.net-buttons-bs5/css/buttons.bootstrap5.min.css" rel="stylesheet" type="text/css" />
		<link href="<?php echo base_url(); ?>assets/assets/vendor/datatables.net-select-bs5/css/select.bootstrap5.min.css" rel="stylesheet" type="text/css" />

        <!-- App css -->
        <link href="<?php echo base_url(); ?>assets/assets/css/app.min.css" rel="stylesheet" type="text/css" id="app-style" />

        <!-- Icons css -->
        <link href="<?php echo base_url(); ?>assets/assets/css/icons.min.css" rel="stylesheet" type="text/css" />

		<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
		<!-- Option 1: Bootstrap Bundle with Popper -->
		<script type="text/javascript" src="<?php echo base_url(); ?>node_modules/highcharts/highcharts.js"></script>
		<script type="text/javascript" src="<?php echo base_url(); ?>node_modules/highcharts/highcharts-more.js"></script>

        <!-- Apex Charts js -->
        <script src="<?php echo base_url(); ?>assets/assets/vendor/apexcharts/apexcharts.min.js"></script>

    </head>

    <body>
        <!-- Begin page -->
        <div class="wrapper">

            
            <!-- ========== Topbar Start ========== -->
            <div class="navbar-custom">
                <div class="topbar container-fluid">
                    <div class="d-flex align-items-center gap-1">

                        <!-- Topbar Brand Logo -->
                        <div class="logo-topbar">
                            <!-- Logo light -->
                            <a href="index.html" class="logo-light">
                                <span class="logo-lg">
                                    <img src="assets/images/logo.png" alt="logo">
                                </span>
                                <span class="logo-sm">
                                    <img src="assets/images/logo-sm.png" alt="small logo">
                                </span>
                            </a>

                            <!-- Logo Dark -->
                            <a href="index.html" class="logo-dark">
                                <span class="logo-lg">
                                    <img src="<?php echo base_url(); ?>assets/assets/images/logo-dark.png" alt="dark logo">
                                </span>
                                <span class="logo-sm">
                                    <img src="<?php echo base_url(); ?>assets/assets/images/logo-sm.png" alt="small logo">
                                </span>
                            </a>
                        </div>

                        <!-- Sidebar Menu Toggle Button -->
                        <button class="button-toggle-menu">
                            <i class="ri-menu-line"></i>
                        </button>

                        <!-- Horizontal Menu Toggle Button -->
                        <button class="navbar-toggle" data-bs-toggle="collapse" data-bs-target="#topnav-menu-content">
                            <div class="lines">
                                <span></span>
                                <span></span>
                                <span></span>
                            </div>
                        </button>

                        <!-- Topbar Search Form -->
                        <div class="app-search d-none d-lg-block">
                            <div>
                            </div>
                        </div>
                    </div>

                    <ul class="topbar-menu d-flex align-items-center gap-3">
                        <li class="dropdown d-lg-none">
                            <a class="nav-link dropdown-toggle arrow-none" data-bs-toggle="dropdown" href="index.html#" role="button"
                                aria-haspopup="false" aria-expanded="false">
                                <i class="ri-search-line fs-22"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-animated dropdown-lg p-0">
                            </div>
                        </li>

                        <li class="dropdown">
                            <a class="nav-link dropdown-toggle arrow-none nav-user" data-bs-toggle="dropdown" href="index.html#" role="button"
                                aria-haspopup="false" aria-expanded="false">
                                <span class="account-user-avatar">
                                    <img src="<?php echo base_url(); ?>assets/assets/images/users/avatar-1.jpg" alt="user-image" width="32" class="rounded-circle">
                                </span>
                                <span class="d-lg-block d-none">
                                    <h5 class="my-0 fw-normal"><?php echo $this->session->userdata('nama'); ?> <i
                                            class="ri-arrow-down-s-line d-none d-sm-inline-block align-middle"></i></h5>
                                </span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end dropdown-menu-animated profile-dropdown">
                                <!-- item-->
                                <div class=" dropdown-header noti-title">
                                    <h6 class="text-overflow m-0">Welcome !</h6>
                                </div>

                                <!-- item-->
                                <a href="<?php echo base_url(); ?>login/logout" class="dropdown-item">
                                    <i class="ri-logout-box-line fs-18 align-middle me-1"></i>
                                    <span>Logout</span>
                                </a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- ========== Topbar End ========== -->
            

            <!-- ========== Left Sidebar Start ========== -->
            <div class="leftside-menu">

                <!-- Brand Logo Light -->
                <a href="index.html" class="logo logo-light">
                    <span class="logo-lg">
                        <img src="<?php echo base_url(); ?>assets/assets/images/logo.png" alt="logo">
                    </span>
                    <span class="logo-sm">
                        <img src="<?php echo base_url(); ?>assets/assets/images/logo-sm.png" alt="small logo">
                    </span>
                </a>

                <!-- Brand Logo Dark -->
                <a href="index.html" class="logo logo-dark">
                    <span class="logo-lg">
                        <img src="<?php echo base_url(); ?>assets/assets/images/logo-dark.png" alt="dark logo">
                    </span>
                    <span class="logo-sm">
                        <img src="<?php echo base_url(); ?>assets/assets/images/logo-sm.png" alt="small logo">
                    </span>
                </a>

                <!-- Sidebar -left -->
                <div class="h-100" id="leftside-menu-container" data-simplebar>
                    <!--- Sidemenu -->
                    <ul class="side-nav">

                        <li class="side-nav-title">Main</li>

                        <li class="side-nav-item">
                            <a href="<?php echo base_url(); ?>dashboard" class="side-nav-link">
                                <i class="ri-dashboard-3-line"></i>
                                <span class="badge bg-success float-end"></span>
                                <span>Dashboard </span>
                            </a>
                        </li>

						<?php
						if($this->session->userdata('status') == 'login_admin') {
						?>
                        <li class="side-nav-item">
                            <a href="<?php echo base_url(); ?>user" class="side-nav-link">
                                <i class="ri-group-2-line"></i>
                                <span>Users </span>
                            </a>
                        </li>

                        <li class="side-nav-item">
                            <a href="<?php echo base_url(); ?>warga" class="side-nav-link">
                                <i class="ri-team-line"></i>
                                <span>Warga </span>
                            </a>
                        </li>

                        <li class="side-nav-item">
                            <a href="<?php echo base_url(); ?>process" class="side-nav-link">
                                <i class="ri-bubble-chart-line"></i>
                                <span> K-Means Clustering </span>
                            </a>
                        </li>

                        <li class="side-nav-item">
                            <a href="<?php echo base_url(); ?>naiveBayes" class="side-nav-link">
                                <i class="ri-tornado-line"></i>
                                <span> Naive Bayes </span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="<?php echo base_url(); ?>sampleData" class="side-nav-link">
                                <i class="ri-file-list-line"></i>
                                <span> Sample Data NB </span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="<?php echo base_url(); ?>Laporan" class="side-nav-link">
                                <i class="ri-file-chart-line"></i>
                                <span> Laporan  </span>
                            </a>
                        </li>
						<?php
						} else if($this->session->userdata('status') == 'login_kepala') {
                        ?>
                        <li class="side-nav-item">
                            <a href="<?php echo base_url(); ?>Laporan" class="side-nav-link">
                                <i class="ri-file-chart-line"></i>
                                <span> Laporan  </span>
                            </a>
                        </li>
                        <?php
                        } else {
						?>
                        <li class="side-nav-item">
                            <a href="<?php echo base_url(); ?>penerimaPKH" class="side-nav-link">
                                <i class="ri-tornado-line"></i>
                                <span> Penerima PKH </span>
                            </a>
                        </li>
						<?php
						}
						?>
                    </ul>
                    <!--- End Sidemenu -->

                    <div class="clearfix"></div>
                </div>
            </div>
            <!-- ========== Left Sidebar End ========== -->
