<?php
include('include/header.php');
?>
<div class="col-md-9 bg-white padding-2">
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
            <a href="my-job-post.php" class="btn btn-default btn-lg btn-flat margin-top-20"><i class="fa fa-arrow-circle-left"></i> Back</a>
          </div>
          <div class="clearfix"></div>
          <hr>
          <div>

            <div class="row">
              <div class="col-md-12">
                <h4 style="font-size:20px;"><b>Job Description</b></h4>
                <?php echo stripcslashes($row['description']); ?><br />
                <br />
                <h4 style="font-size:20px;"><b>Job Requirements</b></h4>
                <?php echo stripcslashes($row['requirements']); ?><br />
              </div>
            </div>
            <br />
            <p style="font-size:16px;"><i class="fa fa-users" aria-hidden="true"></i> <strong>Position available: </strong> <?php echo $row['position']; ?></p>
            <p style="font-size:16px;"><i class="fa fa-suitcase" aria-hidden="true"></i> <strong>With Experience atleast: </strong> <?php echo $row['experience']; ?> YEARS</p>
            <p style="font-size:16px;"><i class="fa fa-usd" aria-hidden="true"></i> <strong>Salary: </strong><i class="fa fa-rub" aria-hidden="true"></i> <?php echo number_format($row['minimumsalary']); ?> - </strong><i class="fa fa-rub" aria-hidden="true"></i> <?php echo number_format($row['maximumsalary']); ?></p>
            <p style="font-size:16px;"><i class="fa fa-calendar-o" aria-hidden="true"></i> <strong>Apply Till: </strong><?php echo date("M-d-Y", strtotime($row['createdat'])); ?> - </strong><?php echo date("M-d-Y", strtotime($row['applyBy'])); ?></p>
            <div>
              <a href="edit-job-post.php?id=<?php echo $row['id_jobpost']; ?>" class="btn btn-success btn-flat margin-top-50">UPDATE</a>
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