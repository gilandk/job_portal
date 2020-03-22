<?php
include('include/header.php');
?>

<div class="col-md-12 bg-white padding-2">
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title" style="margin-bottom: 20px;">Mailbox</h3>
            <div class="pull-right">
            <a href="create-mail.php" class="btn btn-primary btn-block margin-bottom">Compose</a>
            </div>
            <!-- /.box-tools -->
          </div>
          <!-- /.box-header -->
          <div class="box-body no-padding">
            <div class="table-responsive mailbox-messages">
              <table id="mailbox" class="table table-hover table-striped">
                <thead>
                  <tr>
                    <th>Company</th>
                    <th>Subject</th>
                    <th>Date</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $sql = "SELECT * FROM mailbox WHERE id_fromuser='$_SESSION[id_user]' OR id_touser='$_SESSION[id_user]'";
                  $result = $conn->query($sql);
                  if ($result->num_rows > 0) {
                    while ($row = $result->fetch_array()) {
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

                  ?>
                      <?php
                      if ($row['AmsgRead'] == '0') {
                        $icon = "fa fa-envelope blink";
                        $bld = "bold";
                        $clr = "#D3D3D3";
                        $rd = "#E00000";
                      } else {
                        $icon = "fa fa-envelope-open";
                        $bld = "";
                        $clr = "";
                        $rd = "";
                      }
                      ?>

                      <tr style="background-color:<?php echo $clr; ?>;font-weight:<?php echo $bld; ?>;">
                        <td class="mailbox-company">

                          <?php
                          if ($row['fromuser'] != "company") {
                            $row['id_fromuser'];
                            echo $rowCompany['companyname'];
                          } else {
                            $row['id_touser'];
                            echo $rowCompany['companyname'];
                          }
                          ?>

                        <td class="mailbox-subject"><i style="color:<?php echo $rd; ?>;" class="<?php echo $icon; ?> "></i>&nbsp;&nbsp; <a style="color:black;" href="read-mail.php?id_mail=<?php echo $row['id_mailbox']; ?>"><?php echo $row['subject']; ?></a></td>
                        <td class="mailbox-date"><?php echo date("d-M-Y h:i a", strtotime($row['createdAt'])); ?></td>
                      </tr>
                  <?php
                    }
                  }
                  ?>
                </tbody>
                <tfoot>
                  <tr>
                    <th>Company</th>
                    <th>Subject</th>
                    <th>Date</th>
                  </tr>
                </tfoot>
              </table>
              <!-- /.table -->
            </div>
            <!-- /.mail-box-messages -->
          </div>
          <!-- /.box-body -->

        </div>
        <!-- /. box -->
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