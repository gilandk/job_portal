<?php
include('include/header.php');
?>

<div class="col-md-12 bg-white padding-2">
  <h2><i>Talent Database</i></h2>
  <p>In this section you can download resume of all candidates who applied to your job posts</p>
  <div class="row margin-top-20">
    <div class="col-md-12">
      <div class="box-body table-responsive no-padding">
        <table id="resumedb" class="table table-hover">
          <thead>
            <th>Candidate</th>
            <th>Highest Qualification</th>
            <th>Skills</th>
            <th>City</th>
            <th>State</th>
            <th>Download Resume</th>
          </thead>
          <tbody>
            <?php
            $sql = "SELECT users.* FROM job_post INNER JOIN apply_job_post ON job_post.id_jobpost=apply_job_post.id_jobpost  INNER JOIN users ON users.id_user=apply_job_post.id_user WHERE apply_job_post.id_company='$_SESSION[id_company]' GROUP BY users.id_user";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
              while ($row = $result->fetch_assoc()) {

                $skills = $row['skills'];
                $skills = explode(',', $skills);
            ?>
                <tr>
                  <td><?php echo $row['fname']; ?></td>
                  <td><?php echo $row['qualification']; ?> <?php echo $row['course']; ?></td>
                  <td>
                    <?php
                    foreach ($skills as $value) {
                      echo ' <span class="label label-success">' . $value . '</span>';
                    }
                    ?>
                  </td>
                  <td><?php echo $row['city']; ?></td>
                  <td><?php echo $row['state']; ?></td>
                  <td style="text-align:center"><a href="../uploads/resume/<?php echo $row['resume']; ?>" download="<?php echo $row['fname'] . ' Resume'; ?>"><i class="fa fa-file-pdf-o"></i></a></td>
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