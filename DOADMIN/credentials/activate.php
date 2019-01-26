<?php
include 'connection.php';
 if($_GET['email']){
 	 $key = $_GET['key'];
     $email = $_GET['email'];

       $sql="SELECT * from user where EMAIL='".$email."';";
                         $result=mysqli_query($conn,$sql);
                          if($result->num_rows > 0) 
                               {
                                      while($row = $result->fetch_assoc()) {
                                                  $UID=$row["UID"];
                                                  $KEY=$row["ACTIVATION_KEY"];
                                              
                                      }
                               }
 	 $sql=$conn->query("UPDATE user SET STATUS='1' WHERE EMAIL='".$email."' and UID='".$UID."'");

        echo $UID;

 }
 


 ?>