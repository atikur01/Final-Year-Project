<?php
require 'dbconnect.php';

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch all applications
$sql = "SELECT id, job_post_id, email, first_name, last_name, phone_number, country, resume, applied_at FROM applications";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Applications</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2>Job Applications</h2>
        <table class="table table-striped">
            <thead>
                <tr>
                
                    <th>Job Post ID</th>
                    <th>Email</th>
                    <th>First Name</th>                 
            
                    <th>Resume</th>
                    <th>Applied At</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result->num_rows > 0) {
                    // Output data of each row
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>";
                   
                        echo "<td>" . $row["job_post_id"] . "</td>";
                        echo "<td>" . $row["email"] . "</td>";
                        echo "<td>" . $row["first_name"] . "</td>";
                       
                        echo "<td>" . $row["phone_number"] . "</td>";
                        echo "<td>" . $row["country"] . "</td>";
                        echo "<td><a href='" . $row["resume"] . "' target='_blank'>View Resume</a></td>";
                        echo "<td>" . $row["applied_at"] . "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='9'>No applications found</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

<?php
// Close connection
$conn->close();
?>
