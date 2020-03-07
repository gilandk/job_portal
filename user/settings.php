<?php
include('include/header.php');
?>

        <div class="col-md-9 bg-white padding-2">
          <h2><i>Change Password</i></h2>
          <p>Type in new password that you want to use</p>
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
                  <button type="submit" class="btn btn-flat btn-success">Change Password</button>
                </div>
                <div id="passwordError" class="color-red text-center hide-me">
                  Password Mismatch!!
                </div>
              </form>
            </div>
            <div class="col-md-6">
              <form action="deactivate-account.php" method="post">
                <label><input type="checkbox" required> I Want To Deactivate My Account</label>
                <button type="submit" class="btn btn-danger btn-flat btn-lg">Deactivate My Account</button>
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