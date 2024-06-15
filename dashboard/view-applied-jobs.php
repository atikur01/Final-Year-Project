<?php 
session_start();
if($_SESSION["loggedin"] != true ){
  header("Location: ../login.php");
  exit();
}
?>

<?php
include('emp-header.php');
?>


<?php
include('view-applied-jobstable.php');
?>



<?php
include('footer.php');
?>
  
</body>
</html>