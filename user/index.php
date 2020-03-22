<?php

include('include/header.php');
?>
<div class="col-md-12 bg-white padding-2">
  <h2><i>Recent Applications</i></h2>
  <p>Below you will find job roles you have applied for</p>

  <?php
  $sql = "SELECT * FROM job_post INNER JOIN apply_job_post ON job_post.id_jobpost=apply_job_post.id_jobpost WHERE apply_job_post.id_user='$_SESSION[id_user]' ORDER BY dateAp DESC";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {

  ?>
      <div class="attachment-block clearfix padding-2">
        <h4 class="attachment-heading"><a href="view-job-post.php?id=<?php echo $row['id_jobpost']; ?>"><?php echo $row['jobtitle']; ?></a></h4>
        <div class="attachment-text padding-2">
        <div class="pull-left"><i class="fa fa-calendar"></i>&nbsp;&nbsp;<?php echo date("M-d-Y", strtotime($row['dateAp'])); ?></div>
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
</div>
</section>



</div>
<!-- /.content-wrapper -->

<?php

include('include/footer.php');

?>