<?php
include('include/header.php');
?>
<div class="col-md-12 bg-white padding-2">
  <h2><i>Account Settings</i></h2>
  <p>In this section you can change your name and account password</p>
  <div class="row">
    <div class="col-md-6">
      <form id="changePassword" action="change-password.php" method="post">
        <div class="form-group">
          <input id="password" class="form-control input-lg" type="password" name="password" autocomplete="off" placeholder="Password" required>
        </div>
        <div class="form-group">
          <input id="cpassword" class="form-control input-lg" type="password" autocomplete="off" placeholder="Confirm Password" required>
        </div>
        <div class="form-group">
          <button type="submit" class="btn btn-flat btn-success btn-lg">Change Password</button>
        </div>
        <div id="passwordError" class="color-red hide-me">
          Password Mismatch!!
        </div>
      </form>
    </div>
    <div class="col-md-6">
      <form action="update-name.php" method="post">
        <div class="form-group">

          <?php
          $sql = "SELECT * FROM admin WHERE id_admin='$_SESSION[id_admin]'";
          $result = $conn->query($sql);

          if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
          ?>

              <input class="form-control input-lg" name="name" type="text" value="<?php echo $row['name']; ?>" placeholder="Full Name">
        </div>
        <div class="form-group">
          <button type="submit" class="btn btn-flat btn-primary btn-lg">Change Name</button>
        </div>

    <?php
            }
          }
    ?>
      </form>
    </div>
  </div>
  <br>
  <br>
  <div class="row">
    <div class="col-md-6">
      <form action="deactivate-account.php" method="post">
        <label><input type="checkbox" required> I Want To Deactivate My Account</label><br/>
        <button class="btn btn-danger btn-flat btn-lg">Deactivate My Account</button>
      </form>
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