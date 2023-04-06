<?php
	session_start();
	
	include('conn.php');
	if (isset($_SESSION['userlog'])) {
		mysqli_query($con,"update userlog set logout=NOW() where userlogid='".$_SESSION['userlog']."'");
	}
	
	
	session_destroy();
	header('location:../index.php');

?>