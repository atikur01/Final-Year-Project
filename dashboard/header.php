<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <title>Dashboard</title>
   <!-- Google Font: Source Sans Pro -->
   <link rel="stylesheet"
      href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
   <!-- Font Awesome -->
   <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
   <!-- Ionicons -->
   <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
   <!-- Tempusdominus Bootstrap 4 -->
   <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
   <!-- iCheck -->
   <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
   <!-- JQVMap -->
   <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
   <!-- Theme style -->
   <link rel="stylesheet" href="dist/css/adminlte.min.css">
   <!-- overlayScrollbars -->
   <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
   <!-- Daterange picker -->
   <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
   <!-- summernote -->
   <link rel="stylesheet" href="plugins/summernote/summernote-bs4.min.css">



   <!-- DataTables -->
   <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
   <link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
   <link rel="stylesheet" href="plugins/datatables-buttons/css/buttons.bootstrap4.min.css">



   <style>
      /* Common styles for both PC and mobile */
      #viewjobpostingtable {
         margin-top: 2%;
      }

      /* PC styles - larger than 768px */
      @media (min-width: 769px) {
         #viewjobpostingtable {
            padding-left: 17%;
            padding-right: 2%;
         }
      }

      /* Mobile styles - up to 768px */
      @media (max-width: 768px) {
         #viewjobpostingtable {
            padding-left: 0%;
            padding-right: 2%;
         }
      }
   </style>



</head>

<body class="hold-transition sidebar-mini layout-fixed">
   <div class="wrapper">
      <!-- Preloader -->
      <div class="preloader flex-column justify-content-center align-items-center">
         <img class="animation__shake" src="dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
      </div>
      <!-- Navbar -->
      <nav class="main-header navbar navbar-expand navbar-white navbar-light">
         <!-- Left navbar links -->
         <ul class="navbar-nav">
            <li class="nav-item">
               <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
               <a href="/" class="nav-link">JOBBOARD</a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
               <a href="#" class="nav-link">Contact</a>
            </li>



         </ul>
         <!-- Right navbar links -->
      </nav>
      <!-- /.navbar -->


      <!-- Main Sidebar Container -->
      <aside class="main-sidebar sidebar-dark-primary elevation-4">
         <!-- Brand Logo -->
         <a href="/dashboard/company-dashboard.php" class="brand-link">
            <!-- <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8"> -->
            <span style="padding-left: 30px" class="brand-text font-weight-light">JOBBOARD</span>
         </a>
         <br>
         <!-- Sidebar Menu -->
         <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
               <!-- Add icons to the links using the .nav-icon class with font-awesome or any other icon font library -->

               <li class="nav-item">
                  <a href="/dashboard/company-dashboard.php" class="nav-link">
                     <i class="nav-icon fas fa-home"></i>
                     <p style="color: white;">Home</p>
                  </a>
               </li>


               <li class="nav-item">
                  <a href="/dashboard/editcompanyprofile.php" class="nav-link">
                     <i class="nav-icon fas fa-solid fa-building"></i>
                     <p style="color: white;">Edit Company Profile</p>
                  </a>
               </li>

               <li class="nav-item">
                  <a href="../company-profile.php?company_id=<?php echo $_SESSION["id"] ?>" class="nav-link"
                     target="_blank">
                     <i class="nav-icon fas  fa-solid fa-arrow-right"></i>
                     <p style="color: white;">View Company Profile</p>
                  </a>
               </li>


               <li class="nav-item">
                  <a href="/dashboard/post-job.php" class="nav-link">
                     <i class="nav-icon fas fa-plus"></i>
                     <p style="color: white;">Post a Job</p>
                  </a>
               </li>

               <li class="nav-item">
                  <a href="/dashboard/viewjobpostings.php" class="nav-link">
                     <i class="nav-icon fas fa-solid fa-list"></i>
                     <p style="color: white;">Manage Job Postings</p>
                  </a>
               </li>




               <li class="nav-item">
                  <a href="../logout.php" class="nav-link">
                     <i class="nav-icon fas fa-sign-out-alt"></i>
                     <p style="color: white;">Logout</p>
                  </a>
               </li>
            </ul>

         </nav>











































         <!-- /.sidebar-menu -->
   </div>
   <!-- /.sidebar -->
   </aside>