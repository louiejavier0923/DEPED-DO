<?php
   include 'connection.php';
   include '../../include/session.php';
   
   use PHPMailer\PHPMailer\PHPMailer;
   use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
   require 'vendor/autoload.php';

   $mail = new PHPMailer(true);
	
   switch($_POST['action']){
	case 'update_pds_function':
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
		/* $pds_children = $_POST['childname'];
		$pds_childrenBdate = $_POST['childBDay'];
		
		$pds_CS = $_POST['CS'];
		$pds_CS_rating = $_POST['CS_rating'];
		$pds_CS_date = $_POST['CS_date'];
		$pds_CS_place = $_POST['CS_place'];
		$pds_CS_licenceNo = $_POST['CS_licenceNo'];
		$pds_CS_licenceDate   = $_POST['CS_licenceDate'];
		
		$pds_WE_FromDate = $_POST['WE_FromDate'];
		$pds_WE_ToDate = $_POST['WE_ToDate'];
		$pds_WE_PositionTitle = $_POST['WE_PositionTitle'];
		$pds_WE_Place = $_POST['WE_Place'];
		$pds_WE_MonthSalary = $_POST['WE_MonthSalary'];
		$pds_WE_Salary = $_POST['WE_Salary'];
		$pds_WE_AppointmentStatus = $_POST['WE_AppointmentStatus'];
		$pds_WE_GovService = $_POST['WE_GovService'];
		
		$pds_VW_Name_Address = $_POST['VW_Name_Address'];
		$pds_VW_FromDate = $_POST['VW_FromDate'];
		$pds_VW_Todate = $_POST['VW_Todate'];
		$pds_VW_NumbHours = $_POST['VW_NumbHours'];
		$pds_VW_Work = $_POST['VW_Work'];
		
		$pds_LaD_Title = $_POST['LaD_Title'];
		$pds_LaD_FromDate = $_POST['LaD_FromDate'];
		$pds_LaD_ToDate = $_POST['LaD_ToDate'];
		$pds_LaD_NumbHours = $_POST['LaD_NumbHours'];
		$pds_LaD_Type = $_POST['LaD_Type'];
		$pds_LaD_ConductBy = $_POST['LaD_ConductBy'];
		 */
		$output = '';
		$exe = '';
		$error = '';
		
		$sql="";
		/* for ($i = 0; $i < count($pds_children); $i++){
			echo $pds_children[$i];
		} */
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
	
	/* case 'add_user_with_pds_info_function':
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
		
		$output = '';
		$exe = '';
		$error = '';
		$generatedKey = sha1(mt_rand(10000,99999).time());
		$sql="SELECT * from user where EMAIL='".$pds_emailaddress."';";
           
		$result=mysqli_query($conn,$sql);
		
		if (!$result->num_rows > 0){
			$sql='';
			
			$sql .= " INSERT INTO `personal_info` (`UID`, `FIRSTNAME`, `LASTNAME`, `MIDDLENAME`, `EXTENSION_NAME`, `BIRTHDATE`, `BIRTHPLACE`, `GENDER`, `HEIGHT`, `WEIGHT`, `BLOOD_TYPE`, `CIVIL_STATUS`, `GSIS_ID_NO`, `PAG_IBIG_NO`, `PHILHEALTH_NO`, `SSS_NO`, `TIN_NO`, `AGENCY_EMPLOYEE_NO`, `CITIZENSHIP`, `RESIDENTIAL_LOTNO`, `RESIDENTIAL_STREET`, `RESIDENTIAL_SUBDIVISION`, `RESIDENTIAL_BARANGAY`, `RESIDENTIAL_MUNICIPALITY`, `RESIDENTIAL_PROVINCE`, `RESIDENTIAL_ZIP_CODE`, `PERMANENT_LOTNO`, `PERMANENT_STREET`, `PERMANENT_SUBDIVISION`, `PERMANENT_BARANGAY`, `PERMANENT_MUNICIPALITY`, `PERMANENT_PROVINCE`, `PERMANENT_ZIP_CODE`, `TELEPHONE_NO`, `MOBILE_NO`) VALUES ('". $user['UID'] ."', '$pds_firstname', '$pds_surname', '$pds_middlename', '$pds_nameextension', '$pds_dateofbirth', '$pds_placeofbirth', '$pds_gender', '$pds_height', '$pds_weight', '$pds_bloodtype', '$civil_status', '$pds_gsisno', '$pds_pagibigno', '$pds_philhealthno', '$pds_sssno', '$pds_tinno', '$pds_agencyemployee', '$pds_citizenship', '$pds_rhouseblk', '$pds_rstreet', '$pds_rsubdivision', '$pds_rbarangay', '$pds_rmunicipality', '$pds_rprovince', '$pds_rzipcode', '$pds_phouseblk', '$pds_pstreet', '$pds_psubdivision', '$pds_pbarangay', '$pds_pmunicipality', '$pds_pprovince', '$pds_pzipcode', '$pds_mobileno', '$pds_mobileno');";
			
			$sql .= " INSERT INTO `family_background` (`UID`, `spousesurname`, `spousefirstname`, `spousemiddlename`, `spousenameextension`, `spouseoccupation`, `businessname`, `businessaddress`, `businesstelno`, `fathersurname`, `fatherfirstname`, `fathernameextension`, `fathermiddlename`, `mothermaindenname`, `motherfirstname`, `mothersnameextension`, `mothersmiddlename`) VALUES ('". $user['UID'] ."', '$pds_spousesurname', '$pds_spousefirstname', '$pds_spousemiddlename', '$pds_spousenameextension', '$pds_spouseoccupation', '$pds_businessname', '$pds_businessaddress', '$pds_businesstelno', '$pds_fathersurname', '$pds_fatherfirstname', '$pds_fathernameextension', '$pds_fathermiddlename', '$pds_mothermaindenname', '$pds_motherfirstname', '$pds_mothersnameextension', '$pds_mothersmiddlename');";
			
			
			
			
			if ($conn->multi_query($sql)) {
				$exe = "success";
			$output = $sql;
			}
				
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
		
	
	
	break; */
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

   

 ?>