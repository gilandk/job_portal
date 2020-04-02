<?php

session_start();

require_once("db.php");

$limit = 20;

if (isset($_GET["page"])) {
  $page = $_GET['page'];
} else {
  $page = 1;
}

$start_from = ($page - 1) * $limit;

$sql = "SELECT * FROM job_post LIMIT $start_from, $limit";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
    $sql1 = "SELECT * FROM company WHERE id_company='$row[id_company]'";
    $result1 = $conn->query($sql1);
    if ($result1->num_rows > 0) {
      while ($row1 = $result1->fetch_assoc()) {
?>

        <div class="attachment-block clearfix">
          <?php
          if ($row1['logo'] > 0) {
            $image = $row1['logo'];
          } else {
            $image = "2x2.jpg";
          }
          ?>
          <img class="attachment-img" src="uploads/logo/<?php echo $image; ?>" alt="Attachment Image">
          <div class="attachment-pushed">
            <h4 class="attachment-heading"><a href="view-job-post.php?id=<?php echo $row['id_jobpost']; ?>"><?php echo $row['jobtitle']; ?></a></h4>

            <div class="attachment-text" style="margin-top:5px;">
              <div>
                <strong>
                  <?php echo $row1['companyname']; ?> | <?php echo $row1['city']; ?>, <?php echo $row1['state']; ?><br />
                  Experience <?php echo $row['experience']; ?> Years <br />
                </strong>

                <span class="attachment-heading pull-right" style="font-size:15px;"><i class="fa fa-calendar-check-o" aria-hidden="true"></i><em><strong> Till: </strong><?php echo date("F-d-Y", strtotime($row['applyBy'])); ?></em>
              </div>
            </div>

          </div>
        </div>

<?php
      }
    }
  }
}

$conn->close();
