<?php

require 'dbconnect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get user input
    $otp = $_POST['otp'];
    $user_id = $_POST['user_id'];

    // Check if the OTP matches the one stored in the database and is within the time window
    $sql = "SELECT * FROM forgot_password WHERE user_id = ? AND otp = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $user_id, $otp);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // OTP is valid, allow the user to reset the password

        session_start();
        $_SESSION['otp-validation'] = true;

        header("Location: reset_password_form.php?user_id=$user_id");
        exit();
    } else {
        $errors[] = "Invalid OTP or expired. Please try again.";
    }

    // Close database connection
    $stmt->close();
    $conn->close();
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
    <section class="section-hero overlay inner-page bg-image" style="background-image: url('   images/hero_1.jpg');"
      id="home-section">
      <div class="container">

      </div>
    </section>

    <section class="signupLoginMargin site-section">
      <div class="container">
        <div class="row">


          <div class="col-lg-6">
            <h2 class="mb-4">Enter OTP</h2>

            <?php if (!empty($errors)): ?>
              <ul style="color: red;">
                <?php foreach ($errors as $error): ?>
                  <li>
                    <?php echo $error; ?>
                  </li>
                <?php endforeach; ?>
              </ul>
            <?php endif; ?>




            <form action="enter_otp.php" method="post" class="p-4 border rounded">

              <div class="row form-group">
                <div class="col-md-12 mb-3 mb-md-0">
                  <label class="text-black" for="otp">Check Your Email and enter the OTP</label>
                  <input type="text" id="otp" class="form-control" placeholder="" name='otp'>
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

    <br>
    <br>
    <br>
    <br>
    <br>
    <br>

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