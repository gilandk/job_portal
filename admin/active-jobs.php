<?php
include('include/header.php');
?>
   
            <div class="col-md-12 bg-white padding-2">

              <h3>Active Job Posts</h3>
              <div class="row margin-top-20">
                <div class="col-md-12">
                  <div class="box-body table-responsive no-padding">
                    <table id="activejobs" class="table table-hover">
                      <thead>
                        <th>Job Name</th>
                        <th>Company Name</th>
                        <th>Date Created</th>
                        <th>View</th>
                        <th>Delete</th>
                      </thead>
                      <tbody>
                        <?php
                        $sql = "SELECT job_post.*, company.companyname FROM job_post INNER JOIN company ON job_post.id_company=company.id_company";
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                          $i = 0;
                          while ($row = $result->fetch_assoc()) {
                        ?>
                            <tr>
                              <td><?php echo $row['jobtitle']; ?></td>
                              <td><?php echo $row['companyname']; ?></td>
                              <td><?php echo date("d-M-Y", strtotime($row['createdat'])); ?></td>
                              <td><a href="view-job-post.php?id=<?php echo $row['id_jobpost']; ?>"><i class="fa fa-address-card-o"></i></a></td>
                              <td><a href="delete-job-post.php?id=<?php echo $row['id_jobpost']; ?>" class="confirmation"><i class="fa fa-trash"></i></a></td>
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