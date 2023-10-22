<!DOCTYPE html>
<html lang="en">

<?php
include 'inc/head.php' ?>
<?php include 'inc/config.php';?>
<?php include 'inc/logincheck.php';?> 

<?php 
$msg=0;
if(isset($_GET['delete'])) {
	
	$id = $_GET['delete'];
	$sql = "DELETE FROM users WHERE id=$id";
	
	if (mysqli_query($conn, $sql)) {
		
	  $msg=1;
	  
	} else {
		
	  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	  
	}

}?>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?php include 'inc/sidebar.php' ?> 
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <?php include 'inc/topbar.php' ?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">All Users</h1>
                    </div>
					<div class="card mb-3" >
					<?php
							if($msg == 1) { ?>
							<div class="alert alert-danger alert-dismissible fade show" role="alert">
							  <strong>Deleted!</strong> Your data has been deleted.
							  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							  </button>
							</div>
							
							
							<?php	
							}
							?>
					
					
					
					  <div class="card-body">
					     <table class="table">
								  <thead>
									<tr>
									  <th scope="col">#</th>
									  <th scope="col">First</th>
									  <th scope="col">Last</th>
									  <th scope="col">Actions</th>
									</tr>
								  </thead>
								  <tbody>
								    <?php
										$count = 1;
										$sql = "SELECT * FROM users";
										$result = mysqli_query($conn, $sql);

										if (mysqli_num_rows($result) > 0) {
										  // output data of each row
										  while($row = mysqli_fetch_assoc($result)) { ?>
										   
										   <tr>
											<td><?php echo $count ?></td>
											<td><?php echo $row['f_name'];?></td>
											<td><?php echo $row['l_name'];?></td>
											<td><a href="update.php?id=<?php echo $row['id']?>">Update</td>
											<td><a href="?delete=<?php echo $row['id']?>">Delete</a></td>
										  </tr>
										   
										 <?php  $count++;
										  } 
										} else {
										  echo "0 results";
										}

										mysqli_close($conn);
										?>
									
									
									
									
									
									
									
									
									
									
									
								  </tbody>
								</table>
					  </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <?php include 'inc/footer.php'?>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <?php include 'inc/footerjs.php'?>
</body>

</html>