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
						<section class= "pds-pi-table single-fields">
							<section class= "one-three">
								<section class= "pi-row">
									<section class= "pi-row-label">
										<p>2. Surname</p>
									</section>
									<section class= "pi-row-input">
										<input type= "text" class="pds_surname" name='Surname' > 
									</section>
								</section>
								<section class= "pi-row">
									<section class= "pi-row-label">
										<p>First name</p>
									</section>
									<section class= "pi-row-input">
										<input type= "text" class="pds_firstname" name='First Name' >
										<input type= "text" name='Extension Name'  placeholder= "Name Extension (Jr., Sr.)" class="pds_nameextension">
									</section>
								</section>
								<section class= "pi-row">
									<section class= "pi-row-label">
										<p>Middle name</p>
									</section>
									<section class= "pi-row-input">
										<input type= "text" class="pds_middlename" name='Middle Name' >
									</section>
								</section>
							</section>
							<section class= "one-three">
								<section class= "pi-row">
									<section class= "pi-row-label">
										<p>3. Date of birth<br>(mm/dd/yyyy)</p>
									</section>
									<section class= "pi-row-input">
										<input type= "date" class="pds_dateofbirth" name='Date of Birth' >
									</section>
								</section>
								<section class= "pi-row">
									<section class= "pi-row-label">
										<p>4. Place of birth</p>
									</section>
									<section class= "pi-row-input">
										<input type= "text" class="pds_placeofbirth" name='Place of Birth' >
									</section>
								</section>
								<section class= "pi-row">
									<section class= "pi-row-label">
										<p>5. Sex</p>
									</section>
									<section class= "pi-row-input  radio-fields">
										<section class= "radio-input">
											<input type= "radio" class='pds_gender'  name= "Gender"  value= "Male"><p>Male</p>
										</section>
										<section class= "radio-input">
											<input type= "radio" class='pds_gender'  name= "Gender"  value= "Female"><p>Female</p>
										</section>
									</section>
								</section>
								<section class= "pi-row">
									<section class= "pi-row-label">
										<p>6. Civil Status</p>
									</section>
									<section class= "pi-row-input radio-fields">
										<section class= "radio-input">
											<input type= "radio"  class="civil_status" name="Civil Status" value= "Single"><p>Single</p>
										</section>
										<section class= "radio-input">
											<input type= "radio" class="civil_status" name="Civil Status" value= "Married"><p>Married</p>
										</section>
										<section class= "radio-input">
											<input type= "radio" class="civil_status" name="Civil Status" value= "Widow"><p>Widowed</p>
										</section>
										<section class= "radio-input">
											<input type= "radio"  class="civil_status" name="Civil Status" value= "Separated"><p>Separated</p>
										</section>
										<section class= "radio-input">
											<input type= "radio" class="civil_status" name="Civil Status" value= "Others"><p>Other`s</p>
										</section>
									</section>
								</section>
								<section class= "pi-row">
									<section class= "pi-row-label">
										<p>7. Height(m)</p>
									</section>
									<section class= "pi-row-input">
										<input type= "text"  class="pds_height" name='Height' >
									</section>
								</section>
								<section class= "pi-row">
									<section class= "pi-row-label">
										<p>8. Weight(kg)</p>
									</section>
									<section class= "pi-row-input">
										<input type= "text"  class="pds_weight" name='Weight' >
									</section>
								</section>
								<section class= "pi-row">
									<section class= "pi-row-label">
										<p>9. Blood Type</p>
									</section>
									<section class= "pi-row-input">
										<input type= "text"  class="pds_bloodtype"  name='Blood Type' >
									</section>	
								</section>
								<section class= "pi-row">
									<section class= "pi-row-label">
										<p>10. GSIS ID No</p> 
									</section>
									<section class= "pi-row-input">
										<input type= "text"  class="pds_gsisno" name='GSIS ID No.' >
									</section>
								</section>
								<section class= "pi-row">
									<section class= "pi-row-label">
										<p>11. Pag-ibig ID No</p>
									</section>
									<section class= "pi-row-input">
										<input type= "text" class="pds_pagibigno"  name='Pag-ibig ID No.' >
									</section>
								</section>
								<section class= "pi-row">
									<section class= "pi-row-label">
										<p>12. Philhealth No.</p>
									</section>
									<section class= "pi-row-input">
										<input type= "text" class="pds_philhealthno" name='Philhealth ID No.' >
									</section>
								</section>
								<section class= "pi-row">
									<section class= "pi-row-label">
										<p>13. SSS No.</p>
									</section>
									<section class= "pi-row-input">
										<input type= "text" class="pds_sssno" name='SSS ID No.' >
									</section>
								</section>
								<section class= "pi-row">
									<section class= "pi-row-label">
										<p>14. TIN No.</p>
									</section>
									<section class= "pi-row-input">
										<input type= "text" class="pds_tinno" name='TIN ID No.' >
									</section>
								</section>
								<section class= "pi-row">
									<section class= "pi-row-label">
										<p>15. Agency Employee No.</p>
									</section>
									<section class= "pi-row-input">
										<input type= "text" class="pds_agencyemployee" name='Agency Employee ID No.' >
									</section>
								</section>
							</section>
							<section class= "one-three">
								<section class= "pi-row radio-fields">
									<section class= "pi-row-label">
										<p>16. Citizenship<br><br><br><br><br><br><br><span>If holder of dual citizenship</span><br><br><span>please indicate the details.</span></p>
									</section>
									<section class= "pi-row-input">
										<section class= "radio-input">
											<input type= "radio" class='pds_citizenship' name= "Citizenship" value= "Filipino">
											<p>Filipino</p>
										</section>
										<section class= "radio-input">
											<input type= "radio" class='pds_citizenship' name= "Citizenship" value= "Dual Citizenship">
											<p>Dual Citizenship</p>
										</section>
										<section class= "radio-input">
											<input type= "radio" class='pds_citizenship' name= "Citizenship" value= "By Birth">
											<p>By Birth</p>
										</section>
										<section class= "radio-input">
											<input type= "radio"  class='pds_citizenship' name= "Citizenship" value= "By Naturalization">
											<p>By Naturalization</p>
										</section>
										<section class= "radio-input">
											<p>Pls. indicate the country:</p>
										</section>
										<section class= "radio-input" >
											<select class="pds_country">
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
											<input type= "text" name='Residential House/Block/Lot No.'  placeholder= "House/Block/Lot No." class="pds_rhouseblk">
											<input type= "text" name='Residential Street'  placeholder= "Street" class="pds_rstreet">
										</section>
										<section class= "text-input">
											<input type= "text" name='Residential Subdivision/Village' placeholder= "Subdivision/Village" class="pds_rsubdivision">
											<input type= "text" name='Residential Barangay' placeholder= "Barangay" class="pds_rbarangay">
										</section>
										<section class= "text-input">
											<input type= "text" name='Residential City/Municipality' placeholder= "City/Municipality" class="pds_rmunicipality">
											<input type= "text" name='Residential Province' placeholder= "Province" class="pds_rprovince">
										</section>
									</section>
								</section>
								<section class= "pi-row">
									<section class= "pi-row-label">
										<p>ZIP CODE</p>
									</section>
									<section class= "pi-row-input">
										<input type= "text" class="pds_rzipcode" name='Residential ZIP CODE' >
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
											<input type= "text" name='Permanent House/Block/Lot No.' placeholder= "House/Block/Lot No." class="pds_phouseblk">
											<input type= "text" name='Permanent Street'  placeholder= "Street" class="pds_pstreet">
										</section>
										<section class= "text-input">
											<input type= "text" name='Permanent Subdivision/Village' placeholder= "Subdivision/Village" class="pds_psubdivision">
											<input type= "text" name='Permanent Barangay' placeholder= "Barangay" class="pds_pbarangay">
										</section>
										<section class= "text-input">
											<input type= "text" name='Permanent City/Municipality' placeholder= "City/Municipality" class="pds_pmunicipality">
											<input type= "text" name='Permanent Province'  placeholder= "Province" class="pds_pprovince">
										</section>
									</section>
								</section>
								<section class= "pi-row">
									<section class= "pi-row-label">
										<p>ZIP CODE</p>
									</section>
									<section class= "pi-row-input">
										<input type= "text" class="pds_pzipcode" name='Permanent ZIP CODE'>
									</section>
								</section>
								<section class= "pi-row">
									<section class= "pi-row-label">
										<p>19. Telephone No.</p>
									</section>
									<section class= "pi-row-input">
										<input type= "text" name='Telephone No.' class="pds_telno">
									</section>
								</section>
								<section class= "pi-row">
									<section class= "pi-row-label">
										<p>20. Mobile No.</p>
									</section>
									<section class= "pi-row-input">
										<input type= "text" name='Mobile No.' class="pds_mobileno">
									</section>
								</section>
								<section class= "pi-row">
									<section class= "pi-row-label">
										<p>21. Email Address</p>
									</section>
									<section class= "pi-row-input">
										<input type= "email" name='Email Address' class="pds_emailaddress">
									</section>
								</section>
							</section>
						</section>
					</section>
					<section class= "pds-family-background">
						<h1>II. Family Background</h1>
						<section class= "pds-fb-table">
							<section class= "one-two">
								<section class= "pi-row spouse-fields">
									<section class= "pi-row-label">
										<p>22. Spouse`s Surname</p>
										<p>First Name</p>
										<p>Middle Name</p>
									</section>
									<section class= "pi-row-input">
										<section class= "text-input">
											<input type= "text" name='Spouse`s Surname' class="pds_spousesurname">
										</section>
										<section class= "text-input">
											<input type= "text" name='Spouse`s First Name'  class="pds_spousefirstname">
											<input type= "text" name='Spouse`s Extension Name' placeholder= "Name Extension(Jr., Sr.)"  class="pds_spousenameextension">
										</section>
										<section class= "text-input">
											<input type= "text"  name='Spouse`s Middle Name' class="pds_spousemiddlename">
										</section>
									</section>
								</section>
								<section class= "pi-row spouse-fields">
									<section class= "pi-row-label">
										<p>Occupation</p>
									</section>
									<section class= "pi-row-input">
										<input type= "text" name='Spouse`s Occupation'  class="pds_spouseoccupation">
									</section>
								</section>
								<section class= "pi-row spouse-fields">
									<section class= "pi-row-label">
										<p>Employer/Business Name</p>
									</section>
									<section class= "pi-row-input">
										<input type= "text" name='Spouse`s Employer/Business Name' class="pds_businessname">
									</section>
								</section>
								<section class= "pi-row spouse-fields">
									<section class= "pi-row-label">
										<p>Business Address</p>
									</section>
									<section class= "pi-row-input">
										<input type= "text" name='Spouse`s Business Address' class="pds_businessaddress">
									</section>
								</section>
								<section class= "pi-row spouse-fields">
									<section class= "pi-row-label">
										<p>Telephone No.</p>
									</section>
									<section class= "pi-row-input">
										<input type= "text" name='Spouse`s Business Telephone No.' class="pds_businesstelno">
									</section>
								</section>
								<section class= "pi-row single-fields">
									<section class= "pi-row-label">
										<p>24. Father`s Surname</p>
										<p>First Name</p>
										<p>Middle Name</p>
									</section>
									<section class= "pi-row-input">
										<section class= "text-input">
											<input type= "text" name='Father`s Surname'   class="pds_fathersurname">
										</section>
										<section class= "text-input">
											<input type= "text" name='Father`s First Name'   class="pds_fatherfirstname">
											<input type= "text" name='Father`s Extension Name'  placeholder= "Name Extension(Jr., Sr.)"  class="pds_fathernameextension">
										</section>
										<section class= "text-input">
											<input type= "text" name='Father`s Middle Name'  class="pds_fathermiddlename">
										</section>
									</section>
								</section>
								<section class= "pi-row single-fields">
									<section class= "pi-row-label">
										<p>25. Mother`s Maiden Name</p>
										<p>Surname</p>
										<p>First Name</p>
										<p>Middle Name</p> 
									</section>
									<section class= "pi-row-input">
										<section class= "text-input">
											<input type= "text" name='Mother`s Surname'  class="pds_mothermaindenname">
										</section>
										<section class= "text-input">
											<input type= "text" name='Mother`s First Name' class="pds_motherfirstname" >
											<input type= "text" name='Mother`s Extension Name' placeholder= "Name Extension(Jr., Sr.)" class="pds_mothersnameextension">
										</section>
										<section class= "text-input">
											<input type= "text" name='Mother`s Middle Name' class="pds_mothersmiddlename">
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
												<input type= "text" class="pds_children">
											</section>
											<section class= "info">
												<input type= "date" class="pds_childrenBdate">
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
										<input type= "text" class='pds_CS'>
									</section>
									<section class= "info">
										<input type= "text" class='pds_CS_rating'>
									</section>
									<section class= "info">
										<input type= "text" class='pds_CS_date'>
									</section>
									<section class= "info">
										<input type= "text"  class='pds_CS_place'>
									</section>
									<section class= "info">
										<input type= "text" class='pds_CS_licenceNo'>
										<input type= "date" class='pds_CS_licenceDate'>
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
										<input type= "date" class='pds_WE_FromDate'>
										<input type= "date" class='pds_WE_ToDate'>
									</section>
									<section class= "info">
										<input type= "text" class='pds_WE_PositionTitle'>
									</section>
									<section class= "info">
										<input type= "text" class='pds_WE_Place'>
									</section>
									<section class= "info">
										<input type= "text" class='pds_WE_MonthSalary'>
									</section>
									<section class= "info">
										<input type= "text" class='pds_WE_Salary'>
									</section>
									<section class= "info">
										<input type= "text" class='pds_WE_AppointmentStatus'>
									</section>
									<section class= "info">
										<input type= "text" value='....' class='pds_WE_GovService'>
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
										<input type= "text" class='pds_VW_Name_Address'>
									</section>
									<section class= "info">
										<input type= "date" class='pds_VW_FromDate'>
										<input type= "date" class='pds_VW_Todate'>
									</section>
									<section class= "info">
										<input type= "text" class='pds_VW_NumbHours'>
									</section>
									<section class= "info">
										<input type= "text" class='pds_VW_Work'>
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
										<input type= "text" class='pds_LaD_Title'>
									</section>
									<section class= "info">
										<input type= "date" class='pds_LaD_FromDate'>
										<input type= "date" class='pds_LaD_ToDate'>
									</section>
									<section class= "info">
										<input type= "text" class='pds_LaD_NumbHours'>
									</section>
									<section class= "info">
										<input type= "text" class='pds_LaD_Type'>
									</section>
									<section class= "info">
										<input type= "text" class='pds_LaD_ConductBy'>
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
				<section class= "errors">
					<div>hahdh sdhsdh</div>
				</section>
				<section class= "application-btn">
					<button type= "submit" class='save_pds' id="submit_pds">DONE</button>
					<button type= "submit" id= "submit_file">ATTACH FILE</button>
				</section>
			</section>
		</section>
		<?php include '../include/user-info-modal.php';?>
		<?php include '../include/applicant-attach-modal.php';?>
		<?php include '../include/applicant-choosefile-modal.php';?>
		<?php include '../include/applicant-pds-modal.php';?>
		<?php include '../include/applicant-files-modal.php';?>
	</body>
	<script type="text/javascript" src="../jsp/jquery-2.1.4.min.js"></script>
	<script type="text/javascript" src="../jsp/pds-function.js"></script>
	
</html>