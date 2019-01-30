<section class= "file-modal-container" id= "file-modal">
	<section class= "file-container">
		<section class= "file-header">
			<h1>My Files</h1>
			<a id= "closeFileBtn"><i class= "fa fa-close"></i></a>
		</section>
		<section class= "file-content">
			

			 <?php
                    $sql = "SELECT * FROM file where UID = '".$user['UID']."'";



                    
                    $query = $conn->query($sql);

                    while($row = $query->fetch_assoc()){
                                
                   
                                 
                                     echo  '
                                           	<section class= "files">
				                                 <img src= "../img/icon-pdf.ico">
				                                 <p>'.$row['FILE_NAME'].'</p>
				                                 
			                                 </section>
                                               ';
                            
                                    


                               }
                          
                          mysqli_close($conn);
                                  

        ?>

		</section>
	</section>
</section>