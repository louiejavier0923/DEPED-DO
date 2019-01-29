<!DOCTYPE html>

<html>
	<head>
		<title>History | Division Office</title>
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
					<h3>Logs</h3>
					<div class= "line"></div>
					<section class= "logs-container">
						<?php
                              $sql = "SELECT * FROM application a join publish_vacancy p ON p.UID=a.PID join schools s ON s.SID = p.PLACE_ASSIGNMENT WHERE a.UID = '".$user['UID']."'";



                    
                    $query = $conn->query($sql);

                    while($row = $query->fetch_assoc()){
                                
                 
                                 
                                     echo  '
                                           
					                       <section class= "logs">
							<img src= "../img/logo.png">
							<h1 id= "position">'.$row['TITLE'].'</h1>
							<p id= "school">'.$row['SCHOOL_NAME'].'</p>
							<p id= "salary">Salary: '.$row['SALARIES'].' Php</p>
							<p id= "salary">PUBLICATION DATE: '.$row['PUBLICATION_DATE'].' Php</p>
							<p id= "address">673  Quirino Highway, San Bartolome, Novaliches Quezon City</p>
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