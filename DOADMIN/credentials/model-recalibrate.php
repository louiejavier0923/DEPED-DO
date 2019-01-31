<?php

include 'connection.php';

// $_POST['action'] = 'get_applicant_list';

switch ($_POST['action']) {

    case 'select-applicant-recalibrate':

        $arrPoint = [];

        $sql="SELECT p.UID,p.LASTNAME,p.FIRSTNAME,p.MIDDLENAME,p.EXTENSION_NAME,p.RESIDENTIAL_LOTNO,p.RESIDENTIAL_STREET,p.RESIDENTIAL_SUBDIVISION,p.RESIDENTIAL_BARANGAY,p.RESIDENTIAL_MUNICIPALITY,p.RESIDENTIAL_PROVINCE,p.MOBILE_NO,u.EMAIL,a.PID,
        (SELECT ap.EQUIVALENT_POINTS FROM applicants_points ap WHERE ap.CRITERIA_CODE='EDUCATION' AND ap.UID=a.UID) AS 'EDUCATION',
        (SELECT ap.VALUE FROM applicants_points ap WHERE ap.CRITERIA_CODE='EDUCATION' AND ap.UID=a.UID) AS 'EDUCATION_GWA',
        (SELECT ap.EQUIVALENT_POINTS FROM applicants_points ap WHERE ap.CRITERIA_CODE='EXPERIENCE' AND ap.UID=a.UID) AS 'EXPERIENCE',
        (SELECT ap.EQUIVALENT_POINTS FROM applicants_points ap WHERE ap.CRITERIA_CODE='ELIGIBILITY' AND ap.UID=a.UID) AS 'ELIGIBILITY',
        (SELECT ap.EQUIVALENT_POINTS FROM applicants_points ap WHERE ap.CRITERIA_CODE='TRAINING' AND ap.UID=a.UID) AS 'TRAINING',
        (SELECT ap.EQUIVALENT_POINTS FROM applicants_points ap WHERE ap.CRITERIA_CODE='DEMO' AND ap.UID=a.UID) AS 'DEMO',
        (SELECT ap.EQUIVALENT_POINTS FROM applicants_points ap WHERE ap.CRITERIA_CODE='COMMUNICATION' AND ap.UID=a.UID) AS 'COMMUNICATION',
        ((SELECT SUM(EQUIVALENT_POINTS) from applicants_points ap where (ap.CRITERIA_CODE = 'INTERVIEW' AND ap.UID=a.UID)) / (SELECT COUNT(ap.NO) from applicants_points ap where (ap.CRITERIA_CODE = 'INTERVIEW' AND ap.UID=a.UID))) AS `INTERVIEW_AVG`,
        ((SELECT ap.EQUIVALENT_POINTS FROM applicants_points ap WHERE ap.CRITERIA_CODE='EDUCATION' AND ap.UID=a.UID)+(SELECT ap.EQUIVALENT_POINTS FROM applicants_points ap WHERE ap.CRITERIA_CODE='EXPERIENCE' AND ap.UID=a.UID)+(SELECT ap.EQUIVALENT_POINTS FROM applicants_points ap WHERE ap.CRITERIA_CODE='ELIGIBILITY' AND ap.UID=a.UID)+(SELECT ap.EQUIVALENT_POINTS FROM applicants_points ap WHERE ap.CRITERIA_CODE='TRAINING' AND ap.UID=a.UID)+(SELECT ap.EQUIVALENT_POINTS FROM applicants_points ap WHERE ap.CRITERIA_CODE='DEMO' AND ap.UID=a.UID)+(SELECT ap.EQUIVALENT_POINTS FROM applicants_points ap WHERE ap.CRITERIA_CODE='COMMUNICATION' AND ap.UID=a.UID)+((SELECT SUM(EQUIVALENT_POINTS) from applicants_points ap where (ap.CRITERIA_CODE = 'INTERVIEW' AND ap.UID=a.UID)) / (SELECT COUNT(ap.NO) from applicants_points ap where (ap.CRITERIA_CODE = 'INTERVIEW' AND ap.UID=a.UID)))) AS 'TOTALPOINTS'
        FROM application a JOIN personal_info p JOIN user u ON p.UID=a.UID AND u.UID=p.UID WHERE a.IS_CALIBRATED='0' HAVING TOTALPOINTS<70 ORDER BY TOTALPOINTS DESC;";

        $result = mysqli_query($conn,$sql);
        while($row = mysqli_fetch_assoc($result)){

            $educ_point = split(',', $row['EDUCATION_GWA']);

            $arrPoint[] = [
                "UID" => $row['UID'],
                "PID" => $row['PID'],
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

    case 'view-below-ranking':
        $html = "";
        $cnt = 0;

        $sql = "SELECT p.UID,p.LASTNAME,p.FIRSTNAME,p.MIDDLENAME,p.EXTENSION_NAME,p.RESIDENTIAL_LOTNO,p.RESIDENTIAL_STREET,p.RESIDENTIAL_SUBDIVISION,p.RESIDENTIAL_BARANGAY,p.RESIDENTIAL_MUNICIPALITY,p.RESIDENTIAL_PROVINCE,p.MOBILE_NO,u.EMAIL,
            (SELECT ap.EQUIVALENT_POINTS FROM applicants_points ap WHERE ap.CRITERIA_CODE='EDUCATION' AND ap.UID=a.UID) AS 'EDUCATION',
            (SELECT ap.VALUE FROM applicants_points ap WHERE ap.CRITERIA_CODE='EDUCATION' AND ap.UID=a.UID) AS 'EDUCATION_GWA',
            (SELECT ap.EQUIVALENT_POINTS FROM applicants_points ap WHERE ap.CRITERIA_CODE='EXPERIENCE' AND ap.UID=a.UID) AS 'EXPERIENCE',
            (SELECT ap.EQUIVALENT_POINTS FROM applicants_points ap WHERE ap.CRITERIA_CODE='ELIGIBILITY' AND ap.UID=a.UID) AS 'ELIGIBILITY',
            (SELECT ap.EQUIVALENT_POINTS FROM applicants_points ap WHERE ap.CRITERIA_CODE='TRAINING' AND ap.UID=a.UID) AS 'TRAINING',
            (SELECT ap.EQUIVALENT_POINTS FROM applicants_points ap WHERE ap.CRITERIA_CODE='DEMO' AND ap.UID=a.UID) AS 'DEMO',
            (SELECT ap.EQUIVALENT_POINTS FROM applicants_points ap WHERE ap.CRITERIA_CODE='COMMUNICATION' AND ap.UID=a.UID) AS 'COMMUNICATION',
            ((SELECT SUM(EQUIVALENT_POINTS) from applicants_points ap where (ap.CRITERIA_CODE = 'INTERVIEW' AND ap.UID=a.UID)) / (SELECT COUNT(ap.NO) from applicants_points ap where (ap.CRITERIA_CODE = 'INTERVIEW' AND ap.UID=a.UID))) AS `INTERVIEW_AVG`,
            ((SELECT ap.EQUIVALENT_POINTS FROM applicants_points ap WHERE ap.CRITERIA_CODE='EDUCATION' AND ap.UID=a.UID)+(SELECT ap.EQUIVALENT_POINTS FROM applicants_points ap WHERE ap.CRITERIA_CODE='EXPERIENCE' AND ap.UID=a.UID)+(SELECT ap.EQUIVALENT_POINTS FROM applicants_points ap WHERE ap.CRITERIA_CODE='ELIGIBILITY' AND ap.UID=a.UID)+(SELECT ap.EQUIVALENT_POINTS FROM applicants_points ap WHERE ap.CRITERIA_CODE='TRAINING' AND ap.UID=a.UID)+(SELECT ap.EQUIVALENT_POINTS FROM applicants_points ap WHERE ap.CRITERIA_CODE='DEMO' AND ap.UID=a.UID)+(SELECT ap.EQUIVALENT_POINTS FROM applicants_points ap WHERE ap.CRITERIA_CODE='COMMUNICATION' AND ap.UID=a.UID)+((SELECT SUM(EQUIVALENT_POINTS) from applicants_points ap where (ap.CRITERIA_CODE = 'INTERVIEW' AND ap.UID=a.UID)) / (SELECT COUNT(ap.NO) from applicants_points ap where (ap.CRITERIA_CODE = 'INTERVIEW' AND ap.UID=a.UID)))) AS 'TOTALPOINTS'
            FROM application a JOIN personal_info p JOIN user u ON p.UID=a.UID AND u.UID=p.UID WHERE a.IS_CALIBRATED='0' AND (p.LASTNAME LIKE '%%' OR p.FIRSTNAME LIKE '%%' OR p.MIDDLENAME LIKE '%%' OR p.UID LIKE '%%' OR u.EMAIL LIKE '%%') HAVING TOTALPOINTS<70 ORDER BY TOTALPOINTS DESC;";

        $result = mysqli_query($conn,$sql);
        while($row = mysqli_fetch_assoc($result)){
            $cnt += 1;
            $html .= "<tr>
                <td>".$cnt."</td>
                <td>".$row['UID']."</td>
                <td>".$row['LASTNAME'].", ".$row['FIRSTNAME']." ".substr($row['MIDDLENAME'],0,1).".</td>
                <td>".$row['EMAIL']."</td>
                <td>".number_format($row['TOTALPOINTS'],2,'.','')."</td>
                
            </tr>";
        }

        print_r($html);
    break;

}

?>