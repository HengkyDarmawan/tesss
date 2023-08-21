<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?php echo $title;?></title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url('assets/');?>plugins/fontawesome-free/css/all.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="<?php echo base_url('assets/');?>plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="<?php echo base_url('assets/');?>plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="<?php echo base_url('assets/');?>plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url('assets/');?>dist/css/adminlte.min.css">
</head>
<body class="hold-transition sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?php echo base_url();?>index.php/panitia" class="brand-link">
      <span class="brand-text font-weight-light">Universitas XYZ</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?php echo base_url('assets/img/') . $user['image'];?>" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="<?php echo base_url();?>index.php/panitia" class="d-block"><?php echo $user['name']?></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-header">MENU</li>
          <li class="nav-item">
            <a href="<?php echo base_url();?>index.php/panitia" class="nav-link">
              <i class="nav-icon fas fa-fw fa-tachometer-alt"></i>
              <p>Dashboard</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo base_url();?>index.php/panabsensi" class="nav-link">
              <i class="nav-icon fas fa-fw fa-user-check"></i>
              <p>Absensi</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo base_url();?>index.php/panwebinar" class="nav-link">
              <i class="nav-icon fas fa-fw fa-chalkboard-teacher"></i>
              <p>Seminar / Webinar</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo base_url();?>index.php/panpembicara" class="nav-link">
              <i class="nav-icon fas fa-fw fa-user-graduate"></i>
              <p>Pembicara</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo base_url();?>index.php/panmoderator" class="nav-link">
              <i class="nav-icon fas fa-fw fa-user"></i>
              <p>Moderator</p>
            </a>
          </li>
          <li class="nav-header">SETTING</li>
          <li class="nav-item">
            <a href="<?php echo base_url();?>index.php/panprofile" class="nav-link">
              <i class="nav-icon fas fa-fw fa-user-cog"></i>
              <p>Profile</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo base_url();?>index.php/auth/logout" class="nav-link">
              <i class="nav-icon fas fa-fw fa-sign-out-alt"></i>
              <p>Logout</p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
