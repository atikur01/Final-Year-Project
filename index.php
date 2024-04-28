<?php
require 'dbconnect.php';

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve regions from the database
$sql = "SELECT DISTINCT location FROM job_postings"; // Modify this query according to your table structure
$regions = $conn->query($sql);

// Retrieve job types from the database
$sql = "SELECT DISTINCT jobType FROM job_postings"; // Modify this query according to your table structure
$jobtyperesult = $conn->query($sql);

// Function to get trending keywords
function getTrendingKeywords($limit = 3) {
    global $conn;
    $sql = "SELECT keyword FROM searched_keywords ORDER BY search_count DESC LIMIT $limit";
    $result = mysqli_query($conn, $sql);

    $keywords = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $keywords[] = $row['keyword'];
    }
    return $keywords;
}

// Display trending keywords
$trending_keywords = getTrendingKeywords();

?>

<!doctype html>
<html lang="en">
  <head>
    <title>JobBoard - Home</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="author" content="Free-Template.co" />
    <link rel="shortcut icon" href="ftco-32x32.png">
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
    

    <?php
      include('navbar.php');
    ?>


    
    <!-- HOME -->
    <section class="home-section section-hero overlay bg-image" style="background-image: url('images/hero_1.jpg');" id="home-section">

      <div class="container">
        <div class="row align-items-center justify-content-center">
          <div class="col-md-12">
            <div class="mb-5 text-center">
              <h1 class="text-white font-weight-bold">The Easiest Way To Get Your Dream Job</h1>
              <p></p>
            </div>

            <form method="post" class="search-jobs-form" action="job-search.php" >
              <div class="row mb-5">
                <div class="col-12 col-sm-6 col-md-6 col-lg-3 mb-4 mb-lg-0">
                  <input type="text" class="form-control form-control-lg" placeholder="Job title" name="keyword" value="">
                </div>

            <div class="col-12 col-sm-6 col-md-6 col-lg-3 mb-4 mb-lg-0">

  <select class="selectpicker" data-style="btn-white btn-lg" data-width="100%" data-live-search="true" title="Select Region" name="region">
    <?php
    // Loop through the query results and generate <option> tags
    if ($regions->num_rows > 0) {
        while ($row = $regions->fetch_assoc()) {
            $location = $row["location"];
            echo "<option";
            // Check if the location matches "Anywhere" and set the selected attribute
            if ($location == "Anywhere") {
                echo " selected";
            }
            echo ">" . $location . "</option>";
        }
    }
    ?>
</select>

    
</div>

<div class="col-12 col-sm-6 col-md-6 col-lg-3 mb-4 mb-lg-0">
    <select class="selectpicker" data-style="btn-white btn-lg" data-width="100%" data-live-search="true" title="Select Job Type" name="jobType">
        <?php
        // Loop through the query results and generate <option> tags
        if ($jobtyperesult->num_rows > 0) {
            while ($row = $jobtyperesult->fetch_assoc()) {
                $selected = ($row["jobType"] == "Full Time") ? "selected" : ""; // Check if the option is "Full Time" and set selected attribute
                echo "<option $selected>" . $row["jobType"] . "</option>";
            }
        }
        ?>
    </select>
</div>


                <div class="col-12 col-sm-6 col-md-6 col-lg-3 mb-4 mb-lg-0">
                  <button type="submit" class="btn btn-primary btn-lg btn-block text-white btn-search"><span class="icon-search icon mr-2"></span>Search Job</button>
                </div>
              </div>


              <div class="row">
    <div class="col-md-12 popular-keywords">
        <h3>Trending Keywords:</h3>
        <ul class="keywords list-unstyled m-0 p-0">
            <?php foreach ($trending_keywords as $keyword): ?>
                <li><a href="#" class="keywordLink"><?php echo htmlspecialchars($keyword); ?></a></li>

            <?php endforeach; ?>
        </ul>
    </div>
</div>

            </form>

          </div>
        </div>
      </div>

    </section>
    
  
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

    <script>

document.addEventListener('DOMContentLoaded', function() {
    var keywordLinks = document.querySelectorAll('.keywordLink');
    var keywordInput = document.querySelector('input[name="keyword"]');

    keywordLinks.forEach(function(link) {
        link.addEventListener('click', function(event) {
            event.preventDefault(); // Prevent the default behavior of the link
            keywordInput.value = link.textContent.trim(); // Set input value to clicked keyword
        });
    });
});

    </script>

  </body>
</html>