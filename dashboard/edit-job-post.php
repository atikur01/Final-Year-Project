

<?php 

require '../dbconnect.php';
error_reporting(0);

session_start();
$companyid = $_SESSION['id'];

if (isset($_GET['job_post_id'])) {
    // Retrieve job_post_id from the URL
    $job_post_id = $_GET['job_post_id'];
    $_SESSION['job_post_id'] = $job_post_id;
    
   

    // Fetch job details from the database based on job_post_id
    $query = "SELECT * FROM job_postings WHERE companyid = $companyid AND job_post_id = $job_post_id ";
    $result = mysqli_query($conn, $query);

    // Check if the query was successful
    if ($result) {
        // Fetch the job details as an associative array
        $jobDetails = mysqli_fetch_assoc($result);
    } else {
        // Handle errors
        die("Error fetching job details: " . mysqli_error($conn));
    }
} else {
    // Handle the case where job_post_id is not present in the URL
    //die("Missing job_post_id parameter in the URL");

    $job_post_id=$_SESSION['job_post_id'];


    
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  

    $jobTitle = mysqli_real_escape_string($conn, $_POST['jobTitle']);
    $location = mysqli_real_escape_string($conn, $_POST['location']);
    $jobType = mysqli_real_escape_string($conn, $_POST['jobType']);
    $jobDescription = mysqli_real_escape_string($conn, $_POST['jobDescription']);
    $responsibilities = mysqli_real_escape_string($conn, $_POST['responsibilities']);
    $eduExperience = mysqli_real_escape_string($conn, $_POST['eduExperience']);
    $otherBenefits = mysqli_real_escape_string($conn, $_POST['otherBenefits']);
    $vacancy = mysqli_real_escape_string($conn, $_POST['vacancy']);
    $experience = mysqli_real_escape_string($conn, $_POST['experience']);
    $gender = mysqli_real_escape_string($conn, $_POST['gender']);
    $jobSalary = mysqli_real_escape_string($conn, $_POST['jobSalary']);
    $deadline = mysqli_real_escape_string($conn, $_POST['deadline']);
    $job_post_status = mysqli_real_escape_string($conn, $_POST['job_post_status']);

    // Update the job details in the database
    $query = "UPDATE job_postings SET 
                jobTitle = '$jobTitle',
                location = '$location',
                jobType = '$jobType',
                jobDescription = '$jobDescription',
                responsibilities = '$responsibilities',
                eduExperience = '$eduExperience',
                otherBenefits = '$otherBenefits',
                vacancy = $vacancy,
                experience = $experience,
                gender = '$gender',
                jobSalary = '$jobSalary',
                deadline = '$deadline',
                job_post_status = '$job_post_status'
                WHERE job_post_id = '$job_post_id';";

    // Execute the query
    if (mysqli_query($conn, $query)) {
        echo "Job details updated successfully!";
        // Unset all POST variables
        
        header("Location: viewjobpostings.php");
        exit(); // Ensure that no further output is sent
    } else {
        echo "Error updating job details: " . mysqli_error($conn);
    }
}

}




?>





<?php
include('header.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
    <title>Edit Job</title>
</head>
<body>

<div style="padding-left:7%" class="container mt-5">
    <h2 class="mb-4">Edit Job</h2>
    <form action="/dashboard/edit-job-post.php" method="post" name="jobPostingForm">
    <!-- Job Title -->
    <div class="form-group">
        <label for="jobTitle">Job Title:</label>
        <input type="text" class="form-control" id="jobTitle" name="jobTitle" value="<?php echo $jobDetails['jobTitle']; ?>" required>
    </div>

    <!-- Location -->
    <div class="form-group">
        <label for="location">Location:</label>
        <input type="text" class="form-control" id="location" name="location" value="<?php echo $jobDetails['location']; ?>" required>
    </div>

    <!-- Job Type -->
    <div class="form-group">
        <label for="jobType">Job Type:</label>
        <select class="form-control" id="jobType" name="jobType" required>
            <option value="Full Time" <?php if ($jobDetails['jobType'] === 'Full Time') echo 'selected'; ?>>Full Time</option>
            <option value="Part Time" <?php if ($jobDetails['jobType'] === 'Part Time') echo 'selected'; ?>>Part Time</option>
            <option value="Contract" <?php if ($jobDetails['jobType'] === 'Contract') echo 'selected'; ?>>Contract</option>
        </select>
    </div>

    <!-- Job Description -->
    <div class="form-group">
        <label for="jobDescription">Job Description:</label>
        <textarea class="form-control" id="jobDescription" name="jobDescription" rows="4" required><?php echo $jobDetails['jobDescription']; ?></textarea>
    </div>

    <!-- Responsibilities -->
<div class="form-group">
    <label for="responsibilities">Responsibilities:</label>
    <textarea class="form-control" id="responsibilities" name="responsibilities" rows="4" required><?php echo $jobDetails['responsibilities']; ?></textarea>
</div>

<!-- Education + Experience -->
<div class="form-group">
    <label for="eduExperience">Education + Experience:</label>
    <textarea class="form-control" id="eduExperience" name="eduExperience" rows="4" required><?php echo $jobDetails['eduExperience']; ?></textarea>
</div>

<!-- Other Benefits -->
<div class="form-group">
    <label for="otherBenefits">Other Benefits:</label>
    <textarea class="form-control" id="otherBenefits" name="otherBenefits" rows="4" required><?php echo $jobDetails['otherBenefits']; ?></textarea>
</div>

<!-- Vacancy -->
<div class="form-group">
    <label for="vacancy">Vacancy:</label>
    <input type="number" class="form-control" id="vacancy" name="vacancy" value="<?php echo $jobDetails['vacancy']; ?>" required>
</div>

<!-- Required Experience in Years -->
<div class="form-group">
    <label for="experience">Required Experience (in years):</label>
    <input type="number" class="form-control" id="experience" name="experience" value="<?php echo $jobDetails['experience']; ?>" required>
</div>

<!-- Gender -->
<div class="form-group">
    <label for="gender">Gender:</label>
    <select class="form-control" id="gender" name="gender" required>
        <option value="male" <?php if ($jobDetails['gender'] === 'male') echo 'selected'; ?>>Male</option>
        <option value="female" <?php if ($jobDetails['gender'] === 'female') echo 'selected'; ?>>Female</option>
        <option value="any" <?php if ($jobDetails['gender'] === 'any') echo 'selected'; ?>>Any</option>
    </select>
</div>

<!-- Salary -->
<div class="form-group">
    <label for="jobSalary">Salary:</label>
    <input type="text" class="form-control" id="jobSalary" name="jobSalary" value="<?php echo $jobDetails['jobSalary']; ?>" required>
</div>

<!-- Application Deadline -->
<div class="form-group">
    <label for="deadline">Application Deadline:</label>
    <input type="date" class="form-control" id="deadline" name="deadline" value="<?php echo $jobDetails['deadline']; ?>" required>
</div>

<!-- Status -->
<div class="form-group">
    <label for="status">Status:</label>
    <select class="form-control" id="job_post_status" name="job_post_status" required>
        <option value="publish" <?php if ($jobDetails['job_post_status'] === 'publish') echo 'selected'; ?>>Publish</option>
        <option value="unpublish" <?php if ($jobDetails['job_post_status'] === 'unpublish') echo 'selected'; ?>>Unpublish</option>
    </select>
</div>



    <button type="submit" class="btn btn-primary d-block mx-auto">Submit</button>
    </form>
</div>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>

<br>
<br>



<?php
include('footer.php');
?>

