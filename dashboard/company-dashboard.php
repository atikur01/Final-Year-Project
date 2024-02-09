<?php 
session_start();
if($_SESSION["loggedin"] != true && $_SESSION["role"]!="company" ){
  header("Location: ../login.php");
  exit();
}
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
        <div class="small-box bg-info" style="text-align: center;">
          <div class="inner">
            <h3>150</h3>
            <p>Job Posts</p>
          </div>
          <!--<div class="icon">
            <i class="ion ion-bag"></i>
          </div>-->
          <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-success" style="text-align: center;">
          <div class="inner">
            <h3>53<sup style="font-size: 20px"></sup></h3>
            <p>Applications submitted</p>
          </div>
          <!--<div class="icon">
            <i class="ion ion-stats-bars"></i>
          </div>-->
          <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-warning" style="text-align: center;">
          <div class="inner">
            <h3>44</h3>
            <p>Total Employee</p>
          </div>
          <!--<div class="icon">
            <i class="ion ion-person-add"></i>
          </div>-->
          <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-secondary" style="text-align: center;">
          <div class="inner">
            <h3>65</h3>
            <p>Total Job Categories</p>
          </div>
          <!--<div class="icon">
            <i class="ion ion-pie-graph"></i>
          </div>-->
          <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
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