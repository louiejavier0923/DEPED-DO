<!DOCTYPE html>

<html>
	<head>
		<title>Status | Division Office</title>
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
			<?php include '../include/applicant-message-modal.php';?>
			<section class= "body-container">
				<section class= "logs-info">
					<h3>Status</h3>
					<div class= "line"></div>
					<section class= "status-tab">
						<a class= "statusBtn" id= "statBtn">Status</a>
						<a class= "statusBtn" id= "logsBtn">Logs</a>
					</section>
					<section class= "status-container" id= "status-container">
						<section class= "status">
							<h1>20</h1>
							<p id= "category">Education</p>
							<p id= "evaluator-name">Evaluator: Louie Javier</p>
						</section>
						<section class= "status">
							<h1>15</h1>
							<p id= "category">Teaching<br>Experience</p>
							<p id= "evaluator-name">Evaluator: Louie Javier</p>
						</section>
						<section class= "status">
							<h1>15</h1>
							<p id= "category">LET / PBET<br>Rating</p>
							<p id= "evaluator-name">Evaluator: Louie Javier</p>
						</section>
						<section class= "status">
							<h1>10</h1>
							<p id= "category">Specialized Training/<br>Skills</p>
							<p id= "evaluator-name">Evaluator: Louie Javier</p>
						</section>
						<section class= "status">
							<h1>10</h1>
							<p id= "category">Interview</p>
							<p id= "evaluator-name">Evaluator: Louie Javier</p>
						</section>
						<section class= "status">
							<h1>15</h1>
							<p id= "category">Demo Teaching</p>
							<p id= "evaluator-name">Evaluator: Louie Javier</p>
						</section>
						<section class= "status">
							<h1>15</h1>
							<p id= "category">Englis Comm. Skills</p>
							<p id= "evaluator-name">Evaluator: Louie Javier</p>
						</section>
						<section class= "status-score">
							<h1 class= "passed">100</h1>
							<p>Congratulations! You are PASSED!</p>
						</section>
					</section>
					<section class= "logs-container" id= "logs-container">
						<?php
                              $sql = "SELECT * FROM application a join publish_vacancy p ON p.UID=a.PID join schools s ON s.SID = p.PLACE_ASSIGNMENT WHERE a.UID = '".$user['UID']."'";



                    
                    $query = $conn->query($sql);

                    while($row = $query->fetch_assoc()){
                                
                 
                                 
                                     echo  '
                                           
					                       <section class= "logs">
							<img src= "../img/logo.png">
							<h1 id= "position">'.$row['TITLE'].'</h1>
							<p id= "date">PUBLICATION DATE: '.$row['PUBLICATION_DATE'].'</p>
							<p id= "school">'.$row['SCHOOL_NAME'].'</p>
							<p id= "salary">Salary: '.$row['SALARIES'].' Php</p>
							<p id= "description"> '.$row['DESCRIPTION'].'</p>
							<p id= "dateApply">Apply Date: '.$row['date'].'</p>
						</section>
                                               ';
                            
                                    


                               }
                          
                          mysqli_close($conn);
                                  
						 ?>
						
						
					</section>
				</section>
			</section>	
		</section>
		<?php include '../include/user-info-modal.php';?>
		<?php include '../include/applicant-pds-modal.php';?>
		<?php include '../include/applicant-files-modal.php';?>
	</body>
</html>