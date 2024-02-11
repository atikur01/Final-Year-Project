<?php
   require "../dbconnect.php";
   
   // Fetch data from the database
   $getalljob = "SELECT * FROM job_postings WHERE companyid = " . $_SESSION["id"];

   $getalljobresult = $conn->query($getalljob);

   

?>

<!-- Main content -->
<section id="viewjobpostingtable" class="content">
   <div class="container-fluid">
      <div class="row">
         <div class="col-12">
            <div class="card">
               <!-- /.card-header -->
               <div class="card-body">
                  <div class="table-responsive">
                  <h2>All Jobs</h2>
                     <table id="example1" class="table table-bordered table-striped">
                        <thead>
                           <tr style="text-align: center;">
                              <th>Job Post ID</th>
                              <th>Job Title</th>
                              <th>Status</th>
                              <th>Deadline</th>
                              <th>Actions</th>
                           </tr>
                        </thead>
                        <tbody style="text-align: center;" >

                           <?php // Loop through the fetched data and display it in the table
                              while ($row = $getalljobresult->fetch_assoc()) {
                                  echo "<tr>";
                                  echo "<td>" . $row["job_post_id"] . "</td>";
                                  echo "<td>" . $row["jobTitle"] . "</td>";
                                  echo "<td>" . $row["job_post_status"] . "ed" . "</td>";
                                  echo "<td>" . $row["deadline"] . "</td>";
                                  echo "<td>";
                              
                                  // View Button
                                  echo '<a href="../job-single.php?job_post_id=' . htmlspecialchars($row["job_post_id"], ENT_QUOTES, 'UTF-8') . '" target="_blank" class="btn btn-primary" role="button">View</a>';

                              
                                  // Edit Button
                                  echo '<a href="edit-job-post.php?job_post_id=' . $row["job_post_id"] . '" class="btn btn-warning" style="margin-left:1%;  target="_blank"">Edit</a>';
                              
                                  // Delete Button

                                  echo '<a href="delete-job.php?job_post_id=' . $row["job_post_id"] . '" class="btn btn-danger" style="margin-left:1%;  target="_blank"">Delete</a>';
                              
                                  echo "</td>"; // Close the table data cell
                                  echo "</tr>";
                              } ?>

                     </table>
                  </div>
               </div>
               <!-- /.card-body -->
            </div>
            <!-- /.card -->
         </div>
         <!-- /.col -->
      </div>
      <!-- /.row -->
   </div>
   <!-- /.container-fluid -->
</section>

<?php
   // Close the database connection
   $conn->close();
?>
