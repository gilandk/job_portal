<?php

include('include/header.php');

$query = "UPDATE contact_us SET status = '1' WHERE id_contact='$_REQUEST[id]'";
$results = $conn->query($query);

$sql = "SELECT * FROM contact_us WHERE id_contact='$_REQUEST[id]'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
?>


    <div class="col-md-12 bg-white padding-2">
      <section class="content">
        <div class="row">
          <div class="col-md-12">
            <a href="contactus.php" class="btn btn-default"><i class="fa fa-arrow-circle-left"></i> Back</a>
            <br />
            <br />

            <div class="box box-primary">
              <div class="box-header with-border">
                <br />
                <span style="font-size:14px;" class="mailbox-read-time pull-right"><?php echo date("d-M-Y h:i a", strtotime($row['dateSent'])); ?></span></h5>
                <br />
                <strong>
                  <h5>From:
                </strong> <?php echo $row['fullname'] ?></h5>
                <strong>
                  <h5>Email Address:
                </strong> <?php echo $row['email'] ?></h5>
                <strong>
                  <h5>Contact No:
                </strong> <?php echo $row['contact'] ?></h5>


                <div class="box-tools pull-right">
                  <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                </div><!-- /.box-tools -->
              </div><!-- /.box-header -->
              <div class="box-body">
                <p>
                  <?php echo stripcslashes($row['message']); ?>
                </p>
              </div><!-- /.box-body -->
            </div><!-- /.box -->

          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </section>

      <form action="mailer.php" method="post">
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">Mailer Messenger</h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <div class="form-group">
              <input class="form-control" name="email" value="<?php echo $row['email']; ?>" placeholder="To:">
            </div>
            <div class="form-group">
              <input class="form-control" name="subject" placeholder="Subject:">
            </div>

            <div class="form-group">
              <textarea class="form-control input-lg" id="description" name="message"></textarea>
            </div>
          </div>
          <!-- /.box-body -->
          <div class="box-footer">
            <div class="pull-right">
              <button type="submit" name="send" class="btn btn-primary"><i class="fa fa-envelope-o"></i> Send</button>
            </div>
            <a href="mailbox.php" class="btn btn-default"><i class="fa fa-times"></i> Discard</a>
          </div>
          <!-- /.box-footer -->
        </div>
      </form>
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