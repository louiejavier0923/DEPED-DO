<?php
/*
$servername = "ROMEROMAN\SQLEXPRESS";
$username = "sa";
$password = "1234";
$database = "RECOMMENDINGSYSTEMDO";

$mssqldriver = '{SQL Server}';
$mssqldriver = '{SQL Server Native Client 11.0}';

$conn = new PDO("odbc:Driver=$mssqldriver;Server=$servername;Database=$database",$username,$password);
*/
$conn = new mysqli('localhost', 'depeddo', 'P@ssw0rd', 'depeddo');

	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	}

?>