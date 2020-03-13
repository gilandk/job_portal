<?php

session_start();

if (isset($_SESSION['id_user']) || isset($_SESSION['id_company'])) {
  header("Location: index.php");
  exit();
}

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
            <li>
              <a href="jobs.php">Jobs</a>
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
    <div class="content-wrapper" style="margin-left: 0px;">

      <section class="content-header">
        <div class="container">
          <div class="row latest-job margin-top-50 margin-bottom-20 bg-white">
            <h1 class="text-center margin-bottom-20">CREATE YOUR PROFILE</h1><br />
            <form method="post" id="registerCandidates" action="adduser.php" enctype="multipart/form-data">
              <div class="col-md-12 latest-job ">

                <!-- PERSONAL INFO -->
                <!-- Student number -->
                <div class="form-group">
                  <input class="form-control input-lg" type="number" id="sno" name="sno" placeholder="Student Number *" required>
                </div>
                <!-- Student number -->
                <div class="form-group">
                  <input class="form-control input-lg" type="text" id="fname" name="fname" placeholder="Full Name *" required>
                </div>
                <div class="form-group">
                  <input class="form-control input-lg" type="email" id="email" name="email" placeholder="Email *" required>
                </div>
                <div class="form-group">
                  <input class="form-control input-lg" type="text" id="contactno" name="contactno" minlength="11" maxlength="11" onkeypress="return validatePhone(event);" placeholder="Phone Number">
                </div>
                <div class="form-group">
                  <label>Date of Birth</label>
                  <input class="form-control input-lg" type="date" id="dob" min="1960-01-01" name="dob" placeholder="Date Of Birth" required>
                </div>
                <div class="form-group">
                  <input class="form-control input-lg" type="text" id="age" name="age" placeholder="Age" readonly>
                </div>
                <div class="form-group">
                  <select class="form-control input-lg" type="text" id="gender" name="gender" required>
                    <option value="">---Select Gender---</option>
                    <option>Male</option>
                    <option>Female</option>
                    <option>Other</option>
                  </select>
                </div>

                <!-- PERSONAL INFO -->

                <!-- EDUCATIONAL INFO -->

                <!-- ADD -->
                <div class="form-group">
                  <input class="form-control input-lg" type="text" id="fos" name="fos" placeholder="School" required>
                </div>
                <div class="form-group">
                  <input class="form-control input-lg" type="text" id="course" name="course" placeholder="Course" required>
                </div>
                <!-- ADD -->

                <!-- EDUCATIONAL INFO -->

                <?php
                //If User already registered with this email then show error message.
                if (isset($_SESSION['registerError'])) {
                ?>
                  <div class="form-group">
                    <label style="color: red;">Email Already Exists! Choose A Different Email!</label>
                  </div>
                <?php
                  unset($_SESSION['registerError']);
                }
                ?>

                <?php if (isset($_SESSION['uploadError'])) { ?>
                  <div class="form-group">
                    <label style="color: red;"><?php echo $_SESSION['uploadError']; ?></label>
                  </div>
                <?php unset($_SESSION['uploadError']);
                } ?>

                <!-- ADDRESS -->
                <div class="form-group">
                  <textarea class="form-control input-lg" rows="4" id="address" name="address" placeholder="Address"></textarea>
                </div>
                <div class="form-group">
                  <input class="form-control input-lg" type="text" id="city" name="city" placeholder="City" required>
                </div>
                <div class="form-group">
                  <input class="form-control input-lg" type="text" id="state" name="state" placeholder="State/Region/Province" required>
                </div>
                <!-- ADDRESS -->

                <!-- PASSWORD -->
                <label>Create a Unique Password</label>
                <div class="form-group">
                  <input class="form-control input-lg" type="password" id="password" name="password" placeholder="Password *" required>
                </div>
                <div class="form-group">
                  <input class="form-control input-lg" type="password" id="cpassword" name="cpassword" placeholder="Confirm Password *" required>
                </div>
                <div id="passwordError" class="btn btn-flat btn-danger hide-me">
                  Password Mismatch!!
                </div>
                <!-- PASSWORD -->

                <div class="form-group">
                  <label style="color: red;">File Format PDF Only!</label>
                  <input type="file" name="resume" class="btn btn-flat btn-danger" required>
                </div>

                <div class="form-group checkbox">
                  <label><input type="checkbox"> I accept terms & conditions</label>
                </div>
                <div class="form-group">
                  <button class="btn btn-primary">Register</button>
                </div>
              </div>
            </form>

          </div>
        </div>
      </section>



    </div>
    <!-- /.content-wrapper -->

    <?php
    include('include/footer.php');
    ?>

    <script type="text/javascript">
      function validatePhone(event) {

        //event.keycode will return unicode for characters and numbers like a, b, c, 5 etc.
        //event.which will return key for mouse events and other events like ctrl alt etc. 
        var key = window.event ? event.keyCode : event.which;

        if (event.keyCode == 8 || event.keyCode == 46 || event.keyCode == 37 || event.keyCode == 39) {
          // 8 means Backspace
          //46 means Delete
          // 37 means left arrow
          // 39 means right arrow
          return true;
        } else if (key < 48 || key > 57) {
          // 48-57 is 0-9 numbers on your keyboard.
          return false;
        } else return true;
      }
    </script>

    <script type="text/javascript">
      $('#dob').on('change', function() {
        var today = new Date();
        var birthDate = new Date($(this).val());
        var age = today.getFullYear() - birthDate.getFullYear();
        var m = today.getMonth() - birthDate.getMonth();

        if (m < 0 || (m === 0 && today.getDate() < birthDate.getDate())) {
          age--;
        }

        $('#age').val(age);
      });
    </script>

    <script>
      $("#registerCandidates").on("submit", function(e) {
        e.preventDefault();
        if ($('#password').val() != $('#cpassword').val()) {
          $('#passwordError').show();
        } else {
          $(this).unbind('submit').submit();
        }
      });
    </script>
</body>

</html>