<?php

session_start();

$a = $_POST['a'];
$_SESSION['CRITERIA'] = $a;

print_r(true);

?>