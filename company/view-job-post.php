<?php
include('include/header.php');
?>
<div class="col-md-12 bg-white padding-2">
  <div class="row">
    <div class="col-md-12">
      <?php
      $sql = "SELECT * FROM job_post WHERE id_company='$_SESSION[id_company]' AND id_jobpost='$_GET[id]'";
      $result = $conn->query($sql);

      //If Job Post exists then display details of post
      if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
      ?>
          <div class="pull-left">
            <h2><b><i><?php echo $row['jobtitle']; ?></i></b></h2>
            <h4><i>(<?php echo $row['jobtype']; ?>)</i></h4>
          </div>
          <div class="pull-right">
            <a href="my-job-post.php" class="btn btn-default"><i class="fa fa-arrow-circle-left"></i> Back</a>
          </div>
          <div class="clearfix"></div>
          <hr/>
          <div class="row">
            <div class="col-md-12">
              <h4 style="font-size:16px;"><b>Job Description</b></h4>
              <?php echo stripcslashes($row['description']); ?><br />

              <br />
              <div class="pull-left">
                <p style="font-size:16px;"><i class="fa fa-users" aria-hidden="true"></i> <strong>Position available : </strong></p>
                <p style="font-size:16px;"><i class="fa fa-suitcase" aria-hidden="true"></i> <strong>With Experience atleast : </strong></p>
                <p style="font-size:16px;"> <i class="fa fa-usd" aria-hidden="true"></i> <strong>Salary : </strong></p>
                <p style="font-size:16px;"> <i class="fa fa-calendar-o" aria-hidden="true"></i> <strong>Apply Till : </strong></p>
              </div>

              <div class="pull-left" style="margin-left:30px;">
                <p style="font-size:16px;"> <?php echo $row['position']; ?></p>

                <p style="font-size:16px;"> <?php echo $row['experience']; ?> YEARS</p>

                <p style="font-size:16px;"> <i class="fa fa-rub" aria-hidden="true"></i> <?php echo number_format($row['minimumsalary']); ?> - </strong><i class="fa fa-rub" aria-hidden="true"></i> <?php echo number_format($row['maximumsalary']); ?></p>

                <p style="font-size:16px;"> <?php echo date("M-d-Y", strtotime($row['createdat'])); ?> - </strong><?php echo date("M-d-Y", strtotime($row['applyBy'])); ?>
                </p>
              </div>
            </div>
        <?php
        }
      }
        ?>
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