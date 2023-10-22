<!DOCTYPE html>
<html lang="en">

<?php
include 'inc/head.php' ?>
<?php include 'inc/config.php';
 include 'inc/logincheck.php';
$msg=0;

?>

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
                        <h1 class="h3 mb-0 text-gray-800">Update</h1>
                    </div>
						<div class="row">
							<div class="col-sm">
							  
							</div>
							<div class="col-sm">
							<?php
							if($msg == 1) { ?>
							<div class="alert alert-success alert-dismissible fade show" role="alert">
							  <strong>Great!</strong> Your data has been Updated.
							  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							  </button>
							</div>
							
							
							<?php	
							}
							?>
							
							<?php

									if(isset($_POST['update'])) {
										
										$name = $_POST['fname'];
										$lname = $_POST['lname'];
										$id = $_POST['uid'];
										
										$sql = "UPDATE users SET f_name='$name', l_name='$lname' WHERE id=$id";
										
										if (mysqli_query($conn, $sql)) {
											
										  echo "Updated successfully";
										  
										} else {
											
										  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
										
										}
										
										
									}

									if(isset($_GET['id'])) {
										$id = $_GET['id'];
										
									$sql = "SELECT  * FROM users WHERE id = $id";

									$result = mysqli_query($conn, $sql);

									if (mysqli_num_rows($result) == 1) {
									  // output data of each row
									  while($row = mysqli_fetch_assoc($result)) { 
									  
									  ?>
							
							
							<form action="" method="POST">
							
							<div class="form-group">
							<label> First Name</label>
							<input type="text" name="fname" class="form-control" value="<?php echo $row['f_name']?>">
							</div>
							
							<div class="from-group">
							<label for="pwd"> Last Name</label>
							<input type="text" name="lname" class="form-control" value="<?php echo $row['l_name']?>">
							</div>
							
							    <input type="hidden" name="uid" value="<?php echo $row['id'];?>">
								  
								  <button type="submit" name='update' class="btn btn-success btn-lg btn-block">Update User</button>
								</form>
								
									<?php	
										  }
										} else {
										  echo "0 results";
										}
										}else {
											
											echo "Kuch to gadbad hai ";
										}
										?>
									</div>
							<div class="col-sm">
							  
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