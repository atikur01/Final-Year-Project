<?php

session_start();
if( $_SESSION["role"] == "company" ){
    header("Location: dashboard/company-dashboard.php");

}
elseif($_SESSION["role"] == "employee" ){
    header("Location: dashboard/employee-dashboard.php");

}
else{
    header("Location: login.php");

}

?>