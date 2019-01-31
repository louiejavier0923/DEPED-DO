<!DOCTYPE html>
		
<?php
session_start();
if(isset($_SESSION['ID'])){
	header('location:psb/evaluator-main.php');
}
?>

<html>
	<head>

		<title>Log-In Form | Division Office</title>
		<link rel="icon" href="img/logo.png"/>
		<meta name= "viewport" content= "width= device-width, initial-scale= 1"/>

		<!-- CSS Libraries -->
		<link rel= "stylesheet" href= "css/aos.css" type= "text/css" />
		<link rel= "stylesheet" href= "css/animate.min.css" type= "text/css" />
		<link rel= "stylesheet" href= "css/font-awesome.css" type= "text/css" />

		<!-- Javascript Libraries -->
		<script type= "text/javascript" src= "jsp/jquery-2.1.4.min.js"></script>
		<!-- <script type= "text/javascript" src= "jsp/angular.min.js"></script> -->
		<!-- <script type= "text/javascript" src= "jsp/aos.js"></script> -->

		<!-- Custom CSS -->
		<link rel= "stylesheet" href= "css/main.css" type= "text/css" />
		<link rel= "stylesheet" href= "RES/PSB-RESOURCES/CSS/responsible.css" type= "text/css" />

		<style type="text/css">
			.input-form input + label{
				z-index: -1;
			}
			.inputsNotNull{
				top: -15px !important;
				color: rgb(4, 80, 140) !important;
				font-size: 80% !important;
				font-weight: bold !important;
			}

		</style>

	</head>
	<body>
		<section class= "login-form-container">
			<section class= "login-one-two">
				<section class= "one-two-title">
					<img src= "img/logo.png">
					<h1>Schools Division Office | Quezon City</h1>
				</section>
				<div class= "line"></div>
				<section class= "one-two-info">
					<section class= "info-two">
						<img src= "img/icon-location.png">
						<p>Nueva Ecija St. Sitio Bago Bantay, Brgy. Pagasa, Quezon City</p>
					</section>
					<section class= "info-two">
						<img src= "img/icon-contact.png">
						<p>Admin Office: (02)352-6804 / 352-6805</p>
					</section>
				</section>
				<div class= "line-bottom"></div>
			</section>
			<section class= "login-one-two">
				<h3>Login</h3>
				<div class= "line"></div>
				<section class = "input-container">
					<section class= "input-form">
						<input type= "email" name= "emailTxtbox" id="emailTxtbox">
						<label>Email</label>
					</section>
					<section class= "input-form">
						<input type= "password" name= "passTxtbox" id="passTxtbox">
						<label>Password</label>
					</section>
					<button type= "button" name="loginBtn" id="loginBtn">LOGIN</button>
				</section>
			</section>
		</section>
		<?php //include 'include/error-message-modal.php';?>
		<?php //include 'include/success-message-modal.php';?>

<!-- Custom Javascripts -->
<script type= "text/javascript" src= "RES/PSB-RESOURCES/JS/login.js"></script>
<script type= "text/javascript" src= "RES/PSB-RESOURCES/JS/functions.js"></script>

	</body>
</html>