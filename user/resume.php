<?php

include('include/header.php');

?>
<div class="col-md-12 bg-white padding-2">
  <div class="row margin-top-20">
    <div class="col-md-12">
      <?php
      $sql = "SELECT * FROM users WHERE id_user='$_SESSION[id_user]'";
      $result = $conn->query($sql);

      //If Job Post exists then display details of post
      if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
      ?>
          <div class="pull-left" style="margin-left:75px;">
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
            <h2><b><i><?php echo $row['fname'] ?></i></b></h2>
            <h4><i class="fa fa-envelope-square" aria-hidden="true"></i><i> <?php echo $row['email'] ?></i></h4>
            <h4><i class="fa fa-location-arrow" aria-hidden="true"></i><i> <?php echo $row['address']; ?>, <?php echo $row['city']; ?>, <?php echo $row['state']; ?></i></h4>
            <h4><i class="fa fa-telegram" aria-hidden="true"></i> <i><?php echo $row['contactno'] ?></i></h4>
          </div>
          <div class="pull-right">
            <a href="job-applications.php" class="btn btn-default"><i class="fa fa-arrow-circle-left"></i> Back</a><br /><br />
            <?php
            if ($row['resume'] != "") {
              echo '<a href="../uploads/resume/' . $row['resume'] . '" class="btn btn-success" download="Resume"><i class="fa fa-cloud-download" aria-hidden="true"></i> Download Resume</a>';
            }
            ?>
            <br />
            <br />
            <a href="print-resume.php" target="_blank" class="btn btn-primary"><i class="fa fa-arrow-circle-left"></i> Print</a>
          </div>
          <div class="clearfix"></div>

          <div>
            <!--div-->
            <hr>
            <div class="text-center">
              <i class="glyphicon glyphicon-education fa-2x"></i>
              <h4 style="font-size:20px;"><b>Educational Background</b></h4>
            </div>
            <hr />
            <p style="font-size:16px;margin-left:75px;">
              <br />
              <strong style="font-size:18px;"><?php echo $row['qualification'] . ' ' . $row['course']; ?></strong><br />
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
            <br />
            <hr />


            <!-- Start emp history -->

            <div class="text-center">
              <i class="fa fa-suitcase fa-2x" aria-hidden="true"></i>
              <h4 style="font-size:20px;"><b>Employment History</b></h4>
            </div>
            <hr />

            <?php

            if (empty($row['company_name'])) {
              $display = ';display:none;';
            } else {
              $display = '';
            }
            ?>

            <p style="font-size:16px;margin-left:75px<?php echo $display; ?>">
              <br />
              <strong style="font-size:20px;"><?php echo $row['position']; ?></strong> <br />
              <strong><?php echo $row['company_name']; ?></strong> - <?php echo $row['company_add']; ?><br />
              <em>(<?php echo $row['emp_type']; ?>)</em> <br />

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
            <br />

            <?php

            if (empty($row['company_name1'])) {
              $display1 = ';display:none;';
            } else {
              $display1 = '';
            }
            ?>

            <p style="font-size:16px;margin-left:75px<?php echo $display1; ?>">
              <br />
              <strong style="font-size:20px;"><?php echo $row['position1']; ?></strong> <br />
              <strong><?php echo $row['company_name1']; ?></strong> - <?php echo $row['company_add1']; ?><br />
              <em>(<?php echo $row['emp_type1']; ?>)</em> <br />

              <?php $djoin1 = strtotime($row['datejoined1']); ?>
              <?php $dleft1 = strtotime($row['dateleft1']); ?>
              <?php echo date("M-Y", $djoin1); ?> to <?php echo date("M-Y", $dleft1); ?><br />
            </p>
            <br />

            <?php

            if (empty($row['company_name2'])) {
              $display2 = ';display:none;';
            } else {
              $display2 = '';
            }
            ?>

            <p style="font-size:16px;margin-left:75px<?php echo $display2; ?>">
              <br />
              <strong style="font-size:20px;"><?php echo $row['position2']; ?></strong> <br />
              <strong><?php echo $row['company_name2']; ?></strong> - <?php echo $row['company_add2']; ?><br />
              <em>(<?php echo $row['emp_type2']; ?>)</em> <br />

              <?php $djoin2 = strtotime($row['datejoined2']); ?>
              <?php $dleft2 = strtotime($row['dateleft2']); ?>
              <?php echo date("M-Y", $djoin2); ?> to <?php echo date("M-Y", $dleft2); ?><br />
            </p>
            <br />
            <hr />

            <!--end emp history -->

            <div class="text-center">
              <i class="fa fa-lightbulb-o fa-2x" aria-hidden="true"></i>
              <h4 style="font-size:20px;"><b>Skills</b></h4>
            </div>
            <hr />
            <p style="font-size:18px;margin-left:75px;">
              <br />
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
            <br />
            <br />
            <br />
            <hr />

            <div class="text-center">
              <i class="fa fa-user-circle-o fa-2x" aria-hidden="true"></i>
              <h4 style="font-size:20px;"><b>Personal Information</b></h4>
            </div>
            <hr />
            <p style="font-size:16px;margin-left:75px;">
              <br />
              <?php $bday = strtotime($row['dob']); ?>
              <strong>Date of Birth: </strong> <?php echo date("m/d/Y", $bday); ?><br />
              <strong>Age: </strong> <?php echo $row['age']; ?><br />
              <strong>Gender: </strong> <?php echo $row['gender']; ?><br />
              <strong>Civil Status: </strong> <?php echo $row['civilstatus']; ?><br />
              <strong>Nationality: </strong> <?php echo $row['nationality']; ?><br />
              <strong>About me: </strong> <?php echo $row['aboutme']; ?><br />
            </p>
            <br />
            <hr />

            <!---div-->
          </div>

          <div>
          </div>
      <?php
        }
      }
      ?>
    </div>


  </div>

</div>
</div>
</div>
</section>

</div>
<!-- /.content-wrapper -->

<?php

include('include/footer.php');

?>