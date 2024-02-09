
<?php // Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Include database connection file
    include "../dbconnect.php"; // Replace with your actual database connection file

    session_start();
    // Escape user inputs for security
    $company_id = $_SESSION["id"];
    $companyName = mysqli_real_escape_string($conn, $_POST["companyName"]);
    $address = mysqli_real_escape_string($conn, $_POST["address"]);
    $companyType = mysqli_real_escape_string($conn, $_POST["companyType"]);
    $email = mysqli_real_escape_string($conn, $_POST["email"]);
    $phone = mysqli_real_escape_string($conn, $_POST["phone"]);
    $website = mysqli_real_escape_string($conn, $_POST["website"]);
    $companyBackground = mysqli_real_escape_string(
        $conn,
        $_POST["companyBackground"]
    );
    $services = mysqli_real_escape_string($conn, $_POST["services"]);
    $expertise = mysqli_real_escape_string($conn, $_POST["expertise"]);

    if (isset($_FILES["photo"]) && !empty($_FILES["photo"]["tmp_name"])) {
        $file_path = $_SESSION["img_logo_path"];
        unlink($file_path);

        $target_dir = "images/";

        // Generate a unique ID for the file
        $unique_id = uniqid();

        // Get the file extension
        $imageFileType = strtolower(
            pathinfo($_FILES["photo"]["name"], PATHINFO_EXTENSION)
        );

        // Create a new filename with the unique ID and original file extension
        $target_file = $target_dir . $unique_id . "." . $imageFileType;

        $uploadOk = 1;

        // Check if the file is an actual image
        $check = getimagesize($_FILES["photo"]["tmp_name"]);
        if ($check !== false) {
            echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }

        // Check if file already exists (unlikely due to unique ID)
        if (file_exists($target_file)) {
            echo "Sorry, file already exists.";
            $uploadOk = 0;
        }

        // Check file size
        if ($_FILES["photo"]["size"] > 500000) {
            echo "Sorry, your file is too large.";
            $uploadOk = 0;
        }

        // Allow certain file formats
        $allowed_extensions = ["jpg", "jpeg", "png", "gif"];
        if (!in_array($imageFileType, $allowed_extensions)) {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
        }

        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
        } else {
            if (
                move_uploaded_file($_FILES["photo"]["tmp_name"], $target_file)
            ) {
                echo "The file has been uploaded as " . basename($target_file);

                // Insert image path into the database
                //$image_path = $target_file;
                //$sql = "INSERT INTO photos (image_path) VALUES ('$image_path')";

                $logo = $target_file;
                echo $logo;
            }
        }
        foreach ($_FILES as $key => $value) {
            unset($_FILES[$key]);
        }
    } else {
        $logo = $_SESSION["img_logo_path"];
    }

    //$logo = mysqli_real_escape_string($conn, $_POST['logo']); // Assuming 'logo' is the file name
    //$logo = "/tedt/img";

    // Insert data into the database
    $sql = "INSERT INTO company_details (company_id, company_name, address, company_type, email, phone_no, website, company_background, services, expertise, img_logo_path)
    VALUES ('$company_id', '$companyName', '$address', '$companyType', '$email', '$phone', '$website', '$companyBackground', '$services', '$expertise', '$logo')
    ON DUPLICATE KEY UPDATE
    company_name = VALUES(company_name),
    address = VALUES(address),
    company_type = VALUES(company_type),
    email = VALUES(email),
    phone_no = VALUES(phone_no),
    website = VALUES(website),
    company_background = VALUES(company_background),
    services = VALUES(services),
    expertise = VALUES(expertise),
    img_logo_path = VALUES(img_logo_path)";
    if (mysqli_query($conn, $sql)) {
        echo "Data inserted successfully";
        header("Location: ../dashboard/editcompanyprofile.php");
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    // Close database connection
    mysqli_close($conn);
} else {
    // Redirect to the form if accessed directly
    header("Location: your_form_page.php"); // Replace with the actual path of your form page
    exit();
}
?>
