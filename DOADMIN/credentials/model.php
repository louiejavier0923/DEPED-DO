<?php
   include 'connection.php';
   use PHPMailer\PHPMailer\PHPMailer;
   use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
   require 'vendor/autoload.php';

   $mail = new PHPMailer(true);
 
   switch($_POST['action']){


        case 'applicants_list':
          # code...
           $output='';
           
                $sql = "SELECT MAX(b.UID) AS 'bUID',a.FIRSTNAME,a.LASTNAME,a.MIDDLENAME FROM view_rank a join  application b ON a.UID = b.UID WHERE STATUS='0' GROUP BY b.UID";
                    $query = $conn->query($sql);
                    while($row = $query->fetch_assoc()){
                     
                                
                     
                      $output.="
                                       <option  value=".$row['bUID'].">".$row['LASTNAME'].', '.$row['FIRSTNAME'].' '.$row['MIDDLENAME']."</option>
                                  
                               
                        
                      ";
                    }
                    $data = array(    
                       'message' => $output
            
                       );

              echo json_encode($data);
          break;
   	 /*INSERT*/
      case 'add_user':
                      $output='';
                     
                      $email = $_POST['email'];
                      $password = $_POST['password'];
                      $cpassword = $_POST['cpassword'];

                       $sql="SELECT * from user where EMAIL='".$email."';";
                         $result=mysqli_query($conn,$sql);

                           if($result->num_rows > 0) 
                               {
                                    $output='email already used';
                               }

                           else{
                                    $sql=$conn->query("INSERT INTO user(UID,EMAIL,PWD, STATUS, IS_ONLINE)VALUES('TCH-0002','".$email."','".$password."','0','0')");
                                      
                                    $output='successful inserted';
                                    
                                      
                               }
           

                    $data = array(    
                       'message' => $output
            
                       );

              echo json_encode($data);
            break;
                 case 'add_personnel':
                      $output='';
                      $lname = $_POST['lname'];
                      $fname = $_POST['fname'];
                      $middlename = $_POST['middlename'];
                      $email = $_POST['email'];
                      $pass = $_POST['pass'];
                      $cpass = $_POST['cpass'];

                $sql=$conn->query("INSERT INTO  evaluators_info_tbl(NO,LASTNAME,FIRSTNAME,MIDDLENAME,EMAIL,PASSWORD,ISACTIVE)
                  VALUES('','".$lname."','".$fname."','".$middlename."','".$email."','".$pass."', '1')");
                             $output='Successful inserted';
                    $data = array(    
                       'message' => $output
            
                       );

              echo json_encode($data);
            break;
     
   	       case 'add_vacancy':
   	       	      $output='';
   	       	      $date=date("Y-m-d");
	                 $string_date = (string)$date;
   	       	      $title = $_POST['title'];
                  $description = $_POST['description'];
                  $expiration = $_POST['expiration'];
                  $noi = $_POST['noi'];
                  $status = $_POST['status'];
                  $itemno = $_POST['itemno'];
                  $salaries = $_POST['salaries'];
                  $place = $_POST['place'];

                            $sql=$conn->query("INSERT INTO  publish_vacancy(UID,TITLE,DESCRIPTION,PLACE_ASSIGNMENT,NOI,PUBLICATION_DATE,PUBLICATION_DATE_UNTIL,STATUS,SALARIES,ITEM_NO,isActive)VALUES('PID-1005','".$title."','".$description."','".$place."','".$noi."','".$date."','".$expiration."','".$status."','".$salaries."','".$itemno."', '1')");
                             $output='Successful inserted';

   	       	        $data = array(	 	
                       'message' => $output
            
         	             );

              echo json_encode($data);
   	       	break;
 	 /*SELECTION*/
   	       	case 'get_user_id':
                   $output='';
                   $edit_status = '';
                   $id = $_POST['id'];
                    $sql="SELECT * from user where UID='".$id."';";
                         $result=mysqli_query($conn,$sql);
                          if($result->num_rows > 0) 
                               {
                                      while($row = $result->fetch_assoc()) {
                                                  $email=$row["EMAIL"];
                                                  $password=$row["PWD"];
                                                  $status=$row["STATUS"];
                                                  if ($status == '1')
                                                  {
                                                    $edit_status = "ACTIVATE";

                                                  }
                                                  else if ($status == '0')
                                                  {
                                                    $edit_status = "NOT ACTIVATE";
                                                  }

                                      }

                               }

                           else{
                                   
                                      
                                    $output='no available data';
                                    
                                      
                               }

    $conn->close();
   	       		   $data = array(	 	
                       'message' => $output,
                       'email'=>$email,
                       'p_edit'=>$password,
                       'cp_edit'=>$password,
                       'status'=>$edit_status
            
         	             );

              echo json_encode($data);
   	       	break;

                  case 'get_personnel_id':
                   $output='';
                   $id = $_POST['id'];
                    $sql="SELECT * from evaluators_info_tbl where NO='".$id."';";
                         $result=mysqli_query($conn,$sql);
                          if($result->num_rows > 0) 
                               {
                                      while($row = $result->fetch_assoc()) {
                                                  $lastname=$row['LASTNAME'];
                                                  $firstname=$row['FIRSTNAME'];
                                                  $middlename=$row['MIDDLENAME'];
                                                  $email=$row['EMAIL'];
                                                  $password=$row['PASSWORD'];
                                                  
                                                 

                                      }

                               }

                           else{
                                   
                                      
                                    $output='no available data';
                                    
                                      
                               }

                       $data = array(   
                       'message' => $output,
                        'ln'=>$lastname,
                        'fn'=>$firstname,
                        'mn'=>$middlename,
                         'email'=>$email,
                        'pass'=>$password,
                        'cpass'=>$password
            
                       );

              echo json_encode($data);
            break;


   	       	case 'get_vacancy_id':
                       $id = $_POST['id'];
                        $sql="SELECT * from publish_vacancy where UID='".$id."';";
                         $result=mysqli_query($conn,$sql);
                          if($result->num_rows > 0) 
                               {
                                      while($row = $result->fetch_assoc()) {

                                                  $title=$row["TITLE"];
                                                  $desc=$row["DESCRIPTION"];
                                                  $place=$row["PLACE_ASSIGNMENT"];
                                                  $noi=$row["NOI"];
                                                  $pub_date=$row["PUBLICATION_DATE"];
                                                  $expiration=$row["PUBLICATION_DATE_UNTIL"];
                                                  $status=$row["STATUS"];
                                                  $salaries=$row["SALARIES"];
                                                  $itemno=$row["ITEM_NO"];

                                      }
                               }

                           else{
                                   
                                      
                                    $output='no available data';
                                    
                                      
                               }




   	       		$data = array(	 	
                       'message' => $title,
                       'title'=>$title,
                        'description'=>$desc,
                        'place'=>$place,
                        'noi'=>$noi,
                        'pub_date'=>$pub_date,
                        'expiration'=>$expiration,
                        'status'=>$status,
                        'salaries'=>$salaries,
                        'itemno'=>$itemno
                     
            
         	             );

              echo json_encode($data);
   	        break;

   	         	 /*UPDATE*/

         case 'login_function':
 
  $login_email = $_POST['email'];
  $login_pwd = $_POST['pwd'];

  session_start();
    $sql="SELECT * from user where EMAIL='".$login_email."';";
           
                     $result=mysqli_query($conn,$sql);
                          
                              if($result->num_rows > 0) 
                               {
                                            while($row = $result->fetch_assoc()) {
                                                  $status=$row["STATUS"];
                                                  $password=$row["PWD"];
                                                        if($status=='0'){
                                                                $output='redirect';
                                                        }
                                                        else{
                                                               if($login_pwd==$password) {
                                                                         $output='successful';
                                                                         $_SESSION['APPLICANTS_ID'] = $row["UID"];
                                                                }
                                                                else{
                                                                         $output='invalid password';
                                                                }
                                                        } 
                                            }
                               }

                           else{
                                             $output='INVALID EMAIL';
                               }
                          
                              
                
 
  # code...
    $conn->close();
$data = array(  
             'message' => $output          
);

echo json_encode($data);
  break;

  case 'register_function':
   $reg_email = $_POST['email'];
   $reg_pwd = $_POST['pwd'];
   $reg_confirm_pwd = $_POST['cpwd'];
       $generatedKey = sha1(mt_rand(10000,99999).time());
               $sql="SELECT * from user where EMAIL='".$reg_email."';";
           
                     $result=mysqli_query($conn,$sql);

                           if($result->num_rows > 0) 
                               {
                                    $output='email already used';
                               }

                           else{
                                        $sql=$conn->query("CALL `register`('".$reg_email."', '".$reg_pwd."', '".$generatedKey."')");
                                         // $mail->SMTPDebug = 2;                                 // Enable verbose debug output
                                           $mail->isSMTP();                                      // Set mailer to use SMTP
                                           $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
                                           $mail->SMTPAuth = true;                               // Enable SMTP authentication
                                           $mail->Username = 'cromeroadr@gmail.com';                 // SMTP username
                                           $mail->Password = '9325310huffles';                           // SMTP password
                                           $mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
                                           $mail->Port = 465;                                    // TCP port to connect to
                                       
                                           //Recipients
                                           $mail->setFrom('cromeroadr@gmail.com', 'Division Office');
                                           $mail->addAddress($reg_email);     // Add a recipient
                                         
                                           //$mail->addCC('cc@example.com');
                                           //$mail->addBCC('bcc@example.com');
                                           $action = 'verify_email';
                                           //Attachments
                                           //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
                                           //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
                                           $verification_link="http://localhost:8899/DEPED-DO/DOADMIN/credentials/activate.php?email=$reg_email&key=$generatedKey";
                                           //Content
                                           $mail->isHTML(true);                                  // Set email format to HTML
                                           $mail->Subject = 'Here is the subject';
                                           $mail->Body    = "thank you for registering please <a href=".$verification_link.">Confirm Account</a>";
                                           $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
                                       
                                         
                            
                                           if($mail->Send()) {
                                                   $output="success";
                                          }
                                          else{
                                                  $output='Registration failed';
                                          }
                                  
                                    
                                      
                               }
           
                  
        $data = array(  
             'message' => $output          
           );
     echo json_encode($data);
  break;

  case 'insert_pds_info':
 
              $output='';
              $output='qweq';
              




              
           $data = array(  
             'message' => $output          
           );
     echo json_encode($data);
    break;
    /*Add Schools */
    
        



    case 'set_appointment':
              $output='';
              $uid_array = $_POST['uid'];
              $ids_array = $_POST['sids'];
              /*
             foreach($_POST['uid'] as $value){
                 
                    
                     $sql="SELECT * from user where UID='".$value."';";
           
                     $result=mysqli_query($conn,$sql);
                          
                              if($result->num_rows > 0) 
                               {
                                            while($row = $result->fetch_assoc()) {
                                                  $appointment_email=$row["EMAIL"];
                                                       // $mail->SMTPDebug = 2;      
                                           $mail->isSMTP();                                      // Set mailer to use SMTP
                                           $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
                                           $mail->SMTPAuth = true;                               // Enable SMTP authentication
                                           $mail->Username = 'cromeroadr@gmail.com';                 // SMTP username
                                           $mail->Password = '9325310huffles';                           // SMTP password
                                           $mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
                                           $mail->Port = 465;                                    // TCP port to connect to
                                       
                                           //Recipients
                                           $mail->setFrom('cromeroadr@gmail.com', 'Division Office');
                                           $mail->addAddress($appointment_email);     // Add a recipient
                                         
                                           //$mail->addCC('cc@example.com');
                                           //$mail->addBCC('bcc@example.com');
                                           $action = 'verify_email';
                                           //Attachments
                                           //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
                                           //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
                                         
                                           //Content
                                           $mail->isHTML(true);                                  // Set email format to HTML
                                           $mail->Subject = 'Here is the subject';
                                           $mail->Body    = "thank you for registering please <a href='#'>Confirm Account</a>";
                                           $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
                                       
                                         
                            
                                           if($mail->Send()) {
                                                   $output="success";
                                          }
                                          else{
                                                  $output='successful inserted';
                                          }

                                       }
                               }

                      
                                                                       
    
            }
            */

           for ($i = 0; $i < count($uid_array); $i++) {
                
                    # code...

        $uid = mysql_real_escape_string($uid_array[$i]);
        $ids = mysql_real_escape_string($ids_array[$i]);
                  
                        $sql="UPDATE publish_vacancy SET APP_ISSET = '1' WHERE UID='".$ids."';";
                        $result=mysqli_query($conn,$sql);

                        $sql="UPDATE application SET STATUS = 1 WHERE UID='".$uid."';";
                        $result=mysqli_query($conn,$sql);
                        
                       
                        $sql="INSERT into appointment(UID,VID,DATE,EXPIRATION_DATE)VALUES('".$uid."','".$ids."',CURRENT_DATE(),DATE_ADD(CURRENT_DATE(),INTERVAL 15 DAY));";
                        $result=mysqli_query($conn,$sql);
                        
                       

                       $sql2="SELECT * from user where UID='".$uid."';";
           
                     $result2=mysqli_query($conn,$sql2);
                          
                              if($result2->num_rows > 0) 
                               {
                                            while($row = $result2->fetch_assoc()) {
                                                  $appointment_email=$row["EMAIL"];
                                                       // $mail->SMTPDebug = 2;      
                                           $mail->isSMTP();                                      // Set mailer to use SMTP
                                           $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
                                           $mail->SMTPAuth = true;                               // Enable SMTP authentication
                                           $mail->Username = 'cromeroadr@gmail.com';                 // SMTP username
                                           $mail->Password = '9325310huffles';                           // SMTP password
                                           $mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
                                           $mail->Port = 465;                                    // TCP port to connect to
                                       
                                           //Recipients
                                           $mail->setFrom('cromeroadr@gmail.com', 'Division Office');
                                           $mail->addAddress($appointment_email);     // Add a recipient
                                         
                                           //$mail->addCC('cc@example.com');
                                           //$mail->addBCC('bcc@example.com');
                                           $action = 'verify_email';
                                           //Attachments
                                           //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
                                           //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
                                         
                                           //Content
                                           $mail->isHTML(true);                                  // Set email format to HTML
                                           $mail->Subject = 'Here is the subject';
                                           $mail->Body    = "QCDO set an appointment";
                                           $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
                                       
                                         
                            
                                           if($mail->Send()) {
                                                 $output='';
                                           }
                                                   
                                     }

                       } 
            
          
      }

              
           $data = array(  
             'message' => $output          
           );
     echo json_encode($data);
      break;

      case 'add_schools':
                      $output='';
                     
                      $school_name = $_POST['school_name'];
                      $school_address = $_POST['school_address'];
                      
                      $sql=$conn->query("INSERT INTO schools(NO,SID,SCHOOL_NAME,SCHOOL_ADDRESS,isActive)VALUES('','SID-0004','".$school_name."','".$school_address."' , '1')");
                             $output='Successfully inserted';

              

                    $data = array(    
                       'message' => $output
            
                       );

              echo json_encode($data);
            break;

             case 'get_school_id':
                       $puid = $_POST['id'];
                              $sql="SELECT * from schools where SID='".$puid."';";
                         $result=mysqli_query($conn,$sql);
                          if($result->num_rows > 0) 
                               {
                                      while($row = $result->fetch_assoc()) {

                                                  $name=$row["SCHOOL_NAME"];
                                                  $address=$row["SCHOOL_ADDRESS"];
                                                  
                                      }
                               }

                           else{
                                   
                                      
                                    $output='no available data';
                                    
                                      
                               }




              $data = array(    
                       'message' => $name,
                       'name'=>$name,
                       'address'=>$address
                     
            
                       );

              echo json_encode($data);
            break;

               case 'get_school_id':
                       $puid = $_POST['id'];
                              $sql="SELECT * from schools where SID='".$puid."';";
                         $result=mysqli_query($conn,$sql);
                          if($result->num_rows > 0) 
                               {
                                      while($row = $result->fetch_assoc()) {

                                                  $name=$row["SCHOOL_NAME"];
                                                  $address=$row["SCHOOL_ADDRESS"];
                                                  
                                      }
                               }

                           else{
                                   
                                      
                                    $output='no available data';
                                    
                                      
                               }




              $data = array(    
                       'message' => $name,
                       'name'=>$name,
                       'address'=>$address
                     
            
                       );

              echo json_encode($data);
            break;
                case 'edit_schools':
                
                  $s_id = $_POST['id'];
                  $name = $_POST['name'];
                  $address = $_POST['address'];
                       $sql="UPDATE schools SET SCHOOL_NAME = '".$name. "', SCHOOL_ADDRESS ='".$address."' WHERE SID='".$s_id."';";
                       $result=mysqli_query($conn,$sql);
              $data = array(    
                       'confirm' =>"Edit Success!",
                                       
            
                    );



  echo json_encode($data);
                break;


                case 'edit_user':
                  $output ='';
                  $message ='Edit success!';
                  $id = $_POST['id'];
                  $email = $_POST['email'];
                  $pass = $_POST['pass'];
                       $sql="UPDATE user SET EMAIL = '".$email. "', PWD ='".$pass."'WHERE UID='".$id."';";
                       $result=mysqli_query($conn,$sql);
                       $output = 'success';
              $data = array(    
                       'confirm' => $output,
                       'message' => $message
                                       
            
                    );



  echo json_encode($data);
                break;

                    case 'edit_personnel':
                  $output ='';
                  $message ='Edit success!';
                  $id = $_POST['id'];
                  $email = $_POST['email'];
                  $pass = $_POST['pass'];
                  $fn = $_POST['fn'];
                  $ln = $_POST['ln'];
                  $mn = $_POST['mn'];

          $sql="UPDATE evaluators_info_tbl SET EMAIL = '".$email. "', PASSWORD ='".$pass."', LASTNAME = '".$ln."', FIRSTNAME ='".$fn."',
          MIDDLENAME = '".$mn."' WHERE NO='".$id."';";
                       $result=mysqli_query($conn,$sql);
                       $output = 'success';
              $data = array(    
                       'confirm' => $output,
                       'message' => $message
                                       
            
                    );



  echo json_encode($data);
                break;


                   case 'archive_schools':
                  $d_id = $_POST['d_id'];
                       $sql="UPDATE schools SET isActive = '0' WHERE SID='".$d_id."';";
                       $result=mysqli_query($conn,$sql);


                        $data = array(    
                       'confirm' =>"Archiving Success!",
                                       
            
                    );

  echo json_encode($data);
                break;


                    case 'archive_user':
                  $d_id = $_POST['d_id'];
                       $sql="UPDATE user SET STATUS = '0' WHERE UID='".$d_id."';";
                       $result=mysqli_query($conn,$sql);


                        $data = array(    
                       'confirm' =>"Archiving Success!",
                                       
            
                    );

  echo json_encode($data);
                break;

                       case 'archive_personnel':
                  $id = $_POST['id'];
                       $sql="UPDATE evaluators_info_tbl SET ISACTIVE = '0' WHERE NO='".$id."';";
                       $result=mysqli_query($conn,$sql);


                        $data = array(    
                       'confirm' =>"Archiving Success!",
                                       
            
                    );

  echo json_encode($data);
                break;

                    case 'retrieve_user':
                  $r_id = $_POST['r_id'];
                       $sql="UPDATE user SET STATUS = '1' WHERE UID='".$r_id."';";
                       $result=mysqli_query($conn,$sql);


                        $data = array(    
                       'confirm' =>"Retrieving Success!",
                                       
            
                    );

  echo json_encode($data);
                break;

                    case 'retrieve_personnel':
                  $id = $_POST['id'];
                       $sql="UPDATE evaluators_info_tbl SET ISACTIVE = '1' WHERE NO='".$id."';";
                       $result=mysqli_query($conn,$sql);


                        $data = array(    
                       'confirm' =>"Retrieving Success!",
                                       
            
                    );

  echo json_encode($data);
                break;


                  case 'retrieve_schools':
                  $output ='';
                  $id = $_POST['id'];
                       $sql="UPDATE schools SET isActive = '1' WHERE SID='".$id."';";
                       $result=mysqli_query($conn,$sql);
                      $output ='Retrieve Success';

                        $data = array(    
                       'confirm' =>"Retrieve Success!",
                                       
            
                    );

  echo json_encode($data);
                break;






                  case 'edit_vacancy':
                  $date=date("Y-m-d");
                  $expi_date = (string)$date;
                  $edit_id = $_POST['edit_id'];
                  $title = $_POST['title'];
                  $expi_date = $_POST['expi_date'];
                  $desc = $_POST['desc'];
                  $noi = $_POST['noi'];
                  $place = $_POST['place'];
                  $status = $_POST['status'];
                  $salaries = $_POST['salaries'];
                  $itemno = $_POST['itemno'];
                       $sql="UPDATE publish_vacancy SET TITLE = '".$title."', DESCRIPTION = '".$desc."', NOI = '".$noi."', PLACE_ASSIGNMENT = '".$place."', STATUS = '".$status."', SALARIES = '".$salaries."', ITEM_NO = '".$itemno."', PUBLICATION_DATE_UNTIL = '".$expi_date."' WHERE UID='".$edit_id."';";
                       $result=mysqli_query($conn,$sql);


                        $data = array(    
                       'message' =>"Edit Success!",

                                       
            
                    );

  echo json_encode($data);
                break;
  case 'archive_vacancy':
                  $id = $_POST['id'];
                       $sql="UPDATE publish_vacancy SET isActive = '0' WHERE UID='".$id."';";
                       $result=mysqli_query($conn,$sql);


                        $data = array(    
                       'message' =>"Archiving Success!",
                                       
            
                    );

  echo json_encode($data);
                break;

                  case 'add_news':
                  $output='';
                   $date=date("Y-m-d");
                    $string_date = (string)$date;
                  $title = $_POST['title'];
                  $description = $_POST['description'];
                    $news_date = $_POST['news_date'];
                    
                      $sql=$conn->query("INSERT INTO news(NO,UID,TITLE,DESCRIPTION,DATE_PUB,isActive)VALUES('','UID-0004','".$title."','".$description."' , '".$news_date."', '1')");
                             $output='Successful inserted';
                    


                    $data = array(    
                       'message' => $output
            
                       );


                echo json_encode($data);
                break;

                     case 'retrieve_vacancy':
                  $id = $_POST['id'];
                       $sql="UPDATE publish_vacancy SET isActive = '1' WHERE UID='".$id."';";
                       $result=mysqli_query($conn,$sql);


                        $data = array(    
                       'message' =>"Retrieving Success!",
                                       
            
                    );

  echo json_encode($data);
                break;

                case 'get_news_id':
                       $id = $_POST['id'];

                              $sql="SELECT * from news where UID= '".$id."';";
                         $result=mysqli_query($conn,$sql);
                          if($result->num_rows > 0) 
                               {
                                      while($row = $result->fetch_assoc()) {

                                                  $title=$row["TITLE"];
                                                  $desc=$row["DESCRIPTION"];
                                                  $date = $row['DATE_PUB'];
                                          }
                               }

                           else{
                                   
                                      
                                    $output='no available data';
                                    
                                      
                               }




              $data = array(    
                       'message' => $title,
                       'title'=>$title,
                       'desc'=>$desc,
                       'date'=>$date,
                     
            
                       );

              echo json_encode($data);
            break;

             case 'edit_news':          
                   $output='';
                    $date=date("Y-m-d");
                    $string_date = (string)$date;
                    $e_id = $_POST['e_id'];
                    $desc = $_POST['desc'];
                    $title = $_POST['title'];
                    $date_pub = $_POST['date_pub'];
                       $sql="UPDATE news SET TITLE = '".$title."', DESCRIPTION = '".$desc."', DATE_PUB = '".$date_pub."'  WHERE UID ='".$e_id."';";
                       $result=mysqli_query($conn,$sql);


                        $data = array(    
                       'confirm' =>"Edit Success!",
                                       
            
                    );

  echo json_encode($data);
                break;
                    case 'archive_news':
                  $d_id = $_POST['d_id'];
                       $sql="UPDATE news SET isActive = '0' WHERE UID='".$d_id."';";
                       $result=mysqli_query($conn,$sql);


                        $data = array(    
                       'confirm' =>"Archiving Success!",
                                       
            
                    );

  echo json_encode($data);
                break;
                    case 'retrieve_news':
                  $id = $_POST['id'];
                       $sql="UPDATE news SET isActive = '1' WHERE UID='".$id."';";
                       $result=mysqli_query($conn,$sql);


                        $data = array(    
                       'confirm' =>"Retrieving Success!",
                                       
            
                    );

  echo json_encode($data);
                break;






                   case 'add_announcement':
                  $output='';
                $date=date("Y-m-d");
                $string_date = (string)$date;
                  $title = $_POST['title'];
                $description = $_POST['description'];
                $a_date = $_POST['a_date'];
                    
                      $sql=$conn->query("INSERT INTO announcement(NO,UID,TITLE,DESCRIPTION,DATE_PUB,isActive)VALUES('','UID-0004','".$title."','".$description."' , '".$a_date."', '1')");
                             $output='Successful inserted';
                    


                    $data = array(    
                       'message' => $output
            
                       );


                echo json_encode($data);
                break;

  case 'get_a_id':
                       $id = $_POST['id'];

                              $sql="SELECT * from announcement where UID= '".$id."';";
                         $result=mysqli_query($conn,$sql);
                          if($result->num_rows > 0) 
                               {
                                      while($row = $result->fetch_assoc()) {

                                                  $title=$row["TITLE"];
                                                  $desc=$row["DESCRIPTION"];
                                                  $date = $row['DATE_PUB'];
                                          }
                               }

                           else{
                                   
                                      
                                    $output='no available data';
                                    
                                      
                               }
              $data = array(    
                       'message' => $title,
                       'title'=>$title,
                       'desc'=>$desc,
                       'date'=>$date,
                     
            
                       );

              echo json_encode($data);
            break;
              /*   EDIT ANNOUNCEMENTS*/
              case 'edit_announcement':          
                   $output='';
                    $date=date("Y-m-d");
                    $string_date = (string)$date;
                    $e_id = $_POST['e_id'];

                    $desc = $_POST['desc'];
                    $title = $_POST['title'];
                    $date_pub = $_POST['date_pub'];
                       $sql="UPDATE announcement SET TITLE = '".$title."', DESCRIPTION = '".$desc."', DATE_PUB = '".$date_pub."'  WHERE UID ='".$e_id."';";
                       $result=mysqli_query($conn,$sql);

                             $data = array(    
                       'confirm' =>"Editing Success!",
                                       
            
                    );

                  echo json_encode($data);
                break;

                 case 'archive_announcement':
                  $d_id = $_POST['d_id'];
                       $sql="UPDATE announcement SET isActive = '0' WHERE UID='".$d_id."';";
                       $result=mysqli_query($conn,$sql);


                        $data = array(    
                       'confirm' =>"Archiving Success!",
                                       
            
                    );

  echo json_encode($data);
                break;


                    case 'retrieve_announcement':
                  $id = $_POST['id'];
                  $sql="UPDATE announcement SET isActive = '1' WHERE UID='".$id."';";
                      $result=mysqli_query($conn,$sql);
                     
                        $data = array(    
                       'confirm' =>"Retrieving Success!",
                                       
            
                    );

  echo json_encode($data);
                break;

                    case 'fetch_schools_tbl':
                   $output='';
                  $sql = "SELECT * FROM schools WHERE isActive = '1'";
                    $query = $conn->query($sql);
                    while($row = $query->fetch_assoc()){
                      $output.= "
                       <tr>
                          <td>".$row['NO']."</td>
                          <td>".$row['SID']."</td>
                          <td>".$row['SCHOOL_NAME']."</td>
                          <td>".$row['SCHOOL_ADDRESS']."</td>

                          <td>
                            <button class='btn btn-success btn-sm edit btn-flat' data-id='".$row['SID']."'><i class='fa fa-edit'></i> Edit</button>
                            <button class='btn btn-danger btn-sm delete btn-flat' data-id='".$row['SID']."'><i class='fa fa-trash'></i> Archive</button>
                          </td>
                        </tr>
                      
                      ";
                    }
                        $data = array(    
                       'schools' => $output
                                       
            
                    );

                        echo json_encode($data);
                    break;
              
	
	
	
	case 'update_user_function':
		$output='';
		$exe = '';
		$error = '';
		$id = $_POST['id'];
		
		$pds_surname = $_POST['pds_surname'];
		$pds_firstname = $_POST['pds_firstname'];
		$pds_nameextension = $_POST['pds_nameextension'];
		$pds_middlename = $_POST['pds_middlename'];
		$pds_dateofbirth = $_POST['pds_dateofbirth'];
		$pds_placeofbirth = $_POST['pds_placeofbirth'];
		$pds_gender = $_POST['pds_gender'];
		$civil_status = $_POST['civil_status'];
		$pds_height = $_POST['pds_height'];
		$pds_weight = $_POST['pds_weight'];
		$pds_bloodtype = $_POST['pds_bloodtype'];
		$pds_gsisno = $_POST['pds_gsisno'];
		$pds_pagibigno = $_POST['pds_pagibigno'];
		$pds_philhealthno = $_POST['pds_philhealthno'];
		$pds_sssno = $_POST['pds_sssno'];
		$pds_tinno = $_POST['pds_tinno'];
		$pds_agencyemployee = $_POST['pds_agencyemployee'];
		$pds_citizenship = $_POST['pds_citizenship'];
		$pds_country = $_POST['pds_country'];
		$pds_rhouseblk = $_POST['pds_rhouseblk'];
		$pds_rstreet = $_POST['pds_rstreet'];
		$pds_rsubdivision = $_POST['pds_rsubdivision'];
		$pds_rbarangay = $_POST['pds_rbarangay'];
		$pds_rmunicipality = $_POST['pds_rmunicipality'];
		$pds_rprovince = $_POST['pds_rprovince'];
		$pds_rzipcode = $_POST['pds_rzipcode'];
		$pds_phouseblk = $_POST['pds_phouseblk'];
		$pds_pstreet = $_POST['pds_pstreet'];
		$pds_psubdivision = $_POST['pds_psubdivision'];
		$pds_pbarangay = $_POST['pds_pbarangay'];
		$pds_pmunicipality = $_POST['pds_pmunicipality'];
		$pds_pprovince = $_POST['pds_pprovince'];
		$pds_pzipcode = $_POST['pds_pzipcode'];
		$pds_telno = $_POST['pds_telno'];
		$pds_mobileno = $_POST['pds_mobileno'];
		$pds_emailaddress = $_POST['pds_emailaddress'];
		
		$pds_spousesurname = $_POST['pds_spousesurname'];
		$pds_spousefirstname = $_POST['pds_spousefirstname'];
		$pds_spousenameextension = $_POST['pds_spousenameextension'];
		$pds_spousemiddlename = $_POST['pds_spousemiddlename'];
		$pds_spouseoccupation = $_POST['pds_spouseoccupation'];
		$pds_businessname = $_POST['pds_businessname'];
		$pds_businessaddress = $_POST['pds_businessaddress'];
		$pds_businesstelno = $_POST['pds_businesstelno'];
		$pds_fathersurname = $_POST['pds_fathersurname'];
		$pds_fatherfirstname = $_POST['pds_fatherfirstname'];
		$pds_fathernameextension = $_POST['pds_fathernameextension'];
		$pds_fathermiddlename = $_POST['pds_fathermiddlename'];
		$pds_mothermaindenname = $_POST['pds_mothermaindenname'];
		$pds_motherfirstname = $_POST['pds_motherfirstname'];
		$pds_mothersnameextension = $_POST['pds_mothersnameextension'];
		$pds_mothersmiddlename = $_POST['pds_mothersmiddlename'];
		$pds_children = $_POST['pds_children'];
		$pds_childrenBdate = $_POST['pds_childrenBdate'];
		
		$pds_CS = $_POST['pds_CS'];
		$pds_CS_rating = $_POST['pds_CS_rating'];
		$pds_CS_date = $_POST['pds_CS_date'];
		$pds_CS_place = $_POST['pds_CS_place'];
		$pds_CS_licenceNo = $_POST['pds_CS_licenceNo'];
		$pds_CS_licenceDate   = $_POST['pds_CS_licenceDate'];
		
		$pds_WE_FromDate = $_POST['pds_WE_FromDate'];
		$pds_WE_ToDate = $_POST['pds_WE_ToDate'];
		$pds_WE_PositionTitle = $_POST['pds_WE_PositionTitle'];
		$pds_WE_Place = $_POST['pds_WE_Place'];
		$pds_WE_MonthSalary = $_POST['pds_WE_MonthSalary'];
		$pds_WE_Salary = $_POST['pds_WE_Salary'];
		$pds_WE_AppointmentStatus = $_POST['pds_WE_AppointmentStatus'];
		$pds_WE_GovService = $_POST['pds_WE_GovService'];
		
		$pds_VW_Name_Address = $_POST['pds_VW_Name_Address'];
		$pds_VW_FromDate = $_POST['pds_VW_FromDate'];
		$pds_VW_Todate = $_POST['pds_VW_Todate'];
		$pds_VW_NumbHours = $_POST['pds_VW_NumbHours'];
		$pds_VW_Work = $_POST['pds_VW_Work'];
		
		$pds_LaD_Title = $_POST['pds_LaD_Title'];
		$pds_LaD_FromDate = $_POST['pds_LaD_FromDate'];
		$pds_LaD_ToDate = $_POST['pds_LaD_ToDate'];
		$pds_LaD_NumbHours = $_POST['pds_LaD_NumbHours'];
		$pds_LaD_Type = $_POST['pds_LaD_Type'];
		$pds_LaD_ConductBy = $_POST['pds_LaD_ConductBy'];
		
		$output = '';
		$exe = '';
		$error = '';
		
		$sql="UPDATE `user` SET `EMAIL`='$pds_emailaddress' WHERE UID = '$id';";
		
		$sql .= "UPDATE `personal_info` SET `FIRSTNAME`='$pds_firstname', `LASTNAME`='$pds_surname', `MIDDLENAME`='$pds_middlename', `EXTENSION_NAME`='$pds_nameextension', `BIRTHDATE`='$pds_dateofbirth', `BIRTHPLACE`='$pds_placeofbirth', `GENDER`='$pds_gender', `HEIGHT`='$pds_height', `WEIGHT`='$pds_weight', `BLOOD_TYPE`='$pds_bloodtype', `CIVIL_STATUS`='$civil_status', `GSIS_ID_NO`='$pds_gsisno', `PAG_IBIG_NO`='$pds_pagibigno', `PHILHEALTH_NO`='$pds_philhealthno', `SSS_NO`='$pds_sssno', `TIN_NO`='$pds_tinno', `AGENCY_EMPLOYEE_NO`='$pds_agencyemployee', `CITIZENSHIP`='$pds_citizenship', `RESIDENTIAL_LOTNO`='$pds_rhouseblk', `RESIDENTIAL_STREET`='$pds_rstreet', `RESIDENTIAL_SUBDIVISION`='$pds_rsubdivision', `RESIDENTIAL_BARANGAY`='$pds_rbarangay', `RESIDENTIAL_MUNICIPALITY`='$pds_rmunicipality', `RESIDENTIAL_PROVINCE`='$pds_rprovince', `RESIDENTIAL_ZIP_CODE`='$pds_rzipcode', `PERMANENT_LOTNO`='$pds_phouseblk', `PERMANENT_STREET`='$pds_pstreet', `PERMANENT_SUBDIVISION`='$pds_psubdivision', `PERMANENT_BARANGAY`='$pds_pbarangay', `PERMANENT_MUNICIPALITY`='$pds_pmunicipality', `PERMANENT_PROVINCE`='$pds_pprovince', `PERMANENT_ZIP_CODE`='$pds_pzipcode', `TELEPHONE_NO`='$pds_telno', `MOBILE_NO`='$pds_mobileno' WHERE UID = '$id';";
		
		$sql .= " UPDATE `family_background` SET `spousesurname`='$pds_spousesurname', `spousefirstname`='$pds_spousefirstname', `spousemiddlename`='$pds_spousemiddlename', `spousenameextension`='$pds_spousenameextension', `spouseoccupation`='$pds_spouseoccupation', `businessname`='$pds_businessname', `businessaddress`='$pds_businessaddress', `businesstelno`='$pds_businesstelno', `fathersurname`='$pds_fathersurname', `fatherfirstname`='$pds_fatherfirstname', `fathernameextension`='$pds_fathernameextension', `fathermiddlename`='$pds_fathermiddlename', `mothermaindenname`='$pds_mothermaindenname', `motherfirstname`='$pds_motherfirstname', `mothersnameextension`='$pds_mothersnameextension', `mothersmiddlename`='$pds_mothersmiddlename' WHERE UID = '$id';";
		
		
		
		
		if ($conn->multi_query($sql)) 
			$exe = "success";
		else 
			$error = "Error: " . $sql . "<br>" . $conn->error;
		
		
	
		
	
	
	$data = array(
			'data' => $output,
			'exe' => $exe,
			'error' => $error
		);

	echo json_encode($data);
		
	break;
	
	case 'add_user_with_pds_info_function':
		$pds_surname = $_POST['pds_surname'];
		$pds_firstname = $_POST['pds_firstname'];
		$pds_nameextension = $_POST['pds_nameextension'];
		$pds_middlename = $_POST['pds_middlename'];
		$pds_dateofbirth = $_POST['pds_dateofbirth'];
		$pds_placeofbirth = $_POST['pds_placeofbirth'];
		$pds_gender = $_POST['pds_gender'];
		$civil_status = $_POST['civil_status'];
		$pds_height = $_POST['pds_height'];
		$pds_weight = $_POST['pds_weight'];
		$pds_bloodtype = $_POST['pds_bloodtype'];
		$pds_gsisno = $_POST['pds_gsisno'];
		$pds_pagibigno = $_POST['pds_pagibigno'];
		$pds_philhealthno = $_POST['pds_philhealthno'];
		$pds_sssno = $_POST['pds_sssno'];
		$pds_tinno = $_POST['pds_tinno'];
		$pds_agencyemployee = $_POST['pds_agencyemployee'];
		$pds_citizenship = $_POST['pds_citizenship'];
		$pds_country = $_POST['pds_country'];
		$pds_rhouseblk = $_POST['pds_rhouseblk'];
		$pds_rstreet = $_POST['pds_rstreet'];
		$pds_rsubdivision = $_POST['pds_rsubdivision'];
		$pds_rbarangay = $_POST['pds_rbarangay'];
		$pds_rmunicipality = $_POST['pds_rmunicipality'];
		$pds_rprovince = $_POST['pds_rprovince'];
		$pds_rzipcode = $_POST['pds_rzipcode'];
		$pds_phouseblk = $_POST['pds_phouseblk'];
		$pds_pstreet = $_POST['pds_pstreet'];
		$pds_psubdivision = $_POST['pds_psubdivision'];
		$pds_pbarangay = $_POST['pds_pbarangay'];
		$pds_pmunicipality = $_POST['pds_pmunicipality'];
		$pds_pprovince = $_POST['pds_pprovince'];
		$pds_pzipcode = $_POST['pds_pzipcode'];
		$pds_telno = $_POST['pds_telno'];
		$pds_mobileno = $_POST['pds_mobileno'];
		$pds_emailaddress = $_POST['pds_emailaddress'];
		
		$pds_spousesurname = $_POST['pds_spousesurname'];
		$pds_spousefirstname = $_POST['pds_spousefirstname'];
		$pds_spousenameextension = $_POST['pds_spousenameextension'];
		$pds_spousemiddlename = $_POST['pds_spousemiddlename'];
		$pds_spouseoccupation = $_POST['pds_spouseoccupation'];
		$pds_businessname = $_POST['pds_businessname'];
		$pds_businessaddress = $_POST['pds_businessaddress'];
		$pds_businesstelno = $_POST['pds_businesstelno'];
		$pds_fathersurname = $_POST['pds_fathersurname'];
		$pds_fatherfirstname = $_POST['pds_fatherfirstname'];
		$pds_fathernameextension = $_POST['pds_fathernameextension'];
		$pds_fathermiddlename = $_POST['pds_fathermiddlename'];
		$pds_mothermaindenname = $_POST['pds_mothermaindenname'];
		$pds_motherfirstname = $_POST['pds_motherfirstname'];
		$pds_mothersnameextension = $_POST['pds_mothersnameextension'];
		$pds_mothersmiddlename = $_POST['pds_mothersmiddlename'];
		$pds_children = $_POST['pds_children'];
		$pds_childrenBdate = $_POST['pds_childrenBdate'];
		
		$pds_CS = $_POST['pds_CS'];
		$pds_CS_rating = $_POST['pds_CS_rating'];
		$pds_CS_date = $_POST['pds_CS_date'];
		$pds_CS_place = $_POST['pds_CS_place'];
		$pds_CS_licenceNo = $_POST['pds_CS_licenceNo'];
		$pds_CS_licenceDate   = $_POST['pds_CS_licenceDate'];
		
		$pds_WE_FromDate = $_POST['pds_WE_FromDate'];
		$pds_WE_ToDate = $_POST['pds_WE_ToDate'];
		$pds_WE_PositionTitle = $_POST['pds_WE_PositionTitle'];
		$pds_WE_Place = $_POST['pds_WE_Place'];
		$pds_WE_MonthSalary = $_POST['pds_WE_MonthSalary'];
		$pds_WE_Salary = $_POST['pds_WE_Salary'];
		$pds_WE_AppointmentStatus = $_POST['pds_WE_AppointmentStatus'];
		$pds_WE_GovService = $_POST['pds_WE_GovService'];
		
		$pds_VW_Name_Address = $_POST['pds_VW_Name_Address'];
		$pds_VW_FromDate = $_POST['pds_VW_FromDate'];
		$pds_VW_Todate = $_POST['pds_VW_Todate'];
		$pds_VW_NumbHours = $_POST['pds_VW_NumbHours'];
		$pds_VW_Work = $_POST['pds_VW_Work'];
		
		$pds_LaD_Title = $_POST['pds_LaD_Title'];
		$pds_LaD_FromDate = $_POST['pds_LaD_FromDate'];
		$pds_LaD_ToDate = $_POST['pds_LaD_ToDate'];
		$pds_LaD_NumbHours = $_POST['pds_LaD_NumbHours'];
		$pds_LaD_Type = $_POST['pds_LaD_Type'];
		$pds_LaD_ConductBy = $_POST['pds_LaD_ConductBy'];
		
		$output = '';
		$exe = '';
		$error = '';
		$generatedKey = sha1(mt_rand(10000,99999).time());
		$sql="SELECT * from user where EMAIL='".$pds_emailaddress."';";
           
		$result=mysqli_query($conn,$sql);
		
		if (!$result->num_rows > 0){
			
			/* $output .= $sql = "SELECT `UID` FROM `user` ORDER BY `UID` DESC";
            $query = $conn->query($sql);
			$row = $result->fetch_assoc();
			
			$last_uid = $row['UID'];
			$str_length  =  strlen($last_uid);
			for($i = 4; $i < $str_length; ++$i)
			$str[$i]; */
			
			//auto generate simple password
			//passwrod = 1 or 3 char of Firstname + surname
			$password = '';
			for($i = 0; $i < (strlen($pds_firstname) < 3 ? 1 : 3); ++$i)
			$password .= $pds_firstname[$i];
			$password .= $pds_surname;
			
			$sql="INSERT INTO `user` (`UID`, `EMAIL`, `PWD`, `STATUS`, `ACTIVATION_KEY`, `IS_ONLINE`) VALUES ('', '$pds_emailaddress', '$password', '1', '$generatedKey', '0');";
			
			$sql .= " INSERT INTO `personal_info` (`UID`, `FIRSTNAME`, `LASTNAME`, `MIDDLENAME`, `EXTENSION_NAME`, `BIRTHDATE`, `BIRTHPLACE`, `GENDER`, `HEIGHT`, `WEIGHT`, `BLOOD_TYPE`, `CIVIL_STATUS`, `GSIS_ID_NO`, `PAG_IBIG_NO`, `PHILHEALTH_NO`, `SSS_NO`, `TIN_NO`, `AGENCY_EMPLOYEE_NO`, `CITIZENSHIP`, `RESIDENTIAL_LOTNO`, `RESIDENTIAL_STREET`, `RESIDENTIAL_SUBDIVISION`, `RESIDENTIAL_BARANGAY`, `RESIDENTIAL_MUNICIPALITY`, `RESIDENTIAL_PROVINCE`, `RESIDENTIAL_ZIP_CODE`, `PERMANENT_LOTNO`, `PERMANENT_STREET`, `PERMANENT_SUBDIVISION`, `PERMANENT_BARANGAY`, `PERMANENT_MUNICIPALITY`, `PERMANENT_PROVINCE`, `PERMANENT_ZIP_CODE`, `TELEPHONE_NO`, `MOBILE_NO`) VALUES ('', '$pds_firstname', '$pds_surname', '$pds_middlename', '$pds_nameextension', '$pds_dateofbirth', '$pds_placeofbirth', '$pds_gender', '$pds_height', '$pds_weight', '$pds_bloodtype', '$civil_status', '$pds_gsisno', '$pds_pagibigno', '$pds_philhealthno', '$pds_sssno', '$pds_tinno', '$pds_agencyemployee', '$pds_citizenship', '$pds_rhouseblk', '$pds_rstreet', '$pds_rsubdivision', '$pds_rbarangay', '$pds_rmunicipality', '$pds_rprovince', '$pds_rzipcode', '$pds_phouseblk', '$pds_pstreet', '$pds_psubdivision', '$pds_pbarangay', '$pds_pmunicipality', '$pds_pprovince', '$pds_pzipcode', '$pds_mobileno', '$pds_mobileno');";
			
			$sql .= " INSERT INTO `family_background` (`UID`, `spousesurname`, `spousefirstname`, `spousemiddlename`, `spousenameextension`, `spouseoccupation`, `businessname`, `businessaddress`, `businesstelno`, `fathersurname`, `fatherfirstname`, `fathernameextension`, `fathermiddlename`, `mothermaindenname`, `motherfirstname`, `mothersnameextension`, `mothersmiddlename`) VALUES ('$', '$pds_spousesurname', '$pds_spousefirstname', '$pds_spousemiddlename', '$pds_spousenameextension', '$pds_spouseoccupation', '$pds_businessname', '$pds_businessaddress', '$pds_businesstelno', '$pds_fathersurname', '$pds_fatherfirstname', '$pds_fathernameextension', '$pds_fathermiddlename', '$pds_mothermaindenname', '$pds_motherfirstname', '$pds_mothersnameextension', '$pds_mothersmiddlename');";
			
			
			
			
			if ($conn->multi_query($sql)) 
				$exe = "success";
			else 
				$error = "Error: " . $sql . "<br>" . $conn->error;
			
			
		} else {
			$error = "email already exist";
		}
			
		
		
		$data = array(
				'data' => $output,
				'exe' => $exe,
				'error' => $error
			);
	
		echo json_encode($data);
		
	
	
	break;
	case 'view_pds_function':
		$output = '';
		$exe = '';
		$error = '';
		$sql = "SELECT u.EMAIL, p.FIRSTNAME, p.LASTNAME, p.MIDDLENAME, p.EXTENSION_NAME, p.BIRTHDATE, p.BIRTHPLACE, p.GENDER, p.HEIGHT, p.WEIGHT, p.BLOOD_TYPE, p.CIVIL_STATUS, p.GSIS_ID_NO, p.PAG_IBIG_NO, p.PHILHEALTH_NO, p.SSS_NO, p.TIN_NO, p.AGENCY_EMPLOYEE_NO, p.CITIZENSHIP, p.RESIDENTIAL_LOTNO, p.RESIDENTIAL_STREET, p.RESIDENTIAL_SUBDIVISION, p.RESIDENTIAL_BARANGAY, p.RESIDENTIAL_MUNICIPALITY, p.RESIDENTIAL_PROVINCE, p.RESIDENTIAL_ZIP_CODE, p.PERMANENT_LOTNO, p.PERMANENT_STREET, p.PERMANENT_SUBDIVISION, p.PERMANENT_BARANGAY, p.PERMANENT_MUNICIPALITY, p.PERMANENT_PROVINCE, p.PERMANENT_ZIP_CODE, p.TELEPHONE_NO, p.MOBILE_NO, f.spousesurname, f.spousefirstname, f.spousemiddlename, f.spousenameextension, f.spouseoccupation, f.businessname, f.businessaddress, f.businesstelno, f.fathersurname, f.fatherfirstname, f.fathernameextension, f.fathermiddlename, f.mothermaindenname, f.motherfirstname, f.mothersnameextension, f.mothersmiddlename
		 FROM user as u
		 INNER JOIN personal_info as p ON p.UID = u.UID
		 INNER JOIN family_background as f ON f.UID = u.UID";
		
		if ($result = $conn->query($sql)) {
			$row = $result->fetch_assoc();
		}
		echo json_encode($row);
	break;
	
   }

   /*
   
      
         
            
             

              
             

                
             

                             
        

              

               

    
           
 
                    
            

                 
                     
                   
      
              case 'edit_announcement':          
                   $output='';
                    $date=date("Y-m-d");
                    $string_date = (string)$date;
                    $e_id = $_POST['e_id'];
                    $desc = $_POST['desc'];
                    $title = $_POST['title'];
                    $date_pub = $_POST['date_pub'];
                       $sql="UPDATE announcement SET TITLE = '".$title."', DESCRIPTION = '".$desc."', DATE_PUB = '".$date_pub."'  WHERE UID ='".$e_id."';";
                       $result=mysqli_query($conn,$sql);


                        $data = array(    
                       'confirm' =>"Edit Success!",
                                       
            
                    );

  echo json_encode($data);
                break;
          
          case 'archive_announcement':
                  $d_id = $_POST['d_id'];
                       $sql="UPDATE announcement SET isActive = '0' WHERE UID='".$d_id."';";
                       $result=mysqli_query($conn,$sql);


                        $data = array(    
                       'confirm' =>"Deleting Success!",
                                       
            
                    );

  echo json_encode($data);
                break;
  
                case 'retrieve_schools':
                  $d_id = $_POST['d_id'];
                       $sql="UPDATE schools SET isActive = '1' WHERE SID='".$d_id."';";
                       $result=mysqli_query($conn,$sql);


                        $data = array(    
                       'confirm' =>"Retrieve Success!",
                                       
            
                    );

                        echo json_encode($data);
                  break;

                  case 'fetch_schools_tbl':
                   $output='';
                               $sql = "SELECT * FROM schools WHERE isActive = '1'";
                    $query = $conn->query($sql);
                    while($row = $query->fetch_assoc()){
                      $output.= "
                        <tr>
                          <td>".$row['NO']."</td>
                          <td>".$row['SID']."</td>
                          <td>".$row['SCHOOL_NAME']."</td>
                          <td>".$row['SCHOOL_ADDRESS']."</td>

                          <td>
                            <button class='btn btn-success btn-sm edit btn-flat' data-id='".$row['SID']."'><i class='fa fa-edit'></i> Edit</button>
                            <button class='btn btn-danger btn-sm delete btn-flat' data-id='".$row['SID']."'><i class='fa fa-trash'></i> Archive</button>
                          </td>
                        </tr>
                      ";
                    }
                        $data = array(    
                       'schools' => $output
                                       
            
                    );

                        echo json_encode($data);
                    break;



   }

   */

 ?>