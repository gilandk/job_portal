<?php
include('include/header.php');
?>
    
            <div class="col-md-9 bg-white padding-2">
              <form action="add-mail.php" method="post">
                <div class="box box-primary">
                  <div class="box-header with-border">
                    <h3 class="box-title">Compose New Message</h3>
                  </div>
                  <!-- /.box-header -->
                  <div class="box-body">
                    <div class="form-group">
                      <select name="to" class="form-control">
                        <?php
                        $sql = "SELECT * FROM apply_job_post INNER JOIN users ON apply_job_post.id_user=users.id_user WHERE apply_job_post.id_company='$_SESSION[id_company]' AND apply_job_post.status='2'";
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                          while ($row = $result->fetch_assoc()) {
                            echo '<option value="' . $row['id_user'] . '">' . $row['fname'] . '</option>';
                          }
                        }
                        ?>
                      </select>
                    </div>
                    <div class="form-group">
                      <input class="form-control" name="subject" placeholder="Subject:">
                    </div>
                    <div class="form-group">
                      <textarea class="form-control input-lg" id="description" name="description" placeholder="Job Description"></textarea>
                    </div>
                  </div>
                  <!-- /.box-body -->
                  <div class="box-footer">
                    <div class="pull-right">
                      <button type="submit" class="btn btn-primary"><i class="fa fa-envelope-o"></i> Send</button>
                    </div>
                    <a href="mailbox.php" class="btn btn-default"><i class="fa fa-times"></i> Discard</a>
                  </div>
                  <!-- /.box-footer -->
                </div>
              </form>
            </div>
          </div>
        </div>
      </section>
      
    </div>
    <!-- /.content-wrapper -->

    <?php

    include('include/footer.php');

    ?>