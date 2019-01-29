<?php

/*$servername = "ROMEROMAN\SQLEXPRESS";
/* 
$servername = "ROMEROMAN\SQLEXPRESS";
>>>>>>> 93304126f75fd1f57e1ba049ac8a958110658afc
$username = "sa";
$password = "1234";
$database = "RECOMMENDINGSYSTEMDO";

$mssqldriver = '{SQL Server}';
$mssqldriver = '{SQL Server Native Client 11.0}';

$conn = new PDO("odbc:Driver=$mssqldriver;Server=$servername;Database=$database",$username,$password); */

$conn = new PDO("odbc:Driver=$mssqldriver;Server=$servername;Database=$database",$username,$password);

$conn = new mysqli('localhost', 'root', '', 'depeddo');

	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	}

?>