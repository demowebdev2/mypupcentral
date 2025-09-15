<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?=$title?></title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?=base_url()?>assets/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="<?=base_url()?>assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?=base_url()?>assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="<?=base_url()?>assets/plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?=base_url()?>assets/dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="<?=base_url()?>assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="<?=base_url()?>assets/plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="<?=base_url()?>assets/plugins/summernote/summernote-bs4.css">

  <link rel="stylesheet" href="<?=base_url()?>assets/plugins/toastr/toastr.min.css">


  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <!-- jQuery -->
  <script src="<?=base_url()?>assets/plugins/jquery/jquery.min.js"></script>
  <link rel="stylesheet"  href="<?=base_url()?>assets/DataTables/datatables.min.css"/>

  <script type="text/javascript" src="<?=base_url()?>assets/DataTables/datatables.min.js"></script>


<script type="text/javascript" src="<?=base_url()?>assets/DataTables/pdfmake.min.js"></script>
<script type="text/javascript" src="<?=base_url()?>assets/DataTables/vfs_fonts.js"></script>

	<link rel="stylesheet" href="<?=base_url()?>assets/plugins/jqueryconfirm/jquery-confirm.min.css">
	<script type="text/javascript" src="<?=base_url()?>assets/plugins/jqueryconfirm/jquery-confirm.min.js"></script>

  <script type="text/javascript" src="<?=base_url()?>assets/dist/js/main.js"></script>
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
  
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      
    </ul>

    <!-- SEARCH FORM -->
    <!-- <form class="form-inline ml-3">
      <div class="input-group input-group-sm">
        <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-navbar" type="submit">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
    </form> -->

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Messages Dropdown Menu -->
     
      
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
          <i class="fas fa-th-large"></i>
        </a>
      </li>

      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
        <img src="<?=base_url()?>assets/user.jpg" alt="user" width="30" class="profile-pic rounded-circle">
          <span class="badge badge-warning navbar-badge"></span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item pf_summary">
          <img src="<?=base_url()?>assets/user.jpg" alt="user" width="60" class="profile-pic rounded-circle"> &nbsp;&nbsp; Super Admin 
            
          </a>
          <div class="dropdown-divider"></div>
          <a href="<?=base_url()?>staff/Profile" class="dropdown-item">
          <i class="fas fa-user text-primary"></i> &nbsp; Profile
          </a>
          <div class="dropdown-divider"></div>
           <a href="<?=base_url()?>Site/logout_staff" class="dropdown-item">
           <i class="fas fa-sign-out-alt text-danger"></i> &nbsp;  Logout
          </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->
<style>
  .pf_summary{
    height: 100px;
    background: #007bff;
    color: #fff;
  }
  .pf_summary:hover{
    height: 100px;
    background: #007bff;
    color: #fff;
  }
</style>
  <?php include_once('sidebar_menu.php'); ?>
