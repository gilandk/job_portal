<?php
include('include/header.php');
?>

<div class="col-md-12 bg-white padding-2">

  <h3>Companies</h3>
  <div class="row margin-top-20">
    <div class="col-md-12">
      <div class="box-body table-responsive no-padding">
        <table id="companies" class="table table-hover">
          <thead>
            <th>Company Name</th>
            <th>Employer</th>
            <th>Email</th>
            <th>Phone</th>
            <th>City</th>
            <th>State</th>
            <th>Country</th>
            <th>Date Joined</th>
            <th>Status</th>
          </thead>
          <tbody>
            <?php
            $sql = "SELECT * FROM company";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
              while ($row = $result->fetch_assoc()) {
            ?>
                <tr>
                <?php
                
                if ($row['active'] == '2') {
                  $blink = '<span class="label label-danger blink">New</span>';
                }
                else{
                  $blink = '';
                }

                ?>

                  <td><?php echo $blink . ' ' . $row['companyname']; ?></td>
                  <td><?php echo $row['name']; ?></td>
                  <td><?php echo $row['email']; ?></td>
                  <td><?php echo $row['contactno']; ?></td>
                  <td><?php echo $row['city']; ?></td>
                  <td><?php echo $row['state']; ?></td>
                  <td><?php echo $row['country']; ?></td>
                  <td><?php echo date("F-d-Y", strtotime($row['createdAt'])); ?></td>
                  <td>

                    <?php
                    if ($row['active'] == '1') {
                      echo '<span class="label label-success">Activated</span>';
                    ?>
                      <a href="deact-company.php?id=<?php echo $row['id_company']; ?>">Deactivate</a>
                    <?php
                    } else if ($row['active'] == '2') {

                    ?>

                      <a href="approve-company.php?id=<?php echo $row['id_company']; ?>">Approve</a> | <a href="reject-company.php?id=<?php echo $row['id_company']; ?>">Reject</a>

                    <?php
                    } else if ($row['active'] == '3') {
                    ?>

                      <a href="approve-company.php?id=<?php echo $row['id_company']; ?>">Reactivate</a>

                    <?php
                    } else if ($row['active'] == '0') {  
                    ?>
                    <a href="approve-company.php?id=<?php echo $row['id_company']; ?>">Approve</a> | 
                    <?php
                    echo '<span class="label label-danger">Rejected</span>';
                  }
                  ?>
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