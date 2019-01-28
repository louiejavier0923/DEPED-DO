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
		$sql = "SELECT p.UID,p.TITLE,s.SCHOOL_NAME FROM publish_vacancy p JOIN schools s ON p.PLACE_ASSIGNMENT=s.SID WHERE PUBLICATION_DATE>CURRENT_DATE();";
		$result = mysqli_query($conn,$sql);

		while ($row = mysqli_fetch_assoc($result)) {
			$id = $row['UID'];
			$title = $row['TITLE'];
			$place = $row['SCHOOL_NAME'];

			$html .= "<option value='$id'>$id - $title @ $place</option>";
		}

		print_r($html);

	break;

	case 'get_applicant_list':

		$a = $_POST['a'];
		$b = $_POST['b'];
		$c = $_POST['c'];

		$html = "";
		$cnt = 0;

		$sql = "SELECT p.UID,p.LASTNAME,p.FIRSTNAME,p.MIDDLENAME,p.EXTENSION_NAME,p.RESIDENTIAL_ADDRESS,p.MOBILE_NO,u.EMAIL,
			(SELECT ap.EQUIVALENT_POINTS FROM applicants_points ap WHERE ap.CRITERIA_CODE='EDUCATION' AND ap.UID=a.UID) AS 'EDUCATION',
			(SELECT ap.EQUIVALENT_POINTS FROM applicants_points ap WHERE ap.CRITERIA_CODE='EXPERIENCE' AND ap.UID=a.UID) AS 'EXPERIENCE',
			(SELECT ap.EQUIVALENT_POINTS FROM applicants_points ap WHERE ap.CRITERIA_CODE='ELIGIBILITY' AND ap.UID=a.UID) AS 'ELIGIBILITY',
			(SELECT ap.EQUIVALENT_POINTS FROM applicants_points ap WHERE ap.CRITERIA_CODE='TRAINING' AND ap.UID=a.UID) AS 'TRAINING',
			(SELECT ap.EQUIVALENT_POINTS FROM applicants_points ap WHERE ap.GRADED_BY='$c' AND ap.CRITERIA_CODE='INTERVIEW' AND ap.UID=a.UID) AS 'INTERVIEW',
			(SELECT ap.EQUIVALENT_POINTS FROM applicants_points ap WHERE ap.CRITERIA_CODE='DEMO' AND ap.UID=a.UID) AS 'DEMO',
			(SELECT ap.EQUIVALENT_POINTS FROM applicants_points ap WHERE ap.CRITERIA_CODE='COMMUNICATION' AND ap.UID=a.UID) AS 'COMMUNICATION',
			((SELECT SUM(EQUIVALENT_POINTS) from applicants_points ap where (ap.CRITERIA_CODE = 'INTERVIEW' AND ap.UID=a.UID)) / (SELECT COUNT(ap.NO) from applicants_points ap where (ap.CRITERIA_CODE = 'INTERVIEW' AND ap.UID=a.UID))) AS `INTERVIEW_AVG`,
			((SELECT ap.EQUIVALENT_POINTS FROM applicants_points ap WHERE ap.CRITERIA_CODE='EDUCATION' AND ap.UID=a.UID)+(SELECT ap.EQUIVALENT_POINTS FROM applicants_points ap WHERE ap.CRITERIA_CODE='EXPERIENCE' AND ap.UID=a.UID)+(SELECT ap.EQUIVALENT_POINTS FROM applicants_points ap WHERE ap.CRITERIA_CODE='ELIGIBILITY' AND ap.UID=a.UID)+(SELECT ap.EQUIVALENT_POINTS FROM applicants_points ap WHERE ap.CRITERIA_CODE='TRAINING' AND ap.UID=a.UID)+(SELECT ap.EQUIVALENT_POINTS FROM applicants_points ap WHERE ap.CRITERIA_CODE='DEMO' AND ap.UID=a.UID)+(SELECT ap.EQUIVALENT_POINTS FROM applicants_points ap WHERE ap.CRITERIA_CODE='COMMUNICATION' AND ap.UID=a.UID)+((SELECT SUM(EQUIVALENT_POINTS) from applicants_points ap where (ap.CRITERIA_CODE = 'INTERVIEW' AND ap.UID=a.UID)) / (SELECT COUNT(ap.NO) from applicants_points ap where (ap.CRITERIA_CODE = 'INTERVIEW' AND ap.UID=a.UID)))) AS 'TOTALPOINTS'
			FROM application a JOIN personal_info p JOIN user u ON p.UID=a.UID AND u.UID=p.UID WHERE a.PID='$a' AND (p.LASTNAME LIKE '%$b%' OR p.FIRSTNAME LIKE '%$b%' OR p.MIDDLENAME LIKE '%$b%' OR p.UID LIKE '%$b%' OR u.EMAIL LIKE '%$b%') ORDER BY TOTALPOINTS DESC;";

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
			$demo = $row['DEMO'];
			$comm = $row['COMMUNICATION'];
			$total_score = $row['TOTALPOINTS'];
			if ($total_score==0) {
				$rem = "-";
			}
			else{
				$rem = number_format($total_score, 2, '.','');
			}
			
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
								<input type= 'text' name='EDUCATION' class='input-grade e-education' value='$educ'>
							</section>
							<section class= 'content'>
								<input type= 'text' name='EXPERIENCE' class='input-grade e-experience' value='$exp'>
							</section>
							<section class= 'content'>
								<input type= 'text' name='ELIGIBILITY' class='input-grade e-let' value='$eligib'>
							</section>
							<section class= 'content'>
								<input type= 'text' name='TRAINING' class='input-grade e-training' value='$train'>
							</section>
							<section class= 'content'>
								<input type= 'text' name='INTERVIEW' class='input-grade e-interview' value='$interview'>
							</section>
							<section class= 'content'>
								<input type= 'text' name='DEMO' class='input-grade e-demo' value='$demo'>
							</section>
							<section class= 'content'>
								<input type= 'text' name='COMMUNICATION' class='input-grade e-communication' value='$comm'>
							</section>
							<section class= 'content'>
								<p>".$rem."</p>
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
		$f = $_POST['val'];

		$sql = "SELECT NO FROM applicants_points WHERE UID='$a' AND CRITERIA_CODE='$b' AND PID='$e' AND CRITERIA_CODE!='INTERVIEW';";
		$result = mysqli_query($conn,$sql);
		$rowcount=mysqli_num_rows($result);

		if ($rowcount!=1) {
			
			$sql = "INSERT INTO applicants_points(UID,PID,CRITERIA_CODE,EQUIVALENT_POINTS,GRADED_BY,VALUE) VALUES ('$a','$e','$b','$c','$d','$f');";
			$result = mysqli_query($conn,$sql);

		}
		else{

			$sql = "UPDATE applicants_points SET EQUIVALENT_POINTS='$c',VALUE='$f' WHERE UID='$a' AND PID='$e' AND CRITERIA_CODE='$b' AND GRADED_BY='$d';";
			$result = mysqli_query($conn,$sql);

		}
		print_r($result);

	break;


	// testing ------------------------------------------------------------------------------------

	case 'get_applicant_list-test':

		$a = $_POST['a'];
		$b = $_POST['b'];
		$c = $_POST['c'];

		$html = "";
		$cnt = 0;

		$sql = "SELECT p.UID,p.LASTNAME,p.FIRSTNAME,p.MIDDLENAME,p.EXTENSION_NAME,p.RESIDENTIAL_ADDRESS,p.MOBILE_NO,u.EMAIL,
			(SELECT ap.EQUIVALENT_POINTS FROM applicants_points ap WHERE ap.CRITERIA_CODE='EDUCATION' AND ap.UID=a.UID) AS 'EDUCATION',
			(SELECT ap.VALUE FROM applicants_points ap WHERE ap.CRITERIA_CODE='EDUCATION' AND ap.UID=a.UID) AS 'EDUCATION_GWA',
			(SELECT ap.EQUIVALENT_POINTS FROM applicants_points ap WHERE ap.CRITERIA_CODE='EXPERIENCE' AND ap.UID=a.UID) AS 'EXPERIENCE',
			(SELECT ap.EQUIVALENT_POINTS FROM applicants_points ap WHERE ap.CRITERIA_CODE='ELIGIBILITY' AND ap.UID=a.UID) AS 'ELIGIBILITY',
			(SELECT ap.EQUIVALENT_POINTS FROM applicants_points ap WHERE ap.CRITERIA_CODE='TRAINING' AND ap.UID=a.UID) AS 'TRAINING',
			(SELECT ap.EQUIVALENT_POINTS FROM applicants_points ap WHERE ap.GRADED_BY='$c' AND ap.CRITERIA_CODE='INTERVIEW' AND ap.UID=a.UID) AS 'INTERVIEW',
			(SELECT ap.EQUIVALENT_POINTS FROM applicants_points ap WHERE ap.CRITERIA_CODE='DEMO' AND ap.UID=a.UID) AS 'DEMO',
			(SELECT ap.EQUIVALENT_POINTS FROM applicants_points ap WHERE ap.CRITERIA_CODE='COMMUNICATION' AND ap.UID=a.UID) AS 'COMMUNICATION',
			((SELECT SUM(EQUIVALENT_POINTS) from applicants_points ap where (ap.CRITERIA_CODE = 'INTERVIEW' AND ap.UID=a.UID)) / (SELECT COUNT(ap.NO) from applicants_points ap where (ap.CRITERIA_CODE = 'INTERVIEW' AND ap.UID=a.UID))) AS `INTERVIEW_AVG`,
			((SELECT ap.EQUIVALENT_POINTS FROM applicants_points ap WHERE ap.CRITERIA_CODE='EDUCATION' AND ap.UID=a.UID)+(SELECT ap.EQUIVALENT_POINTS FROM applicants_points ap WHERE ap.CRITERIA_CODE='EXPERIENCE' AND ap.UID=a.UID)+(SELECT ap.EQUIVALENT_POINTS FROM applicants_points ap WHERE ap.CRITERIA_CODE='ELIGIBILITY' AND ap.UID=a.UID)+(SELECT ap.EQUIVALENT_POINTS FROM applicants_points ap WHERE ap.CRITERIA_CODE='TRAINING' AND ap.UID=a.UID)+(SELECT ap.EQUIVALENT_POINTS FROM applicants_points ap WHERE ap.CRITERIA_CODE='DEMO' AND ap.UID=a.UID)+(SELECT ap.EQUIVALENT_POINTS FROM applicants_points ap WHERE ap.CRITERIA_CODE='COMMUNICATION' AND ap.UID=a.UID)+((SELECT SUM(EQUIVALENT_POINTS) from applicants_points ap where (ap.CRITERIA_CODE = 'INTERVIEW' AND ap.UID=a.UID)) / (SELECT COUNT(ap.NO) from applicants_points ap where (ap.CRITERIA_CODE = 'INTERVIEW' AND ap.UID=a.UID)))) AS 'TOTALPOINTS'
			FROM application a JOIN personal_info p JOIN user u ON p.UID=a.UID AND u.UID=p.UID WHERE a.PID='$a' AND (p.LASTNAME LIKE '%$b%' OR p.FIRSTNAME LIKE '%$b%' OR p.MIDDLENAME LIKE '%$b%' OR p.UID LIKE '%$b%' OR u.EMAIL LIKE '%$b%') ORDER BY TOTALPOINTS DESC;";

		$result = mysqli_query($conn,$sql);
		while ($row = mysqli_fetch_assoc($result)) {

			$cnt += 1;
			$id = $row['UID'];
			$name = $row['LASTNAME'].', '.$row['FIRSTNAME'].' '.$row['MIDDLENAME'];
			$address = $row['RESIDENTIAL_ADDRESS'];
			$mobile = $row['MOBILE_NO'];
			$email = $row['EMAIL'];
			$educ = $row['EDUCATION'];
			$gwa = $row['EDUCATION_GWA'];
			$points = split(',', $gwa);
			$exp = $row['EXPERIENCE'];
			$eligib = $row['ELIGIBILITY'];
			$train = $row['TRAINING'];
			$interview = $row['INTERVIEW'];
			$demo = $row['DEMO'];
			$comm = $row['COMMUNICATION'];
			$total_score = $row['TOTALPOINTS'];

			if ($total_score==0) {
				$rem = "-";
			}
			else{
				$rem = number_format($total_score, 2, '.','');
			}

			if ($points[1]==2) {
				$checkbox_html = "
					<div class='ewc-grid-input'>
						<input type='checkbox' class='checkbox-master' name='master'/>&nbsp;&nbsp;With MA or MS degree
					</div>
					<div class='ewc-grid-input'>
						<input type='checkbox' class='checkbox-doctor' name='doctor' checked='true'/>&nbsp;&nbsp;With Master or Doctors(PhD) degree
					</div>";
			}
			else{
				$checkbox_html = "
					<div class='ewc-grid-input'>
						<input type='checkbox' class='checkbox-master' name='master' checked='true'/>&nbsp;&nbsp;With MA or MS degree
					</div>
					<div class='ewc-grid-input'>
						<input type='checkbox' class='checkbox-doctor' name='doctor'/>&nbsp;&nbsp;With Master or Doctors(PhD) degree
					</div>";
			}
			
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
							<section class= 'content center-pos'>
								<div class='eval-out'>
									<button class='eval-out-editbtn'>Edit</button>
									<div class='eval-out-value'>$educ</div>
								</div>
								<div class='educ-window'>
									<div class='educ-window-content'>
										<div class='ewc-grid'>
											$checkbox_html
										</div>
										<div class='ewc-grid2'>
											<input type='number' class='input-gwa' placeholder='Enter GWA' value='$points[0]'>
											<div class='ewc-grid2-col'>
												<p class='applicant-id'>$id</p>
												<button class='ee-cancel'>Cancel</button>
												<button class='ee-save'>Save</button>
											</div>
										</div>
									</div>
								</div>
							</section>
							<section class= 'content'>
								<input type= 'text' name='EXPERIENCE' class='input-grade e-experience' value='$exp'>
							</section>
							<section class= 'content'>
								<input type= 'text' name='ELIGIBILITY' class='input-grade e-let' value='$eligib'>
							</section>
							<section class= 'content'>
								<input type= 'text' name='TRAINING' class='input-grade e-training' value='$train'>
							</section>
							<section class= 'content'>
								<input type= 'text' name='INTERVIEW' class='input-grade e-interview' value='$interview'>
							</section>
							<section class= 'content'>
								<input type= 'text' name='DEMO' class='input-grade e-demo' value='$demo'>
							</section>
							<section class= 'content'>
								<input type= 'text' name='COMMUNICATION' class='input-grade e-communication' value='$comm'>
							</section>
							<section class= 'content'>
								<p>".$rem."</p>
							</section>
						</section>";

		}

		// print_r($points);
		print_r($html);

	break;


}

?>