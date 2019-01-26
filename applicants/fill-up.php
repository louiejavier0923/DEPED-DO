<!DOCTYPE html>

<html>
	<head>
		<title>Application Form | Division Office</title>
		<?php include '../include/applicant-header-content.php';?>
	</head>
	<body>
		<section class= "applicant-header-container">
			<?php include '../include/applicant-header-container.php';?>
		</section>
		<section class= "applicant-content-container">
			<h2>APPLICATION FORM</h2>
			<div class= "line"></div>
			<section class= "application-nav">
				<p class= "success">1</p>
				<p class= "current">2</p>
				<p>3</p>
			</section>
			<section class= "application-content">
				<section class= "pds-form">
					<section class= "pds-header">
						<p id= "pds-cs-no">CS Form No. 212</p>
						<p id= "pds-revised">Revised 2017</p>
						<h1 id= "pds-title">PERSONAL DATA SHEET</h1>
						<p id= "pds-warning">WARNING: Any mispresentation made in the Personal Data Sheet and the Work Experience Sheet shall causethe filing of administrative/criminal case/s aaginst the person concerned.</p>
						<p id= "pds-guide">READ THE ATTACHED GUIDE TO FILLING OUT THE PERSONAL DATA SHEET (PDS) BEFORE ACOMPLIISHING THE THE PDS FPOM</p>
						<p id= "pds-print">Print elegibly. Tick appropriate boxes and use separate sheet if necessary. Indicate N/A if not applicable. <b>DO NOT ABBREVIATE</b></p>
					</section>
					<section class= "pds-personal-information">
						<h1>I. Personal Information</h1>
						<section class= "pds-pi-table">
							<section class= "one-three">
								<section class= "pi-row">
									<section class= "pi-row-label">
										<p>2. Surname</p>
									</section>
									<section class= "pi-row-input">
										<input type= "text" id="pds_surname"> 
									</section>
								</section>
								<section class= "pi-row">
									<section class= "pi-row-label">
										<p>First name</p>
									</section>
									<section class= "pi-row-input">
										<input type= "text" id="pds_firstname">
										<input type= "text" placeholder= "Name Extension (Jr., Sr.)" id="pds_nameextension">
									</section>
								</section>
								<section class= "pi-row">
									<section class= "pi-row-label">
										<p>Middle name</p>
									</section>
									<section class= "pi-row-input">
										<input type= "text" id="pds_middlename">
									</section>
								</section>
							</section>
							<section class= "one-three">
								<section class= "pi-row">
									<section class= "pi-row-label">
										<p>3. Date of birth<br>(mm/dd/yyyy)</p>
									</section>
									<section class= "pi-row-input">
										<input type= "date" id="pds_dateofbirth">
									</section>
								</section>
								<section class= "pi-row">
									<section class= "pi-row-label">
										<p>4. Place of birth</p>
									</section>
									<section class= "pi-row-input">
										<input type= "text" id="pds_placeofbirth">
									</section>
								</section>
								<section class= "pi-row">
									<section class= "pi-row-label">
										<p>5. Sex</p>
									</section>
									<section class= "pi-row-input">
										<section class= "radio-input">
											<input type= "radio" name= "gender"  value= "Male"><p>Male</p>
										</section>
										<section class= "radio-input">
											<input type= "radio" name= "gender"  value= "Female"><p>Female</p>
										</section>
									</section>
								</section>
								<section class= "pi-row">
									<section class= "pi-row-label">
										<p>6. Civil Status</p>
									</section>
									<section class= "pi-row-input">
										<section class= "radio-input">
											<input type= "radio" class="civil_status" value= "Single"><p>Single</p>
										</section>
										<section class= "radio-input">
											<input type= "radio" name="civil_status" value= "Married"><p>Married</p>
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
										<input type= "text"  id="pds_height">
									</section>
								</section>
								<section class= "pi-row">
									<section class= "pi-row-label">
										<p>8. Weight(kg)</p>
									</section>
									<section class= "pi-row-input">
										<input type= "text"  id="pds_width">
									</section>
								</section>
								<section class= "pi-row">
									<section class= "pi-row-label">
										<p>9. Blood Type</p>
									</section>
									<section class= "pi-row-input">
										<input type= "text"  id="pds_bloodtype">
									</section>
								</section>
								<section class= "pi-row">
									<section class= "pi-row-label">
										<p>10. GSIS ID No</p> 
									</section>
									<section class= "pi-row-input">
										<input type= "text"  id="pds_gsisno">
									</section>
								</section>
								<section class= "pi-row">
									<section class= "pi-row-label">
										<p>11. Pag-ibig ID No</p>
									</section>
									<section class= "pi-row-input">
										<input type= "text" id="pds_pagibigno">
									</section>
								</section>
								<section class= "pi-row">
									<section class= "pi-row-label">
										<p>12. Philhealth No.</p>
									</section>
									<section class= "pi-row-input">
										<input type= "text" id="pds_philhealthno">
									</section>
								</section>
								<section class= "pi-row">
									<section class= "pi-row-label">
										<p>13. SSS No.</p>
									</section>
									<section class= "pi-row-input">
										<input type= "text" id="pds_sssno">
									</section>
								</section>
								<section class= "pi-row">
									<section class= "pi-row-label">
										<p>14. TIN No.</p>
									</section>
									<section class= "pi-row-input">
										<input type= "text" id="pds_tinno">
									</section>
								</section>
								<section class= "pi-row">
									<section class= "pi-row-label">
										<p>15. Agency Employee No.</p>
									</section>
									<section class= "pi-row-input">
										<input type= "text" id="pds_agencyemployee">
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
											<input type= "radio" name= "citi" value= "Filipino">
											<p>Filipino</p>
										</section>
										<section class= "radio-input">
											<input type= "radio" name= "citi" value= "Dual Citizenship">
											<p>Dual Citizenship</p>
										</section>
										<section class= "radio-input">
											<input type= "radio" name= "citi" value= "By Birth">
											<p>By Birth</p>
										</section>
										<section class= "radio-input">
											<input type= "radio" name= "citi" value= "By Naturalization">
											<p>By Naturalization</p>
										</section>
										<section class= "radio-input">
											<p>Pls. indicate the country:</p>
										</section>
										<section class= "radio-input" id="pds_country">
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
											<input type= "text" placeholder= "House/Block/Lot No." id="pds_rhouseblk">
											<input type= "text" placeholder= "Street" id="pds_rstreet">
										</section>
										<section class= "text-input">
											<input type= "text" placeholder= "Subdivision/Village" id="pds_rsubdivision">
											<input type= "text" placeholder= "Barangay" id="pds_rbarangay">
										</section>
										<section class= "text-input">
											<input type= "text" placeholder= "City/Municipality" id="pds_rmunicipality">
											<input type= "text" placeholder= "Province" id="pds_rprovince">
										</section>
									</section>
								</section>
								<section class= "pi-row">
									<section class= "pi-row-label">
										<p>ZIP CODE</p>
									</section>
									<section class= "pi-row-input">
										<input type= "text" id="pds_rzipcode">
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
											<input type= "text" placeholder= "House/Block/Lot No." id="pds_phouseblk">
											<input type= "text" placeholder= "Street" id="pds_pstreet">
										</section>
										<section class= "text-input">
											<input type= "text" placeholder= "Subdivision/Village" id="pds_psubdivision">
											<input type= "text" placeholder= "Barangay" id="pds_pbarangay">
										</section>
										<section class= "text-input">
											<input type= "text" placeholder= "City/Municipality" id="pds_pmunicipality">
											<input type= "text" placeholder= "Province" id="pds_pprovince">
										</section>
									</section>
								</section>
								<section class= "pi-row">
									<section class= "pi-row-label">
										<p>ZIP CODE</p>
									</section>
									<section class= "pi-row-input">
										<input type= "text" id="pds_pzipcode">
									</section>
								</section>
								<section class= "pi-row">
									<section class= "pi-row-label">
										<p>19. Telephone No.</p>
									</section>
									<section class= "pi-row-input">
										<input type= "text" id="pds_telno">
									</section>
								</section>
								<section class= "pi-row">
									<section class= "pi-row-label">
										<p>20. Mobile No.</p>
									</section>
									<section class= "pi-row-input">
										<input type= "text" id="pds_mobileno">
									</section>
								</section>
								<section class= "pi-row">
									<section class= "pi-row-label">
										<p>21. Email Address(If any)</p>
									</section>
									<section class= "pi-row-input">
										<input type= "email" id="pds_emailaddress">
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
											<input type= "text" id="pds_spousesurname">
										</section>
										<section class= "text-input">
											<input type= "text"  id="pds_spousefirstname">
											<input type= "text" placeholder= "Name Extension(Jr., Sr.)"  id="pds_spousenameextension">
										</section>
										<section class= "text-input">
											<input type= "text"  id="pds_spousemiddlename">
										</section>
									</section>
								</section>
								<section class= "pi-row">
									<section class= "pi-row-label">
										<p>Occupation</p>
									</section>
									<section class= "pi-row-input">
										<input type= "text"  id="pds_spouseoccupation">
									</section>
								</section>
								<section class= "pi-row">
									<section class= "pi-row-label">
										<p>Employer/Business Name</p>
									</section>
									<section class= "pi-row-input">
										<input type= "text"  id="pds_businessname">
									</section>
								</section>
								<section class= "pi-row">
									<section class= "pi-row-label">
										<p>Business Address</p>
									</section>
									<section class= "pi-row-input">
										<input type= "text"  id="pds_businessaddress">
									</section>
								</section>
								<section class= "pi-row">
									<section class= "pi-row-label">
										<p>Telephone No.</p>
									</section>
									<section class= "pi-row-input">
										<input type= "text"  id="pds_businesstelno">
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
											<input type= "text"  id="pds_fathersurname">
										</section>
										<section class= "text-input">
											<input type= "text"  id="pds_fatherfirstname">
											<input type= "text" placeholder= "Name Extension(Jr., Sr.)"  id="pds_fathernameextension">
										</section>
										<section class= "text-input">
											<input type= "text" id="pds_fathermiddlename">
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
											<input type= "text" id="pds_mothersurname">
										</section>
										<section class= "text-input">
											<input type= "text" id="pds_motherfirstname" >
											<input type= "text" placeholder= "Name Extension(Jr., Sr.)" id="pds_mothersnameextension">
										</section>
										<section class= "text-input">
											<input type= "text" id="pds_mothersmiddlename">
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
												<input type= "text" id="pds_children1">
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
					<section class= "pds-footer">
						<section class= "footer-column">
							<p>SIGNATURE</p>
							<input type= "text">
						</section>
						<section class= "footer-column">
							<p>DATE</p>
							<input type= "date">
						</section>
					</section>
				</section>
				<section class= "application-btn">
					<button type= "submit" id="submit_pds">DONE</button>
					<button type= "submit" id= "submit_file">ATTACH FILE</button>
				</section>
			</section>
		</section>
		<?php include '../include/user-info-modal.php';?>
		<?php include '../include/applicant-attach-modal.php';?>
		<?php include '../include/applicant-choosefile-modal.php';?>
		<?php include '../include/applicant-pds-modal.php';?>
	</body>
</html>