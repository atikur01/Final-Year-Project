<?php 
session_start();
if($_SESSION["loggedin"] != true ){
  header("Location: ../login.php");
  exit();
}
?>

<?php
include('header.php');
?>

  <h1 style="padding-left:40%"> this is demo dashboard</h1>

<?php
include('footer.php');
?>
  
</body>
</html>
