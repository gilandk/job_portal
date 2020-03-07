<?php

include('include/header.php');

$sql = "SELECT * FROM apply_job_post WHERE id_company='$_SESSION[id_company]' AND id_user='$_GET[id]'";
$result = $conn->query($sql);
if ($result->num_rows == 0) {
  header("Location: index.php");
  exit();
}
?>
<div class="col-md-9 bg-white padding-2">
  <div class="row margin-top-20">
    <div class="col-md-12">
      <?php
      $sql = "SELECT * FROM users WHERE id_user='$_GET[id]'";
      $result = $conn->query($sql);

      //If Job Post exists then display details of post
      if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
      ?>
          <div class="pull-left">
          <?php
              if ($row['profile'] > 0) {
                $image = $row['profile'];
              } else {
                $image = "2x2.jpg";
              }
              ?>
           <img src="../uploads/profile/<?php echo $image; ?>" class="img-thumbnail" style="max-height:144px;max-width:144px%;">
          </div>
          <div class="pull-left" style="margin-left:10px;">
            <h2><b><i><?php echo $row['fname'] ?></i></b></h2>
            <h4><i class="fa fa-envelope-square" aria-hidden="true"></i><i> <?php echo $row['email'] ?></i></h4>
            <h4><i class="fa fa-telegram" aria-hidden="true"></i> <i><?php echo $row['contactno'] ?></i></h4>
          </div>
          <div class="pull-right">
            <a href="job-applications.php" class="btn btn-default btn-lg btn-flat margin-top-20"><i class="fa fa-arrow-circle-left"></i> Back</a><br/><br/>
            <?php
            if ($row['resume'] != "") {
              echo '<a href="../uploads/resume/' . $row['resume'] . '" class="btn btn-info" download="Resume">Download Resume</a>';
            }
            ?>
          </div>
          <div class="clearfix"></div>
          <hr>
          <div>
          <div class="text-center">
          <i class="fa fa-user-circle-o fa-3x" aria-hidden="true"></i>
            <h4 style="font-size:20px;"><b>Personal Information</b></h4>
          </div>
            <hr/>
            <p style="font-size:16px;margin-left:50px">
              <strong>Address: </strong> <?php echo $row['address']; ?>, <?php echo $row['city']; ?>, <?php echo $row['state']; ?><br />
              <?php $bday = strtotime($row['dob']); ?>
              <strong>Date of Birth: </strong> <?php echo date("m/d/Y", $bday); ?><br />
              <strong>Age: </strong> <?php echo $row['age']; ?><br />
              <strong>Gender: </strong> <?php echo $row['gender']; ?><br />
              <strong>Civil Status: </strong> <?php echo $row['civilstatus']; ?><br />
              <strong>Nationality: </strong> <?php echo $row['nationality']; ?><br />
            </p>
            <br/>
            <hr/>
            <div class="text-center">
            <i class="glyphicon glyphicon-education fa-3x"></i>
            <h4 style="font-size:20px;"><b>Educational Background</b></h4>
            </div>
            <hr/>
            <p style="font-size:16px;margin-left:50px">
              <strong>Field of Study: </strong> <?php echo $row['fos']; ?><br />
              <strong>Course: </strong> <?php echo $row['course']; ?><br />
              <?php $yearAt = strtotime($row['yearAt']); ?>
              <strong>Year Attended: </strong> <?php echo date("M-Y", $yearAt); ?><br />
              <?php $yeargrad = strtotime($row['passingyear']); ?>
              <strong>Year Graduated: </strong> <?php echo date("M-Y", $yeargrad); ?><br />
              <strong>Highest Qualification: </strong> <?php echo $row['qualification']; ?><br />
            </p>
            <br/>
            <hr/>
            <div class="text-center">
            <i class="fa fa-ravelry fa-3x" aria-hidden="true"></i>
            <h4 style="font-size:20px;"><b>Employment History</b></h4>
            </div>  
            <hr/>
            <p style="font-size:16px;margin-left:50px">
            <strong>Company Name: </strong> <?php echo $row['company_name']; ?><br />
            <strong>Company Industry: </strong> <?php echo $row['industry']; ?><br />
            <strong>Company Address: </strong> <?php echo $row['company_add']; ?><br />
            <strong>Position: </strong> <?php echo $row['position']; ?><br />
            <strong>Employment Type: </strong> <?php echo $row['emp_type']; ?><br />
            <?php $djoin = strtotime($row['datejoined']); ?>
              <strong>Year Attended: </strong> <?php echo date("M-Y", $djoin); ?><br />
              <?php $dleft = strtotime($row['dateleft']); ?>
              <strong>Year Graduated: </strong> <?php echo date("M-Y", $dleft); ?><br />
            <strong>Reason for leaving: </strong> <?php echo $row['reason']; ?><br />
          </p>
            <br/>
            <hr/>
            <div class="text-center">
            <i class="fa fa-lightbulb-o fa-3x" aria-hidden="true"></i>
            <h4 style="font-size:20px;"><b>Additional Information</b></h4>
            </div>
            <hr/>
            <p style="font-size:16px;margin-left:50px">
              <strong>Skills: </strong> <?php echo $row['skills']; ?><br />
              <strong>About me: </strong> <?php echo $row['aboutme']; ?><br />
            </p>
            <br/>
            <hr/>
            <div class="row justify-content-center">
              <div class="col-md-6 text-right">
                <a href="under-review.php?id=<?php echo $row['id_user']; ?>&id_jobpost=<?php echo $_GET['id_jobpost']; ?>" class="btn btn-success">Mark Under Review</a>
                </div>
                <div class="col-md-6 text-left">
                <a href="reject.php?id=<?php echo $row['id_user']; ?>&id_jobpost=<?php echo $_GET['id_jobpost']; ?>" class="btn btn-danger">Reject Application</a>
              </div>
            </div>
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