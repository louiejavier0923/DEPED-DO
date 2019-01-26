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
                   $sql = "SELECT * from user";
                    $query = $conn->query($sql);
                    while($row = $query->fetch_assoc()){
                    

                     
                      $output.="
                                  
                                <option value=".$row['UID'].">".$row['EMAIL']."</option>
                        
                      ";
                    }
                    $data = array(    
                       'message' => $output
            
                       );

              echo json_encode($output);
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
                                    $sql=$conn->query("INSERT INTO user(UID,EMAIL,PWD, STATUS, IS_ONLINE)VALUES('TCH-0006','".$email."','".$password."','1','0')");
                                      
                                    $output='successful inserted';
                                    
                                      
                               }
           

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

                            $sql=$conn->query("INSERT INTO  publish_vacancy(UID,TITLE,DESCRIPTION,PLACE_ASSIGNMENT,NOI,PUBLICATION_DATE,PUBLICATION_DATE_UNTIL,STATUS,SALARIES,ITEM_NO)VALUES('PID-0005','".$title."','".$description."','".$place."','".$noi."','".$date."','".$expiration."','".$status."','".$salaries."','".$itemno."')");
                             $output='Successful inserted';

   	       	        $data = array(	 	
                       'message' => $output
            
         	             );

              echo json_encode($data);
   	       	break;
 	 /*SELECTION*/
   	       	case 'get_user_id':
                   $output='';
                   $uid = $_POST['id'];
                    $sql="SELECT * from user where UID='".$uid."';";
                         $result=mysqli_query($conn,$sql);
                          if($result->num_rows > 0) 
                               {
                                      while($row = $result->fetch_assoc()) {
                                                  $email=$row["EMAIL"];
                                                  $password=$row["PWD"];
                                                  $status=$row["STATUS"];
                                                 switch ($status) {
                                                 	case '0':
                                                 		      $status='NOT ACTIVATE';
                                                 		break;
                                                 	
                                                 	default:
                                                 	           $status='ACTIVATE';
                                                 		break;
                                                 }
                                      }
                               }

                           else{
                                   
                                      
                                    $output='no available data';
                                    
                                      
                               }

   	       		   $data = array(	 	
                       'message' => $output,
                       'email'=>$email,
                       'password'=>$password,
                       'status'=>$status
            
         	             );

              echo json_encode($data);
   	       	break;
   	       	case 'get_vacancy_id':
                       $puid = $_POST['id'];
                              $sql="SELECT * from publish_vacancy where UID='".$puid."';";
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
                                                   $output="Successfully send";
                                          }
                                          else{
                                                  $output='successful inserted';
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
     
   }
 ?>