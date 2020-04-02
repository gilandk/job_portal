<?php
include('include/header.php');
?>

<div class="col-md-12 bg-white padding-2">

  <div class="row">
    <div class="col-md-12">

      <?php
      $sql = "SELECT * FROM company WHERE id_company='$_SESSION[id_company]'";
      $result = $conn->query($sql);
      if ($result->num_rows > 0) {
        while ($row = $result->fetch_array()) {
      ?>

          <div class="box box-widget widget-user">
            <!-- Add the bg color to the header using any of the bg-* classes -->
            <div class="widget-user-header bg-aqua-active" style="height:150px;">
              <div class="pull-left">
                <h1 class="widget-user-username"><strong><?php echo $row['companyname']; ?></strong></h1>
                <h4 class="widget-user-desc"><?php echo $row['name']; ?></h4>
              </div>
              <div class="pull-right text-right">
                <h5 class="widget-user-desc"><?php echo $row['website']; ?>&nbsp;&nbsp;&nbsp;<i class="fa fa-globe"></i></h5>
                <h5 class="widget-user-desc"><?php echo $row['city']; ?>, <?php echo $row['state']; ?>, <?php echo $row['country']; ?>&nbsp;&nbsp;&nbsp;<i class="fa fa-location-arrow"></i></h5>
                <h5 class="widget-user-desc"><?php echo $row['contactno']; ?>&nbsp;&nbsp;&nbsp;<i class="fa fa-telegram" aria-hidden="true"></i></h5>
              </div>
            </div>

            <div class="widget-user-image" style="margin-top:10px;margin-left:-80px;">
              <img class="img-circle" src="../uploads/logo/<?php echo $row['logo']; ?>" style="height:150px;width:150px;" alt="User Avatar">
            </div>
            <div class="box-footer">
              <br />
              <br />
              <br />
              <div class="row">
                <div class="col-sm-4 border-right">
                  <div class="description-block">
                    <?php
                    $sql1 = "SELECT * FROM job_post WHERE id_company='$_SESSION[id_company]'";
                    $result1 = $conn->query($sql1);
                    $total1 = $result1->num_rows;

                    ?>
                    <h5 class="description-header"><?php echo $total1; ?></h5>
                    <span class="description-text">Job Posted</span>
                  </div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->
                <div class="col-sm-4 border-right">
                  <div class="description-block">
                  <?php
                    $sql2 = "SELECT id_company='$_SESSION[id_company]' FROM apply_job_post WHERE status='0' ";
                    $result2 = $conn->query($sql2);
                    $total2 = $result2->num_rows;
                    ?>
                    <h5 class="description-header"><?php echo $total2; ?></h5>
                    <span class="description-text">Job Applications</span>
                  </div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->
                <div class="col-sm-4">
                  <div class="description-block">
                    <?php
                    $sql3 = "SELECT * FROM apply_job_post WHERE id_company='$_SESSION[id_company]' AND status='0' ";
                    $result3 = $conn->query($sql3);
                    $total3 = $result3->num_rows;
                    ?>
                    <h5 class="description-header"><?php echo $total3; ?></h5>
                    <span class="description-text">Pending Applications</span>
                  </div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->


              </div>

              <div class="col-sm-12">
                <div class="description-block" style="padding-left:100px;padding-right:100px;">
                  <br />
                  <br />
                  <h4 style="font-size:16px;"><b>COMPANY SUMMARY</b></h4>
                  <?php echo stripcslashes($row['aboutme']); ?><br />
                  <br />
                  <h4 style="font-size:16px;"><b>MISSION</b></h4>
                  <?php echo stripcslashes($row['mission']); ?><br />
                  <br />
                  <h4 style="font-size:16px;"><b>VISION</b></h4>
                  <?php echo stripcslashes($row['vision']); ?><br />
                </div>
                <!-- /.row -->
              </div>
            </div>
            <!-- /.widget-user -->
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