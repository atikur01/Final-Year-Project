<?php
require 'dbconnect.php';
error_reporting(0);

// Check if company_id is present in the GET request
if(isset($_GET['company_id'])) {
    // Get the company_id from the GET request
    $company_id = $_GET['company_id'];

    // Sanitize the input to prevent SQL injection (assuming it's an integer)
    $company_id = intval($company_id);

    // Fetch company details for the specified company_id
    $sql = "SELECT * FROM company_details WHERE company_id = $company_id";
    $result = $conn->query($sql);

    // Check if there is a result
    if ($result->num_rows > 0) {
        // Fetch the data
        $row = $result->fetch_assoc();

        // Close the database connection
        $conn->close();

       
    } else {
        echo "No records found for company ID: $company_id";
    }
} else {
    echo "Company ID not provided in the GET request.";
}
?>




<!doctype html>
<html lang="en">
  <head>
    <title>  JobBoard  </title>
 
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    
    <link rel="stylesheet" href="   css/custom-bs.css">
    <link rel="stylesheet" href="   css/jquery.fancybox.min.css">
    <link rel="stylesheet" href="   css/bootstrap-select.min.css">
    <link rel="stylesheet" href="   fonts/icomoon/style.css">
    <link rel="stylesheet" href="   fonts/line-icons/style.css">
    <link rel="stylesheet" href="   css/owl.carousel.min.css">
    <link rel="stylesheet" href="   css/animate.min.css">
    <link rel="stylesheet" href="   css/quill.snow.css">
    

    <!-- MAIN CSS -->
    <link rel="stylesheet" href="   css/style.css">    
  </head>
  <body id="top">

  <div id="overlayer"></div>
  <div class="loader">
    <div class="spinner-border text-primary" role="status">
      <span class="sr-only">Loading...</span>
    </div>
  </div>
    

<div class="site-wrap">

    <div class="site-mobile-menu site-navbar-target">
      <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close mt-3">
          <span class="icon-close2 js-menu-toggle"></span>
        </div>
      </div>
      <div class="site-mobile-menu-body"></div>
    </div> <!-- .site-mobile-menu -->
    

    <!-- NAVBAR -->
    <?php
      include('navbar.php');
    ?>

    <!-- HOME -->
    <section class="section-hero overlay inner-page bg-image" style="background-image: url('   images/hero_1.jpg');" id="home-section">

    <div class="container">
  <div class="text-center mt-5">
  <img src="<?php echo "dashboard/" . $row['img_logo_path']; ?>" alt="Company Logo" class="img-fluid" style="width: 75px; height: 75px; border-radius: 50%; object-fit: cover;">

    <h2 style="color: white;" class="mt-3"><?php echo $row['company_name']; ?></h2>
    <p style="color: white;"><?php echo $row['address']; ?></p>

    <table style="color: white;" class="table">
    <thead style="display: block;">

<tr style="display: flex; flex-wrap: wrap;">
  <th style="flex: 1; padding: 10px;">Type: <?php echo $row['company_type']; ?></th>
  <th style="flex: 1; padding: 10px;">Email: <?php echo $row['email']; ?></th>
  <th style="flex: 1; padding: 10px;">Phone: <?php echo $row['phone_no']; ?></th>
  <th style="flex: 1; padding: 10px;"> <a href="<?php echo "http://" . $row['website']; ?>" target="_blank">Visit Company Website! </a> </th>
</tr>

</thead>


</table>

   

  </div>

  <div style="color: white;" class="mt-5">
    <h3 style="color: white;">Company Background</h3>
    <p><?php echo $row['company_background']; ?></p>
  </div>

  <div style="color: white;" class="mt-5">
    <h3 style="color: white;">Services</h3>
    <p><?php echo $row['services']; ?></p>
  </div>

  <div style="color: white;" class="mt-5">
    <h3 style="color: white;">Expertise</h3>
    <p><?php echo $row['expertise']; ?></p>
  </div>
</div>

<br>
<br>
      
    </section>

    


    
    








    <footer class="site-footer">

      <a href="#top" class="smoothscroll scroll-top">
        <span class="icon-keyboard_arrow_up"></span>
      </a>

      <div class="container">
        <div class="row mb-5">
          <div class="col-6 col-md-3 mb-4 mb-md-0">
            <h3>Search Trending</h3>
            <ul class="list-unstyled">
              <li><a href="#">Web Design</a></li>
              <li><a href="#">Graphic Design</a></li>
              <li><a href="#">Web Developers</a></li>
              <li><a href="#">Python</a></li>
              <li><a href="#">HTML5</a></li>
              <li><a href="#">CSS3</a></li>
            </ul>
          </div>
          <div class="col-6 col-md-3 mb-4 mb-md-0">
            <h3>Company</h3>
            <ul class="list-unstyled">
              <li><a href="#">About Us</a></li>
              <li><a href="#">Career</a></li>
              <li><a href="#">Blog</a></li>
              <li><a href="#">Resources</a></li>
            </ul>
          </div>
          <div class="col-6 col-md-3 mb-4 mb-md-0">
            <h3>Support</h3>
            <ul class="list-unstyled">
              <li><a href="#">Support</a></li>
              <li><a href="#">Privacy</a></li>
              <li><a href="#">Terms of Service</a></li>
            </ul>
          </div>
          <div class="col-6 col-md-3 mb-4 mb-md-0">
            <h3>Contact Us</h3>
            <div class="footer-social">
              <a href="#"><span class="icon-facebook"></span></a>
              <a href="#"><span class="icon-twitter"></span></a>
              <a href="#"><span class="icon-instagram"></span></a>
              <a href="#"><span class="icon-linkedin"></span></a>
            </div>
          </div>
        </div>

        <div class="row text-center">
          <div class="col-12">
            <p class="copyright"><small>
              <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved </i>
            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></small></p>
          </div>
        </div>
      </div>
    </footer>
  
  </div>

    <!-- SCRIPTS -->
    <script src="   js/jquery.min.js"></script>
    <script src="   js/bootstrap.bundle.min.js"></script>
    <script src="   js/isotope.pkgd.min.js"></script>
    <script src="   js/stickyfill.min.js"></script>
    <script src="   js/jquery.fancybox.min.js"></script>
    <script src="   js/jquery.easing.1.3.js"></script>
    
    <script src="   js/jquery.waypoints.min.js"></script>
    <script src="   js/jquery.animateNumber.min.js"></script>
    <script src="   js/owl.carousel.min.js"></script>
    <script src="   js/quill.min.js"></script>
    
    
    <script src="   js/bootstrap-select.min.js"></script>
    
    <script src="   js/custom.js"></script>
   
   
     
  </body>
</html>