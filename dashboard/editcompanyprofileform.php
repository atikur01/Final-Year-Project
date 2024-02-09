<?php

require "../dbconnect.php";
error_reporting(0);
session_start();

try {
    // Assuming $companyId contains the ID of the company you want to edit
    $companyId = $_SESSION["id"]; // Replace with your actual company ID

    // Prepare the SQL statement to fetch data
    $sql = "SELECT * FROM company_details WHERE company_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $companyId);
    $stmt->execute();

    // Get result
    $result = $stmt->get_result();

    // Fetch the data
    $row = $result->fetch_assoc();
    $_SESSION["img_logo_path"] = $row["img_logo_path"];
    // Close the connection
    $stmt->close();
    $conn->close();
} catch (Exception $e) {
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Company Information Form</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <script>
    function loadBackupImage() {
        // If the main image fails to load, load a backup image
        document.getElementById('myImage').src = "images/updatecompanylogo.png";
    }
</script>

</head>
<body>

<div style="padding-left:7%" class="container mt-5">
    
    
    <form action="editcompanyaction.php" method="post" enctype="multipart/form-data">
    <!-- Company ID -->
    <input type="hidden" name="companyId" value="<?php echo $row[
        "company_id"
    ]; ?>">


    <div class="form-group">
    
        <img id="myImage" src="<?php echo $row[
            "img_logo_path"
        ]; ?>" onerror="loadBackupImage()" alt="Set Your logo" class="img-fluid" style="width: 75px; height: 75px; border-radius: 50%; object-fit: cover;">
        <input style="padding-left:2%" type="file" name="photo" id="photo" >
        </div>

    <!-- Logo Image Upload -->
    <div class="form-group">

    
        
        
    </div>

    <!-- Company Name -->
    <div class="form-group">
        <label for="companyName">Company Name:</label>
        <input type="text" class="form-control" id="companyName" name="companyName" value="<?php echo $row[
            "company_name"
        ]; ?>" required>
    </div>

    <!-- Address -->
    <div class="form-group">
        <label for="address">Address:</label>
        <input type="text" class="form-control" id="address" name="address" value="<?php echo $row[
            "address"
        ]; ?>" required>
    </div>

    <!-- Company Type -->
<div class="form-group">
    <label for="companyType">Company Type:</label>
    <input type="text" class="form-control" id="companyType" name="companyType" placeholder="Example: Computer Softwre" value="<?php echo $row[
        "company_type"
    ]; ?>" >
</div>

<!-- Email -->
<div class="form-group">
    <label for="email">Email:</label>
    <input type="email" class="form-control" id="email" name="email" value="<?php echo $row[
        "email"
    ]; ?>" required>
</div>

<!-- Phone Number -->
<div class="form-group">
    <label for="phone">Phone Number:</label>
    <input type="tel" class="form-control" id="phone" name="phone" value="<?php echo $row[
        "phone_no"
    ]; ?>" required>
</div>

<!-- Website -->
<div class="form-group">
    <label for="website">Website:</label>
    <input type="text" class="form-control" id="website" name="website" value="<?php echo $row[
        "website"
    ]; ?>" required>
</div>

<!-- Company Background -->
<div class="form-group">
    <label for="companyBackground">Company Background:</label>
    <textarea class="form-control" id="companyBackground" name="companyBackground" rows="3" required><?php echo $row[
        "company_background"
    ]; ?></textarea>
</div>

<!-- Services -->
<div class="form-group">
    <label for="services">Services:</label>
    <textarea class="form-control" id="services" name="services" rows="3" required><?php echo $row[
        "services"
    ]; ?></textarea>
</div>

<!-- Expertise -->
<div class="form-group">
    <label for="expertise">Expertise:</label>
    <textarea class="form-control" id="expertise" name="expertise" rows="3" required><?php echo $row[
        "expertise"
    ]; ?></textarea>
</div>


<!-- Submit Button -->
<button type="submit" class="btn btn-primary d-block mx-auto">Update</button>
</form>

    <br>
    <br>

</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>




</body>
</html>
