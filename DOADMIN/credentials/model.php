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
                                       <option data-uid=".$row['UID']."  value=".$row['UID'].">".$row['EMAIL']."</option>
                                  
                               
                        
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

              echo json_encode($datea);
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
    /*Add Schools */
     case 'add_schools':
                      $output='';
                     
                      $school_name = $_POST['school_name'];
                      $school_address = $_POST['school_address'];
                      
                      $sql=$conn->query("INSERT INTO schools(NO,SID,SCHOOL_NAME,SCHOOL_ADDRESS,isActive)VALUES('','SID-0004','".$school_name."','".$school_address."' , '1')");
                             $output='Successful inserted';

              

                    $data = array(    
                       'message' => $output
            
                       );

              echo json_encode($data);
            break;
            /* Edit Schools*/
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

            /*Edit Schools*/
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



              /*Archive Schools*/
                case 'archive_schools':
                  $d_id = $_POST['d_id'];
                       $sql="UPDATE schools SET isActive = '0' WHERE SID='".$d_id."';";
                       $result=mysqli_query($conn,$sql);


                        $data = array(    
                       'confirm' =>"Deleting Success!",
                                       
            
                    );

  echo json_encode($data);
                break;

                /* Edit Vacancy */
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
                       $sql="UPDATE publish_vacancy SET TITLE = '".$title."', DESCRIPTION = '".$desc."', NOI = '".$noi."', PLACE_ASSIGNMENT = '".$place."', STATUS = '".$status."', SALARIES = '".$salaries."', ITEM_NO = '".$itemno."', PUBLICATION_DATE_UNTIL = '".$expi_date."', isActive = '0' WHERE UID='".$edit_id."';";
                       $result=mysqli_query($conn,$sql);


                        $data = array(    
                       'message' =>"Edit Success!",

                                       
            
                    );

  echo json_encode($data);
                break;


                             /*Archive Vacancy*/ 
          case 'archive_vacancy':
                  $id = $_POST['id'];
                       $sql="UPDATE publish_vacancy SET isActive = '0' WHERE UID='".$id."';";
                       $result=mysqli_query($conn,$sql);


                        $data = array(    
                       'message' =>"Deleting Success!",
                                       
            
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

                /* GET NEWS ID*/
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

            /*  EDIT NEWS  */
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
 
                         /*   ARCHIVE NEWS*/
                case 'archive_news':
                  $d_id = $_POST['d_id'];
                       $sql="UPDATE news SET isActive = '0' WHERE UID='".$d_id."';";
                       $result=mysqli_query($conn,$sql);


                        $data = array(    
                       'confirm' =>"Deleting Success!",
                                       
            
                    );

  echo json_encode($data);
                break;

                    /* ADD ANNOUNCEMENTS */
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

                    /* GET ANNOUNCEMENT ID*/
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
                       'confirm' =>"Edit Success!",
                                       
            
                    );

  echo json_encode($data);
                break;
          /* ARCHIVE ANNOUNCEMENT */
          case 'archive_announcement':
                  $d_id = $_POST['d_id'];
                       $sql="UPDATE announcement SET isActive = '0' WHERE UID='".$d_id."';";
                       $result=mysqli_query($conn,$sql);


                        $data = array(    
                       'confirm' =>"Deleting Success!",
                                       
            
                    );

  echo json_encode($data);
                break;
        /*Retrieve Schools*/
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





    case 'set_appointment':
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


              
           $data = array(  
             'message' => $output          
           );
     echo json_encode($data);
      break;
     
   }

 ?>