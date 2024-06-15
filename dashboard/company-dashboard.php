<?php
session_start();
if ($_SESSION["loggedin"] != true && $_SESSION["role"] != "company") {
  header("Location: ../login.php");
  exit();
}


$companyId = $_SESSION['id'];
require '../dbconnect.php';

$sql = "SELECT COUNT(job_post_id) as total_jobs FROM job_postings WHERE companyid = $companyId";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // Output data of each row
  $row = $result->fetch_assoc();
  $totalJobs = $row["total_jobs"];
} else {
  $totalJobs=0;
}


$sqlPublish = "SELECT COUNT(job_post_status) as publish FROM job_postings WHERE companyid = $companyId AND job_post_status = 'Publish' ";

$resultPublish = $conn->query($sqlPublish);

if ($resultPublish->num_rows > 0) {
    // Output data of each row
    $rowPublish = $resultPublish->fetch_assoc(); // Fix: Change $result to $resultPublish
    $totalpublish = $rowPublish["publish"];
} else {
    $totalpublish = 0;
}


$sqlUnpublish = "SELECT COUNT(job_post_status) as unpublish FROM job_postings WHERE companyid = $companyId AND job_post_status = 'Unpublish' ";

$resultUnpublish = $conn->query($sqlUnpublish);

if ($resultUnpublish->num_rows > 0) {
    // Output data of each row
    $rowUnpublish = $resultUnpublish->fetch_assoc();
    $totalUnpublish = $rowUnpublish["unpublish"];
} else {
    $totalUnpublish = 0;
}


$sqlApplications = "SELECT COUNT(id) as applications FROM applications WHERE companyid = $companyId"; 
$resultUnpublish = $conn->query($sqlUnpublish);







?>

<?php
include('header.php');
?>

<section style="margin-left: 17%; margin-top: 2%;" class="content">
  <div class="container-fluid">
    <!-- Small boxes (Stat box) -->
    <div class="row">
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-primary " style="text-align: center;">
          <div class="inner">
            <h3><?php echo $totalJobs; ?></h3>
            <p>Job Posts</p>
          </div>
          <!--<div class="icon">
            <i class="ion ion-bag"></i>
          </div>-->
          <a href="viewjobpostings.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-warning" style="text-align: center;">
          <div class="inner">
            <h3><?php echo $totalUnpublish ?><sup style="font-size: 20px"></sup></h3>
            <p>Total Applications Received</p>
          </div>
          <h3></h3>
          <!--<div class="icon">
            <i class="ion ion-stats-bars"></i>
          </div>-->
          <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-success" style="text-align: center;">
          <div class="inner">
            <h3><?php echo $totalpublish?> </h3>
            <p>Total Published Jobs</p>
          </div>
          <!--<div class="icon">
            <i class="ion ion-person-add"></i>
          </div>-->
          <a href="viewjobpostings.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-danger" style="text-align: center;">
          <div class="inner">
            <h3><?php echo $totalUnpublish ?></h3>
            <p>Total Unpublished Jobs</p>
          </div>
          <!--<div class="icon">
            <i class="ion ion-pie-graph"></i>
          </div>-->
          <a href="viewjobpostings.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>

      <!-- ./col -->
    </div>
  </div><!-- /.container-fluid -->
</section>









<?php
include('footer.php');
?>

</body>

</html>