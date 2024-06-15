<?php
   require "../dbconnect.php";
   

   $job_post_id = $_GET["job_post_id"];
   // Fetch data from the database
   $getalljob = "SELECT * FROM applications WHERE companyid = " . $_SESSION["id"] . " AND job_post_id = $job_post_id";

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
                              
                              <th>Name</th>
                              <th>Email</th>
                              <th>Phone No</th>
                              <th>Country</th>
                              <th>Resume</th>
                              
                           </tr>
                        </thead>
                        <tbody style="text-align: center;" >

                           <?php // Loop through the fetched data and display it in the table
                              while ($row = $getalljobresult->fetch_assoc()) {
                                  echo "<tr>";
                            
                                  echo "<td>" . $row["first_name"] . "</td>";
                                  echo "<td>" . $row["email"]  . "</td>";
                                  echo "<td>" . $row["phone_number"] . "</td>";
                                  echo "<td>" . $row["country"] . "</td>";

                                 
                              
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
