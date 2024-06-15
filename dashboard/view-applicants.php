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


<?php
include('view-applicants-table.php');
?>



<?php
include('footer.php');
?>
  
</body>
</html>