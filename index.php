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
        <span class="logo-lg"><b>DYCI</b> Job Portal</span>

      </a>

      <!-- Header Navbar: style can be found in header.less -->
      <nav class="navbar navbar-static-top">
        <!-- Navbar Right Menu -->
        <div class="navbar-custom-menu">
          <ul class="nav navbar-nav">
            <li>
              <a href="jobs.php">Find Jobs</a>
            </li>
            <li>
              <a href="#Applicants">Applicants</a>
            </li>
            <li>
              <a href="#company">Company</a>
            </li>
            <li>
              <a href="#about">About Us</a>
            </li>
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

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper gradientbg1" style="margin-left: 0px;">

      <section class="content-header bg-main">
        <div class="container">
          <div class="row">
            <div class="col-md-12 text-center index-head">
              <h1>All <strong>JOBS</strong> In One Place</h1>
              <p>One search, global reach</p>
              <p><a class="btn btn-success btn-lg" href="jobs.php" role="button">Search Jobs</a></p>
            </div>
          </div>
        </div>
      </section>

      <section class="content-header">
        <div class="container">
          <div class="row">
            <div class="col-md-12 latest-job margin-bottom-20">
              <h1 class="text-center"><strong><em> Latest Jobs</em></strong></h1>
              <br />
              <?php
              /* Show any 5 random job post
           * 
           * Store sql query result in $result variable and loop through it if we have any rows
           * returned from database. $result->num_rows will return total number of rows returned from database.
          */
              $sql = "SELECT * FROM job_post Order By Rand() Limit 10";
              $result = $conn->query($sql);
              if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                  $sql1 = "SELECT * FROM company WHERE id_company='$row[id_company]'";
                  $result1 = $conn->query($sql1);
                  if ($result1->num_rows > 0) {
                    while ($row1 = $result1->fetch_assoc()) {
              ?>
                      <div class="attachment-block clearfix">
                        <?php
                        if ($row1['logo'] > 0) {
                          $image = $row1['logo'];
                        } else {
                          $image = "2x2.jpg";
                        }
                        ?>
                        <img class="attachment-img" src="uploads/logo/<?php echo $image; ?>" alt="Attachment Image">


                        <div class="attachment-pushed">
                          <h4 class="attachment-heading"><a href="view-job-post.php?id=<?php echo $row['id_jobpost']; ?>"><?php echo $row['jobtitle']; ?></a> <span class="attachment-heading pull-right">PHP <?php echo number_format($row['maximumsalary']); ?>/Month</span></h4>
                          <div class="attachment-text">
                            <div><strong><?php echo $row1['companyname']; ?> | <?php echo $row1['city']; ?> | Experience <?php echo $row['experience']; ?> Years</strong></div>
                          </div>
                        </div>
                      </div>
              <?php
                    }
                  }
                }
              }
              ?>

            </div>
          </div>
        </div>
      </section>
      <section id="Applicants" class="content-header">
        <div class="container">
          <div class="row">
            <div class="col-md-12 text-center latest-job margin-bottom-20">
              <h2><strong>Applicants</strong></h2>
              <p style="font-size:18px"><em>Finding a job just got easier. Create a profile and apply with single mouse click.</em></p>
              <br />
            </div>
          </div>
          <div class="row">
            <div class="col-sm-4 col-md-4">
              <div class="thumbnail candidate-img">
                <img src="img/browse.jpg" alt="Browse Jobs">
                <div class="caption">
                  <h4 class="text-center">Browse Jobs</h4>
                </div>
              </div>
            </div>
            <div class="col-sm-4 col-md-4">
              <div class="thumbnail candidate-img">
                <img src="img/interviewed.jpeg" alt="Apply & Get Interviewed">
                <div class="caption">
                  <h4 class="text-center">Apply & Get an Interview</h4>
                </div>
              </div>
            </div>
            <div class="col-sm-4 col-md-4">
              <div class="thumbnail candidate-img">
                <img src="img/career.jpg" alt="Start A Career">
                <div class="caption">
                  <h4 class="text-center">Start A Career</h4>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

      <section id="company" class="content-header">
        <div class="container">
          <div class="row">
            <div class="col-md-12 text-center latest-job margin-bottom-20">
              <h2><strong>Companies</strong></h2>
              <p style="font-size:18px"><em>Hiring? Register your company for free, browse our talented pool, post and track job applications.</em></p>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-4 col-md-4">
              <div class="thumbnail company-img">
                <img src="img/postjob.png" alt="Browse Jobs">
                <div class="caption">
                  <h3 class="text-center"><b>Post A Job</b></h3>
                </div>
              </div>
            </div>
            <div class="col-sm-4 col-md-4">
              <div class="thumbnail company-img">
                <img src="img/manage.jpg" alt="Apply & Get Interviewed">
                <div class="caption">
                  <h3 class="text-center"><b>Manage & Track</b></h3>
                </div>
              </div>
            </div>
            <div class="col-sm-4 col-md-4">
              <div class="thumbnail company-img">
                <img src="img/hire.png" alt="Start A Career">
                <div class="caption">
                  <h3 class="text-center"><b>Hire</b></h3>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

      <section id="statistics" class="content-header">
        <div class="container">
          <div class="row">
            <div class="col-md-12 text-center latest-job margin-bottom-20">
              <h2><strong>Our Statistics</strong></h2>
              <br />
            </div>
          </div>
          <div class="row">
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-aqua">
                <div class="inner">
                  <?php
                  $sql = "SELECT * FROM job_post";
                  $result = $conn->query($sql);
                  if ($result->num_rows > 0) {
                    $totalno = $result->num_rows;
                  } else {
                    $totalno = 0;
                  }
                  ?>
                  <h3><?php echo $totalno; ?></h3>

                  <p>Job Offers</p>
                </div>
                <div class="icon">
                  <i class="ion ion-ios-paper"></i>
                </div>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-green">
                <div class="inner">
                  <?php
                  $sql = "SELECT * FROM company WHERE active='1'";
                  $result = $conn->query($sql);
                  if ($result->num_rows > 0) {
                    $totalno = $result->num_rows;
                  } else {
                    $totalno = 0;
                  }
                  ?>
                  <h3><?php echo $totalno; ?></h3>

                  <p>Registered Company</p>
                </div>
                <div class="icon">
                  <i class="ion ion-briefcase"></i>
                </div>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-yellow">
                <div class="inner">
                  <?php
                  $sql = "SELECT * FROM users WHERE resume!=''";
                  $result = $conn->query($sql);
                  if ($result->num_rows > 0) {
                    $totalno = $result->num_rows;
                  } else {
                    $totalno = 0;
                  }
                  ?>
                  <h3><?php echo $totalno; ?></h3>

                  <p>CV'S/Resume</p>
                </div>
                <div class="icon">
                  <i class="ion ion-ios-list"></i>
                </div>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-red">
                <div class="inner">
                  <?php
                  $sql = "SELECT * FROM users WHERE active='1'";
                  $result = $conn->query($sql);
                  if ($result->num_rows > 0) {
                    $totalno = $result->num_rows;
                  } else {
                    $totalno = 0;
                  }
                  ?>
                  <h3><?php echo $totalno; ?></h3>

                  <p>Daily Users</p>
                </div>
                <div class="icon">
                  <i class="ion ion-person-stalker"></i>
                </div>
              </div>
            </div>
            <!-- ./col -->
          </div>
        </div>
        <br />
      </section>

      <section id="about" class="content-header">
        <div class="container">
          <div class="row">
            <div class="col-md-12 text-center latest-job margin-bottom-20">
              <h2><strong>About US</strong></h2>
              <br />
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <img src="img/browse.jpg" class="img-responsive">
            </div>
            <div class="col-md-6 about-text margin-bottom-20">
              <p>The online job portal application allows job seekers and recruiters to connect. The application provides the ability for job seekers to create their accounts, upload their profile and resume, search for jobs, apply for jobs, view different job openings. The application provides the ability for companies to create their accounts, search Applicants, create job postings, and view Applicants applications.
              </p>
              <p>
                This website is used to provide a platform for potential Applicants to get their dream job and excel in their career.
                This site can be used as a paving path for both companies and job-seekers for a better life .

              </p>
            </div>
          </div>
        </div>
      </section>

      <section id="about" class="content-header">
        <div class="container">
          <div class="row">
            <div class="col-md-12 text-center latest-job margin-bottom-20">
              <br/>
              <h2><strong>Contact US</strong></h2>
              <br />
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <h3><strong><em>Send us a message</em></strong></h3><br/>
              <form method="post" action="contact.php" enctype="multipart/form-data">

                <div class="form-group">
                  <label>Full name</label>
                  <input class="form-control input-lg" id="fullname" name="fullname" type="text" placeholder="Full name" />
                </div>

                <div class="form-group">
                  <label>Email Address</label>
                  <input class="form-control input-lg" id="email" name="email" type="email" placeholder="Email Address" />
                </div>

                <div class="form-group">
                  <label>Contact No</label>
                  <input class="form-control input-lg" type="text" id="contact" name="contact" placeholder="Contact No" />
                </div>

                <div class="form-group">
                  <label>Message</label>
                  <textarea class="form-control input-lg" rows="8" id="message" name="message" placeholder="Enter your Message"></textarea>
                </div>

                <button type="submit" class="btn btn-success" id="send" name="send">Send</button>

              </form>

            </div>
            <div class="col-md-6" style="padding-left:50px;">
            <h3><strong><em>You may find us here @</em></strong></h3><br/>
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3857.430406310137!2d120.92062830952682!3d14.801082825492063!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3397ad6bd3dd4583%3A0x30149e131774a35f!2sDr.%20Yanga&#39;s%20Colleges%2C%20Inc.!5e0!3m2!1sen!2sph!4v1585106363158!5m2!1sen!2sph" width="600" height="500" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
            </div>
          </div>
        </div>
      </section>

      <br />
    </div>
    <!-- /.content-wrapper -->

    <?php
    include('include/footer.php');
    ?>