<?php
// Include the database configuration
require_once 'dbconnect.php';


session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST' && $_SESSION['otp-validation'] ==true ) {
    // Get user input
    $id = $_POST['user_id'];
    $newPassword = password_hash($_POST['password'], PASSWORD_DEFAULT);

    // Update the user's password and clear the OTP in the database
    $updateSql = "UPDATE users SET password = ? WHERE id = ?";
    $updateStmt = $conn->prepare($updateSql);
    $updateStmt->bind_param("ss", $newPassword  , $id);
    $updateStmt->execute();

  // echo "done";

     header("Location: login.php");

    // Close database connection
    $updateStmt->close();
    $conn->close();

    
}


unset($_POST);
unset($_SESSION);


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
    <header class="site-navbar mt-3">
      <div class="container-fluid">
        <div class="row align-items-center">
          <div class="site-logo col-6"><a href="index.php">JobBoard</a></div>

          <nav class="mx-auto site-navigation">
            <ul class="site-menu js-clone-nav d-none d-xl-block ml-0 pl-0">
              <li><a href="index.php" class="nav-link">Home</a></li>
              <li><a href="about.html">About</a></li>
              <li>
                <a href="job-listings.php">Job Listings</a>

              </li>
              <li class="has-children">
                <a href="services.html">Pages</a>
                <ul class="dropdown">
                  <li><a href="services.html">Services</a></li>
                  <li><a href="service-single.html">Service Single</a></li>
                  <li><a href="blog-single.html">Blog Single</a></li>
                  <li><a href="portfolio.html">Portfolio</a></li>
                  <li><a href="portfolio-single.html">Portfolio Single</a></li>
                  <li><a href="testimonials.html">Testimonials</a></li>
                  <li><a href="faq.html">Frequently Ask Questions</a></li>
                  <li><a href="gallery.html">Gallery</a></li>
                </ul>
              </li>

              <li><a href="contact.html">Contact</a></li>
              <li><a href="redirectdashboard.php">Dashboard</a></li>
              <li class="d-lg-none"><a href="dashboard/post-job.php"><span class="mr-2">+</span> Post a Job</a></li>
              <li class="d-lg-none"><a href="#" onclick="window.location.href='login.php'; return false;">Log In</a>
              </li>
              <li class="d-lg-none"><a href="#" onclick="window.location.href='signup.php'; return false;">Sign Up</a>
              </li>
            </ul>
          </nav>

          <div class="right-cta-menu text-right d-flex aligin-items-center col-6">
            <div class="ml-auto">
              <a href="dashboard/post-job.php" class="btn btn-outline-white border-width-2 d-none d-lg-inline-block"><span
                  class="mr-2 icon-add"></span>Post a Job</a>
              <a href="/signup.php" class="btn btn-primary border-width-2 d-none d-lg-inline-block"><span
                  class="icon-user-plus"></span>Sign Up</a>

            </div>
            <a href="#" class="site-menu-toggle js-menu-toggle d-inline-block d-xl-none mt-lg-2 ml-3"><span
                class="icon-menu h3 m-0 p-0 mt-2"></span></a>
          </div>

        </div>
      </div>
    </header>

    <!-- HOME -->
    <section class="section-hero overlay inner-page bg-image" style="background-image: url('   images/hero_1.jpg');"
      id="home-section">
      <div class="container">

      </div>
    </section>

    <section class="signupLoginMargin site-section">
      <div class="container">
        <div class="row">


          <div class="col-lg-6">
            <h2 class="mb-4">Reset Password</h2>

            <?php if (!empty($errors)): ?>
              <ul style="color: red;">
                <?php foreach ($errors as $error): ?>
                  <li>
                    <?php echo $error; ?>
                  </li>
                <?php endforeach; ?>
              </ul>
            <?php endif; ?>




            <form action="reset_password_form.php" method="post" class="p-4 border rounded">

              <div class="row form-group">
                <div class="col-md-12 mb-3 mb-md-0">
                  <label class="text-black" for="password">Enter New Password:</label>
                  <input type="text" id="password" class="form-control" placeholder="" name='password'>
                </div>
              </div>

              <input type="hidden" name="user_id" value="<?php  if(isset( $_GET['user_id'])) {echo $_GET['user_id']; }?>">

              

              <div class="row form-group">
                <div class="col-md-12">
                  <input type="submit" value="Continue" class="btn px-4 btn-primary text-white">
                </div>
              </div>

             

            </form>










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
                Copyright &copy;
                <script>document.write(new Date().getFullYear());</script> All rights reserved </i>
                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
              </small></p>
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