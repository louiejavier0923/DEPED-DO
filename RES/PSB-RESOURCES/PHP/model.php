<?php

include 'credentials.php';

// $_POST['action'] = 'get_applicant_list';

switch ($_POST['action']) {

	case 'login':
		
		$a = $_POST['a'];
		$b = $_POST['b'];
		$no = "";
		$sql = "SELECT NO FROM EVALUATORS_INFO_TBL WHERE EMAIL='$a' AND PASSWORD='$b' AND ISACTIVE='1';";
		$result = mysqli_query($conn,$sql);
        while($row = mysqli_fetch_assoc($result)){
        	$no = $row['NO'];
        }
        print_r($no);

	break;

	case 'get_evaluator_name':

		$a = $_POST['a'];
		$data = array();
		
		$sql = "SELECT NO,LASTNAME,FIRSTNAME,MIDDLENAME FROM EVALUATORS_INFO_TBL WHERE NO='$a';";
		$result = mysqli_query($conn,$sql);
		while ($row = mysqli_fetch_assoc($result)) {
			$data[0] = $row['NO'];
			$data[1] = $row['FIRSTNAME'].' '.substr($row['MIDDLENAME'],0,1).'. '.$row['LASTNAME'].' - PERSONNEL';
		}

		print_r(json_encode($data));

	break;

	case 'get_published_vacancy':

		$html = "";
		$sql = "SELECT UID,TITLE,PLACE_ASSIGNMENT FROM `publish_vacancy` WHERE PUBLICATION_DATE>CURRENT_DATE();";
		$result = mysqli_query($conn,$sql);

		while ($row = mysqli_fetch_assoc($result)) {
			$id = $row['UID'];
			$title = $row['TITLE'];
			$place = $row['PLACE_ASSIGNMENT'];

			$html .= "<option value='$id'>$id - $title @ $place</option>";
		}

		print_r($html);

	break;

	case 'get_applicant_list':

		$a = $_POST['a'];
		$b = $_POST['b'];

		$html = "";
		$cnt = 0;

		$sql = "SELECT p.UID,p.LASTNAME,p.FIRSTNAME,p.MIDDLENAME,p.EXTENSION_NAME,p.RESIDENTIAL_ADDRESS,p.MOBILE_NO,u.EMAIL,apv.EDUCATION,apv.EXPERIENCE,apv.ELIGIBILITY,apv.TRAINING,apv.INTERVIEW FROM application a JOIN personal_info p JOIN user u JOIN applicant_points_view apv ON p.UID=a.UID AND u.UID=p.UID AND a.PID=apv.PID AND p.UID=apv.UID WHERE a.PID='$a' AND (p.LASTNAME LIKE '%$b%' OR p.FIRSTNAME LIKE '%$b%' OR p.MIDDLENAME LIKE '%$b%' OR p.UID LIKE '%$b%' OR u.EMAIL LIKE '%$b%') ORDER BY a.DATE ASC;";
		$result = mysqli_query($conn,$sql);
		while ($row = mysqli_fetch_assoc($result)) {

			$cnt += 1;
			$id = $row['UID'];
			$name = $row['LASTNAME'].', '.$row['FIRSTNAME'].' '.$row['MIDDLENAME'];
			$address = $row['RESIDENTIAL_ADDRESS'];
			$mobile = $row['MOBILE_NO'];
			$email = $row['EMAIL'];
			$educ = $row['EDUCATION'];
			$exp = $row['EXPERIENCE'];
			$eligib = $row['ELIGIBILITY'];
			$train = $row['TRAINING'];
			$interview = $row['INTERVIEW'];
			
			$html .= "<section class= 'info-container'>
							<section class= 'content'>
								<p>$cnt</p>
								<p class='applicant-id'>$id</p>
							</section>
							<section class= 'content'>
								<p>$name</p>
							</section>
							<section class= 'content'>
								<p>$address</p>
							</section>
							<section class= 'content'>
								<p>$email</p>
							</section>
							<section class= 'content'>
								<input type= 'text' class='input-grade e-education' value='$educ'>
							</section>
							<section class= 'content'>
								<input type= 'text' class='input-grade e-experience' value='$exp'>
							</section>
							<section class= 'content'>
								<input type= 'text' class='input-grade e-let' value='$eligib'>
							</section>
							<section class= 'content'>
								<input type= 'text' class='input-grade e-training' value='$train'>
							</section>
							<section class= 'content'>
								<input type= 'text' class='input-grade e-interview' value='".number_format($interview, 2, '.', '')."'>
							</section>
							<section class= 'content'>
								<input type= 'text' class='input-grade e-demo'>
							</section>
							<section class= 'content'>
								<input type= 'text' class='input-grade e-communication'>
							</section>
							<section class= 'content'>
								<p></p>
							</section>
						</section>";

		}

		print_r($html);

	break;

	case 'insert_applicant_point':

		$a = $_POST['a'];
		$b = $_POST['b'];
		$c = $_POST['c'];
		$d = $_POST['d'];
		$e = $_POST['e'];

		$sql = "SELECT NO FROM applicants_points WHERE UID='$a' AND CRITERIA_CODE='$b' AND PID='$e' AND CRITERIA_CODE!='INTERVIEW';";
		$result = mysqli_query($conn,$sql);
		$rowcount=mysqli_num_rows($result);

		if ($rowcount!=1) {
			
			$sql = "INSERT INTO applicants_points(UID,PID,CRITERIA_CODE,EQUIVALENT_POINTS,GRADED_BY) VALUES ('$a','$e','$b','$c','$d');";
			$result = mysqli_query($conn,$sql);

		}
		print_r($result);

	break;

}

?>