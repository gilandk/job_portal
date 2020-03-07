<?php
include('include/header.php');
?>
<div class="col-md-9 bg-white padding-2">
  <h2><i>My Job Posts</i></h2>
  <p>In this section you can view all job posts created by you.</p>
  <div class="row margin-top-20">
    <div class="col-md-12">
      <div class="box-body table-responsive no-padding">
        <table id="myjobpost" class="table table-hover">
          <thead>
            <th>Job Title</th>
            <th>View</th>
            <th>Date Posted</th>
            <th>Edit</th>
          </thead>
          <tbody>
            <?php
            $sql = "SELECT * FROM job_post WHERE id_company='$_SESSION[id_company]'";
            $result = $conn->query($sql);

            //If Job Post exists then display details of post
            if ($result->num_rows > 0) {
              while ($row = $result->fetch_assoc()) {
            ?>
                <tr>
                  <td contenteditable><?php echo $row['jobtitle']; ?></td>
                  <td><a href="view-job-post.php?id=<?php echo $row['id_jobpost']; ?>"><i class="fa fa-address-card-o"></i></a></td>
                  <td class="jobpost-date"><?php echo date("d-M-Y ", strtotime($row['createdat'])); ?></td>
                  <td><a href="edit-job-post.php?id=<?php echo $row['id_jobpost']; ?>"><i class="fa fa-pencil-square-o"></i></a></td>
                </tr>
            <?php
              }
            }
            ?>
          </tbody>
        </table>
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