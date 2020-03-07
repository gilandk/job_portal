<?php

include('include/header.php');

$query = "UPDATE mailbox SET AmsgRead = '1' WHERE id_mailbox='$_GET[id_mail]'";
$results = $conn->query($query);

$sql = "SELECT * FROM mailbox WHERE id_mailbox='$_GET[id_mail]' AND (id_fromuser='$_SESSION[id_user]' OR id_touser='$_SESSION[id_user]')";
$result = $conn->query($sql);
if ($result->num_rows >  0) {
  $row = $result->fetch_assoc();
  if ($row['fromuser'] == "company") {
    $sql1 = "SELECT * FROM company WHERE id_company='$row[id_fromuser]'";
    $result1 = $conn->query($sql1);
    if ($result1->num_rows >  0) {
      $rowCompany = $result1->fetch_assoc();
    }
    $sql2 = "SELECT * FROM users WHERE id_user='$row[id_touser]'";
    $result2 = $conn->query($sql2);
    if ($result2->num_rows >  0) {
      $rowUser = $result2->fetch_assoc();
    }
  } else {
    $sql1 = "SELECT * FROM company WHERE id_company='$row[id_touser]'";
    $result1 = $conn->query($sql1);
    if ($result1->num_rows >  0) {
      $rowCompany = $result1->fetch_assoc();
    }
    $sql2 = "SELECT * FROM users WHERE id_user='$row[id_fromuser]'";
    $result2 = $conn->query($sql2);
    if ($result2->num_rows >  0) {
      $rowUser = $result2->fetch_assoc();
    }
  }
}

?>
<div class="col-md-9 bg-white padding-2">
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <a href="mailbox.php" class="btn btn-default"><i class="fa fa-arrow-circle-left"></i> Back</a><br /><br />

        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 style="font-weight:bold" class="box-title"><?php echo $row['subject']; ?></h3>
            <strong>
              <h5>From:
            </strong> <?php if ($row['fromuser'] == "company") {
                        echo $rowCompany['companyname'];
                      } else {
                        echo $rowUser['fname'];
                      } ?>
            <span class="mailbox-read-time pull-right"><?php echo date("d-M-Y h:i a", strtotime($row['createdAt'])); ?></span></h5>
            <div class="box-tools pull-right">
              <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            </div><!-- /.box-tools -->
          </div><!-- /.box-header -->
          <div class="box-body">
            <?php echo stripcslashes($row['message']); ?>
          </div><!-- /.box-body -->
        </div><!-- /.box -->

        <?php

        $sqlReply = "SELECT * FROM reply_mailbox WHERE id_mailbox='$_GET[id_mail]'";
        $resultReply = $conn->query($sqlReply);
        if ($resultReply->num_rows > 0) {
          while ($rowReply =  $resultReply->fetch_assoc()) {
        ?>
            <div class="box box-primary">
              <div class="box-header with-border">

                <h3 class="box-title">Reply Message</h3>
                <h5>From: <?php if ($rowReply['usertype'] == "company") {
                            echo $rowCompany['companyname'];
                          } else {
                            echo $rowUser['fname'];
                          } ?>
                  <span class="mailbox-read-time pull-right"><?php echo date("d-M-Y h:i a", strtotime($rowReply['createdAt'])); ?></span></h5>
                <div class="box-tools pull-right">
                  <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                </div><!-- /.box-tools -->
              </div><!-- /.box-header -->
              <div class="box-body">
                <?php echo stripcslashes($rowReply['message']); ?>
              </div><!-- /.box-body -->
            </div><!-- /.box -->
        <?php
          }
        }
        ?>

        <div class="box box-primary">
          <!-- /.box-header -->
          <div class="box-body no-padding">
            <div class="mailbox-read-info">
              <h3>Send Reply</h3>
            </div>
            <div class="mailbox-read-message">
              <form action="reply-mailbox.php" method="post">
                <div class="form-group">
                  <textarea class="form-control input-lg" id="description" name="description" placeholder="Job Description"></textarea>
                  <input type="hidden" name="id_mail" value="<?php echo $_GET['id_mail']; ?>">
                </div>
                <div class="form-group">
                  <button type="submit" class="btn btn-primary"><i class="fa fa-envelope-o"></i> Send</button>
                </div>
              </form>
            </div>
            <!-- /.mailbox-read-message -->
          </div>
          <!-- /.box-body -->
        </div>


      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </section>

</div>
</div>
</div>
</section>

</div>
<!-- /.content-wrapper -->

<?php
include('include/footer.php');
?>