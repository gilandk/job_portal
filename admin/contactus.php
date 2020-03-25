<?php
include('include/header.php');
?>

<div class="col-md-12 bg-white padding-2">

    <h3>Messages</h3>
    <div class="row margin-top-20">
        <div class="col-md-12">
            <div class="box-body table-responsive no-padding">
                <table id="messages" class="table table-hover">
                    <thead>
                        <th>Date</th>
                        <th>Full name</th>
                        <th>Email Address</th>
                        <th>Contact No</th>
                        <th>View</th>
                    </thead>
                    <tbody>
                        <?php
                        $sql = "SELECT * FROM contact_us";
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                            $i = 0;
                            while ($row = $result->fetch_assoc()) {
                        ?>
                        
                                <?php
                                if ($row['status'] == '0') {
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
                                    <td><i style="color:<?php echo $rd; ?>;" class="<?php echo $icon; ?> "></i>&nbsp;&nbsp; <?php echo date("d-M-Y h:i", strtotime($row['dateSent'])); ?></td>
                                    <td><?php echo $row['fullname']; ?></td>
                                    <td><?php echo $row['email']; ?></td>
                                    <td><?php echo $row['contact']; ?></td>
                                    <td><a href="read-message.php?id=<?php echo $row['id_contact']; ?>"><i class="fa fa-address-card-o"></i></a></td>
                                </tr>
                        <?php
                            }
                        }
                        ?>
                    </tbody>
                </table>
            </div>
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