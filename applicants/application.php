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
				<p class= "current">1</p>
				<p>2</p>
				<p>3</p>
			</section>
			<section class= "application-content">
				<section class= "content-container">
				<?php
						$sql = "SELECT UID, TITLE, NOI, DESCRIPTION, PLACE_ASSIGNMENT, SALARIES, PUBLICATION_DATE FROM publish_vacancy";
						$query = $conn->query($sql);
						while($row = $query->fetch_assoc()){
					?>
                    <section class= "container-info">
						<img src= "../img/logo.png">
						<h1 id= "position"><?php echo $row['TITLE'];?></h1>
						<input type= "hidden" name= "vacant_no" id= "job_no" value= "<?php echo $row['UID'];?>">
						<p id= "school"><?php echo $row['NOI'];?></p>
						<p id= "address"><?php echo $row['PUBLICATION_DATE'];?> | <?php echo $row['DESCRIPTION'];?></p>
						<p id= "salary">SALARY: <?php echo $row['SALARIES'];?></p>
						<a id= "applyBtn" class="apply_btn">APPLY</a>
					</section>
        			<?php 
        				}
        			?>
				
                                  
                 <?php
                    $sql = "SELECT * FROM publish_vacancy a join schools s ON s.SID=a.PLACE_ASSIGNMENT WHERE a.isActive = '1'";



                    
                    $query = $conn->query($sql);

                    while($row = $query->fetch_assoc()){
                                
                     if(strtotime($row['PUBLICATION_DATE']) > strtotime($row['PUBLICATION_DATE_UNTIL'])) {
                           
                                $status='<span class="label label-danger pull-right">Expired</span>';
                            }
                            else{
                                 
                                     echo  '
                                           <section class= "container-info">
						                      <img src= "../img/logo.png">
						                        <h1 id= "position">'.$row['TITLE'].'</h1>
						                        <p id= "school">'.$row['SCHOOL_NAME'].'</p>
						                        <p id= "address">'.$row['DESCRIPTION'].', 
						                        '.$row['PUBLICATION_DATE'].'</p>
						                        <p id= "salary">Salary: '.$row['SALARIES'].' Php</p>
						                        <a href= "#" data-id='.$row['UID'].' id= "applyBtn" class="apply_btn">APPLY</a>
					                       </section>
                                               ';
                            }
                                    


                               }
                          
                          mysqli_close($conn);
                                  

        ?>

				
				</section>
			</section>
		</section>
		<?php include '../include/user-info-modal.php';?>
		<?php include '../include/applicant-pds-modal.php';?>
		<?php include '../include/applicant-files-modal.php';?>
	</body>
</html>