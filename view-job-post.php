<?php

//To Handle Session Variables on This Page
session_start();


//Including Database Connection From db.php file to avoid rewriting in all files
require_once("db.php");
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
  <!-- Theme style -->
  <link rel="stylesheet" href="css/AdminLTE.min.css">
  <link rel="stylesheet" href="css/_all-skins.min.css">
  <!-- Custom -->
  <link rel="stylesheet" href="css/custom.css">
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<body class="hold-transition skin-blue sidebar-mini">
  <div class="wrapper">

    <header class="main-header">

      <!-- Logo -->
      <a href="index.php" class="logo logo-bg">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b>J</b>P</span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><b>DYCI </b>Job Portal</span>
      </a>

      <!-- Header Navbar: style can be found in header.less -->
      <nav class="navbar navbar-static-top">
        <!-- Navbar Right Menu -->
        <div class="navbar-custom-menu">
          <ul class="nav navbar-nav">
            <?php if (empty($_SESSION['id_user']) && empty($_SESSION['id_company'])) { ?>
              <li>
                <a href="login.php">Login</a>
              </li>
              <li>
                <a href="sign-up.php">Sign Up</a>
              </li>
              <?php } else {

              if (isset($_SESSION['id_user'])) {
              ?>
                <li>
                  <a href="user/index.php">Dashboard</a>
                </li>
              <?php
              } else if (isset($_SESSION['id_company'])) {
              ?>
                <li>
                  <a href="company/index.php">Dashboard</a>
                </li>
              <?php } ?>
              <li>
                <a href="logout.php">Logout</a>
              </li>
            <?php } ?>
          </ul>
        </div>
      </nav>
    </header>

    <div class="content-wrapper" style="margin-left: 0px;">

      <?php

      $sql = "SELECT * FROM job_post INNER JOIN company ON job_post.id_company=company.id_company WHERE id_jobpost='$_GET[id]'";
      $result = $conn->query($sql);
      if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
      ?>

          <section id="candidates" class="content-header">
            <div class="container">
              <div class="row">
                <div class="col-md-12 bg-white padding-2">
                  <div class="pull-left">
                    <?php
                    if ($row['logo'] > 0) {
                      $image = $row['logo'];
                    } else {
                      $image = "2x2.jpg";
                    }
                    ?>
                    <div align="center" style="width:144px;height:144px;padding:2px;">
                      <img src="../uploads/logo/<?php echo $image; ?>" class="img-thumbnail">
                    </div>
                    <div class="pull-left" style="margin-left:10px;">
                      <h3><b><i><?php echo $row['companyname']; ?></b></i></h3>

                      <h2><b><i><?php echo $row['jobtitle']; ?></i></b></h2>
                      <h4><i>(<?php echo $row['jobtype']; ?>)</i></h4>
                    </div>

                    <div class="pull-right">

                      <a href="jobs.php" class="btn btn-default btn-lg btn-flat margin-top-20"><i class="fa fa-arrow-circle-left"></i> Back</a><br />

                      <?php
                      if (isset($_SESSION["id_user"]) && empty($_SESSION['companyLogged'])) { ?>
                        <div>
                          <a href="apply.php?id=<?php echo $row['id_jobpost']; ?>" class="btn btn-default btn-lg btn-flat margin-top-20"><i class="fa fa-check-circle" aria-hidden="true"></i> Apply</a>&nbsp;
                          <a href="user/create-mail.php" class="btn btn-default btn-lg btn-flat margin-top-20"><i class="fa fa-envelope"></i> Email</a>
                        </div>
                      <?php } ?>



                    </div>
                    <div class="clearfix"></div>
                    <hr>

                    <div class="row">

                      <div class="col-md-6">
                        <h4 style="font-size:16px;"><b>Job Description</b></h4>
                        <?php echo stripcslashes($row['description']); ?><br />
                        <h4 style="font-size:16px;"><b>Job Requirements</b></h4>
                        <?php echo stripcslashes($row['requirements']); ?><br />
                        <br />
                        <p style="font-size:16px;"><i class="fa fa-users" aria-hidden="true"></i> <strong>Position available: </strong> <?php echo $row['position']; ?></p>
                        <p style="font-size:16px;"><i class="fa fa-suitcase" aria-hidden="true"></i> <strong>With Experience atleast: </strong> <?php echo $row['experience']; ?> YEARS</p>
                        <p style="font-size:16px;"><i class="fa fa-usd" aria-hidden="true"></i> <strong>Salary: </strong><i class="fa fa-rub" aria-hidden="true"></i> <?php echo number_format($row['minimumsalary']); ?> - </strong><i class="fa fa-rub" aria-hidden="true"></i> <?php echo number_format($row['maximumsalary']); ?></p>
                        <p style="font-size:16px;"><i class="fa fa-calendar-o" aria-hidden="true"></i> <strong>Apply Till: </strong><?php echo date("M-d-Y", strtotime($row['createdat'])); ?> - </strong><?php echo date("M-d-Y", strtotime($row['applyBy'])); ?></p>
                      </div>
                      <div class="col-md-6">
                        <div>
                          <h4 style="font-size:20px;"><b>COMPANY PROFILE</b></h4>
                          <br />
                          <p style="font-size:16px;"><span class="margin-right-10"><i class="fa fa-globe"></i>&nbsp;&nbsp;&nbsp;<?php echo $row['website']; ?></span></p>
                          <p style="font-size:16px;"><span class="margin-right-10"><i class="fa fa-location-arrow"></i>&nbsp;&nbsp;&nbsp;<?php echo $row['city']; ?>, <?php echo $row['state']; ?>, <?php echo $row['country']; ?></span></p>
                          <p style="font-size:16px;"><i class="fa fa-calendar"></i>&nbsp;&nbsp;&nbsp;<?php echo date("d-M-Y", strtotime($row['createdat'])); ?></p>
                          <p style="font-size:16px;"> <i class="fa fa-telegram" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;<?php echo $row['contactno']; ?></p>
                          <br />

                        </div>
                        <h4 style="font-size:16px;"><b>COMPANY SUMMARY</b></h4>
                        <?php echo stripcslashes($row['aboutme']); ?><br />
                        <br />
                        <h4 style="font-size:16px;"><b>MISSION</b></h4>
                        <?php echo stripcslashes($row['mission']); ?><br />
                        <br />
                        <h4 style="font-size:16px;"><b>VISION</b></h4>
                        <?php echo stripcslashes($row['vision']); ?><br />
                        <br />
                      </div>
                    </div>
                    <br />
                    <br />
                  </div>
                </div>
                <hr>


              </div>
            </div>
    </div>
  </div>
  </div>
  </div>
  </section>

<?php
        }
      }
?>
</div>
<!-- /.content-wrapper -->


<?php
include('include/footer.php');
?>