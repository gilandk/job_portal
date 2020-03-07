<?php
include('include/header.php');
?>

<div class="col-md-9 bg-white padding-2">
  <h2><i>Update Job Post</i></h2>
  <br/>
  <div class="row">
    <form method="post" action="editpost.php">
      <?php
      $sql = "SELECT * FROM job_post WHERE id_company='$_SESSION[id_company]' AND id_jobpost='$_GET[id]'";
      $result = $conn->query($sql);

      //If Job Post exists then display details of post
      if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
      ?>

          <div class="col-md-12 latest-job ">
            <input type="hidden" name="id_jobpost" value="<?php echo $row['id_jobpost']; ?>" />
            <div class="form-group">
            <label for="jobtype">Job Title</label>
              <input class="form-control input-lg" type="text" id="jobtitle" name="jobtitle" value="<?php echo $row['jobtitle']; ?>" placeholder="Job Title">
            </div>
            <div class="form-group">
              <label for="jobtype">Job Type</label>
              <select class="form-control input-lg" id="jobtype" name="jobtype">
                <option style="color:gray" value="" disabled selected>---------------</option>
                <option <?php if ($row['jobtype'] == "Full-Time") echo "selected" ?>>Full-Time</option>
                <option <?php if ($row['jobtype'] == "Project-Based") echo "selected" ?>>Project-Based</option>
                <option <?php if ($row['jobtype'] == "Contractual") echo "selected" ?>>Contractual</option>
                <option <?php if ($row['jobtype'] == "Part-Time") echo "selected" ?>>Part-Time</option>
                <option <?php if ($row['jobtype'] == "Internship") echo "selected" ?>>Internship</option>
              </select>
            </div>
            <div class="form-group">
            <label for="jobtype">Job Description</label>
              <textarea class="form-control input-lg" id="description" name="description"><?php echo stripcslashes($row['description']); ?></textarea>
            </div>
            <div class="form-group">
            <label for="jobtype">Job Requirements</label>
              <textarea class="form-control input-lg" id="requirements" name="requirements"><?php echo stripcslashes($row['requirements']); ?></textarea>
            </div>
            <div class="form-group">
            <label>Min. Salary</label>
              <input type="number" class="form-control  input-lg" id="minimumsalary" autocomplete="off" name="minimumsalary" value="<?php echo $row['minimumsalary']; ?>" placeholder="Minimum Salary" required="">
            </div>
            <div class="form-group">
            <label>Max. Salary</label>
              <input type="number" class="form-control  input-lg" id="maximumsalary" name="maximumsalary" placeholder="Maximum Salary" value="<?php echo $row['maximumsalary']; ?>" required="">
            </div>
            <div class="form-group">
            <label>Experience Required</label>
              <input type="number" class="form-control  input-lg" id="experience" autocomplete="off" name="experience" value="<?php echo $row['experience']; ?>" placeholder="Experience (in Years) Required" required="">
            </div>
            <div class="form-group">
            <label>No. of Vacancies</label>
              <input type="text" class="form-control  input-lg" id="position" name="position" placeholder="Position Available" value="<?php echo $row['position']; ?>" required="">
            </div>
            <div class="form-group">
            <label>Application Deadline</label>
              <input class="form-control input-lg" type="date" id="applyBy" min="<?php echo date('Y-m-d'); ?>" value="<?php echo $row['applyBy']; ?>" name="applyBy">
            </div>
            <div class="form-group">
              <button type="submit" class="btn btn-flat btn-success">Update</button>
            </div>
          </div>
    </form>
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