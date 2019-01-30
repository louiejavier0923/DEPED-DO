<!DOCTYPE html>

<html>
	<head>
		<title>FAQs | Division Office</title>
		<meta name= "viewport" content= "width= device-width, initial-scale= 1">

		<!-- CSS Libraries -->
		<link rel= "stylesheet" href= "../css/aos.css" type= "text/css" />
		<link rel= "stylesheet" href= "../css/animate.min.css" type= "text/css" />
		<link rel= "stylesheet" href= "../css/font-awesome.css" type= "text/css" />

		<!-- Javascript Libraries -->
		<script type= "text/javascript" src= "../jsp/jquery-2.1.4.min.js"></script>
		<script type= "text/javascript" src= "../jsp/angular.min.js"></script>
		<script type= "text/javascript" src= "../jsp/aos.js"></script>

		<!-- Custom CSS -->
		<link rel= "stylesheet" href= "../css/applicant.css" type= "text/css" />
		
		<!-- Custom Javascripts -->
		<script type= "text/javascript" src= "../jsp/scrollEffect.js"></script>

	</head>
	<body>
		<section class= "applicant-header-container">
			<?php include '../include/applicant-header-container.php';?>
		</section>
		<section class= "applicant-content-container">
			<section class= "modal-message">
				<button id= "messageBtn"><img src= "../img/icon-message.png"></button>
			</section>
		</section>
		<?php include '../include/applicant-image-modal.php';?>
	</body>
</html>