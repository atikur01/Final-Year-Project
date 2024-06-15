<?php
require 'dbconnect.php';





if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $job_post_id = $_POST['job_post_id'];
    $email = $_POST['email'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $phone_number = $_POST['phone_number'];
    $country = $_POST['country'];
    $companyid = $_POST['company_id'];  

    // Handle file upload
    $resume_dir = "uploads/";
    $resume_file = $resume_dir . basename($_FILES["resume"]["name"]);
    $upload_ok = 1;
    $resume_file_type = strtolower(pathinfo($resume_file, PATHINFO_EXTENSION));

    // Check if file is a actual resume
    if(isset($_POST["submit"])) {
        $check = filesize($_FILES["resume"]["tmp_name"]);
        if($check !== false) {
            echo "File is a resume - " . $check["mime"] . ".";
            $upload_ok = 1;
        } else {
            echo "File is not a resume.";
            $upload_ok = 0;
        }
    }

    // Check file size
    if ($_FILES["resume"]["size"] > 5000000) {
        echo "Sorry, your file is too large.";
        $upload_ok = 0;
    }

    // Allow certain file formats
    if($resume_file_type != "pdf" && $resume_file_type != "doc" && $resume_file_type != "docx") {
        echo "Sorry, only PDF, DOC & DOCX files are allowed.";
        $upload_ok = 0;
    }

    // Check if $upload_ok is set to 0 by an error
    if ($upload_ok == 0) {
        echo "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
    } else {
        // Generate a unique file name for the resume
        $unique_id = uniqid(); // You can also add a prefix if needed
        $resume_file = 'uploads/' . $unique_id . '.pdf';
    
        if (move_uploaded_file($_FILES["resume"]["tmp_name"], $resume_file)) {
            // Prepare and bind
            $stmt = $conn->prepare("INSERT INTO applications (job_post_id, email, first_name, last_name, phone_number, country, resume, companyid) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
            $stmt->bind_param("issssssi", $job_post_id, $email, $first_name, $last_name, $phone_number, $country, $resume_file, $companyid);

    
            // Execute the statement
            if ($stmt->execute()) {
                header('Location: submitted.php');
                echo "The application has been submitted successfully.";
            } else {
                echo "Error: " . $stmt->error;
            }
    
            // Close statement
            $stmt->close();
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
}

// Close connection
$conn->close();
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
          

            <?php if (!empty($errors)): ?>
              <ul style="color: red;">
                <?php foreach ($errors as $error): ?>
                  <li>
                    <?php echo $error; ?>
                  </li>
                <?php endforeach; ?>
              </ul>
            <?php endif; ?>



            <div class="container mt-5">
        <h2>Apply for Job</h2>
        <form id="jobApplicationForm" action="apply-job.php" method="post" enctype="multipart/form-data" novalidate>
            <input type="hidden" name="job_post_id" value="41">
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email" required>
                <div class="error-message" id="emailError"></div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="firstName">First Name</label>
                    <input type="text" class="form-control" id="firstName" name="first_name" placeholder="First Name" required>
                    <div class="error-message" id="firstNameError"></div>
                </div>
                <div class="form-group col-md-6">
                    <label for="lastName">Last Name</label>
                    <input type="text" class="form-control" id="lastName" name="last_name" placeholder="Last Name" required>
                    <div class="error-message" id="lastNameError"></div>
                </div>
            </div>
            <div class="form-group">
                <label for="phoneNumber">Phone Number</label>
                <input type="tel" class="form-control" id="phoneNumber" name="phone_number" placeholder="Enter your phone number" required>
                <div class="error-message" id="phoneNumberError"></div>
            </div>
            <div class="form-group">
                <label for="country">Country/Region</label>
                <input type="text" class="form-control" id="country" name="country" placeholder="Enter your country or region" required>
                <div class="error-message" id="countryError"></div>
            </div>
            <div class="form-group">
                <label for="resume">Upload Resume</label>
                <input type="file" class="form-control-file" id="resume" name="resume" required>
                <div class="error-message" id="resumeError"></div>
            </div>
            <input type="hidden" name="job_post_id" value="<?php echo htmlspecialchars($_GET['job_post_id']); ?>">

            <input type="hidden" name="company_id" value="<?php echo htmlspecialchars($_GET['company_id']); ?>">

            <button type="submit" class="btn btn-primary">Submit</button>
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