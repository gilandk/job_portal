<?php

include('include/header.php');

$sql1 = "SELECT * FROM job_post INNER JOIN company ON job_post.id_company=company.id_company WHERE id_jobpost='$_GET[id]'";
$result1 = $conn->query($sql1);
if ($result1->num_rows > 0) {
  $row = $result1->fetch_assoc();
}

?>

<div class="col-md-12  bg-white padding-2">
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
  </div>
    <div class="pull-left" style="margin-left:10px;">
      <h3><b><i><?php echo $row['companyname']; ?></b></i></h3>

      <h2><b><i><?php echo $row['jobtitle']; ?></i></b></h2>
      <h4><i>(<?php echo $row['jobtype']; ?>)</i></h4>
    </div>

    <div class="pull-right">
      <a href="index.php" class="btn btn-primary"><i class="fa fa-arrow-circle-left"></i> Back</a><br />
    </div>
    <div class="clearfix"></div>
    <hr>

    <div class="row">

      <div class="col-md-6">
        <h4 style="font-size:16px;"><b>Job Description</b></h4>
        <?php echo stripcslashes($row['description']); ?><br />

        <br />
        <p style="font-size:16px;"><i class="fa fa-users" aria-hidden="true"></i> <strong>Position available: </strong> <?php echo $row['position']; ?></p>
        <p style="font-size:16px;"><i class="fa fa-suitcase" aria-hidden="true"></i> <strong>With Experience atleast: </strong> <?php echo $row['experience']; ?> YEARS</p>
        <p style="font-size:16px;"><i class="fa fa-usd" aria-hidden="true"></i> <strong>Salary: </strong><i class="fa fa-rub" aria-hidden="true"></i> <?php echo number_format($row['minimumsalary']); ?> - </strong><i class="fa fa-rub" aria-hidden="true"></i> <?php echo number_format($row['maximumsalary']); ?></p>
        <p style="font-size:16px;"><i class="fa fa-calendar-o" aria-hidden="true"></i> <strong>Apply Till: </strong><?php echo date("M-d-Y", strtotime($row['createdat'])); ?> - </strong><?php echo date("M-d-Y", strtotime($row['applyBy'])); ?></p>
      </div>
      <div class="col-md-6">
        <div>
          <h4 style="font-size:20px;"><b>COMPANY PROFILE</b></h4>
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
</section>

</div>
<!-- /.content-wrapper -->

<?php

include('include/footer.php');

?>