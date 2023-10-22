<!DOCTYPE html>
<html lang="en">

<?php
session_start();
include 'inc/head.php';
include "inc/config.php";

 ?>

<?php 
if(isset($_POST['login'])) {
	 $loginID = $_POST['loginid'];
	 $loginPASS = $_POST['loginpass'];
	
	$sql = "SELECT email,pass FROM users WHERE email='$loginID' AND pass='$loginPASS' ";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) == 1) {
  // output data of each row
  $_SESSION['user'] = $loginID;
  
  header("Location: dashboard.php");
  
  exit();
  
  
  
  
} else {
  $msg = "Invalid email or password";
}
}



?>

<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                                    </div>
									
									<?php 
									if(!empty($msg)) {
										?>
										<div class="alert alert-danger" role="alert">
										  <?php echo $msg; ?>
										</div>
									<?php
									}
									
									?>
									
									
									
									
									
									
                                    <form method = "POST" action="" class="user">
                                        <div class="form-group">
                                            <input name="loginid" type="email" class="form-control form-control-user"
                                                id="exampleInputEmail" aria-describedby="emailHelp"
                                                placeholder="Enter Email Address...">
                                        </div>
                                        <div class="form-group">
                                            <input name="loginpass" type="password" class="form-control form-control-user"
                                                id="exampleInputPassword" placeholder="Password">
                                        </div>
                                        <button type="submit" name="login" class="btn btn-primary btn-user btn-block">
                                            Login
                                        </button>
                                        <hr>
                                  
                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="forgot-password.html">Forgot Password?</a>
                                    </div>
                                    <div class="text-center">
                                        <a class="small" href="register.html">Create an Account!</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <?php include 'inc/footerjs.php'?>
</body>

</html>