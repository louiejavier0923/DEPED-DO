<!DOCTYPE html>

<html>
	<head>
		<?php
          session_start();
            if(isset($_SESSION['APPLICANTS_ID'])){
             header('location:applicants/home.php');
             }
         ?>
		<title>Verify Email Address | Division Office</title>
		<?php include 'include/header-content.php';?>
	</head>
	<body>
		<section class= "header-container">
			<?php include 'include/header-container.php'; ?>
		</section>
		<section class= "body-container">
			<section class= "email-verify-container">
				<h1>Please Verify Email</h1>
				<div class= "line"></div>
				<p>Thank you for joining. You have been sent an email with a verification link contained inside. To start, you must first click that link.</p>
				<p>If you do not receive your verification email, you may request another one.</p>
				<button id= "verifyBtn">Resend verification email</button>
			</section>
		</section>
		<section class= "footer-container">
			<?php include 'include/footer-container.php';?>
        </section>
        <section class= "modal-login-register" id= "modal-login-register">
        	<?php include 'include/login-register-modal.php';?>
        </section>
		<?php include 'include/error-message-modal.php';?>
		<?php include 'include/success-message-modal.php';?>
	</body>
</html>