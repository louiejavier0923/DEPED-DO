<!DOCTYPE html>

<html>
	<head>
		<title>Application Form | Division Office</title>
		<?php include '../include/applicant-header-content.php';?>
	</head>
	<body>
		<section class= "applicant-header-container">
			<?php include '../include/applicant-header-container.php';?>
		</section>
		<section class= "applicant-content-container">
			<h2>APPLICATION FORM</h2>
			<div class= "line"></div>
			<section class= "application-nav">
				<p class= "success">1</p>
				<p class= "success">2</p>
				<p class= "success">3</p>
			</section>
			<section class= "application-content">
				<section class= "application-form">
					<h2>Thank You</h2>
					<p>Wait for the memo that we`ll sent to your email and make sure to bring that memo on the day of evaluation and also bring the original copies of files that you send to us to prove that it is legit. <b>If you`re done please click "OK" button to finish the application.</b></p>
					<section class= "application-btn">
						<button id="cancel">CANCEL</button>
						<button id= "finishBtn">OK</button>
					</section>
					<div class= "line"></div>
				</section>
			</section>
		</section>
		<script>	
			$(function(){
				$("#finishBtn").click(function(){
					window.location.href='home.php';

				});
				$("#cancel").click(function(){ 
					window.location.href='application.php';
				});
			});

		</script>
		<?php include '../include/user-info-modal.php';?>
		<?php include '../include/applicant-image-modal.php';?>
		<?php include '../include/applicant-pds-modal.php';?>
		<?php include '../include/applicant-files-modal.php';?>
		<?php include '../include/applicant-error-modal.php';?>
		<?php include '../include/applicant-success-modal.php';?>
	</body>
</html>