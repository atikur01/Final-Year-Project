<?php 
session_start();
if($_SESSION["loggedin"] != true ){
  header("Location: ../login.php");
  exit();
}


require '../dbconnect.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {

  // Create a connection
  $conn = new mysqli($servername, $username, $password, $dbname);

  // Check the connection
  if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
  }

  // Values for the job posting (replace with actual POST data)
  $company_id = $_SESSION["id"];
  $jobTitle = $_POST['jobTitle'];
  $location = $_POST['location'];
  $jobType = $_POST['jobType'];
  $jobDescription = $_POST['jobDescription'];
  $responsibilities = $_POST['responsibilities'];
  $eduExperience = $_POST['eduExperience'];
  $otherBenefits = $_POST['otherBenefits'];
  $publishedOn = (new DateTime())->format('Y-m-d');
  $vacancy = $_POST['vacancy'];
  $experience = $_POST['experience'];
  $gender = $_POST['gender'];
  $jobSalary = $_POST['jobSalary'];
  $deadline = $_POST['deadline'];
  

  // SQL query
  $sql = "INSERT INTO Job_Postings (
      companyid,
      jobTitle,
      location,
      jobType,
      jobDescription,
      responsibilities,
      eduExperience,
      otherBenefits,
      publishedOn,
      vacancy,
      experience,
      gender,
      jobSalary,
      deadline
  ) VALUES (
      $company_id,
      '$jobTitle',
      '$location',
      '$jobType',
      '$jobDescription',
      '$responsibilities',
      '$eduExperience',
      '$otherBenefits',
      '$publishedOn',
      $vacancy,
      $experience,
      '$gender',
      '$jobSalary',
      '$deadline'
  )";

  // Execute the query
  if ($conn->query($sql) === TRUE) {
    header("Location: viewjobpostings.php");
  } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
  }

  // Close the connection
  $conn->close();
  unset($_POST);
}


?>

<?php
include('header.php');
?>

<?php
include('post-job-form.php');
?>
  

  
<br>
<?php
include('footer.php');
?>
  
</body>
</html>
