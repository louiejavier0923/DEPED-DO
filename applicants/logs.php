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
					
					
						  <?php
                    $cnt='';

                    $sql = "SELECT DISTINCT v.TOTALPOINTS,a.UID,a.EQUIVALENT_POINTS,a.CRITERIA_CODE,a.VALUE,a.GRADED_BY, CONCAT(p.LASTNAME,' ',p.FIRSTNAME,' ',p.MIDDLENAME) as 'APPLICANT_NAME',p.UID,CONCAT(e.LASTNAME,' ',e.FIRSTNAME,' ',e.MIDDLENAME) as 'EVALUATOR_NAME',e.NO FROM applicants_points a INNER JOIN personal_info p ON p.UID = a.UID INNER JOIN evaluators_info_tbl e ON e.NO = a.GRADED_BY INNER JOIN view_rank v ON v.UID = a.UID WHERE a.UID = '".$user['UID']."'";
                    $query = $conn->query($sql);
                    while($row = $query->fetch_assoc()){
                    	$h = '<section class= "status-score">
							<h1 class= "passed">'.$row['TOTALPOINTS'].'</h1>
							<p>Congratulations! You are PASSED!</p>
						</section>';
                      $cnt += 1;
                      
                      echo '
                            <section class= "status">
							<h1>'.$row['EQUIVALENT_POINTS'].'</h1>
							<p id= "category">'.$row['CRITERIA_CODE'].'</p>
							<p id= "evaluator-name">Evaluator: '.$row['EVALUATOR_NAME'].'</p>
						</section>

                      ';
                    }

                    echo $h;
                  ?>


						
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
		<?php include '../include/applicant-image-modal.php';?>
		<?php include '../include/applicant-pds-modal.php';?>
		<?php include '../include/applicant-files-modal.php';?>
		<?php include '../include/applicant-error-modal.php';?>
		<?php include '../include/applicant-success-modal.php';?>
	</body>
</html>