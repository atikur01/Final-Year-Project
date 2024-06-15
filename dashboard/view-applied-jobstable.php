<?php
   require "../dbconnect.php";
   
   // Fetch data from the database
   $getalljob = "
    SELECT applications.*, job_postings.*
    FROM applications
    INNER JOIN job_postings ON applications.job_post_id = job_postings.job_post_id
    WHERE applications.email = '" . $_SESSION['email'] . "'
";


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
                  <h2>View Applicants</h2>
                     <table id="example1" class="table table-bordered table-striped">
                        <thead>
                           <tr style="text-align: center;">
                              

                              <th>Job Post ID</th>
                              <th>Job Title</th>
                              <th>Date</th>
                            
                              <th>Resume</th>
                              
                           </tr>
                        </thead>
                        <tbody style="text-align: center;" >

                           <?php // Loop through the fetched data and display it in the table
                              while ($row = $getalljobresult->fetch_assoc()) {

                                
                                  echo "<tr>";


                            
                                  echo "<td>" . $row["job_post_id"] . "</td>";
                                  echo "<td>" . $row["jobTitle"]  . "</td>";
                              
                                  echo "<td>" . $row["applied_at"] . "</td>";
                               

                                 
                              
                                  // View Button
                                  echo "<td><a href='". "../" . $row["resume"] . "' target='_blank'>View Resume</a></td>";

                              
                              
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
