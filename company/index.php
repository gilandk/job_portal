<?php
include('include/header.php');
?>

<div class="col-md-9 bg-white padding-2">
  <h3>Overview</h3>
  <div class="alert alert-info alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    <i class="icon fa fa-info"></i> In this dashboard you are able to change your account settings, post and manage your jobs. Got a question? Do not hesitate to drop us a mail.
  </div>

  <div class="row">
    <div class="col-md-6">
      <div class="info-box bg-c-yellow">
        <span class="info-box-icon bg-red"><i class="ion ion-ios-people-outline"></i></span>
        <div class="info-box-content">
          <span class="info-box-text">Job Posted</span>
          <?php
          $sql = "SELECT * FROM job_post WHERE id_company='$_SESSION[id_company]'";
          $result = $conn->query($sql);

          if ($result->num_rows > 0) {
            $total = $result->num_rows;
          } else {
            $total = 0;
          }

          ?>
          <span class="info-box-number"><?php echo $total; ?></span>
        </div>
      </div>
    </div>
    <div class="col-md-6">
      <div class="info-box bg-c-yellow">
        <span class="info-box-icon bg-green"><i class="ion ion-ios-browsers"></i></span>
        <div class="info-box-content">
          <span class="info-box-text">Application For Jobs</span>
          <?php
          $sql = "SELECT * FROM apply_job_post WHERE id_company='$_SESSION[id_company]'";
          $result = $conn->query($sql);

          if ($result->num_rows > 0) {
            $total = $result->num_rows;
          } else {
            $total = 0;
          }
          ?>
          <span class="info-box-number"><?php echo $total; ?></span>
        </div>
      </div>
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