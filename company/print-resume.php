<?php

//To Handle Session Variables on This Page
session_start();

//If user Not logged in then redirect them back to homepage. 
if (empty($_SESSION['id_company'])) {
  header("Location: ../index.php");
  exit();
}

require_once("../db.php");


$sql = "SELECT * FROM users WHERE id_user='$_GET[id]'";
$result = $conn->query($sql);

while ($row = $result->fetch_assoc()) {

  $fname = $row['fname'];
}

?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php echo $fname; ?> Resume</title>

  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../css/AdminLTE.min.css">
  <link rel="stylesheet" href="../css/_all-skins.min.css">
  <!-- Custom -->
  <link rel="stylesheet" href="../css/custom.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>

  <style type="text/css">
    .wrapper {
      max-height: 11in;
      max-width: 8.27in;
      margin-top: 14px !important;
      background: #fff;
      margin: 0 auto;
      padding: 20px;

    }

    body {
      background: #ccc;
    }

    @page {
      size: auto;
      margin: 0mm;
    }

    @media print {
      .screen {
        display: none;
      }

      .print {
        display: block;
      }
    }

    .wrapper::-webkit-scrollbar {
      width: 0 !important
    }
  </style>
  <script>
    function myFunction() {
      window.print();
    }
  </script>
  <!--  bootstrap end -->
</head>

<body>
  <div class="text-center">
    <br />
    <button class="btn btn-primary screen" onclick="myFunction()"><i class="fa fa-cloud-download"></i> Download Resume</button>
  </div>
  <div class="container wrapper">
    <div class="col-md-12">
      <?php
      $sql = "SELECT * FROM users WHERE id_user='$_GET[id]'";
      $result = $conn->query($sql);

      //If Job Post exists then display details of post
      if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
      ?>
          <div class="pull-left" style="margin-left:50px;">
            <?php
            if ($row['profile'] > 0) {
              $image = $row['profile'];
            } else {
              $image = "2x2.jpg";
            }
            ?>
            <img src="../uploads/profile/<?php echo $image; ?>" class="img-thumbnail" style="max-height:144px;max-width:144px;">
          </div>
          <div class="pull-left" style="margin-left:20px;">
            <h3><b><i><?php echo $row['fname'] ?></i></b></h3>
            <h5><i class="fa fa-envelope-square" aria-hidden="true"></i><i> <?php echo $row['email'] ?></i></h5>
            <h5><i class="fa fa-location-arrow" aria-hidden="true"></i><i> <?php echo $row['address']; ?>, <?php echo $row['city']; ?>, <?php echo $row['state']; ?></i></h5>
            <h5><i class="fa fa-telegram" aria-hidden="true"></i> <i><?php echo $row['contactno'] ?></i></h5>
          </div>
          <div class="clearfix"></div>


          <!--div-->
          <hr />
          <div class="text-center">
            <h5 style="font-size:14px;"><b> Educational Background</b></h5>
          </div>
          <hr />

          <p style="font-size:14px;margin-left:50px;">
            <strong style="font-size:14px;"><?php echo $row['qualification'] . ' ' . $row['course']; ?></strong><br />
            <strong> <?php echo $row['fos']; ?></strong><br />

            <?php

            $yearAt = strtotime($row['yearAt']);

            $passingyear = strtotime($row['passingyear']);
            $cdate = date("M-Y");

            if ($passingyear != $cdate) {
              $ygrad = $passingyear = date("M-Y", strtotime($row['passingyear']));
            }
            ?>
            <?php echo date("M-Y", $yearAt); ?> to <?php echo $ygrad; ?><br />
          </p>
          <hr />
          <div class="text-center">
            <h5 style="font-size:14px;"><b>Employment History</b></h5>
          </div>
          <hr />

          <?php

          if (empty($row['company_name'])) {
            $display = ';display:none;';
          } else {
            $display = '';
          }
          ?>

          <div class="pull-left">
            <p style="font-size:14px;margin-left:50px<?php echo $display; ?>">
              <strong style="font-size:14px;"><?php echo $row['position']; ?></strong> <em>(<?php echo $row['emp_type']; ?>)</em> <br />
              <strong><?php echo $row['company_name']; ?></strong> - <?php echo $row['company_add']; ?><br />

              <?php $djoin = strtotime($row['datejoined']); ?>
              <?php
              $dleft = strtotime($row['dateleft']);
              $curdate = date("M-Y");
              if ($dleft != $curdate) {
                $stats = "Up to Present";
              }
              ?>
              <?php echo date("M-Y", $djoin); ?> to <?php echo date("M-Y", $dleft); ?><br />
            </p>

            <?php

            if (empty($row['company_name1'])) {
              $display1 = ';display:none;';
            } else {
              $display1 = '';
            }
            ?>

            <p style="font-size:14px;margin-left:50px<?php echo $display1; ?>">
              <strong style="font-size:14px;"><?php echo $row['position1']; ?></strong> <em>(<?php echo $row['emp_type1']; ?>)</em> <br />
              <strong><?php echo $row['company_name1']; ?></strong> - <?php echo $row['company_add1']; ?><br />
              <?php $djoin1 = strtotime($row['datejoined1']); ?>
              <?php $dleft1 = strtotime($row['dateleft1']); ?>
              <?php echo date("M-Y", $djoin1); ?> to <?php echo date("M-Y", $dleft1); ?><br />
            </p>

            <?php

            if (empty($row['company_name2'])) {
              $display2 = ';display:none;';
            } else {
              $display2 = '';
            }
            ?>

            <p style="font-size:14px;margin-left:50px<?php echo $display2; ?>">
              <strong style="font-size:14px;"><?php echo $row['position2']; ?></strong> <em>(<?php echo $row['emp_type2']; ?>)</em> <br />
              <strong><?php echo $row['company_name2']; ?></strong> - <?php echo $row['company_add2']; ?><br />
              <?php $djoin2 = strtotime($row['datejoined2']); ?>
              <?php $dleft2 = strtotime($row['dateleft2']); ?>
              <?php echo date("M-Y", $djoin2); ?> to <?php echo date("M-Y", $dleft2); ?><br />
            </p>
          </div>


          <div class="clearfix"></div>
          <hr />
          <div class="text-center">
            <h5 style="font-size:14px;"><b>Skills</b></h5>
          </div>
          <hr />
          <p style="font-size:14px;margin-left:50px;">
            <strong><em>
                <?php
                $skills = $row['skills'];
                $skills = explode(',', $skills);

                foreach ($skills as $value) {
                  echo ' <span class="label label-success">' . $value . '</span> ';
                }
                ?>
              </em></strong>
          </p>
          <hr />
          <div class="text-center">
            <h5 style="font-size:14px;"><b>Personal Information</b></h5>
          </div>
          <hr />
          <p style="font-size:14px;margin-left:50px;">
            <br />
            <?php $bday = strtotime($row['dob']); ?>
            <strong>Date of Birth: </strong> <?php echo date("m/d/Y", $bday); ?><br />
            <strong>Age: </strong> <?php echo $row['age']; ?><br />
            <strong>Gender: </strong> <?php echo $row['gender']; ?><br />
            <strong>Civil Status: </strong> <?php echo $row['civilstatus']; ?><br />
            <strong>Nationality: </strong> <?php echo $row['nationality']; ?><br />
          </p>
          <!---div-->
      <?php
        }
      }
      ?>
    </div>
    <hr />
  </div>

</body>

</html>