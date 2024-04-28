<!-- NAVBAR -->
<header class="site-navbar mt-3">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="site-logo col-6"><a href="index.php" onclick="window.location.href='index.php'; return false;" >JobBoard</a></div>

            <nav class="mx-auto site-navigation">
                <ul class="site-menu js-clone-nav d-none d-xl-block ml-0 pl-0">
                    <li><a href="index.php" onclick="window.location.href='index.php'; return false;" class="nav-link active">Home</a></li>

                    <li>
                        <a href="job-listings.php" onclick="window.location.href='job-listings.php'; return false;" >Job Listings</a>
                    </li>

                    <li onclick="window.location.href='dashboard/company-dashboard.php'; return false;" ><a href="dashboard/company-dashboard.php"  >Dashboard</a></li>

                    <!--  <li class="d-lg-none"><a href="dashboard/post-job.php"><span class="mr-2">+</span> Post a Job</a></li> -->
                    <li class="d-lg-none"><a href="#" onclick="window.location.href='login.php'; return false;">Log In</a></li>
                    <li class="d-lg-none"><a href="#" onclick="window.location.href='signup.php'; return false;">Sign Up</a></li>
                </ul>
            </nav>

            <div class="right-cta-menu text-right d-flex aligin-items-center col-6">
                <div class="ml-auto">
                    <a href="dashboard/post-job.php" onclick="window.location.href='dashboard/post-job.php'; return false;" class="btn btn-outline-white border-width-2 d-none d-lg-inline-block"><span class="mr-2 icon-add"></span>Post a Job</a>
                    <a href="login.php" onclick="window.location.href='login.php'; return false;" class="btn btn-primary border-width-2 d-none d-lg-inline-block"><span class="mr-2 icon-lock_outline"></span>Log In</a>
                    <a href="signup.php" onclick="window.location.href='signup.php'; return false;"  class="btn btn-primary border-width-2 d-none d-lg-inline-block"><span class="icon-user-plus"></span> Sign Up</a>
                </div>
                <a href="#" class="site-menu-toggle js-menu-toggle d-inline-block d-xl-none mt-lg-2 ml-3"><span class="icon-menu h3 m-0 p-0 mt-2"></span></a>
            </div>
        </div>
    </div>
</header>
