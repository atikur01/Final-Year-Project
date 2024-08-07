<?php
   // Include database connection
   include('dbconnect.php');
 
   
   error_reporting(0);
   
   // Handle form submission
   if ($_SERVER['REQUEST_METHOD'] === 'POST') {
       // Retrieve form data
       $email = $_POST['email'];
       $password = $_POST['password'];
       $confirmPassword = $_POST['confirmPassword'];
       $role = "employee";
       if(isset($_POST['companyCheckbox'])){
         $role = $_POST['companyCheckbox'];
       }
   
          // Validate form data
       $errors = [];
   
       if (empty($email)) {
           $errors[] = 'Email is required.';
       } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
           $errors[] = 'Invalid email format.';
       }
   
       if (empty($password)) {
           $errors[] = 'Password is required.';
       }
   
       if ($password !== $confirmPassword) {
         $errors[] = 'Passwords do not match. Please try again.';
       }
   
       if ($email == $password) {
         $errors[] = 'Password cannot be the same as your email address.';
       }
   
       // Check if the email already exists in the database
       $existingEmailQuery = "SELECT * FROM users WHERE email = '$email'";
       $existingEmailResult = mysqli_query($conn, $existingEmailQuery);
   
       if (mysqli_num_rows($existingEmailResult) > 0) {
           $errors[] = 'Email is already in use. Please choose a different email.';
       }
   
       // If no validation errors, proceed with signup
       if (empty($errors)) {
           // Hash the password 
           $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
   
           // Insert user data into the database
           $query = "INSERT INTO users (email, password , role) VALUES ('$email', '$hashedPassword' , '$role' )";
           $result = mysqli_query($conn, $query);

           


   
           if ($result) {
               // Registration successful
               header('Location: login.php');
               exit();
           } else {
               $errors[] = 'Error during registration. Please try again.';
           }
       }
   }
   ?>
<!doctype html>
<html lang="en">
   <head>
      <title>  JobBoard  </title>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <link rel="stylesheet" href=" css/custom-bs.css">
      <link rel="stylesheet" href=" css/jquery.fancybox.min.css">
      <link rel="stylesheet" href=" css/bootstrap-select.min.css">
      <link rel="stylesheet" href=" fonts/icomoon/style.css">
      <link rel="stylesheet" href=" fonts/line-icons/style.css">
      <link rel="stylesheet" href=" css/owl.carousel.min.css">
      <link rel="stylesheet" href=" css/animate.min.css">
      <link rel="stylesheet" href=" css/quill.snow.css">
      <!-- MAIN CSS -->
      <link rel="stylesheet" href=" css/style.css">
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
         <section  class="section-hero overlay inner-page bg-image" style="background-image: url(' images/hero_1.jpg');" id="home-section">
            <div class="container">
            </div>
         </section>
         <section    class="signupLoginMargin site-section">
            <div  class="container">
               <div class="row">
                  <div  class="col-lg-6 mb-5">
                     <h2 class="mb-4">Sign Up To JobBoard</h2>
                     <?php if (!empty($errors)) : ?>
                     <ul style="color: red;">
                        <?php foreach ($errors as $error) : ?>
                        <li><?php echo $error; ?></li>
                        <?php  endforeach;  ?>
                     </ul>
                     <?php endif;  ?>
                     <form action="signup.php" method="post" class="p-4 border rounded">
                        <div class="row form-group">
                           <div class="col-md-12 mb-3 mb-md-0">
                              <label class="text-black" for="inputEmail">Email</label>
                              <input type="text" id="inputEmail" class="form-control" placeholder="Email address" name="email" value="<?php echo $_POST['email'] ?>" >                
                           </div>
                        </div>
                        <div class="row form-group">
                           <div class="col-md-12 mb-3 mb-md-0">
                              <label class="text-black" for="inputPassword">Password</label>
                              <input type="password" id="inputPassword" class="form-control" placeholder="Password" name="password" >
                           </div>
                        </div>
                        <div class="row form-group">
                           <div class="col-md-12 mb-3 mb-md-0">
                              <label class="text-black" for="inputPassword">Re-Type Password</label>
                              <input type="password" id="inputPassword" class="form-control" placeholder="Re-Type Password" name="confirmPassword" >
                           </div>
                        </div>

                        <label for="companyCheckbox">
                        <input type="checkbox" name="companyCheckbox" id="checkbox1" value="company"> Sign Up As a company?
                        </label>

                        <div class="row form-group">
                           <div class="col-md-12">
                              <input type="submit" value="Sign Up" class="btn px-4 btn-primary text-white">
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
                     <p class="copyright">
                        <small>
                           <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                           Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved 
                           <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        </small>
                     </p>
                  </div>
               </div>
            </div>
         </footer>
      </div>
      <!-- SCRIPTS -->
      <script src=" js/jquery.min.js"></script>
      <script src=" js/bootstrap.bundle.min.js"></script>
      <script src=" js/isotope.pkgd.min.js"></script>
      <script src=" js/stickyfill.min.js"></script>
      <script src=" js/jquery.fancybox.min.js"></script>
      <script src=" js/jquery.easing.1.3.js"></script>
      <script src=" js/jquery.waypoints.min.js"></script>
      <script src=" js/jquery.animateNumber.min.js"></script>
      <script src=" js/owl.carousel.min.js"></script>
      <script src=" js/quill.min.js"></script>
      <script src=" js/bootstrap-select.min.js"></script>
      <script src=" js/custom.js"></script>
   </body>
</html>