<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>PT SAI: PPC SECTION</title>
  <link rel="icon" type="image/png" href="<?=base_url()?>assets/logoaja2.png"/>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/AdminLTE/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/AdminLTE/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/AdminLTE/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/AdminLTE/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/AdminLTE/dist/css/skins/_all-skins.min.css">
  <!-- DataTable -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/AdminLTE/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
 
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
 
  <!-- Google Font -->
  <!-- <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic"> -->
</head>
<body class="hold-transition skin-blue sidebar-mini ">
<!-- Site wrapper -->
<div class="wrapper">
 
  <header class="main-header">
    <!-- Logo -->
    <a href="#" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>PPC</b></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>PPC</b> Section</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>
 
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <li>
            <a href="<?php echo base_url();?>index.php/login/logout"><i class="fa fa-sign-out"> LOGOUT</i></a>
          </li>
        </ul>
      </div>
    </nav>
  </header>
 
  <!-- =============================================== -->
 
  <!-- Left side column. contains the sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        
        <li>
          <a href="<?php echo base_url();?>index.php/ksokp_controller">
            <i class="fa fa-dashboard"></i> <span>User View</span>
          </a>
        </li>

        <li>
          <a href="<?php echo base_url();?>index.php/ksokp_controller/indexGetData">
            <i class="fa fa-archive"></i> <span>Master Data</span>
          </a>
        </li>
        
        <li class="treeview">
          <a href="#">
            <i class="fa fa-edit"></i> <span class="logo-lg">Input Komponen Packing</span> <span hidden class="logo-mini">Input KP</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>          
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url();?>index.php/ksokp_controller/formDataLokal"><i class="fa fa-circle-o"></i> Lokal</a></li>
            <li><a href="<?php echo base_url();?>index.php/ksokp_controller/formDataImport"><i class="fa fa-circle-o"></i> Import</a></li>
          </ul>
        </li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-history"></i> <span class="logo-lg">Data Komponen Packing</span>  <span hidden class="logo-mini">Data KP</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>          
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url();?>index.php/ksokp_controller/indexKpLokal"><i class="fa fa-circle-o"></i> Lokal</a></li>
            <li><a href="<?php echo base_url();?>index.php/ksokp_controller/indexKpImport"><i class="fa fa-circle-o"></i> Import</a></li>
          </ul>
        </li>

      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
 
  <!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
