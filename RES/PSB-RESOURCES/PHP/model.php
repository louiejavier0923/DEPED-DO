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
			$data[1] = $row['FIRSTNAME'].' '.substr($row['MIDDLENAME'],0,1).'. '.$row['LASTNAME'].' - PERSONNEL SELECTION BOARD';
		}

		print_r(json_encode($data));

	break;

	case 'get_published_vacancy':

		$html = "";
		$sql = "SELECT p.UID,p.TITLE,s.SCHOOL_NAME FROM publish_vacancy p JOIN schools s ON p.PLACE_ASSIGNMENT=s.SID WHERE PUBLICATION_DATE_UNTIL>CURRENT_DATE();";
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

		$sql = "SELECT p.UID,p.LASTNAME,p.FIRSTNAME,p.MIDDLENAME,p.EXTENSION_NAME,p.RESIDENTIAL_LOTNO,p.RESIDENTIAL_STREET,p.RESIDENTIAL_SUBDIVISION,p.RESIDENTIAL_BARANGAY,p.RESIDENTIAL_MUNICIPALITY,p.RESIDENTIAL_PROVINCE,p.MOBILE_NO,u.EMAIL,
		(SELECT ap.EQUIVALENT_POINTS FROM applicants_points ap WHERE ap.CRITERIA_CODE='EDUCATION' AND ap.UID=a.UID) AS 'EDUCATION',
		(SELECT ap.VALUE FROM applicants_points ap WHERE ap.CRITERIA_CODE='EDUCATION' AND ap.UID=a.UID) AS 'EDUCATION_GWA',
		(SELECT ap.EQUIVALENT_POINTS FROM applicants_points ap WHERE ap.CRITERIA_CODE='EXPERIENCE' AND ap.UID=a.UID) AS 'EXPERIENCE',
		(SELECT ap.VALUE FROM applicants_points ap WHERE ap.CRITERIA_CODE='EXPERIENCE' AND ap.UID=a.UID) AS 'EXPERIENCE_VALUE',
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
			$address = $row['RESIDENTIAL_LOTNO'].' '.$row['RESIDENTIAL_STREET'].', '.$row['RESIDENTIAL_SUBDIVISION'].', '.$row['RESIDENTIAL_BARANGAY'].', '.$row['RESIDENTIAL_MUNICIPALITY'].', '.$row['RESIDENTIAL_PROVINCE'];
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
			
			$sql = "INSERT INTO applicants_points(UID,PID,CRITERIA_CODE,EQUIVALENT_POINTS,GRADED_BY,`VALUE`) VALUES ('$a','$e','$b','$c','$d','$f');";
			$result = mysqli_query($conn,$sql);

		}
		else{

			$sql = "UPDATE applicants_points SET EQUIVALENT_POINTS='$c',`VALUE`='$f' WHERE UID='$a' AND PID='$e' AND CRITERIA_CODE='$b' AND GRADED_BY='$d';";
			$result = mysqli_query($conn,$sql);

		}
		print_r($result);

	break;

	case 'insert_applicant_point_interview':

		$a = $_POST['a'];
		$b = $_POST['b'];
		$c = $_POST['c'];
		$d = $_POST['d'];
		$e = $_POST['e'];
		$f = $_POST['val'];

		$sql = "SELECT NO FROM applicants_points WHERE UID='$a' AND CRITERIA_CODE='$b' AND PID='$e' AND GRADED_BY='$d';";
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

		$sql = "SELECT p.UID,p.LASTNAME,p.FIRSTNAME,p.MIDDLENAME,p.EXTENSION_NAME,p.RESIDENTIAL_LOTNO,p.RESIDENTIAL_STREET,p.RESIDENTIAL_SUBDIVISION,p.RESIDENTIAL_BARANGAY,p.RESIDENTIAL_MUNICIPALITY,p.RESIDENTIAL_PROVINCE,p.MOBILE_NO,u.EMAIL,
			(SELECT ap.EQUIVALENT_POINTS FROM applicants_points ap WHERE ap.CRITERIA_CODE='EDUCATION' AND ap.UID=a.UID) AS 'EDUCATION',
			(SELECT ap.VALUE FROM applicants_points ap WHERE ap.CRITERIA_CODE='EDUCATION' AND ap.UID=a.UID) AS 'EDUCATION_GWA',
			(SELECT ap.GRADED_BY FROM applicants_points ap WHERE ap.CRITERIA_CODE='EDUCATION' AND ap.UID=a.UID) AS 'EDUCATION_GB',
			(SELECT ap.EQUIVALENT_POINTS FROM applicants_points ap WHERE ap.CRITERIA_CODE='EXPERIENCE' AND ap.UID=a.UID) AS 'EXPERIENCE',
			(SELECT ap.VALUE FROM applicants_points ap WHERE ap.CRITERIA_CODE='EXPERIENCE' AND ap.UID=a.UID) AS 'EXPERIENCE_VALUE',
			(SELECT ap.GRADED_BY FROM applicants_points ap WHERE ap.CRITERIA_CODE='EXPERIENCE' AND ap.UID=a.UID) AS 'EXPERIENCE_GB',
			(SELECT ap.EQUIVALENT_POINTS FROM applicants_points ap WHERE ap.CRITERIA_CODE='ELIGIBILITY' AND ap.UID=a.UID) AS 'ELIGIBILITY',
			(SELECT ap.VALUE FROM applicants_points ap WHERE ap.CRITERIA_CODE='ELIGIBILITY' AND ap.UID=a.UID) AS 'ELIGIBILITY_VALUE',
			(SELECT ap.GRADED_BY FROM applicants_points ap WHERE ap.CRITERIA_CODE='ELIGIBILITY' AND ap.UID=a.UID) AS 'ELIGIBILITY_GB',
			(SELECT ap.EQUIVALENT_POINTS FROM applicants_points ap WHERE ap.CRITERIA_CODE='TRAINING' AND ap.UID=a.UID) AS 'TRAINING',
			(SELECT ap.GRADED_BY FROM applicants_points ap WHERE ap.CRITERIA_CODE='TRAINING' AND ap.UID=a.UID) AS 'TRAINING_GB',
			(SELECT ap.EQUIVALENT_POINTS FROM applicants_points ap WHERE ap.GRADED_BY='$c' AND ap.CRITERIA_CODE='INTERVIEW' AND ap.UID=a.UID) AS 'INTERVIEW',
			(SELECT ap.VALUE FROM applicants_points ap WHERE ap.GRADED_BY='$c' AND ap.CRITERIA_CODE='INTERVIEW' AND ap.UID=a.UID) AS 'INTERVIEW_VALUE',
			(SELECT ap.EQUIVALENT_POINTS FROM applicants_points ap WHERE ap.CRITERIA_CODE='DEMO' AND ap.UID=a.UID) AS 'DEMO',
			(SELECT ap.VALUE FROM applicants_points ap WHERE ap.CRITERIA_CODE='DEMO' AND ap.UID=a.UID) AS 'DEMO_VALUE',
			(SELECT ap.GRADED_BY FROM applicants_points ap WHERE ap.CRITERIA_CODE='DEMO' AND ap.UID=a.UID) AS 'DEMO_GB',
			(SELECT ap.EQUIVALENT_POINTS FROM applicants_points ap WHERE ap.CRITERIA_CODE='COMMUNICATION' AND ap.UID=a.UID) AS 'COMMUNICATION',
			(SELECT ap.VALUE FROM applicants_points ap WHERE ap.CRITERIA_CODE='COMMUNICATION' AND ap.UID=a.UID) AS 'COMMUNICATION_VALUE',
			(SELECT ap.GRADED_BY FROM applicants_points ap WHERE ap.CRITERIA_CODE='COMMUNICATION' AND ap.UID=a.UID) AS 'COMMUNICATION_GB',
			((SELECT SUM(EQUIVALENT_POINTS) from applicants_points ap where (ap.CRITERIA_CODE = 'INTERVIEW' AND ap.UID=a.UID)) / (SELECT COUNT(ap.NO) from applicants_points ap where (ap.CRITERIA_CODE = 'INTERVIEW' AND ap.UID=a.UID))) AS `INTERVIEW_AVG`,
			((SELECT ap.EQUIVALENT_POINTS FROM applicants_points ap WHERE ap.CRITERIA_CODE='EDUCATION' AND ap.UID=a.UID)+(SELECT ap.EQUIVALENT_POINTS FROM applicants_points ap WHERE ap.CRITERIA_CODE='EXPERIENCE' AND ap.UID=a.UID)+(SELECT ap.EQUIVALENT_POINTS FROM applicants_points ap WHERE ap.CRITERIA_CODE='ELIGIBILITY' AND ap.UID=a.UID)+(SELECT ap.EQUIVALENT_POINTS FROM applicants_points ap WHERE ap.CRITERIA_CODE='TRAINING' AND ap.UID=a.UID)+(SELECT ap.EQUIVALENT_POINTS FROM applicants_points ap WHERE ap.CRITERIA_CODE='DEMO' AND ap.UID=a.UID)+(SELECT ap.EQUIVALENT_POINTS FROM applicants_points ap WHERE ap.CRITERIA_CODE='COMMUNICATION' AND ap.UID=a.UID)+((SELECT SUM(EQUIVALENT_POINTS) from applicants_points ap where (ap.CRITERIA_CODE = 'INTERVIEW' AND ap.UID=a.UID)) / (SELECT COUNT(ap.NO) from applicants_points ap where (ap.CRITERIA_CODE = 'INTERVIEW' AND ap.UID=a.UID)))) AS 'TOTALPOINTS'
			FROM application a JOIN personal_info p JOIN user u ON p.UID=a.UID AND u.UID=p.UID WHERE a.PID='$a' AND (p.LASTNAME LIKE '%$b%' OR p.FIRSTNAME LIKE '%$b%' OR p.MIDDLENAME LIKE '%$b%' OR p.UID LIKE '%$b%' OR u.EMAIL LIKE '%$b%') ORDER BY TOTALPOINTS DESC;";

		$result = mysqli_query($conn,$sql);
		while ($row = mysqli_fetch_assoc($result)) {

			$cnt += 1;
			$id = $row['UID'];
			$name = $row['LASTNAME'].', '.$row['FIRSTNAME'].' '.$row['MIDDLENAME'];
			$address = $row['RESIDENTIAL_LOTNO'].' '.$row['RESIDENTIAL_STREET'].', '.$row['RESIDENTIAL_SUBDIVISION'].', '.$row['RESIDENTIAL_BARANGAY'].', '.$row['RESIDENTIAL_MUNICIPALITY'].', '.$row['RESIDENTIAL_PROVINCE'];
			$mobile = $row['MOBILE_NO'];
			$email = $row['EMAIL'];
			$educ = $row['EDUCATION'];
			$gwa = $row['EDUCATION_GWA'];
			$educ_gb = $row['EDUCATION_GB'];
			$points = ',';
			$exp = $row['EXPERIENCE'];
			$exp_gb = $row['EXPERIENCE_GB'];
			$exp_point = split(',',',');
			$eligib = $row['ELIGIBILITY'];
			$eligib_gb = $row['ELIGIBILITY_GB'];
			$elg_point = split(',', ',');
			$train = $row['TRAINING'];
			$train_gb = $row['TRAINING_GB'];
			$interview = $row['INTERVIEW'];
			$interview_val = $row['INTERVIEW_VALUE'];
			$demo = $row['DEMO'];
			$demo_val = $row['DEMO_VALUE'];
			$demo_gb = $row['DEMO_GB'];
			$comm = $row['COMMUNICATION'];
			$comm_val = $row['COMMUNICATION_VALUE'];
			$comm_gb = $row['COMMUNICATION_GB'];
			$total_score = $row['TOTALPOINTS'];

			$points = split(',', ',');
			if($gwa!=""){
				$points = split(',', $gwa);
			}

			if ($total_score==0) {
				$rem = "-";
			}
			else{
				$rem = number_format($total_score, 2, '.','');
			}

			if($row['EXPERIENCE_VALUE']!=""){
				$exp_point = split(',',$row['EXPERIENCE_VALUE']);
			}
			if($row['EDUCATION_GWA']!=""){
				$points = split(',', $gwa);
			}
			if($row['ELIGIBILITY_VALUE']!=""){
				$elg_point = split(',', $row['ELIGIBILITY_VALUE']);
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
			else if($points[1]==1){
				$checkbox_html = "
					<div class='ewc-grid-input'>
						<input type='checkbox' class='checkbox-master' name='master' checked='true'/>&nbsp;&nbsp;With MA or MS degree
					</div>
					<div class='ewc-grid-input'>
						<input type='checkbox' class='checkbox-doctor' name='doctor'/>&nbsp;&nbsp;With Master or Doctors(PhD) degree
					</div>";
			}
			else{
				$checkbox_html = "
					<div class='ewc-grid-input'>
						<input type='checkbox' class='checkbox-master' name='master'/>&nbsp;&nbsp;With MA or MS degree
					</div>
					<div class='ewc-grid-input'>
						<input type='checkbox' class='checkbox-doctor' name='doctor'/>&nbsp;&nbsp;With Master or Doctors(PhD) degree
					</div>";
			}

			switch($elg_point[1]){
				case '':
					$radio_elg = "<div class='ewc-grid-input'>
									<input type='radio' class='exam-rater' value='LET' name='exam-rater$cnt' />&nbsp;&nbsp;LET
								</div>
								<div class='ewc-grid-input'>
									<input type='radio' class='exam-rater' value='PBET' name='exam-rater$cnt' />&nbsp;&nbsp;PBET
								</div>";
				break;
				case 'LET':
					$radio_elg = "<div class='ewc-grid-input'>
									<input type='radio' class='exam-rater' value='LET' name='exam-rater$cnt' checked/>&nbsp;&nbsp;LET
								</div>
								<div class='ewc-grid-input'>
									<input type='radio' class='exam-rater' value='PBET' name='exam-rater$cnt' />&nbsp;&nbsp;PBET
								</div>";
				break;
				case 'PBET':
					$radio_elg = "<div class='ewc-grid-input'>
									<input type='radio' class='exam-rater' value='LET' name='exam-rater$cnt' />&nbsp;&nbsp;LET
								</div>
								<div class='ewc-grid-input'>
									<input type='radio' class='exam-rater' value='PBET' name='exam-rater$cnt' checked/>&nbsp;&nbsp;PBET
								</div>";
				break;
			}

			switch($exp_point[1]){
				case '':
					$exp_options="
						<option value='0' selected>Choose Options</option>
						<option value='1'>Less than 2 years experience</option>
						<option value='2'>2 to less than 5 years experience</option>
						<option value='3'>5 or more years experience</option>
					";
				break;
				case '0':
					$exp_options="
						<option value='0' selected>Choose Options</option>
						<option value='1'>Less than 2 years experience</option>
						<option value='2'>2 to less than 5 years experience</option>
						<option value='3'>5 or more years experience</option>
					";
				break;
				case '1':
					$exp_options="
						<option value='0'>Choose Options</option>
						<option value='1' selected>Less than 2 years experience</option>
						<option value='2'>2 to less than 5 years experience</option>
						<option value='3'>5 or more years experience</option>
					";
				break;
				case '2':
					$exp_options="
						<option value='0'>Choose Options</option>
						<option value='1'>Less than 2 years experience</option>
						<option value='2' selected>2 to less than 5 years experience</option>
						<option value='3'>5 or more years experience</option>
					";
				break;
				case '3':
					$exp_options="
						<option value='0'>Choose Options</option>
						<option value='1' selected>Less than 2 years experience</option>
						<option value='2'>2 to less than 5 years experience</option>
						<option value='3' selected>5 or more years experience</option>
					";
				break;
			}

			// education
			$educ_html = "";
			if($educ_gb==$c||$educ_gb==null){
				$educ_html = "<div class='eval-out'>
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
				</div>";
			}
			else{
				$educ_html = "<p style='text-align:center !important;'>$educ</p>";
			}

			// experience
			$exp_html = "";
			if($exp_gb==$c||$exp_gb==null){
				$exp_html = "<div class='eval-out'>
					<button class='eval-out-editbtn'>Edit</button>
					<div class='eval-out-value'>$exp</div>
				</div>
				<div class='educ-window exp-window'>
					<div class='educ-window-content'>
						<div class='educ-window-content-form'>
							<input type='number' value='$exp_point[0]' class='experience-months' placeholder='Teaching experience(in months)'/>
							<label>Enter number of months</label>
						</div>
						<div class='educ-window-content-form' style='padding: 14px 0px 8px 0px;'>
							<select class='select-kvtlgu'>
								$exp_options	
							</select>
							<label style='top: 0px;'>KVT and LGU-funded teacher(75-100)</label>
						</div>
						<div class='ewc-grid2-col exp-btns'>
							<p class='applicant-id'>$id</p>
							<button class='ex-cancel'>Cancel</button>
							<button class='ex-save'>Save</button>
						</div>
					</div>
				</div>";
			}
			else{
				$exp_html = "<p style='text-align:center !important;'>$exp</p>";
			}

			// eligibility
			$eligib_html = "";
			if($eligib_gb==$c||$eligib_gb==null){
				$eligib_html = "<div class='eval-out'>
					<button class='eval-out-editbtn'>Edit</button>
					<div class='eval-out-value'>$eligib</div>
				</div>
				<div class='educ-window eligib-window'>
					<div class='educ-window-content'>
						<div class='ewc-grid elig-grid'>
							$radio_elg
						</div>
						<div class='educ-window-content-form' style='padding: 12px 0px;'>
							<input type='number' value='$elg_point[0]' class='eligibility-rating' placeholder='Enter rating'/>
							<label style='top: -2px;'>Exam Rating(75-100)</label>
						</div>
						<div class='ewc-grid2-col exp-btns'>
							<p class='applicant-id'>$id</p>
							<button class='el-cancel'>Cancel</button>
							<button class='el-save'>Save</button>
						</div>
					</div>
				</div>";
			}
			else{
				$eligib_html = "<p style='text-align:center !important;'>$eligib</p>";
			}

			// training
			$train_html = "";
			if($train_gb==$c||$train_gb==null){
				$train_html = "<input type= 'text' name='TRAINING' class='input-grade' value='$train'>";
			}
			else{
				$train_html = "<input type= 'text' name='TRAINING' class='input-grade' value='$train' disabled>";
			}

			// demo teaching
			$demo_html = "";
			if($demo_gb==$c||$demo_gb==null){
				$demo_html = "<div class='eval-out'>
					<button class='eval-out-editbtn'>Edit</button>
					<div class='eval-out-value'>$demo</div>
				</div>
				<div class='educ-window eligib-window'>
					<div class='educ-window-content'>
						<div class='educ-window-content-form'>
							<input type='number' value='$demo_val' class='demo-rating' placeholder='Enter total points'/>
							<label>1-60</label>
						</div>
						<div class='ewc-grid2-col exp-btns'>
							<p class='applicant-id'>$id</p>
							<button class='el-cancel'>Cancel</button>
							<button class='ed-save'>Save</button>
						</div>
					</div>
				</div>";
			}
			else{
				$demo_html = "<p style='text-align:center !important;'>$demo</p>";
			}

			// english communication skills
			$comm_html = "";
			if($comm_gb==$c||$comm_gb==null){
				$comm_html = "<div class='eval-out'>
					<button class='eval-out-editbtn'>Edit</button>
					<div class='eval-out-value'>$comm</div>
				</div>
				<div class='educ-window eligib-window'>
					<div class='educ-window-content'>
						<div class='educ-window-content-form'>
							<input type='number' value='$comm_val' class='comm-rating' placeholder='Enter percentage'/>
							<label>1-100</label>
						</div>
						<div class='ewc-grid2-col exp-btns'>
							<p class='applicant-id'>$id</p>
							<button class='el-cancel'>Cancel</button>
							<button class='ec-save'>Save</button>
						</div>
					</div>
				</div>";
			}
			else{
				$comm_html = "<p style='text-align:center !important;'>$comm</p>";
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
							<section class= 'content center-pos e-education'>
								$educ_html
							</section>
							<section class= 'content center-pos e-experience'>
								$exp_html
							</section>
							<section class= 'content center-pos e-let'>
								$eligib_html
							</section>
							<section class= 'content e-training'>
								$train_html
							</section>
							<section class= 'content center-pos e-interview'>
								<div class='eval-out'>
									<button class='eval-out-editbtn'>Edit</button>
									<div class='eval-out-value'>$interview</div>
								</div>
								<div class='educ-window eligib-window'>
									<div class='educ-window-content'>
										<div class='educ-window-content-form'>
											<input type='number' value='$interview_val' class='interview-rating' placeholder='Enter total points'/>
											<label>1-15</label>
										</div>
										<div class='ewc-grid2-col exp-btns'>
											<p class='applicant-id'>$id</p>
											<button class='el-cancel'>Cancel</button>
											<button class='ei-save'>Save</button>
										</div>
									</div>
								</div>
							</section>
							<section class= 'content center-pos e-demoteaching'>
								$demo_html
							</section>
							<section class= 'content center-pos e-communication'>
								$comm_html
							</section>
							<section class= 'content'>
								<p>".$rem."</p>
							</section>
						</section>";

		}

		// print_r($points);
		print_r($html);

	break;


	case 'select-applicant-recalibrate':

		$pid = $_POST['pid'];

		$arrPoint = [];

		$sql="SELECT p.UID,p.LASTNAME,p.FIRSTNAME,p.MIDDLENAME,p.EXTENSION_NAME,p.RESIDENTIAL_LOTNO,p.RESIDENTIAL_STREET,p.RESIDENTIAL_SUBDIVISION,p.RESIDENTIAL_BARANGAY,p.RESIDENTIAL_MUNICIPALITY,p.RESIDENTIAL_PROVINCE,p.MOBILE_NO,u.EMAIL,
		(SELECT ap.EQUIVALENT_POINTS FROM applicants_points ap WHERE ap.CRITERIA_CODE='EDUCATION' AND ap.UID=a.UID) AS 'EDUCATION',
		(SELECT ap.VALUE FROM applicants_points ap WHERE ap.CRITERIA_CODE='EDUCATION' AND ap.UID=a.UID) AS 'EDUCATION_GWA',
		(SELECT ap.EQUIVALENT_POINTS FROM applicants_points ap WHERE ap.CRITERIA_CODE='EXPERIENCE' AND ap.UID=a.UID) AS 'EXPERIENCE',
		(SELECT ap.EQUIVALENT_POINTS FROM applicants_points ap WHERE ap.CRITERIA_CODE='ELIGIBILITY' AND ap.UID=a.UID) AS 'ELIGIBILITY',
		(SELECT ap.EQUIVALENT_POINTS FROM applicants_points ap WHERE ap.CRITERIA_CODE='TRAINING' AND ap.UID=a.UID) AS 'TRAINING',
		(SELECT ap.EQUIVALENT_POINTS FROM applicants_points ap WHERE ap.CRITERIA_CODE='DEMO' AND ap.UID=a.UID) AS 'DEMO',
		(SELECT ap.EQUIVALENT_POINTS FROM applicants_points ap WHERE ap.CRITERIA_CODE='COMMUNICATION' AND ap.UID=a.UID) AS 'COMMUNICATION',
		((SELECT SUM(EQUIVALENT_POINTS) from applicants_points ap where (ap.CRITERIA_CODE = 'INTERVIEW' AND ap.UID=a.UID)) / (SELECT COUNT(ap.NO) from applicants_points ap where (ap.CRITERIA_CODE = 'INTERVIEW' AND ap.UID=a.UID))) AS `INTERVIEW_AVG`,
		((SELECT ap.EQUIVALENT_POINTS FROM applicants_points ap WHERE ap.CRITERIA_CODE='EDUCATION' AND ap.UID=a.UID)+(SELECT ap.EQUIVALENT_POINTS FROM applicants_points ap WHERE ap.CRITERIA_CODE='EXPERIENCE' AND ap.UID=a.UID)+(SELECT ap.EQUIVALENT_POINTS FROM applicants_points ap WHERE ap.CRITERIA_CODE='ELIGIBILITY' AND ap.UID=a.UID)+(SELECT ap.EQUIVALENT_POINTS FROM applicants_points ap WHERE ap.CRITERIA_CODE='TRAINING' AND ap.UID=a.UID)+(SELECT ap.EQUIVALENT_POINTS FROM applicants_points ap WHERE ap.CRITERIA_CODE='DEMO' AND ap.UID=a.UID)+(SELECT ap.EQUIVALENT_POINTS FROM applicants_points ap WHERE ap.CRITERIA_CODE='COMMUNICATION' AND ap.UID=a.UID)+((SELECT SUM(EQUIVALENT_POINTS) from applicants_points ap where (ap.CRITERIA_CODE = 'INTERVIEW' AND ap.UID=a.UID)) / (SELECT COUNT(ap.NO) from applicants_points ap where (ap.CRITERIA_CODE = 'INTERVIEW' AND ap.UID=a.UID)))) AS 'TOTALPOINTS'
		FROM application a JOIN personal_info p JOIN user u ON p.UID=a.UID AND u.UID=p.UID WHERE a.PID='$pid' AND (p.LASTNAME LIKE '%%' OR p.FIRSTNAME LIKE '%%' OR p.MIDDLENAME LIKE '%%' OR p.UID LIKE '%%' OR u.EMAIL LIKE '%%') HAVING TOTALPOINTS<70 ORDER BY TOTALPOINTS DESC;";

		$result = mysqli_query($conn,$sql);
		while($row = mysqli_fetch_assoc($result)){

			$educ_point = split(',', $row['EDUCATION_GWA']);

			$arrPoint[] = [
				"UID" => $row['UID'],
				"PID" => $pid,
				"GWA" => $educ_point[0],
				"GWA_ADD" => $educ_point[1]
			];

		}		

		header('Content-type: application/json');
		print_r(json_encode($arrPoint));
		
	break;

	case 'recalibrate_applicant':

		$a = $_POST['a'];
		$b = $_POST['b'];
		$c = $_POST['c'];

		$sql = "UPDATE applicants_points p INNER JOIN application a ON p.UID=a.UID AND p.PID=a.PID AND a.UID='$a' AND a.PID='$b' AND p.CRITERIA_CODE='EDUCATION' SET a.IS_CALIBRATED='1',p.EQUIVALENT_POINTS='$c';";
		$result = mysqli_query($conn,$sql);

		print_r($result);

	break;


}

?>