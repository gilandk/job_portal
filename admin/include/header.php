<?php

session_start();

if (empty($_SESSION['id_admin'])) {
  header("Location: index.php");
  exit();
}

require_once("../db.php");
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Job Portal</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../css/AdminLTE.min.css">
  <link rel="stylesheet" href="../css/_all-skins.min.css">
  <!-- Custom -->
  <link rel="stylesheet" href="../css/custom.css">
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <script src="../js/tinymce/tinymce.min.js"></script>

  <script>
    tinymce.init({
      selector: '#description',
      height: 300

    });
  </script>


  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<body class="hold-transition skin-blue sidebar-mini">
  <div class="wrapper">

    <header class="main-header">

      <!-- Logo -->
      <a href="index.php" class="logo logo-bg">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b>DYCI</b></span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><b>DYCI </b>Job Portal</span>
      </a>

      <!-- Header Navbar: style can be found in header.less -->
      <nav class="navbar navbar-static-top">
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
          <span class="sr-only">Toggle navigation</span>
        </a>
        <!-- Navbar Right Menu -->
        <div class="navbar-custom-menu">
          <ul class="nav navbar-nav">

          </ul>
        </div>
      </nav>
    </header>

    <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar">
      <!-- sidebar: style can be found in sidebar.less -->
      <section class="sidebar">
        <!-- Sidebar user panel -->

        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu tree" data-widget="tree">

          <li class="active"><a href="dashboard.php"><i class="fa fa-dashboard"></i><span> Dashboard</span></a></li>
          <li class="active"><a href="active-jobs.php"><i class="fa fa-briefcase"></i> <span>Active Jobs</span></a></li>
          <li><a href="applications.php"><i class="fa fa-address-card-o"></i> <span>Applications</span></a></li>
          <li><a href="companies.php"><i class="fa fa-building"></i> <span>Companies</span></a></li>
          <li><a href="contactus.php"><i class="fa fa-inbox" aria-hidden="true"></i> <span>Messages
                <?php
                $sql1 = "SELECT * FROM contact_us WHERE status='0'";
                $result1 = $conn->query($sql1);
                $total1 = $result1->num_rows;

                if ($total1 == '0') {
                  echo '';
                } else {
                  echo '<span class="label label-danger pull-right"> ' . $total1 . '</span>';
                }
                ?>

              </span></a></li>

          <li><a href="../logout.php"><i class="fa fa-arrow-circle-o-right"></i><span> Logout</span></a></li>

        </ul>
      </section>
      <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">

      <section id="candidates" class="content-header">
        <div class="container">
          <div class="row">