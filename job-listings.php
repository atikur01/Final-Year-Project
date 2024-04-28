<?php
   require "dbconnect.php";
   error_reporting(0);
   
   // Fetch data from the database
   $getallcount = "SELECT COUNT(*) as count FROM job_postings where job_post_status = 'publish'";

   $countresult = $conn->query($getallcount);

   $rowcount = $countresult->fetch_assoc();


   // Fetch data from the database
   $getalljob = "SELECT * FROM job_postings 
              INNER JOIN company_details ON job_postings.companyid = company_details.company_id  
              WHERE job_post_status = 'publish' 
              ORDER BY job_postings.job_post_id DESC";



   $result = $conn->query($getalljob);


?>
<!doctype html>
<html lang="en">
  <head>
    <title>  JobBoard  </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="css/custom-bs.css">
    <link rel="stylesheet" href="css/jquery.fancybox.min.css">
    <link rel="stylesheet" href="css/bootstrap-select.min.css">
    <link rel="stylesheet" href="fonts/icomoon/style.css">
    <link rel="stylesheet" href="fonts/line-icons/style.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/animate.min.css">
    <link rel="stylesheet" href="css/quill.snow.css">
    <!-- Include jQuery library -->
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <!-- Include DataTables library -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap4.min.js"></script>
    <!-- MAIN CSS -->
    <link rel="stylesheet" href="css/style.css">
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
      </div>
      <!-- .site-mobile-menu -->
      <!-- NAVBAR -->
      <?php
      include('navbar.php');
    ?>


      <!-- HOME -->
      <section class="section-hero home-section overlay inner-page bg-image" style="background-image: url('images/hero_1.jpg');" id="home-section"></section>
      <section class="site-section" id="next">
        <div class="container">
          <div class="row mb-5 justify-content-center">
            <div class="col-md-7 text-center">
              <h2 class="section-title mb-2"> <?php echo $rowcount["count"] ?> Jobs Found </h2>
            </div>
          </div>
          <ul class="job-listings mb-5">
            <table id="example" class="table table-bordered" style="width:100%">
            <thead>
                <tr>
                  <td style="display:none;">id</td>
                   <td style="display:none;">jobs</td>
                </tr>
            </thead>

              </tbody>


              <?php

            

              // Check if there are results
if ($result->num_rows > 0) {
    // Output data of each row using a while loop
    while($row = $result->fetch_assoc()) {
        echo '<tr>';

        echo '<td style="display:none;"  >';
        echo $row["job_post_id"];
        echo '</td>';


        echo '<td>';
        echo '<li class="job-listing d-block d-sm-flex pb-3 pb-sm-0 align-items-center">';
        echo '<a href="job-single.php?job_post_id=' . $row["job_post_id"] . '"></a>';
        echo '<div class="job-listing-logo">';
        echo '<img src=" dashboard/' . $row['img_logo_path'] . '" alt="Image" class="img-fluid">';
        echo '</div>';
        echo '<div class="job-listing-about d-sm-flex custom-width w-100 justify-content-between mx-4">';
        echo '<div class="job-listing-position custom-width w-50 mb-3 mb-sm-0">';
        echo '<h2>' . htmlspecialchars($row['jobTitle']) . '</h2>';
        echo '<strong>' . htmlspecialchars($row['company_name']) . '<strong>';
        echo '</div>';
        echo '<div class="job-listing-location mb-3 mb-sm-0 custom-width w-25">';
        echo '<span class="icon-room"></span>' . htmlspecialchars($row['location']);
        echo '</div>';
        echo '<div class="job-listing-meta">';
        echo '<span class="badge badge-success">' . htmlspecialchars($row['jobType']) . '</span>';
        echo '</div>';
        echo '</div>';
        echo '</li>';
        echo '</td>';
        echo '</tr>';
    }
} else {
    echo "0 results";
}




?>




                <!-- Repeat similar structure for other job listings -->
              </tbody>
            </table>
          </ul>
        </div>
      </section>


      <section class="py-5 bg-image overlay-primary fixed overlay" style="background-image: url('images/hero_1.jpg');">
        <div class="container">
          <div class="row align-items-center">
            <div class="col-md-8">
              <h2 class="text-white">Looking For A Job?</h2>
              <p class="mb-0 text-white lead"></p>
            </div>
            <div class="col-md-3 ml-auto">
              <a href="signup.php" class="btn btn-warning btn-block btn-lg">Sign Up</a>
            </div>
          </div>
        </div>
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
                <li>
                  <a href="#">Web Design</a>
                </li>
                <li>
                  <a href="#">Graphic Design</a>
                </li>
                <li>
                  <a href="#">Web Developers</a>
                </li>
                <li>
                  <a href="#">Python</a>
                </li>
                <li>
                  <a href="#">HTML5</a>
                </li>
                <li>
                  <a href="#">CSS3</a>
                </li>
              </ul>
            </div>
            <div class="col-6 col-md-3 mb-4 mb-md-0">
              <h3>Company</h3>
              <ul class="list-unstyled">
                <li>
                  <a href="#">About Us</a>
                </li>
                <li>
                  <a href="#">Career</a>
                </li>
                <li>
                  <a href="#">Blog</a>
                </li>
                <li>
                  <a href="#">Resources</a>
                </li>
              </ul>
            </div>
            <div class="col-6 col-md-3 mb-4 mb-md-0">
              <h3>Support</h3>
              <ul class="list-unstyled">
                <li>
                  <a href="#">Support</a>
                </li>
                <li>
                  <a href="#">Privacy</a>
                </li>
                <li>
                  <a href="#">Terms of Service</a>
                </li>
              </ul>
            </div>
            <div class="col-6 col-md-3 mb-4 mb-md-0">
              <h3>Contact Us</h3>
              <div class="footer-social">
                <a href="#">
                  <span class="icon-facebook"></span>
                </a>
                <a href="#">
                  <span class="icon-twitter"></span>
                </a>
                <a href="#">
                  <span class="icon-instagram"></span>
                </a>
                <a href="#">
                  <span class="icon-linkedin"></span>
                </a>
              </div>
            </div>
          </div>
          <div class="row text-center">
            <div class="col-12">
              <p class="copyright">
                <small>
                  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --> Copyright &copy; <script>
                    document.write(new Date().getFullYear());
                  </script> All rights reserved </a>
                  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                </small>
              </p>
            </div>
          </div>
        </div>
      </footer>
    </div>
    <!-- SCRIPTS -->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/isotope.pkgd.min.js"></script>
    <script src="js/stickyfill.min.js"></script>
    <script src="js/jquery.fancybox.min.js"></script>
    <script src="js/jquery.easing.1.3.js"></script>
    <script src="js/jquery.waypoints.min.js"></script>
    <script src="js/jquery.animateNumber.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/quill.min.js"></script>
    <script src="js/bootstrap-select.min.js"></script>
    <script src="js/custom.js"></script>
    <script>
      $(document).ready(function() {
        new DataTable('#example', {
          searching: false,
          lengthChange: false,
          lengthMenu: [5], 
          order: [[0, 'desc']]
        }); 
      });
    </script>
  </body>
</html>