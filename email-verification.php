<!DOCTYPE html>

<html>
	<head>
		<?php
          session_start();
            if(isset($_SESSION['APPLICANTS_ID'])){
             header('location:applicants/home.php');
             }
         ?>
		<title>Home | Division Office</title>
		<?php include 'include/header-content.php';?>
	</head>
	<body>
		<section class= "header-container">
			<?php include 'include/header-container.php'; ?>
		</section>
		<section class= "body-container">
			<section class= "email-verify-container">
				<h1>Email Verification</h1>
				<div class= "line"></div>
				<input type= "email">
				<p>Please verify your email address</p>
				<button id= "verifyBtn">Verify</button>
			</section>
		</section>
		<section class= "footer-container">
			<?php include 'include/footer-container.php';?>
        </section>
        <section class= "modal-login-register" id= "modal-login-register">
        	<?php include 'include/login-register-modal.php';?>
        </section>
	</body>
</html>