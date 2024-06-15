<?php 
session_start();
if($_SESSION["loggedin"] != true && $_SESSION["role"]=="employee" ){
  header("Location: ../login.php");
  exit();
}

?>

<?php
include('emp-header.php');
?>

  <h1 style="padding-left:40%"> this is demo dashboard</h1>

<?php
include('footer.php');
?>
  
</body>
</html>