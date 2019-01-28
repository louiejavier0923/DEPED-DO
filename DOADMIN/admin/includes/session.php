<?php
	session_start();
	include 'includes/conn.php';

/*if(!isset($_SESSION['ADMIN']) || trim($_SESSION['ADMIN']) == ''){
		    header('location:../../admin-login-form.php');
	}

	$sql = "SELECT * from admin where NO='".$_SESSION['ADMIN']."';";
	$query = $conn->query($sql);
	$user = $query->fetch_assoc();
*/
?>