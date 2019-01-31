<?php
include 'connection.php';
 if($_GET['email']){
 	 $key = $_GET['key'];
     $email = $_GET['email'];
      session_start();
       $sql="SELECT * from user where EMAIL='".$email."';";
                         $result=mysqli_query($conn,$sql);
                          if($result->num_rows > 0) 
                               {
                                      while($row = $result->fetch_assoc()) {
                                                  $UID=$row["UID"];
                                                  $KEY=$row["ACTIVATION_KEY"];
                                                   $_SESSION['APPLICANTS_ID'] = $row["UID"];
                                      }
                               }
 	 $sql=$conn->query("UPDATE user SET STATUS='1' WHERE EMAIL='".$email."' and UID='".$UID."';");
	 $sql1=$conn->query("INSERT INTO family_background(`UID`) VALUES ('".$UID."');");
     
        echo $UID.' - '.$email.' has already confirmed! Proceed to login! <a href="../../">Click here...</a>';

 }
 


 ?>