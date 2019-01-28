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
                                  
                  $sql="SELECT * from publish_vacancy;";
                      
                          if ($result=mysqli_query($conn,$sql))
                          {
         

                              while ($row=mysqli_fetch_row($result))
                               { 
                                   
                            
                                    


                                     echo  '
                                           <section class= "container-info">
						                      <img src= "../img/logo.png">
						                        <h1 id= "position">'.$row[2].'</h1>
						                        <p id= "school">'.$row[5].'</p>
						                        <p id= "address">'.$row[4].', '.$row[3].'</p>
						                        <p id= "salary">Salary: '.$row[9].' Php</p>
						                        <a href= "#" data-id='.$row[1].' id= "applyBtn" class="apply_btn">APPLY</a>
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
	</body>
</html>