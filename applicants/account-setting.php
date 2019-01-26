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
			<section class= "modal-message">
				<button id= "messageBtn"><img src= "../img/icon-message.png"></button>
			</section>
			<section class= "accountSettingContainer">
				<h1>Account Settings</h1>
				<div class= "line"></div>
				<section class= "viewAccount" id= "viewContent">
					<section class= "input-field">
						<label>First Name</label>
						<input type= "text" value= "Paul John">
					</section>
					<section class= "input-field">
						<label>Middle Name</label>
						<input type= "text" value= "Solano">
					</section>
					<section class= "input-field">
						<label>Last Name</label>
						<input type= "text" value= "Judan">
					</section>
					<section class= "button-field">
						<button id= "editInfoBtn">EDIT</button>
						<button id= "okInfoBtn">OK</button>
					</section>
				</section>
				<h1>VERIFY EMAIL</h1>
				<div class= "line"></div>
				<section class= "updateAccount" id= "updateContent">
					<section class= "input-field">
						<label>Email</label>
						<input type= "email" value= "judan_pauljohn@yahoo.com">
					</section>
					<section class= "button-field">
						<button id= "verifyBtn">VERIFY EMAIL</button>
					</section>
				</section>
				<h1>CHANGE PASSWORD</h1>
				<div class= "line"></div>
				<section class= "changePassword" id= "changePassword">
					<section class= "input-field">
						<label>Old Password</label>
						<input type= "password" value= "">
					</section>
					<section class= "input-field">
						<label>New Password</label>
						<input type= "password" value= "">
					</section>
					<section class= "input-field">
						<label>Confirm Password</label>
						<input type= "password" value= "">
					</section>
					<section class= "button-field">
						<button id= "editPassBtn">EDIT</button>
						<button id= "okPassBtn">OK</button>
					</section>
				</section>
			</section>
		</section>
		<?php include '../include/user-info-modal.php';?>
		<?php include '../include/applicant-pds-modal.php';?>
	</body>
</html>