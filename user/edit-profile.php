<?php
include('include/header.php');
?>

<div class="col-md-9 bg-white padding-2">
  <h2><i>Applicant Profile</i></h2>
  <form action="update-profile.php" method="post" enctype="multipart/form-data">
    <?php
    //Sql to get logged in user details.
    $sql = "SELECT * FROM users WHERE id_user='$_SESSION[id_user]'";
    $result = $conn->query($sql);

    //If user exists then show his details.
    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
    ?>
        <div class="row">
          <div class="col-md-12 latest-job">

            <div class="form-group">
              <label>Change Profile Picture</label>
              <?php
              if ($row['profile'] > 0) {
                $image = $row['profile'];
              } else {
                $image = "2x2.jpg";
              }
              ?>

              <div align="center" style="width:144px;height:144px;padding:2px;">
                <img src="../uploads/profile/<?php echo $image; ?>" class="img-thumbnail" style="max-height:100%;max-width:100%;">
              </div>

              <br />
              <input type="file" name="image" class="btn btn-default">
            </div>

            <div class="box box-solid box-primary">
              <div class="box-header with-border">
                <div class="box-tools pull-right">
                  <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
                </div><!-- /.box-tools -->
                <h3 class="box-title">Personal Info</h3>
              </div>
              <div class="box-body">
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="sno">DYCI Student Number</label>
                    <input type="text" class="form-control input-lg" id="sno" name="sno" placeholder="Student Number" value="<?php echo $row['sno']; ?>" required="">
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="fname">Full Name</label>
                    <input type="text" class="form-control input-lg" id="fname" name="fname" placeholder="Full Name" value="<?php echo $row['fname']; ?>" required="">
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="email">Email address</label>
                    <input type="email" class="form-control input-lg" id="email" placeholder="Email" value="<?php echo $row['email']; ?>" readonly>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="contactno">Contact Number</label>
                    <input class="form-control input-lg" type="text" id="contactno" name="contactno" minlength="11" maxlength="11" onkeypress="return validatePhone(event);" placeholder="Phone Number" value="<?php echo $row['contactno']; ?>">
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="address">House #/Street/Block #</label>
                    <textarea id="address" name="address" class="form-control input-lg" rows="2" placeholder="Address"><?php echo $row['address']; ?></textarea>
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="form-group">
                    <label for="city">City/Municipality</label>
                    <input type="text" class="form-control input-lg" id="city" name="city" value="<?php echo $row['city']; ?>" placeholder="city">
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="form-group">
                    <label for="state">State/Region/Province</label>
                    <input type="text" class="form-control input-lg" id="state" name="state" value="<?php echo $row['state']; ?>" placeholder="State/Region/Province">
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="form-group">
                    <label for="dob">Date of Birth</label>
                    <input class="form-control input-lg" type="date" id="dob" min="1960-01-01" name="dob" value="<?php echo $row['dob']; ?>">
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="form-group">
                    <label for="age">Age</label>
                    <input class="form-control input-lg" type="text" id="age" name="age" placeholder="Age" value="<?php echo $row['age']; ?>" readonly>
                  </div>
                </div>

                <div class="col-md-12">
                  <div class="form-group">
                    <label for="qualification">Gender</label>
                    <select class="form-control input-lg" type="text" id="gender" name="gender" required>
                      <option value="">---Select Gender---</option>
                      <option <?php if ($row['gender'] == "Male") echo "selected" ?>>Male</option>
                      <option <?php if ($row['gender'] == "Female") echo "selected" ?>>Female</option>
                      <option <?php if ($row['gender'] == "Other") echo "selected" ?>>Other</option>
                    </select>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="civilstatus">Civil Status</label>
                    <input type="text" class="form-control input-lg" id="civilstatus" name="civilstatus" value="<?php echo $row['civilstatus']; ?>" placeholder="Civil Status">
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="nationality">Nationality</label>
                    <input type="text" class="form-control input-lg" id="nationality" name="nationality" value="<?php echo $row['nationality']; ?>" placeholder="Nationality">
                  </div>
                </div>

              </div>
            </div>

            <div class="box box-solid box-primary">
              <div class="box-header with-border">
                <div class="box-tools pull-right">
                  <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
                </div><!-- /.box-tools -->
                <h3 class="box-title">Educational Background</h3>
              </div>
              <div class="box-body">

                <div class="col-md-6">
                  <div class="form-group">
                    <label for="qualification">Academic Degree</label>
                    <select class="form-control input-lg" type="text" id="qualification" name="qualification" required>
                      <option value="">---Select Qualification---</option>
                      <option <?php if ($row['qualification'] == "Junior High School") echo "selected" ?>>Junior High School</option>
                      <option <?php if ($row['qualification'] == "Senior High School") echo "selected" ?>>Senior High School</option>
                      <option <?php if ($row['qualification'] == "Associates's") echo "selected" ?>>Associates's in</option>
                      <option <?php if ($row['qualification'] == "Bachelor's of Science in") echo "selected" ?>>Bachelor's of Science in</option>
                      <option <?php if ($row['qualification'] == "Master's in") echo "selected" ?>>Master's in</option>
                      <option <?php if ($row['qualification'] == "Doctor's in") echo "selected" ?>>Doctor's in</option>
                    </select>
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="form-group">
                    <label for="course">Course/Strand</label>
                    <input disabled="none" type="text" class="form-control input-lg" id="course" name="course" value="<?php echo $row['course']; ?>" placeholder="Nationality">
                  </div>
                </div>

                <div class="col-md-12">
                  <div class="form-group">
                    <label for="fos">School</label>
                    <input type="text" class="form-control input-lg" id="fos" name="fos" placeholder="School" value="<?php echo $row['fos']; ?>">
                  </div>
                </div>

                <div class="col-md-12">
                  <div class="form-group" style="margin-left:10px;margin-top:5px;">
                    <input type="checkbox" id="cbox" name="cbpassingyear" value="checked" <?php echo $row['cbpassingyear']; ?> onclick="present()"> <label>I'm currently attending</label>
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="form-group">
                    <label for="yearAt">Year Attended</label>
                    <input class="form-control input-lg" type="month" id="yearAt" name="yearAt" placeholder="Year Attended" value="<?php echo $row['yearAt']; ?>">
                  </div>
                </div>

                <?php
                if ($row['cbpassingyear'] == 'checked') {
                  $disp = "none";
                  $disp0 = "block";        
                } else {
                  $disp = "block";
                  $disp0 = "none";
                }
                ?>

                <div class="col-md-6">
                  <div class="form-group" id="pyear" style="display:<?php echo $disp; ?>">
                    <label for="passingyear">Year Graduated</label>
                    <input class="form-control input-lg" type="month" id="passingyear" name="passingyear" placeholder="Year Graduated" value="<?php echo $row['passingyear']; ?>">
                  </div>

                  <div class="form-group" id="pyears" style="display:<?php echo $disp0; ?>">
                    <label for="passingyear" style="color:white;">Label</label>
                    <input class="form-control input-lg" type="text" value="Up to Present" disabled>
                  </div>
                </div>

              </div>
            </div>

            <div class="box box-solid box-primary">
              <div class="box-header with-border">
                <h3 class="box-title">Employment History</h3>
                <div class="box-tools pull-right">
                  <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
                </div><!-- /.box-tools -->
              </div>

              <div class="box-body">

                <div class="col-md-12">
                  <div class="form-group">
                    <label for="company_name">Company Name</label>
                    <input type="text" class="form-control input-lg" id="company_name" name="company_name" value="<?php echo $row['company_name']; ?>" placeholder="Company Name">
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="company_add">Company Address</label>
                    <input type="text" class="form-control input-lg" id="company_add" name="company_add" value="<?php echo $row['company_add']; ?>" placeholder="Company Address">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="position">Position</label>
                    <input type="text" class="form-control input-lg" id="position" name="position" value="<?php echo $row['position']; ?>" placeholder="Position">
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="form-group">
                    <label for="emp_type">Employment Type</label>
                    <select class="form-control input-lg" id="emp_type" name="emp_type">
                      <option style="color:gray" value="" disabled selected>---------------</option>
                      <option <?php if ($row['emp_type'] == "Full-Time") echo "selected" ?>>Full-Time</option>
                      <option <?php if ($row['emp_type'] == "Project-Based") echo "selected" ?>>Project-Based</option>
                      <option <?php if ($row['emp_type'] == "Contractual") echo "selected" ?>>Contractual</option>
                      <option <?php if ($row['emp_type'] == "Part-Time") echo "selected" ?>>Part-Time</option>
                      <option <?php if ($row['emp_type'] == "Internship") echo "selected" ?>>Internship</option>
                    </select>
                  </div>
                </div>


                <div class="col-md-12">
                  <div class="form-group" style="margin-left:10px;margin-top:5px;">
                    <input type="checkbox" id="cbdleft" name="cbdateleft" value="checked" <?php echo $row['cbdateleft']; ?> onclick="dleft()"> <label>I'm currently employed</label>
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="form-group">
                    <label for="datejoined">Date Joined</label>
                    <input class="form-control input-lg" type="month" id="datejoined" name="datejoined" placeholder="Date Joined" value="<?php echo $row['datejoined']; ?>">
                  </div>
                </div>

                <?php
                if ($row['cbdateleft'] == 'checked') {
                  $dleft = "none";
                  $dleft0 = "block";
                } else {
                  $dleft = "block";
                  $dleft0 = "none";
                }
                ?>

                <div class="col-md-6">
                  <div class="form-group" id="dleft" style="display:<?php echo $dleft; ?>">
                    <label for="dateleft">Date Left</label>
                    <input class="form-control input-lg" type="month" id="dateleft" name="dateleft" placeholder="Date Left" value="<?php echo $row['dateleft']; ?>">
                  </div>

                  <div class="form-group" id="dleft0" style="display:<?php echo $dleft0; ?>">
                    <label for="passingyear" style="color:white;">Label</label>
                    <input class="form-control input-lg" type="text" value="Up to Present" disabled>
                  </div>
                </div>

              </div>
            </div>

            <?php
            if (!empty($row['company_name1'])) {
              $coll1 = "";
            } else {
              $coll1 = "collapsed-box";
            }
            ?>

            <div class="box box-solid box-primary <?php echo $coll1; ?>">
              <div class="box-header with-border">
                <h3 class="box-title">Employment History</h3>
                <div class="box-tools pull-right">
                  <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
                </div><!-- /.box-tools -->
              </div>

              <div class="box-body">


                <div class="col-md-12">
                  <div class="form-group">
                    <label for="company_name">Company Name</label>
                    <input type="text" class="form-control input-lg" id="company_name1" name="company_name1" value="<?php echo $row['company_name1']; ?>" placeholder="Company Name">
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="company_add">Company Address</label>
                    <input type="text" class="form-control input-lg" id="company_add1" name="company_add1" value="<?php echo $row['company_add1']; ?>" placeholder="Company Address">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="position">Position</label>
                    <input type="text" class="form-control input-lg" id="position1" name="position1" value="<?php echo $row['position1']; ?>" placeholder="Position">
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="form-group">
                    <label for="emp_type">Employment Type</label>
                    <select class="form-control input-lg" id="emp_type1" name="emp_type1">
                      <option style="color:gray" value="" disabled selected>---------------</option>
                      <option <?php if ($row['emp_type1'] == "Full-Time") echo "selected" ?>>Full-Time</option>
                      <option <?php if ($row['emp_type1'] == "Project-Based") echo "selected" ?>>Project-Based</option>
                      <option <?php if ($row['emp_type1'] == "Contractual") echo "selected" ?>>Contractual</option>
                      <option <?php if ($row['emp_type1'] == "Part-Time") echo "selected" ?>>Part-Time</option>
                      <option <?php if ($row['emp_type1'] == "Internship") echo "selected" ?>>Internship</option>
                    </select>
                  </div>
                </div>

                <div class="col-md-12">
                  <div class="form-group" style="margin-left:10px;margin-top:5px;">
                    <input type="checkbox" id="cbdleft1" name="cbdateleft1" value="checked" <?php echo $row['cbdateleft1']; ?> onclick="dleft1()"> <label>I'm currently employed</label>
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="form-group">
                    <label for="datejoined">Date Joined</label>
                    <input class="form-control input-lg" type="month" id="datejoined1" name="datejoined1" placeholder="Date Joined" value="<?php echo $row['datejoined1']; ?>">
                  </div>
                </div>

                <?php
                if ($row['cbdateleft1'] == 'checked') {
                  $dleft1 = "none";
                  $dleft01 = "block";
                } else {
                  $dleft1 = "block";
                  $dleft01 = "none";
                }
                ?>

                <div class="col-md-6">
                  <div class="form-group" id="dleft1" style="display:<?php echo $dleft1; ?>">
                    <label for="dateleft">Date Left</label>
                    <input class="form-control input-lg" type="month" id="dateleft1" name="dateleft1" placeholder="Date Left" value="<?php echo $row['dateleft1']; ?>">
                  </div>

                  <div class="form-group" id="dleft01" style="display:<?php echo $dleft01; ?>">
                    <label for="label" style="color:white;">Label</label>
                    <input class="form-control input-lg" type="text" value="Up to Present" disabled>
                  </div>
                </div>

              </div>
            </div>

            <?php
            if (!empty($row['company_name2'])) {
              $coll2 = "";
            } else {
              $coll2 = "collapsed-box";
            }
            ?>
            <div class="box box-solid box-primary <?php echo $coll2; ?>">
              <div class="box-header with-border">
                <h3 class="box-title">Employment History</h3>
                <div class="box-tools pull-right">
                  <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
                </div><!-- /.box-tools -->
              </div>

              <div class="box-body">
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="company_name">Company Name</label>
                    <input type="text" class="form-control input-lg" id="company_name2" name="company_name2" value="<?php echo $row['company_name2']; ?>" placeholder="Company Name">
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="company_add">Company Address</label>
                    <input type="text" class="form-control input-lg" id="company_add2" name="company_add2" value="<?php echo $row['company_add2']; ?>" placeholder="Company Address">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="position">Position</label>
                    <input type="text" class="form-control input-lg" id="position2" name="position2" value="<?php echo $row['position2']; ?>" placeholder="Position">
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="form-group">
                    <label for="emp_type">Employment Type</label>
                    <select class="form-control input-lg" id="emp_type2" name="emp_type2">
                      <option style="color:gray" value="" disabled selected>---------------</option>
                      <option <?php if ($row['emp_type2'] == "Full-Time") echo "selected" ?>>Full-Time</option>
                      <option <?php if ($row['emp_type2'] == "Project-Based") echo "selected" ?>>Project-Based</option>
                      <option <?php if ($row['emp_type2'] == "Contractual") echo "selected" ?>>Contractual</option>
                      <option <?php if ($row['emp_type2'] == "Part-Time") echo "selected" ?>>Part-Time</option>
                      <option <?php if ($row['emp_type2'] == "Internship") echo "selected" ?>>Internship</option>
                    </select>
                  </div>
                </div>

                

                <div class="col-md-12">
                  <div class="form-group" style="margin-left:10px;margin-top:5px;">
                    <input type="checkbox" id="cbdleft2" name="cbdateleft2" value="checked" <?php echo $row['cbdateleft2']; ?> onclick="dleft2()"> <label>I'm currently employed</label>
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="form-group">
                    <label for="datejoined">Date Joined</label>
                    <input class="form-control input-lg" type="month" id="datejoined2" name="datejoined2" placeholder="Date Joined" value="<?php echo $row['datejoined2']; ?>">
                  </div>
                </div>

                <?php
                if ($row['cbdateleft2'] == 'checked') {
                  $dleft2 = "none";
                  $dleft02 = "block";
                } else {
                  $dleft2 = "block";
                  $dleft02 = "none";
                }
                ?>

                <div class="col-md-6">
                  <div class="form-group" id="dleft2" style="display:<?php echo $dleft2; ?>">
                    <label for="dateleft">Date Left</label>
                    <input class="form-control input-lg" type="month" id="dateleft2" name="dateleft2" placeholder="Date Left" value="<?php echo $row['dateleft2']; ?>">
                  </div>

                  <div class="form-group" id="dleft02" style="display:<?php echo $dleft02; ?>">
                    <label for="label" style="color:white;">Label</label>
                    <input class="form-control input-lg" type="text" value="Up to Present" disabled>
                  </div>
                </div>
              </div>
            </div>


            <div class="box box-solid box-primary">
              <div class="box-header with-border">
                <div class="box-tools pull-right">
                  <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
                </div><!-- /.box-tools -->
                <h3 class="box-title">Additional Info</h3>
              </div>
              <div class="box-body">

                <div class="col-md-12">
                  <div class="form-group">
                    <label>Skills</label>
                    <textarea class="form-control input-lg" rows="4" name="skills"><?php echo $row['skills']; ?></textarea>
                  </div>
                </div>

                <div class="col-md-12">
                  <div class="form-group">
                    <label>About Me</label>
                    <textarea class="form-control input-lg" rows="4" name="aboutme"><?php echo $row['aboutme']; ?></textarea>
                  </div>
                </div>

                <div class="col-md-12">
                  <div class="form-group">
                    <label>Upload/Change Resume</label>
                    <input type="file" name="resume" class="btn btn-default">
                    <br />
                    <?php
                    if ($row['resume'] != "") {
                      echo '<a href="../uploads/resume/' . $row['resume'] . '" download="' . $row['fname'] . ' Resume"><i class="fa fa-file-pdf-o fa-2x"></i>&nbsp;&nbsp;&nbsp;<em> ' . $row['fname'] . ' Resume </em></a>';
                    }
                    ?>
                  </div>
                </div>

              </div>
            </div>


            <div class="form-group">
              <button type="submit" class="btn btn-primary">Update Profile</button>
            </div>

          </div>

      <?php
      }
    }
      ?>
  </form>
  <?php if (isset($_SESSION['uploadError'])) { ?>
    <div class="row">
      <div class="col-md-12 text-center">
        <?php echo $_SESSION['uploadError']; ?>
      </div>
    </div>
  <?php } ?>
</div>
</div>
</div>
</section>

</div>
<!-- /.content-wrapper -->

<?php
include('include/footer.php');
?>