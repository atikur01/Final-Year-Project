<?php 
session_start();
if($_SESSION["loggedin"] != true && $_SESSION["role"]!="company" ){
  header("Location: ../login.php");
  exit();
}
?>

<?php
include('header.php');
?>


<?php
include('editcompanyprofileform.php');
?>



<?php
include('footer.php');
?>
  
</body>
</html>