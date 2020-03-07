<?php
include('include/header.php');
?>
<div class="col-md-9 bg-white padding-2">
  <h2><i>Create Job Post</i></h2>
  <br />
  <div class="row">
    <form method="post" action="addpost.php">
      <div class="col-md-12 latest-job ">
        <div class="form-group">
          <label for="jobtype">Job Title</label>
          <input class="form-control input-lg" type="text" id="jobtitle" name="jobtitle" placeholder="Job Title">
        </div>
        <div class="form-group">
          <label for="jobtype">Employment Type</label>
          <select class="form-control input-lg" id="jobtype" name="jobtype">
            <option style="color:gray" value="" disabled selected>---------------</option>
            <option>Full-Time</option>
            <option>Project-Based</option>
            <option>Part-Time</option>
            <option>Internship</option>
          </select>
        </div>

        <div class="form-group">
          <label for="jobtype">Job Description</label>
          <textarea class="form-control input-lg" id="description" name="description" placeholder="Job Description"></textarea>
        </div>
        <div class="form-group">
          <label for="requirements">Job Requirements</label>
          <textarea class="form-control input-lg" id="requirements" name="requirements" placeholder="Job Requirements"></textarea>
        </div>
        <div class="form-group">
          <label>Min. Salary</label>
          <input type="number" class="form-control input-lg" id="minimumsalary" name="minimumsalary" placeholder="Minimum Salary" required>
        </div>
        <div class="form-group">
          <label>Max. Salary</label>
          <input type="number" class="form-control input-lg" id="maximumsalary" name="maximumsalary" placeholder="Maximum Salary" required="">
        </div>
        <div class="form-group">
          <label>Experience Required</label>
          <input type="number" class="form-control input-lg" id="experience" autocomplete="off" name="experience" placeholder="Experience (in Years) Required" required>
        </div>
        <div class="form-group">
          <label>No. of Vacancies</label>
          <input type="text" class="form-control input-lg" id="position" name="position" placeholder="Position Available" required>
        </div>
        <div class="form-group">
          <label>Application Deadline</label>
          <input class="form-control input-lg" type="date" id="applyBy" min="<?php echo date('Y-m-d'); ?>" name="applyBy">
        </div>

        <div class="form-group">
          <button type="submit" class="btn btn-flat btn-success">Create</button>
        </div>
      </div>
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