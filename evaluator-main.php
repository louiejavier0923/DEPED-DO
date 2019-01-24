<!DOCTYPE html>

<html>
	<head>
		<title>Schools Division Office</title>
		<?php
          session_start();
            if(isset($_SESSION['APPLICANTS_ID'])){
             header('location:applicants/home.php');
             }
         ?>
		<meta name= "viewport" content= "width=device-width, initia-scale= 1" />

		<!-- CSS Libraries -->
		<link rel= "stylesheet" href= "css/animate.min.css" type= "text/css" />
		<link rel= "stylesheet" href= "css/font-awesome.css" type= "text/css" />

		<!-- Javascript Libraries -->
		<script typ= "text/javascript" src= "jsp/jquery-2.1.4.min.js"></script>
		<script typ= "text/javascript" src= "jsp/angular.min.js"></script>

		<!-- Custom CSS -->
		<link rel= "stylesheet" href= "css/main.css" type= "text/css" />
		
		<!-- Custom Javascripts -->

	</head>

	<body>
		<section class= "evaluation-form">
			<section class= "eval-form-title">
				<img src= "img/logo.png">
				<h1>Schools Division Office</h1>
				<div class= "line"></div>
			</section>
			<section class= "eval-form-button">
				<button type= "submit" name= "educBtn" id= "educBtn">Education</button>
				<button type= "submit" name= "expiBtn" id= "expicBtn">Experience</button>
				<button type= "submit" name= "trainingBtn" id= "trainingBtn">Trainings</button>
				<button type= "submit" name= "eligBtn" id= "eligBtn">Eligibility</button>
			</section>
		</section>
	</body>
</html>