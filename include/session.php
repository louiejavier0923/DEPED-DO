<?php
	session_start();

	if(!isset($_SESSION['APPLICANTS_ID']) || trim($_SESSION['APPLICANTS_ID']) == ''){
		header('location: ../index.php');
	}

	$sql = "SELECT * from user where UID='".$_SESSION['APPLICANTS_ID']."';";
	$query = $conn->query($sql);
	$user = $query->fetch_assoc();
	
?>