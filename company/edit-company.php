<?php
include('include/header.php');
?>

<div class="col-md-12 bg-white padding-2">
  <h2><i>My Company</i></h2>
  <p>In this section you can change your company details</p>
  <div class="row">
    <form action="update-company.php" method="post" enctype="multipart/form-data">
      <?php
      $sql = "SELECT * FROM company WHERE id_company='$_SESSION[id_company]'";
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
      ?>
          <div class="col-md-12 latest-job ">
            <div class="form-group">
              <br>
              <?php
              if ($row['logo'] > 0) {
                $image = $row['logo'];
              } else {
                $image = "2x2.jpg";
              }
              ?>
              
              <div align="center" style="width:150px;height:150px;">
                <img src="../uploads/logo/<?php echo $image; ?>" class="img-thumbnail img-circle">
              </div>
              <label>Company Logo</label>
              <input type="file" name="image" class="btn btn-default">
            </div>
            <?php if (isset($_SESSION['uploadError'])) { ?>
              <div class="row">
                <div class="col-md-12">
                  <h5 style="color:red"><strong><?php echo $_SESSION['uploadError']; ?></strong></h5>
                </div>
              </div>
            <?php unset($_SESSION['uploadError']);
            } ?>
            <div class="form-group">
              <label>Company Name</label>
              <input type="text" class="form-control input-lg" name="companyname" value="<?php echo $row['companyname']; ?>" required="">
            </div>
            <div class="form-group">
              <label>Website</label>
              <input type="text" class="form-control input-lg" name="website" value="<?php echo $row['website']; ?>" required="">
            </div>
            <div class="form-group">
              <label for="email">Email address</label>
              <input type="email" class="form-control input-lg" id="email" placeholder="Email" value="<?php echo $row['email']; ?>" readonly>
            </div>
            <div class="form-group">
              <label>BUSINESS SUMMARY</label>
              <textarea class="form-control input-lg" rows="4" name="aboutme"><?php echo $row['aboutme']; ?></textarea>
            </div>
            <div class="form-group">
              <label>Mission</label>
              <textarea class="form-control input-lg" rows="4" name="mission"><?php echo $row['mission']; ?></textarea>
            </div>
            <div class="form-group">
              <label>Vision</label>
              <textarea class="form-control input-lg" rows="4" name="vision"><?php echo $row['vision']; ?></textarea>
            </div>

            <div class="form-group">
              <label for="contactno">Contact Number</label>
              <input type="text" class="form-control input-lg" id="contactno" name="contactno" placeholder="Contact Number" value="<?php echo $row['contactno']; ?>">
            </div>
            <div class="form-group">
              <label for="city">City</label>
              <input type="text" class="form-control input-lg" id="city" name="city" value="<?php echo $row['city']; ?>" placeholder="City">
            </div>
            <div class="form-group">
              <label for="city">State/Region/Province</label>
              <input type="text" class="form-control input-lg" id="state" name="state" value="<?php echo $row['state']; ?>" placeholder="State/Region/Province">
            </div>

            <div class="form-group">
              <label for="city">Country</label>
              <input type="text" class="form-control input-lg" id="country" name="country" value="<?php echo $row['country']; ?>" placeholder="Country">
            </div>
            <div class="form-group">
              <br />
              <button type="submit" class="btn btn-primary">Update Company Profile</button>
            </div>
          </div>
      <?php
        }
      }
      ?>
    </form>
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