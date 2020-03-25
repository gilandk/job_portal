<?php
include('include/header.php');
?>
<div class="col-md-12 bg-white padding-2">

  <h3>Candidates Database</h3>
  <div class="row margin-top-20">
    <div class="col-md-12">
      <div class="box-body table-responsive no-padding">
        <table id="applications" class="table table-hover">
          <thead>
            <th>Student #</th>
            <th>Candidate</th>
            <th>Course</th>
            <th>Skills</th>
            <th>City</th>
            <th>State</th>
            <th>Download Resume</th>
            <th>Status</th>
            <th>Delete</th>
          </thead>
          <tbody>

            <?php
            $sql = "SELECT * FROM users";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
              while ($row = $result->fetch_assoc()) {

                $skills = $row['skills'];
                $skills = explode(',', $skills);
            ?>

                <tr>
                  <td><?php echo $row['sno'] ?></td>
                  <td><?php echo $row['fname'] ?></td>
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
                  <?php if ($row['resume'] != '') { ?>
                    <td style="text-align:center"><a href="../uploads/resume/<?php echo $row['resume']; ?>" download="<?php echo $row['fname'] . ' Resume'; ?>.pdf"><i class="fa fa-file-pdf-o"></i></a></td>
                  <?php } else { ?>
                    <td>No Resume Uploaded</td>
                  <?php } ?>
                  <td>
                    <?php
                    if ($row['active'] == '1') {
                      echo "Activated";
                    } else if ($row['active'] == '2') {
                    ?>
                      <a href="reject-candidate.php?id=<?php echo $row['id_user']; ?>">Reject</a> <a href="approve-candidate.php?id=<?php echo $row['id_user']; ?>">Approve</a>
                    <?php
                    } else if ($row['active'] == '3') {
                    ?>
                      <a href="approve-candidate.php?id=<?php echo $row['id_user']; ?>">Reactivate</a>
                    <?php
                    } else if ($row['active'] == '0') {
                      echo "Rejected";
                    }
                    ?>
                  <td><a href="delete-candidate.php?id=<?php echo $row['id_user']; ?>" class="confirmation">Delete</a></td>
                  </td>
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