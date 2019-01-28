<html>
<head>

<meta name= "viewport" content= "width= device-width, initial-scale= 1">

<!-- CSS Libraries -->
<link rel= "stylesheet" href= "../../css/aos.css" type= "text/css" />
<link rel= "stylesheet" href= "../../css/animate.min.css" type= "text/css" />
<link rel= "stylesheet" href= "../../css/font-awesome.css" type= "text/css" />

<!-- Javascript Libraries -->
<script type= "text/javascript" src= "../../jsp/jquery-2.1.4.min.js"></script>
<script type= "text/javascript" src= "../../jsp/angular.min.js"></script>
<script type= "text/javascript" src= "../../jsp/aos.js"></script>

<!-- Custom CSS -->
<link rel= "stylesheet" href= "../../css/applicant.css" type= "text/css" />
		
<!-- Custom Javascripts -->
<script type= "text/javascript" src= "../../jsp/scrollEffect.js"></script>
<script type= "text/javascript" src= "../../jsp/main.js"></script>	
</head>
<body>
	<section class= "application-content">
		<section class= "pds-form">
			<section class= "pds-personal-information">
				<h1>I. Personal Information</h1>
				<section class= "pds-pi-table">
					<section class= "one-three">
						<section class= "pi-row">
							<section class= "pi-row-label">
								<p>2. Surname</p>
							</section>
							<section class= "pi-row-input">
								<input type= "text" value='v' class="pds_surname"> 
							</section>
						</section>
						<section class= "pi-row">
							<section class= "pi-row-label">
								<p>First name</p>
							</section>
							<section class= "pi-row-input">
								<input type= "text" value='v2'  class="pds_firstname">
								<input type= "text" placeholder= "Name Extension (Jr., Sr.)"  value='v3' class="pds_nameextension">
							</section>
						</section>
						<section class= "pi-row">
							<section class= "pi-row-label">
								<p>Middle name</p>
							</section>
							<section class= "pi-row-input">
								<input type= "text" value='v4'  class="pds_middlename">
							</section>
						</section>
					</section>
					<section class= "one-three">
						<section class= "pi-row">
							<section class= "pi-row-label">
								<p>3. Date of birth<br>(mm/dd/yyyy)</p>
							</section>
							<section class= "pi-row-input">
								<input type= "date" value='2019-01-10'  class="pds_dateofbirth">
							</section>
						</section>
						<section class= "pi-row">
							<section class= "pi-row-label">
								<p>4. Place of birth</p>
							</section>
							<section class= "pi-row-input">
								<input type= "text" value='v5'  class="pds_placeofbirth">
							</section>
						</section>
						<section class= "pi-row">
							<section class= "pi-row-label">
								<p>5. Sex</p>
							</section>
							<section class= "pi-row-input">
								<section class= "radio-input">
									<input type= "radio" name= "gender" class='pds_gender' checked="checked"   value= "Male"><p>Male</p>
								</section>
								<section class= "radio-input">
									<input type= "radio" name= "gender" class='pds_gender'  value= "Female"><p>Female</p>
								</section>
							</section>
						</section>
						<section class= "pi-row">
							<section class= "pi-row-label">
								<p>6. Civil Status</p>
							</section>
							<section class= "pi-row-input">
								<section class= "radio-input">
									<input type= "radio"  class="civil_status" value= "Single"><p>Single</p>
								</section>
								<section class= "radio-input">
									<input type= "radio" checked="checked" name="civil_status" value= "Married"><p>Married</p>
								</section>
								<section class= "radio-input">
									<input type= "radio" name="civil_status" value= "Widow"><p>Widowed</p>
								</section>
								<section class= "radio-input">
									<input type= "radio" name="civil_status" value= "Separated"><p>Separated</p>
								</section>
								<section class= "radio-input">
									<input type= "radio" name="civil_status" value= "Others"><p>Other`s</p>
								</section>
							</section>
						</section>
						<section class= "pi-row">
							<section class= "pi-row-label">
								<p>7. Height(m)</p>
							</section>
							<section class= "pi-row-input">
								<input type= "text" value='v6'   class="pds_height">
							</section>
						</section>
						<section class= "pi-row">
							<section class= "pi-row-label">
								<p>8. Weight(kg)</p>
							</section>
							<section class= "pi-row-input">
								<input type= "text"  value='v7'  class="pds_weight">
							</section>
						</section>
						<section class= "pi-row">
							<section class= "pi-row-label">
								<p>9. Blood Type</p>
							</section>
							<section class= "pi-row-input">
								<input type= "text"  value='v8'  class="pds_bloodtype">
							</section>
						</section>
						<section class= "pi-row">
							<section class= "pi-row-label">
								<p>10. GSIS ID No</p> 
							</section>
							<section class= "pi-row-input">
								<input type= "text"  value='v9'  class="pds_gsisno">
							</section>
						</section>
						<section class= "pi-row">
							<section class= "pi-row-label">
								<p>11. Pag-ibig ID No</p>
							</section>
							<section class= "pi-row-input">
								<input type= "text" value='v10'  class="pds_pagibigno">
							</section>
						</section>
						<section class= "pi-row">
							<section class= "pi-row-label">
								<p>12. Philhealth No.</p>
							</section>
							<section class= "pi-row-input">
								<input type= "text" value='v11'  class="pds_philhealthno">
							</section>
						</section>
						<section class= "pi-row">
							<section class= "pi-row-label">
								<p>13. SSS No.</p>
							</section>
							<section class= "pi-row-input">
								<input type= "text" value='v12'  class="pds_sssno">
							</section>
						</section>
						<section class= "pi-row">
							<section class= "pi-row-label">
								<p>14. TIN No.</p>
							</section>
							<section class= "pi-row-input">
								<input type= "text"  value='v13' class="pds_tinno">
							</section>
						</section>
						<section class= "pi-row">
							<section class= "pi-row-label">
								<p>15. Agency Employee No.</p>
							</section>
							<section class= "pi-row-input">
								<input type= "text" value='v14'  class="pds_agencyemployee">
							</section>
						</section>
					</section>
					<section class= "one-three">
						<section class= "pi-row">
							<section class= "pi-row-label">
								<p>16. Citizenship<br><br><br><br><br><br><br><span>If holder of dual citizenship</span><br><br><span>please indicate the details.</span></p>
							</section>
							<section class= "pi-row-input">
								<section class= "radio-input">
									<input type= "radio" checked="checked"  name="citi" class='pds_citizenship' value= "Filipino">
									<p>Filipino</p>
								</section>
								<section class= "radio-input">
									<input type= "radio" name= "citi" class='pds_citizenship' value= "Dual Citizenship">
									<p>Dual Citizenship</p>
								</section>
								<section class= "radio-input">
									<input type= "radio" name= "citi" class='pds_citizenship' value= "By Birth">
									<p>By Birth</p>
								</section>
								<section class= "radio-input">
									<input type= "radio" name= "citi" class='pds_citizenship' value= "By Naturalization">
									<p>By Naturalization</p>
								</section>
								<section class= "radio-input">
									<p>Pls. indicate the country:</p>
								</section>
								<section class= "radio-input" class="pds_country">
									<select>
										<option>Algeria</option>
										<option>Andorra</option>
										<option>Angola</option>
										<option>Antigua and Barbuda</option>
										<option>Argentina</option>
										<option>Armenia</option>
										<option>Aruba</option>
										<option>Australia</option>
										<option>Austria</option>
										<option>Azerbaijan</option>
										<option>Bahamas</option>
										<option>Bangladesh</option>
										<option>Barbados</option>
									</select>
								</section>
							</section>
						</section>
						<section class= "pi-row">
							<section class= "pi-row-label">
								<p>17. Residential Address</p><br>
								<p></p><br>
								<p></p><br>
								<p></p>
							</section>
							<section class= "pi-row-input">
								<section class= "text-input">
									<input type= "text" value='v15'  placeholder= "House/Block/Lot No." class="pds_rhouseblk">
									<input type= "text" value='v16'  placeholder= "Street" class="pds_rstreet">
								</section>
								<section class= "text-input">
									<input type= "text" value='v17'  placeholder= "Subdivision/Village" class="pds_rsubdivision">
									<input type= "text" value='v18'  placeholder= "Barangay" class="pds_rbarangay">
								</section>
								<section class= "text-input">
									<input type= "text" placeholder= "City/Municipality" value='v19'  class="pds_rmunicipality">
									<input type= "text" value='v20'  placeholder= "Province" class="pds_rprovince">
								</section>
							</section>
						</section>
						<section class= "pi-row">
							<section class= "pi-row-label">
								<p>ZIP CODE</p>
							</section>
							<section class= "pi-row-input">
								<input type= "text" value='v21'  class="pds_rzipcode">
							</section>
						</section>
						<section class= "pi-row">
							<section class= "pi-row-label">
								<p>18. Permanent Address</p>
								<p></p>
								<p></p>
								<p></p>
							</section>
							<section class= "pi-row-input">
								<section class= "text-input">
									<input type= "text" value='v22'  placeholder= "House/Block/Lot No." class="pds_phouseblk">
									<input type= "text" value='v23' placeholder= "Street" class="pds_pstreet">
								</section>
								<section class= "text-input">
									<input type= "text" value='v24'  placeholder= "Subdivision/Village" class="pds_psubdivision">
									<input type= "text" value='v25'  placeholder= "Barangay" class="pds_pbarangay">
								</section>
								<section class= "text-input">
									<input type= "text" value='v26'  placeholder= "City/Municipality" class="pds_pmunicipality">
									<input type= "text" value='v27'  placeholder= "Province" class="pds_pprovince">
								</section>
							</section>
						</section>
						<section class= "pi-row">
							<section class= "pi-row-label">
								<p>ZIP CODE</p>
							</section>
							<section class= "pi-row-input">
								<input type= "text" value='v28'  class="pds_pzipcode">
							</section>
						</section>
						<section class= "pi-row">
							<section class= "pi-row-label">
								<p>19. Telephone No.</p>
							</section>
							<section class= "pi-row-input">
								<input type= "text" value='v29'  class="pds_telno">
							</section>
						</section>
						<section class= "pi-row">
							<section class= "pi-row-label">
								<p>20. Mobile No.</p>
							</section>
							<section class= "pi-row-input">
								<input type= "text" value='v30'  class="pds_mobileno">
							</section>
						</section>
						<section class= "pi-row">
							<section class= "pi-row-label">
								<p>21. Email Address(If any)</p>
							</section>
							<section class= "pi-row-input">
								<input type= "email"  value='v31' class="pds_emailaddress">
							</section>
						</section>
					</section>
				</section>
			</section>
			<section class= "pds-family-background">
				<h1>II. Family Background</h1>
				<section class= "pds-fb-table">
					<section class= "one-two">
						<section class= "pi-row">
							<section class= "pi-row-label">
								<p>22. Spouse`s Surname</p>
								<p>First Name</p>
								<p>Middle Name</p>
							</section>
							<section class= "pi-row-input">
								<section class= "text-input">
									<input type= "text" value='v01'  class="pds_spousesurname">
								</section>
								<section class= "text-input">
									<input type= "text"  value='v02'  class="pds_spousefirstname">
									<input type= "text" value='v03'  placeholder= "Name Extension(Jr., Sr.)"  class="pds_spousenameextension">
								</section>
								<section class= "text-input">
									<input type= "text"  value='v04'  class="pds_spousemiddlename">
								</section>
							</section>
						</section>
						<section class= "pi-row">
							<section class= "pi-row-label">
								<p>Occupation</p>
							</section>
							<section class= "pi-row-input">
								<input type= "text"  value='v05'  class="pds_spouseoccupation">
							</section>
						</section>
						<section class= "pi-row">
							<section class= "pi-row-label">
								<p>Employer/Business Name</p>
							</section>
							<section class= "pi-row-input">
								<input type= "text"  value='v06'  class="pds_businessname">
							</section>
						</section>
						<section class= "pi-row">
							<section class= "pi-row-label">
								<p>Business Address</p>
							</section>
							<section class= "pi-row-input">
								<input type= "text"  value='v07'  class="pds_businessaddress">
							</section>
						</section>
						<section class= "pi-row">
							<section class= "pi-row-label">
								<p>Telephone No.</p>
							</section>
							<section class= "pi-row-input">
								<input type= "text"  value='v08'  class="pds_businesstelno">
							</section>
						</section>
						<section class= "pi-row">
							<section class= "pi-row-label">
								<p>24. Father`s Surname</p>
								<p>First Name</p>
								<p>Middle Name</p>
							</section>
							<section class= "pi-row-input">
								<section class= "text-input">
									<input type= "text"  value='v09'  class="pds_fathersurname">
								</section>
								<section class= "text-input">
									<input type= "text"  value='v010'  class="pds_fatherfirstname">
									<input type= "text" value='v011'  placeholder= "Name Extension(Jr., Sr.)"  class="pds_fathernameextension">
								</section>
								<section class= "text-input">
									<input type= "text" value='v012'  class="pds_fathermiddlename">
								</section>
							</section>
						</section>
						<section class= "pi-row">
							<section class= "pi-row-label">
								<p>25. Mother`s Maiden Name</p>
								<p>Surname</p>
								<p>First Name</p>
								<p>Middle Name</p> 
							</section>
							<section class= "pi-row-input">
								<section class= "text-input">
									<input type= "text" value='v013'  class="pds_mothermaindenname">
								</section>
								<section class= "text-input">
									<input type= "text" value='v014'  class="pds_motherfirstname" >
									<input type= "text" value='v015'  placeholder= "Name Extension(Jr., Sr.)" class="pds_mothersnameextension">
								</section>
								<section class= "text-input">
									<input type= "text"  value='v016' class="pds_mothersmiddlename">
								</section>
							</section>
						</section>
					</section>
					<section class= "one-two">
						<section class= "family-tbl">
							<section class= "family-tbl-header">
								<section class= "header">
									<p>23. Name of Children<br>(Write full name and list all)</p>
								</section>
								<section class= "header">
									<p>Date of Birth<br>(mm/dd/yyyy)</p>
								</section>
							</section>
							<section class= "family-tbl-info">
								<section class= "content-info">
									<section class= "info">
										<input type= "text"  value='v017'  class="pds_children">
									</section>
									<section class= "info">
										<input type= "date" value='2019-01-10'  class="pds_childrenBdate">
									</section>
								</section>
								<section class= "content-info">
									<section class= "info">
										<input type= "text">
									</section>
									<section class= "info">
										<input type= "date" >
									</section>
								</section>
								<section class= "content-info">
									<section class= "info">
										<input type= "text">
									</section>
									<section class= "info">
										<input type= "date">
									</section>
								</section>
								<section class= "content-info">
									<section class= "info">
										<input type= "text">
									</section>
									<section class= "info">
										<input type= "date">
									</section>
								</section>
								<section class= "content-info">
									<section class= "info">
										<input type= "text">
									</section>
									<section class= "info">
										<input type= "date">
									</section>
								</section>
								<section class= "content-info">
									<section class= "info">
										<input type= "text">
									</section>
									<section class= "info">
										<input type= "date">
									</section>
								</section>
								<section class= "content-info">
									<section class= "info">
										<input type= "text">
									</section>
									<section class= "info">
										<input type= "date">
									</section>
								</section>
								<section class= "content-info">
									<section class= "info">
										<input type= "text">
									</section>
									<section class= "info">
										<input type= "date">
									</section>
								</section>
								<section class= "content-info">
									<section class= "info">
										<input type= "text">
									</section>
									<section class= "info">
										<input type= "date">
									</section>
								</section>
								<section class= "content-info">
									<section class= "info">
										<input type= "text">
									</section>
									<section class= "info">
										<input type= "date">
									</section>
								</section>
								<section class= "content-info">
									<section class= "info">
										<input type= "text">
									</section>
									<section class= "info">
										<input type= "date">
									</section>
								</section>
								<section class= "content-info">
									<section class= "info">
										<input type= "text">
									</section>
									<section class= "info">
										<input type= "date">
									</section>
								</section>
								<section class= "content-info">
									<section class= "info">
										<input type= "text">
									</section>
									<section class= "info">
										<input type= "date">
									</section>
								</section>
								<p id= "separate">(Continue in separate sheet if necessary)</p>
							</section>
						</section>
					</section>
				</section>
			</section>
			<section class= "pds-eligibility">
				<h1>IV. Civil Service Eligibility</h1>
				<section class= "pds-eligibility-tbl">
					<section class= "eligibility-tbl-header">
						<section class= "header">
							<p>27. Career service/ RA 1080 (Board/Bar) Under<br>Special Laws/CES/CSEE<br>Barangay Eligibility/Driver`s License</p>
						</section>
						<section class= "header">
							<p>Rating<br>(If applicable)</p>
						</section>
						<section class= "header">
							<p>Date of<br>Examination/<br>Conferment</p>
						</section>
						<section class= "header">
							<p>Place of Examination/Conferment</p>
						</section>
						<section class= "header">
							<p>License (If applicable)</p>
							<p>Number</p>
							<p>Date of Validity</p>
						</section>
					</section>
					<section class= "eligibility-tbl-info">
						<section class= "content-info">
							<section class= "info">
								<input type= "text"  value='v001'  class='pds_CS'>
							</section>
							<section class= "info">
								<input type= "text" value='v002'  class='pds_CS_rating'>
							</section>
							<section class= "info">
								<input type= "text" value='v003'  class='pds_CS_date'>
							</section>
							<section class= "info">
								<input type= "text" value='v004'  class='pds_CS_place'>
							</section>
							<section class= "info">
								<input type= "text" value='v005'  class='pds_CS_licenceNo'>
								<input type= "date" value='2019-01-10'  class='pds_CS_licenceDate'>
							</section>
						</section>
						<section class= "content-info">
							<section class= "info">
								<input type= "text">
							</section>
							<section class= "info">
								<input type= "text" >
							</section>
							<section class= "info">
								<input type= "text">
							</section>
							<section class= "info">
								<input type= "text">
							</section>
							<section class= "info">
								<input type= "text">
								<input type= "date">
							</section>
						</section>
						<section class= "content-info">
							<section class= "info">
								<input type= "text">
							</section>
							<section class= "info">
								<input type= "text">
							</section>
							<section class= "info">
								<input type= "text" >
							</section>
							<section class= "info">
								<input type= "text">
							</section>
							<section class= "info">
								<input type= "text">
								<input type= "date">
							</section>
						</section>
						<section class= "content-info">
							<section class= "info">
								<input type= "text">
							</section>
							<section class= "info">
								<input type= "text">
							</section>
							<section class= "info">
								<input type= "text">
							</section>
							<section class= "info">
								<input type= "text" >
							</section>
							<section class= "info">
								<input type= "text">
								<input type= "date">
							</section>
						</section>
						<section class= "content-info">
							<section class= "info">
								<input type= "text">
							</section>
							<section class= "info">
								<input type= "text">
							</section>
							<section class= "info">
								<input type= "text">
							</section>
							<section class= "info">
								<input type= "text">
							</section>
							<section class= "info">
								<input type= "text">
								<input type= "date">
							</section>
						</section>
						<section class= "content-info">
							<section class= "info">
								<input type= "text">
							</section>
							<section class= "info">
								<input type= "text">
							</section>
							<section class= "info">
								<input type= "text">
							</section>
							<section class= "info">
								<input type= "text">
							</section>
							<section class= "info">
								<input type= "text">
								<input type= "date">
							</section>
						</section>
						<section class= "content-info">
							<section class= "info">
								<input type= "text">
							</section>
							<section class= "info">
								<input type= "text">
							</section>
							<section class= "info">
								<input type= "text">
							</section>
							<section class= "info">
								<input type= "text">
							</section>
							<section class= "info">
								<input type= "text">
								<input type= "date">
							</section>
						</section>
						<p id= "separate">(Continue in separate sheet if necessary)</p>
					</section>
				</section>
			</section>
			<section class= "pds-expi">
				<h1>V. Work Experience</h1>
				<section class= "expi-tbl">
					<section class= "expi-tbl-header">
						<section class= "header">
							<p>28. Inclusive Dates<br>(mm/dd/yyyy)</p>
							<p>From</p>
							<p>To</p>
						</section>
						<section class= "header">
							<p>Position Title<br>(Write in full/Do not abbreviate)</p>
						</section>
						<section class= "header">
							<p>Department/Agency/Office/<br>Company<br>(Write in full/Do not abbreviate)</p>
						</section>
						<section class= "header">
							<p>Mothly<br>Salary</p>
						</section>
						<section class= "header">
							<p>Salary/Job/<br>Pay Grade (If<br>applicable) & Step<br>/Increment</p>
						</section>
						<section class= "header">
							<p>Status of<br>appointment</p>
						</section>
						<section class= "header">
							<p>Gov`t<br>Service<br>(Y/N)</p>
						</section>
					</section>
					<section class= "expi-tbl-info">
						<section class= "content-info">
							<section class= "info">
								<input type= "date" value='2019-01-10'  class='pds_WE_FromDate'>
								<input type= "date"  value='2019-01-10' class='pds_WE_ToDate'>
							</section>
							<section class= "info">
								<input type= "text" value='v0001'  class='pds_WE_PositionTitle'>
							</section>
							<section class= "info">
								<input type= "text" value='v0002'  class='pds_WE_Place'>
							</section>
							<section class= "info">
								<input type= "text" value='v0003'  class='pds_WE_MonthSalary'>
							</section>
							<section class= "info">
								<input type= "text" value='v0004'  class='pds_WE_Salary'>
							</section>
							<section class= "info">
								<input type= "text" value='v0005'  class='pds_WE_AppointmentStatus'>
							</section>
							<section class= "info">
								<input type= "text" value='v0006'  class='pds_WE_GovService'>
							</section>
						</section>
						<section class= "content-info">
							<section class= "info">
								<input type= "date">
								<input type= "date">
							</section>
							<section class= "info">
								<input type= "text">
							</section>
							<section class= "info">
								<input type= "text">
							</section>
							<section class= "info">
								<input type= "text">
							</section>
							<section class= "info">
								<input type= "text">
							</section>
							<section class= "info">
								<input type= "text">
							</section>
							<section class= "info">
								<input type= "text">
							</section>
						</section>
						<section class= "content-info">
							<section class= "info">
								<input type= "date">
								<input type= "date">
							</section>
							<section class= "info">
								<input type= "text">
							</section>
							<section class= "info">
								<input type= "text">
							</section>
							<section class= "info">
								<input type= "text">
							</section>
							<section class= "info">
								<input type= "text">
							</section>
							<section class= "info">
								<input type= "text">
							</section>
							<section class= "info">
								<input type= "text">
							</section>
						</section>
						<section class= "content-info">
							<section class= "info">
								<input type= "date">
								<input type= "date">
							</section>
							<section class= "info">
								<input type= "text">
							</section>
							<section class= "info">
								<input type= "text">
							</section>
							<section class= "info">
								<input type= "text">
							</section>
							<section class= "info">
								<input type= "text">
							</section>
							<section class= "info">
								<input type= "text">
							</section>
							<section class= "info">
								<input type= "text">
							</section>
						</section>
						<section class= "content-info">
							<section class= "info">
								<input type= "date">
								<input type= "date">
							</section>
							<section class= "info">
								<input type= "text">
							</section>
							<section class= "info">
								<input type= "text">
							</section>
							<section class= "info">
								<input type= "text">
							</section>
							<section class= "info">
								<input type= "text">
							</section>
							<section class= "info">
								<input type= "text">
							</section>
							<section class= "info">
								<input type= "text">
							</section>
						</section>
						<section class= "content-info">
							<section class= "info">
								<input type= "date">
								<input type= "date">
							</section>
							<section class= "info">
								<input type= "text">
							</section>
							<section class= "info">
								<input type= "text">
							</section>
							<section class= "info">
								<input type= "text">
							</section>
							<section class= "info">
								<input type= "text">
							</section>
							<section class= "info">
								<input type= "text">
							</section>
							<section class= "info">
								<input type= "text">
							</section>
						</section>
						<section class= "content-info">
							<section class= "info">
								<input type= "date">
								<input type= "date">
							</section>
							<section class= "info">
								<input type= "text">
							</section>
							<section class= "info">
								<input type= "text">
							</section>
							<section class= "info">
								<input type= "text">
							</section>
							<section class= "info">
								<input type= "text">
							</section>
							<section class= "info">
								<input type= "text">
							</section>
							<section class= "info">
								<input type= "text">
							</section>
						</section>
						<section class= "content-info">
							<section class= "info">
								<input type= "date">
								<input type= "date">
							</section>
							<section class= "info">
								<input type= "text">
							</section>
							<section class= "info">
								<input type= "text">
							</section>
							<section class= "info">
								<input type= "text">
							</section>
							<section class= "info">
								<input type= "text">
							</section>
							<section class= "info">
								<input type= "text">
							</section>
							<section class= "info">
								<input type= "text">
							</section>
						</section>
						<section class= "content-info">
							<section class= "info">
								<input type= "date">
								<input type= "date">
							</section>
							<section class= "info">
								<input type= "text">
							</section>
							<section class= "info">
								<input type= "text">
							</section>
							<section class= "info">
								<input type= "text">
							</section>
							<section class= "info">
								<input type= "text">
							</section>
							<section class= "info">
								<input type= "text">
							</section>
							<section class= "info">
								<input type= "text">
							</section>
						</section>
						<section class= "content-info">
							<section class= "info">
								<input type= "date">
								<input type= "date">
							</section>
							<section class= "info">
								<input type= "text">
							</section>
							<section class= "info">
								<input type= "text">
							</section>
							<section class= "info">
								<input type= "text">
							</section>
							<section class= "info">
								<input type= "text">
							</section>
							<section class= "info">
								<input type= "text">
							</section>
							<section class= "info">
								<input type= "text">
							</section>
						</section>
						<p id= "separate">(Continue in separate sheet if necessary)</p>
					</section>
				</section>
			</section>
			<section class= "pds-work">
				<h1>VI. Voluntary work or Involvement in civic/non-government/people/voluntary organization/s</h1>
				<section class= "work-tbl">
					<section class= "work-tbl-header">
						<section class= "header">
							<p>29. Name & address of Organization<br>(Write in full)</p>
						</section>
						<section class= "header">
							<p>Inclusive Dates<br>(mm/dd/yyyy)</p>
							<p>From</p>
							<p>To</p>
						</section>
						<section class= "header">
							<p>Number of Hours</p>
						</section>
						<section class= "header">
							<p>Position / Nature of Work</p>
						</section>
					</section>
					<section class= "work-tbl-info">
						<section class= "content-info">
							<section class= "info">
								<input type= "text" value='v00001'  class='pds_VW_Name_Address'>
							</section>
							<section class= "info">
								<input type= "date" value='2019-01-10'  class='pds_VW_FromDate'>
								<input type= "date" value='2019-01-10'  class='pds_VW_Todate'>
							</section>
							<section class= "info">
								<input type= "text" value='v00002'  class='pds_VW_NumbHours'>
							</section>
							<section class= "info">
								<input type= "text" value='v00003'  class='pds_VW_Work'>
							</section>
						</section>
						<section class= "content-info">
							<section class= "info">
								<input type= "text">
							</section>
							<section class= "info">
								<input type= "date">
								<input type= "date">
							</section>
							<section class= "info">
								<input type= "text">
							</section>
							<section class= "info">
								<input type= "text">
							</section>
						</section>
						<section class= "content-info">
							<section class= "info">
								<input type= "text">
							</section>
							<section class= "info">
								<input type= "date">
								<input type= "date">
							</section>
							<section class= "info">
								<input type= "text">
							</section>
							<section class= "info">
								<input type= "text">
							</section>
						</section>
						<section class= "content-info">
							<section class= "info">
								<input type= "text">
							</section>
							<section class= "info">
								<input type= "date">
								<input type= "date">
							</section>
							<section class= "info">
								<input type= "text">
							</section>
							<section class= "info">
								<input type= "text">
							</section>
						</section>
						<section class= "content-info">
							<section class= "info">
								<input type= "text">
							</section>
							<section class= "info">
								<input type= "date">
								<input type= "date">
							</section>
							<section class= "info">
								<input type= "text">
							</section>
							<section class= "info">
								<input type= "text">
							</section>
						</section>
						<section class= "content-info">
							<section class= "info">
								<input type= "text">
							</section>
							<section class= "info">
								<input type= "date">
								<input type= "date">
							</section>
							<section class= "info">
								<input type= "text">
							</section>
							<section class= "info">
								<input type= "text">
							</section>
						</section>
						<section class= "content-info">
							<section class= "info">
								<input type= "text">
							</section>
							<section class= "info">
								<input type= "date">
								<input type= "date">
							</section>
							<section class= "info">
								<input type= "text">
							</section>
							<section class= "info">
								<input type= "text">
							</section>
						</section>
						<section class= "content-info">
							<section class= "info">
								<input type= "text">
							</section>
							<section class= "info">
								<input type= "date">
								<input type= "date">
							</section>
							<section class= "info">
								<input type= "text">
							</section>
							<section class= "info">
								<input type= "text">
							</section>
						</section>
						<section class= "content-info">
							<section class= "info">
								<input type= "text">
							</section>
							<section class= "info">
								<input type= "date">
								<input type= "date">
							</section>
							<section class= "info">
								<input type= "text">
							</section>
							<section class= "info">
								<input type= "text">
							</section>
						</section>
						<section class= "content-info">
							<section class= "info">
								<input type= "text">
							</section>
							<section class= "info">
								<input type= "date">
								<input type= "date">
							</section>
							<section class= "info">
								<input type= "text">
							</section>
							<section class= "info">
								<input type= "text">
							</section>
						</section>
						<section class= "content-info">
							<section class= "info">
								<input type= "text">
							</section>
							<section class= "info">
								<input type= "date">
								<input type= "date">
							</section>
							<section class= "info">
								<input type= "text">
							</section>
							<section class= "info">
								<input type= "text">
							</section>
						</section>
						<p id= "separate">(Continue in separate sheet if necessary)</p>
					</section>
				</section>
			</section>
			<section class= "pds-training">
				<h1>VII. Learning and Development (L&D) Interventions/Training Programs Attended</h1>
				<section class= "training-tbl">
					<section class= "training-tbl-header">
						<section class= "header">
							<p>30. Title of Learning and Development Interventions/Training Programs<br>(Write in full)</p>
						</section>
						<section class= "header">
							<p>Inclusive Dates of<br>Attendance<br>(mm/dd/yyyy)</p>
							<p>From</p>
							<p>To</p>
						</section>
						<section class= "header">
							<p>Number of Hours</p>
						</section>
						<section class= "header">
							<p>Type of LD<br>(Managerial/<br>Supervisory/<br>Technical/etc.)</p>
						</section>
						<section class= "header">
							<p>Conducted/Sponsored By<br>(Write in full)</p>
						</section>
					</section>
					<section class= "training-tbl-info">
						<section class= "content-info">
							<section class= "info">
								<input type= "text" value='v000001'  class='pds_LaD_Title'>
							</section>
							<section class= "info">
								<input type= "date" value='2019-01-10'  class='pds_LaD_FromDate'>
								<input type= "date" value='2019-01-10'  class='pds_LaD_ToDate'>
							</section>
							<section class= "info">
								<input type= "text" value='v000002'  class='pds_LaD_NumbHours'>
							</section>
							<section class= "info">
								<input type= "text" value='v000003'  class='pds_LaD_Type'>
							</section>
							<section class= "info">
								<input type= "text" value='v000004'  class='pds_LaD_ConductBy'>
							</section>
						</section>
						<section class= "content-info">
							<section class= "info">
								<input type= "text">
							</section>
							<section class= "info">
								<input type= "date">
								<input type= "date">
							</section>
							<section class= "info">
								<input type= "text">
							</section>
							<section class= "info">
								<input type= "text">
							</section>
							<section class= "info">
								<input type= "text">
							</section>
						</section>
						<section class= "content-info">
							<section class= "info">
								<input type= "text">
							</section>
							<section class= "info">
								<input type= "date">
								<input type= "date">
							</section>
							<section class= "info">
								<input type= "text">
							</section>
							<section class= "info">
								<input type= "text">
							</section>
							<section class= "info">
								<input type= "text">
							</section>
						</section>
						<section class= "content-info">
							<section class= "info">
								<input type= "text">
							</section>
							<section class= "info">
								<input type= "date">
								<input type= "date">
							</section>
							<section class= "info">
								<input type= "text">
							</section>
							<section class= "info">
								<input type= "text">
							</section>
							<section class= "info">
								<input type= "text">
							</section>
						</section>
						<section class= "content-info">
							<section class= "info">
								<input type= "text">
							</section>
							<section class= "info">
								<input type= "date">
								<input type= "date">
							</section>
							<section class= "info">
								<input type= "text">
							</section>
							<section class= "info">
								<input type= "text">
							</section>
							<section class= "info">
								<input type= "text">
							</section>
						</section>
						<p id= "separate">(Continue in separate sheet if necessary)</p>
					</section>
				</section>
			</section>
			
		</section>
		
	</section>
		
</body>
</html>