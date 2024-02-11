<?php

require '../dbconnect.php';

error_reporting(0);

session_start();

// Check if job_post_id is present in the URL
if (isset($_GET['job_post_id'])) {
    // Retrieve job_post_id from the URL
    $job_post_id = $_GET['job_post_id'];
    $companyid = $_SESSION['id'];

    // Delete the job from the database
    $query = "DELETE FROM job_postings WHERE companyid = $companyid AND job_post_id = $job_post_id";

    // Execute the query
    if (mysqli_query($conn, $query)) {
        echo "Job deleted successfully!";
        header("Location: viewjobpostings.php");

    } else {
        echo "Error deleting job: " . mysqli_error($conn);
    }
} else {
    // Handle the case where job_post_id is not present in the URL
    echo "Missing job_post_id parameter in the URL";
}
?>
