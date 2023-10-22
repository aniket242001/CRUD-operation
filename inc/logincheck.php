<?php 
session_start();

if(isset($_SESSION['user'])) {
	
	//print_r($_SESSION);
	
	
}else{
	header("Location: index.php");
	
	exit();

}
?>