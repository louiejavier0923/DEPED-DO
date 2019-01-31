<!DOCTYPE html>

<html>
	<head>
		<title>Application Form | Division Office</title>
		<?php include '../include/applicant-header-content.php';?>
        <?php include '../DOADMIN/admin/includes/conn.php';?>
	</head>
	<body>
		<section class= "applicant-header-container">
			<?php include '../include/applicant-header-container.php';?>
		</section>
		<section class= "applicant-content-container">
			<section class= "modal-message">
				<button id= "messageBtn"><img src= "../img/icon-message.png"></button>
			</section>
			<?php include '../include/applicant-message-modal.php';?>
			<section class= "accountSettingContainer">
				<h1>Account Settings</h1>
				<div class= "line"></div>
				<section class= "viewAccount" id= "viewContent">
				
					<section class= "input-field">
						<label>First Name</label>
						<input type= "text" value= "<?php echo $user['FIRSTNAME'];?>" class= "fullname" name= "applicant_firstname" id= "applicant_firstname">
					</section>
					<section class= "input-field">
						<label>Middle Name</label>
						<input type= "text" value= "<?php echo $user['MIDDLENAME'];?>" class= "fullname" name= "applicant_firstname" id= "applicant_middlename">
					</section>
					<section class= "input-field">
						<label>Last Name</label>
						<input type= "text" value= "<?php echo $user['LASTNAME'];?>" class= "fullname" name= "applicant_firstname" id= "applicant_lastname">
					</section>
					
					<section class= "button-field">
						<button id= "editInfoBtn">EDIT</button>
						<button id= "okInfoBtn">OK</button>
					</section>
				</section>
				<?php
					$sql = "SELECT EMAIL FROM user WHERE UID= '".$user['UID']."'";
					$query = $conn->query($sql);
					while($row = $query->fetch_assoc()) {
				?>
				<h1>VERIFY EMAIL</h1>
				<div class= "line"></div>
				<section class= "updateAccount" id= "updateContent">
					<section class= "input-field">
						<label>Email</label>
						<input type= "email" value= "<?php echo $row['EMAIL'];?>" id= "applicant_email">
					</section>
					<section class= "button-field">
						<button id= "verifyBtn">VERIFY EMAIL</button>
					</section>
				</section>
				<?php
					}
				?>
				<?php
					$sql= "SELECT PWD FROM user WHERE UID= '".$user['UID']."'";
					$query= $conn->query($sql);
					while($row = $query->fetch_assoc()) {
				?>
				<h1>CHANGE PASSWORD</h1>
				<div class= "line"></div>
				<input type= "hidden" name= "orig_password" id= "applicant_password" value= "<?php echo $row['PWD'];?>">
				<section class= "changePassword" id= "changePassword">
					<section class= "input-field">
						<label>Old Password</label>
						<input type= "password" value= "" class= "new_password" id= "applicant_oldPass" disabled= "true">
					</section>
					<section class= "input-field">
						<label>New Password</label>
						<input type= "password" value= "" class= "new_password" id= "applicant_newPass">
					</section>
					<section class= "input-field">
						<label>Confirm Password</label>
						<input type= "password" value= "" class= "new_password" id= "applicant_repeatPass">
					</section>
					<section class= "button-field">
						<button id= "editPassBtn">EDIT</button>
						<button id= "okPassBtn">OK</button>
					</section>
				</section>
				<?php
					}
				?>
			</section>
		</section>
		<?php include '../include/user-info-modal.php';?>
		<?php include '../include/applicant-image-modal.php';?>
		<?php include '../include/applicant-pds-modal.php';?>
		<?php include '../include/applicant-files-modal.php';?>
		<?php include '../include/applicant-error-modal.php';?>
		<?php include '../include/applicant-success-modal.php';?>
	</body>
</html>