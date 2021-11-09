<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <!-- Meta, title, CSS, favicons, etc. -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="<?php echo base_url(); ?>depan/images/favicon.png" rel="shortcut icon" type="image/vnd.microsoft.icon" />

  <title>Sanggar Wicara | Admin</title>

  <!-- Bootstrap -->
  <link href="<?php echo base_url() ?>/template/back/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

  <link rel="stylesheet" href="<?php echo base_url() . 'assets/plugins/datepicker/datepicker3.css' ?>">

  <!-- Font Awesome -->
  <link href="<?php echo base_url() ?>/template/back/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <!-- NProgress -->
  <link href="<?php echo base_url() ?>/template/back/vendors/nprogress/nprogress.css" rel="stylesheet">
  <!-- iCheck -->
  <link href="<?php echo base_url() ?>/template/back/vendors/iCheck/skins/flat/green.css" rel="stylesheet">

  <!-- bootstrap-progressbar -->
  <link href="<?php echo base_url() ?>/template/back/vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
  <!-- JQVMap -->
  <link href="<?php echo base_url() ?>/template/back/vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet" />
  <!-- bootstrap-daterangepicker -->
  <link href="<?php echo base_url() ?>/template/back/vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
  <!-- Datatables -->

  <link href="<?php echo base_url() ?>/template/back/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
  <link href="<?php echo base_url() ?>/template/back/vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
  <link href="<?php echo base_url() ?>/template/back/vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
  <link href="<?php echo base_url() ?>/template/back/vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
  <link href="<?php echo base_url() ?>/template/back/vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">

  <!-- Custom Theme Style -->
  <link href="<?php echo base_url() ?>/template/back/build/css/custom.min.css" rel="stylesheet">
</head>

<body class="nav-md">
  <div class="container body">
    <div class="main_container">
      <div class="col-md-3 left_col">
        <div class="left_col scroll-view">
          <div class="navbar nav_title" style="border: 0;">
            <a href="index.html" class="site_title"><span>Sanggar Wicara</span></a>
          </div>

          <div class="clearfix"></div>


          <br />

          <?php
          $query = $this->db->query("SELECT * FROM tbl_inbox WHERE inbox_status='1'");
          $jum_pesan = $query->num_rows();
          ?>
          <!-- sidebar menu -->
          <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
            <div class="menu_section">
              <h3>General</h3>
              <ul class="nav side-menu">
                <li><a href="<?php echo base_url() ?>cpaneladministrator"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                <li><a href="<?php echo base_url() ?>cpaneladministrator/pengumuman"><i class="fa fa-newspaper-o"></i> Pengumuman</a></li>
                <li><a href="<?php echo base_url() ?>cpaneladministrator/agenda"><i class="fa fa-bookmark"></i> Agenda</a></li>
                <li><a href="<?php echo base_url() ?>cpaneladministrator/inbox"><i class="fa fa-envelope-o"></i> Inbox <span class="badge bg-green"><?php echo $jum_pesan ?></span></a>
                </li>
                <li><a href="<?php echo base_url() ?>cpaneladministrator/guru"><i class="fa fa-female"></i> Terapis & Guru</a></li>
                <li><a><i class="fa fa-dollar"></i> Donasi <span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu">
                    <li><a href="<?php echo base_url() ?>cpaneladministrator/donasi">Donasi</a></li>
                    <li><a href="<?php echo base_url() ?>cpaneladministrator/penyaluran">Penyaluran Donasi</a></li>
                  </ul>
                </li>
                <li><a href="<?php echo base_url() ?>cpaneladministrator/galeri_foto"><i class="fa fa-camera"></i> Galeri </a>
                </li>
              </ul>
            </div>
            <div class="menu_section">
              <h3>Settings</h3>
              <ul class="nav side-menu">
                <li><a><i class="fa fa-table"></i> Data Master <span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu">
                    <li><a href="<?php echo base_url() ?>cpaneladministrator/bank">Bank</a></li>
                  </ul>
                </li>
                <li><a><i class="fa fa-users"></i> Akun <span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu">
                    <li><a href="<?php echo base_url() ?>cpaneladministrator/tentang">Tentang Kami</a></li>
                    <li><a href="<?php echo base_url() ?>cpaneladministrator/akunadmin">Admin</a></li>
                  </ul>
                </li>
              </ul>
            </div>

          </div>
        </div>
      </div>

      <!-- top navigation -->
      <div class="top_nav">
        <div class="nav_menu">
          <div class="nav toggle">
            <a id="menu_toggle"><i class="fa fa-bars"></i></a>
          </div>
          <nav class="nav navbar-nav">
            <ul class=" navbar-right">
              <li class="nav-item dropdown open" style="padding-left: 15px;">
                <a href="javascript:;" class="user-profile dropdown-toggle" aria-haspopup="true" id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
                  <?php echo $this->session->userdata('nama'); ?>
                </a>
                <div class="dropdown-menu dropdown-usermenu pull-right" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="<?php echo base_url('cpaneladministrator/keluar') ?>"><i class="fa fa-sign-out pull-right"></i> Log Out</a>
                </div>
              </li>

              <li role="presentation" class="nav-item dropdown open">
                <a href="javascript:;" class="dropdown-toggle info-number" id="navbarDropdown1" data-toggle="dropdown" aria-expanded="false">
                  <i class="fa fa-envelope-o"></i>
                  <span class="badge bg-green"><?php echo $jum_pesan ?></span>
                </a>
                <ul class="dropdown-menu list-unstyled msg_list" role="menu" aria-labelledby="navbarDropdown1">
                  <?php
                  $inbox = $this->db->query("SELECT tbl_inbox.*,DATE_FORMAT(inbox_tanggal,'%d %M %Y') AS tanggal FROM tbl_inbox WHERE inbox_status='1' ORDER BY inbox_id DESC ");
                  foreach ($inbox->result_array() as $in) :
                    $inbox_id = $in['inbox_id'];
                    $inbox_nama = $in['inbox_nama'];
                    $inbox_tgl = $in['tanggal'];
                    $inbox_pesan = $in['inbox_pesan'];
                  ?>
                    <li class="nav-item">
                      <a href="<?php echo base_url() . 'cpaneladministrator/inbox' ?>" class="dropdown-item">
                        <span class="image"><img src="<?php echo base_url() ?>template/back/img/icon.png" alt="Profile Image" /></span>
                        <span>
                          <span><?php echo $inbox_nama ?></span>
                          <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                          <?php echo $inbox_pesan ?>
                        </span>
                      </a>
                    </li>
                  <?php endforeach; ?>
                  <li class="nav-item">
                    <div class="text-center">
                      <a href="<?php echo base_url() . 'cpaneladministrator/inbox' ?>" class="dropdown-item">
                        <strong>Lihat Semua Pesan</strong>
                        <i class="fa fa-angle-right"></i>
                      </a>
                    </div>
                  </li>
                </ul>
              </li>
            </ul>
            </li>
            <!-- /top navigation -->
            </ul>
          </nav>
        </div>
      </div>
      <!-- /top navigation -->