<!DOCTYPE html>

<?php

session_start();

if(!isset($_SESSION['ID'])){
	header('location:../evaluator-login-form.php');
}
$id = $_SESSION['ID'];

?>

<html>
	<head>
		<title>Schools Division Office</title>
		<meta name= "viewport" content= "width=device-width, initial-scale=1" />
		<link rel="icon" href="../img/logo.png"/>

		<!-- CSS Libraries -->
		<link rel= "stylesheet" href= "../css/animate.min.css" type= "text/css" />
		<link rel= "stylesheet" href= "../css/font-awesome.css" type= "text/css" />

		<!-- Javascript Libraries -->
		<script typ= "text/javascript" src= "../jsp/jquery-2.1.4.min.js"></script>
		<script typ= "text/javascript" src= "../jsp/angular.min.js"></script>

		<!-- Custom CSS -->
		<link rel= "stylesheet" href= "../css/main.css" type= "text/css" />
		<style type="text/css">
			#exit{
				cursor: pointer;
			}
			.eval-options a{
				cursor: pointer;
			}
		</style>

	</head>

	<body>
		<section class= "evaluation-form">
			<section class= "eval-user-info" name="<?php echo $id;?>">
				<p id="evaluator_name">Louie Samson Javier - Personnel</p>
				<a id="exit">Log-out</a>
			</section>
			<section class= "eval-title">
				<img src= "../img/logo.png">
				<h1>Schools Division Office</h1>
			</section>
			<div class= "line"></div>
			<section class="eval-options">
				<a id="btn_education">Education</a>
				<a id="btn_experience">Experience</a>
				<a id="btn_training">Training</a>
				<a id="btn_eligibility">Eligibility</a>
				<a id="btn_interview">Interview</a>
			</section>
		</section>

<!-- Custom Javascripts -->
<script type="text/javascript" src="../RES/PSB-RESOURCES/JS/functions.js"></script>
<script type="text/javascript" src="../RES/PSB-RESOURCES/JS/evaluator-main.js"></script>

	</body>
</html>