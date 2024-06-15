<?php
require 'dbconnect.php';

error_reporting(0);

session_start();
$jobPostId = isset($_GET['job_post_id']) ? $_GET['job_post_id'] : null;

$sql = "SELECT *
        FROM job_postings 
        INNER JOIN company_details ON job_postings.companyid = company_details.company_id
        WHERE job_post_id = $jobPostId AND job_post_status = 'publish'";


$result = $conn->query($sql);
if($result->num_rows==0 ){
  header("Location: JobNotFound.php");
}

$row = $result->fetch_assoc();

function replaceDotWithTag($inputString) {
  // Split the input string into sentences
  $sentences = explode('.', $inputString);

  // Remove any empty sentences
  $sentences = array_filter($sentences, 'strlen');

  // Wrap each sentence in <li> tags
  $outputString = '';
  foreach ($sentences as $sentence) {
    $outputString .= '<li class="d-flex align-items-start mb-2"><span class="icon-check_circle mr-2 text-muted"></span><span>' . trim($sentence) . '</span></li>';
  }


  return $outputString;
}



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
    </div> <!-- .site-mobile-menu -->
    

    <!-- NAVBAR -->
    <?php
      include('navbar.php');
    ?>

    <!-- HOME -->
    <section class="section-hero overlay inner-page bg-image" style="background-image: url('images/hero_1.jpg');" id="home-section">
    
    </section>

    
    <section class="site-section">
      <div class="container">
        <div class="row align-items-center mb-5">
          <div class="col-lg-8 mb-4 mb-lg-0">
            <div class="d-flex align-items-center">
              <div class="border p-2 d-inline-block mr-3 rounded">
              <img id="myImage" src="<?php  echo "dashboard/". $row["img_logo_path"]; ?>"
               onerror="loadBackupImage()" alt="Set Your logo" class="img-fluid" style="width: 75px; height: 75px; border-radius: 50%; object-fit: cover;">
              </div>
              <div>
                <h2><?php echo $row["jobTitle"]; ?></h2>
                <div>
                  <span class="ml-0 mr-2 mb-2"><span class="icon-briefcase mr-2"></span><a href="company-profile.php?company_id=<?php echo $_SESSION["id"] ?>" target="_blank"><?php echo $row["company_name"]; ?></a>  </span>
                  <span class="m-2"><span class="icon-room mr-2"></span><?php echo $row["location"]; ?></span>
                  <span class="m-2"><span class="icon-clock-o mr-2"></span><span class="text-primary"><?php echo $row["jobType"]; ?></span></span>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="row">
              <div class="col-6">
                
              </div>
              <div class="col-6">
             
              <a href="apply-job.php?job_post_id=<?php echo $row['job_post_id']; ?>&company_id=<?php echo $row['companyid']; ?>" class="btn btn-block btn-primary btn-md">Apply Now</a>

              
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-8">
            <div class="mb-5">
              
              <h3 class="h5 d-flex align-items-center mb-4 text-primary"><span class="icon-align-left mr-3"></span>Job Description</h3>
              <p><?php echo $row["jobDescription"]; ?></p>
      
            </div>
            <div class="mb-5">
              <h3 class="h5 d-flex align-items-center mb-4 text-primary"><span class="icon-rocket mr-3"></span>Responsibilities</h3>
              <ul class="list-unstyled m-0 p-0">

              <?php echo  replaceDotWithTag($row["responsibilities"])   ; ?>
        
                
              </ul>
            </div>

            <div class="mb-5">
              <h3 class="h5 d-flex align-items-center mb-4 text-primary"><span class="icon-book mr-3"></span>Education + Experience</h3>
              <ul class="list-unstyled m-0 p-0">
              <p> <?php echo  replaceDotWithTag($row["eduExperience"])   ; ?>   <p>
              </ul>
            </div>

            <div class="mb-5">
              <h3 class="h5 d-flex align-items-center mb-4 text-primary"><span class="icon-turned_in mr-3"></span>Other Benifits</h3>
              <ul class="list-unstyled m-0 p-0">
               <?php echo  replaceDotWithTag($row["otherBenefits"])   ; ?>
                
              </ul>
            </div>

            <br>
            <br>
            <div class="row mb-5">
              
              <div class="col-6">
                
              </div>
              <div class="col-6">
                <a href="#" class="btn btn-block btn-primary btn-md">Apply Now</a>
              </div>
            </div>

          </div>
          <div class="col-lg-4">
            <div class="bg-light p-3 border rounded mb-4">
              <h3 class="text-primary  mt-3 h5 pl-3 mb-3 ">Job Summary</h3>
              <ul class="list-unstyled pl-3 mb-0">
                <li class="mb-2"><strong class="text-black">Published on:</strong> <?php echo $row["publishedOn"]; ?></li>
                <li class="mb-2"><strong class="text-black">Vacancy:</strong> <?php echo $row["vacancy"]; ?> </li>
                <li class="mb-2"><strong class="text-black">Employment Status : </strong><?php echo $row["jobType"]; ?></li>
                <li class="mb-2"><strong class="text-black">Required Experience year:</strong> <?php echo $row["experience"]; ?></li>
                <li class="mb-2"><strong class="text-black">Job Location:</strong> <?php echo $row["location"]; ?> </li>
                <li class="mb-2"><strong class="text-black">Salary:</strong> <?php echo $row["jobSalary"]; ?> </li>
                <li class="mb-2"><strong class="text-black">Gender:</strong> <?php echo $row["gender"]; ?> </li>
                <li class="mb-2"><strong class="text-black">Application Deadline:</strong> <?php echo $row["deadline"]; ?> </li>
              </ul>
            </div>

            

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
            Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="icon-heart text-danger" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank" >Colorlib</a>
            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></small></p>
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
    
    <script src="js/bootstrap-select.min.js"></script>
    
    <script src="js/custom.js"></script>

     
  </body>
</html>