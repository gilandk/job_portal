<?php
include('include/header.php');
?>

<div class="col-md-9 bg-white padding-2">
  <h2><i>Recent Applications</i></h2>

  <?php
  $sql = "SELECT * FROM job_post INNER JOIN apply_job_post ON job_post.id_jobpost=apply_job_post.id_jobpost  INNER JOIN users ON users.id_user=apply_job_post.id_user WHERE apply_job_post.id_company='$_SESSION[id_company]'";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
  ?>
      <div class="attachment-block clearfix padding-2">
        <h4 class="attachment-heading"><a href="user-application.php?id=<?php echo $row['id_user']; ?>&id_jobpost=<?php echo $row['id_jobpost']; ?>"><?php echo $row['jobtitle'] . ' @ (' . $row['fname'] . ')'; ?></a></h4>
        <div class="attachment-text padding-2">
          <div class="pull-left"><i class="fa fa-calendar"></i> <?php echo $row['createdat']; ?></div>
          <?php

          if ($row['status'] == 0) {
            echo '<div class="pull-right"><strong class="text-orange">Pending</strong></div>';
          } else if ($row['status'] == 1) {
            echo '<div class="pull-right"><strong class="text-red">Rejected</strong></div>';
          } else if ($row['status'] == 2) {
            echo '<div class="pull-right"><strong class="text-green">Under Review</strong></div> ';
          }
          ?>

        </div>
      </div>

  <?php
    }
  }
  ?>

</div>
</div>
</section>

</div>
<!-- /.content-wrapper -->

<?php

include('include/footer.php');

?>