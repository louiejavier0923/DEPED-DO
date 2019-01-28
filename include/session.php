<?php
	session_start();

	if(!isset($_SESSION['APPLICANTS_ID']) || trim($_SESSION['APPLICANTS_ID']) == ''){
		header('location: ../index.php');
	}

	$sql = "SELECT * from user u join personal_info p ON u.UID=p.UID join family_background fb ON fb.UID = u.UID where u.UID='".$_SESSION['APPLICANTS_ID']."';";
	$query = $conn->query($sql);
	$user = $query->fetch_assoc();
	
?>