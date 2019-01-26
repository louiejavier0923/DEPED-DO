<?php
	$conn = new mysqli('localhost', 'root', '', 'depeddo');

	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	}
	
?>