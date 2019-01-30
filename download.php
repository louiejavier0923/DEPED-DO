<!DOCTYPE html>

<html>
	<head>
		<?php
          session_start();
            if(isset($_SESSION['APPLICANTS_ID'])){
             header('location:applicants/home.php');
             }
         ?>
		<title>Downloadble Forms | Division Office</title>
		<?php include 'include/header-content.php';?>
	</head>
	<body>
		<section class= "header-container">
			<?php include 'include/header-container.php'; ?>
		</section>
		<section class= "body-container">
			<section class="body-download">
				<section class="body-download-info">
					<section class= "download-info">
						<h3>Administrative Office</h3>
						<div class= "line"></div>
						<section class= "form-info">
							<section class= "download-file">
								<a href= "files/downloadables/Application-for-Cash-Surrender.pdf"><img src= "img/icon-pdf.ico">Application for Cash Surrender / Termination Value</a>
							</section>
							<section class= "download-file">
								<a href= "files/downloadables/Application-for-Provident-Fund.pdf"><img src= "img/icon-pdf.ico">Provident Fund (Application Form)</a>
							</section>
							<section class= "download-file">	
								<a href= "files/downloadables/Aplication-for-Maturity-Benefits.pdf"><img src= "img/icon-pdf.ico">Application for Maturiry Benifits</a>
							</section>
							<section class= "download-file">
								<a href= "files/downloadables/Application-form-Retirement-Benefits.pdf"><img src= "img/icon-pdf.ico">Application for Retirement Benefits</a>
							</section>
							<section class= "download-file">
								<a href= "files/downloadables/Application-or-Retirement.pdf"><img src= "img/icon-pdf.ico">Application for Retirement (Routing Slip)</a>
							</section>
							<section class= "download-file">
								<a href= "files/downloadablesMembership-Information-Sheet(GSIS).pdf/"><img src= "img/icon-pdf.ico">Membership Information Sheet (GSIS)</a>
							</section>
							<section class= "download-file">
								<a href= "files/downloadables/GSIS - Member-Request-Form.pdf"><img src= "img/icon-pdf.ico">GSIS Member`s Request Form</a>
							</section>
						</section>
					</section>
					<section class= "download-info">
						<h3>Accounting Section</h3>
						<div class= "line"></div>
						<section class= "form-info">
							<section class= "download-file">
								<a href= "files/downloadables/Philhealth-Er2.pdf"><img src= "img/icon-pdf.ico">PhilHealth Er2</a>
							</section>
							<section class= "download-file">
								<a href= "files/downloadables/PhilHealth-ClaimForm.pdf"><img src= "img/icon-pdf.ico">PhilHealth Claim Form 1</a>
							</section>
							<section class= "download-file">	
								<a href= "files/downloadables/BIR-1902.pdf"><img src= "img/icon-pdf.ico">BIR 1902 (Application for Registration)</a>
							</section>
							<section class= "download-file">
								<a href= "files/downloadables/BIR-1905.pdf"><img src= "img/icon-pdf.ico">BIR - 1905 (Application for Registration Information Update)</a>
							</section>
							<section class= "download-file">
								<a href= "files/downloadables/BIR-2305.pdf"><img src= "img/icon-pdf.ico">BIR - 2305 (Certification of Update of Excemption and Employer`s and Employee`s Information)</a>
							</section>
							<section class= "download-file">
								<a href= "files/downloadables/CDR-NewFormat.xls"><img src= "img/icon-excel.ico">Cash Disbursements Register</a>
							</section>
							<section class= "download-file">
								<a href= "files/downloadables/Dibursment-Voucher-National.xls"><img src= "img/icon-excel.ico">Disbursement Voucher (National)</a>
							</section>
						</section>
					</section>
					<section class= "download-info">
						<h3>Personnel Section</h3>
						<div class= "line"></div>
						<section class= "form-info">
							<section class= "download-file">
								<a href= "files/downloadables/Application-for-Leave.pdf"><img src= "img/icon-pdf.ico">Application for Leave</a>
							</section>
							<section class= "download-file">
								<a href= "files/downloadables/Application-for-Ombudsman-Clearance.pdf"><img src= "img/icon-pdf.ico">Application for Ombudsman Clearance</a>
							</section>
							<section class= "download-file">	
								<a href= "files/downloadables/Appointments-of-Teachers.pdf"><img src= "img/icon-pdf.ico">Appointment of Teachers</a>
							</section>
							<section class= "download-file">
								<a href= "files/downloadables/Division-Clearance-(All Kinds of Leave).pdf"><img src= "img/icon-pdf.ico">Division Clearance (All kinds of Leave)</a>
							</section>
							<section class= "download-file">
								<a href= "files/downloadables/Division-Clearance-(Retirement).pdf"><img src= "img/icon-pdf.ico">Division Clearance (Retirement)</a>
							</section>
							<section class= "download-file">
								<a href= "files/downloadables/Daily-Time-Record.pdf"><img src= "img/icon-pdf.ico">Daily Time Record</a>
							</section>
							<section class= "download-file">
								<a href= "files/downloadables/Medical-Certificate.pdf"><img src= "img/icon-pdf.ico">Medical Certificate</a>
							</section>
							<section class= "download-file">
								<a href= "files/downloadables/Panunumpa-sa-Katungkulan.pdf"><img src= "img/icon-pdf.ico">Panunumpa sa Katungkulan</a>
							</section>
							<section class= "download-file">
								<a href= "files/downloadables/Personal-Data-Sheet.xlsx"><img src= "img/icon-excel.ico">Personal Data Sheet (CS Form No. 212 Revised Personal Data Sheet 2017)</a>
							</section>
							<section class= "download-file">
								<a href= "files/downloadables/Position-Description-Form.pdf"><img src= "img/icon-pdf.ico">Position Description Form</a>
							</section>
							<section class= "download-file">
								<a href= "files/downloadables/Statement-of-Assets-and-Liabilities.doc"><img src= "img/icon-pdf.ico">Statement of Assets and Liabilities</a>
							</section>
						</section>
					</section>
					<section class= "download-info">
						<h3>Budget Office</h3>
						<div class= "line"></div>
						<section class= "form-info">
							<section class= "download-file">
								<a href= "files/downloadables/Obligation-Request-Status-Local.xls"><img src= "img/icon-excel.ico">Obligation Request Status (Local)</a>
							</section>
							<section class= "download-file">
								<a href= "files/downloadables/Obligation-Request-Status-National.xls"><img src= "img/icon-excel.ico">Obligation Request Status (Nat`l)</a>
							</section>
							<section class= "download-file">	
								<a href= "files/downloadables/Budget Workshop Forms.zip"><img src= "img/icon-excel.ico">Budget Workshop Forms</a>
							</section>
						</section>
					</section>
					<section class= "download-info">
						<h3>Legal Section</h3>
						<div class= "line"></div>
						<section class= "form-info">
							<section class= "download-file">
								<a href= "files/downloadables/Certificatie-of-no-Pending-Administrative-Case.pdf"><img src= "img/icon-pdf.ico">Certificate of No Pending Administrative Case</a>
							</section>
							<section class= "download-file">
								<a href= "files/downloadables/Minutes-of-Hearing.pdf"><img src= "img/icon-pdf.ico">Minutes of Hearing</a>
							</section>
						</section>
					</section>
					<section class= "download-info">
						<h3>Cashier Office</h3>
						<div class= "line"></div>
						<section class= "form-info">
							<section class= "download-file">
								<a href= "files/downloadables/Monthtly-Collections-and-Deposits.pdf"><img src= "img/icon-pdf.ico">Monthly Collection and Debits</a>
							</section>
						</section>
					</section>
					<section class= "download-info">
						<h3>Other</h3>
						<div class= "line"></div>
						<section class= "form-info">
							<section class= "download-file">
								<a href= "files/downloadables/Annex A-&-B-Radar-1-& -2-for-DRRMO.pdf"><img src= "img/icon-pdf.ico">Annex A & B, Radar 1 & 2 DRRMO</a>
							</section>
						</section>
					</section>
					<section class= "download-info">
						<h3>EOSY 2014 tO 2015 for Elementary and High School</h3>
						<div class= "line"></div>
						<section class= "form-info">
							<section class= "download-file">
								<a href= "files/downloadables/SY 2014-15 for Elementary.xls"><img src= "img/icon-excel.ico">Year End Form SY 2014 - 15 for Elementary</a>
							</section>
							<section class= "download-file">
								<a href= "files/downloadables/SY 2014-15 for High School.xls"><img src= "img/icon-excel.ico">Year End Form SY 2014 - 15 for High School</a>
							</section>
						</section>
					</section>
					<section class= "download-info">
						<h3>K to 12 Modified School Forms</h3>
						<div class= "line"></div>
						<section class= "form-info">
							<section class= "download-file">
								<a href= "files/downloadables/School Form.xls"><img src= "img/icon-excel.ico">School Form 5 (SF 5)</a>
							</section>
						</section>
					</section>
					<section class= "download-info">
						<h3>SY 2015 NAT Handbook and Guidelines</h3>
						<div class= "line"></div>
						<section class= "form-info">
							<section class= "download-file">
								<a href= "files/downloadables/2015 LAPG ANSWER SHEET Grade 3 .pdf"><img src= "img/icon-pdf.ico">2015 LAPG Answer Sheet Grade 3</a>
							</section>
							<section class= "download-file">
								<a href= "files/downloadables/2015_NAT_Test_Admin_Guide.ppt"><img src= "img/icon-ppt.ico">NAT Test Administrator Guidelines</a>
							</section>
							<section class= "download-file">
								<a href= "files/downloadables/LAPG-Handbook-2015.pdf"><img src= "img/icon-pdf.ico">LAFG Handbook</a>
							</section>
							<section class= "download-file">
								<a href= "files/downloadables/NAT_Examiners_HB_Y4.pdf"><img src= "img/icon-pdf.ico">Examiner`s Handbook Year 4</a>
							</section>
							<section class= "download-file">
								<a href= "files/downloadables/NAT_Examiners_HB_G6.pdf"><img src= "img/icon-pdf.ico">Examiner`s Handbook Grade 6</a>
							</section>
						</section>
					</section>
					<section class= "download-info">
						<h3>SY 2016 to 2017 Accomodation Form</h3>
						<div class= "line"></div>
						<section class= "form-info">
							<section class= "download-file">
								<a href= "files/downloadables/AR FORM 1- 2016-2015.xls"><img src= "img/icon-excel.ico">Accomodation Form 1</a>
							</section>
							<section class= "download-file">
								<a href= "files/downloadables/AR FORM 1- 2016-2017 (Supplemental for Senior High School).xls"><img src= "img/icon-excel.ico">Accomodation Form 1 (Supplemental for SHS)</a>
							</section>
						</section>
					</section>
					<section class= "download-info">
						<h3>Division Annual Report Forms</h3>
						<div class= "line"></div>
						<section class= "form-info">
							<section class= "download-file">
								<a href= "files/downloadables/Data for Annual Report.xls"><img src= "img/icon-excel.ico">Division Annual Report</a>
							</section>
						</section>
					</section>
					<section class= "download-info">
						<h3>FY 2015 Work Financial Forms</h3>
						<div class= "line"></div>
						<section class= "form-info">
							<section class= "download-file">
								<a href= "files/downloadables/RSHS.zip"><img src= "img/icon-excel.ico">RSHS</a>
							</section>
							<section class= "download-file">
								<a href= "files/downloadables/SPED.zip"><img src= "img/icon-excel.ico">SPED</a>
							</section>
							<section class= "download-file">
								<a href= "files/downloadables/SSES.zip"><img src= "img/icon-excel.ico">SSES</a>
							</section>
							<section class= "download-file">
								<a href= "files/downloadables/STE.zip"><img src= "img/icon-excel.ico">STE</a>
							</section>
							<section class= "download-file">
								<a href= "files/downloadables/TecVoc-DO.zip"><img src= "img/icon-excel.ico">TechVoc - DO</a>
							</section>
						</section>
					</section>
					<section class= "download-info">
						<h3>SY 2014 to 2015 EBEIS Beginning Profile</h3>
						<div class= "line"></div>
						<section class= "form-info">
							<section class= "download-file">
								<a href= "files/downloadables/SY 2014-15 BOSY GESP.xls"><img src= "img/icon-excel.ico">SY 2014 - 15 BOSY GESP</a>
							</section>
							<section class= "download-file">
								<a href= "files/downloadables/SY 2014-15 BOSY GSSP.xls"><img src= "img/icon-excel.ico">SY 2014 - 15 BOSY GSSP</a>
							</section>	
							<section class= "download-file">
								<a href= "files/downloadables/"><img src= "img/icon-excel.ico">SY 2014 - 15 BOSY SUCs</a>
							</section>
						</section>
					</section>
					<section class= "download-info">
						<h3>2015 NCAE Private Schools</h3>
						<div class= "line"></div>
						<section class= "form-info">
							<section class= "download-file">
								<a href= "files/downloadables/1 - 2015 NCAE Overview.pptx"><img src= "img/icon-ppt.ico">2015 NCAE Overview</a>
							</section>
							<section class= "download-file">
								<a href= "files/downloadables/1 - 2015 NCAE  Guidelines.pptx"><img src= "img/icon-ppt.ico">2015 NCAE Guidelines</a>
							</section>
							<section class= "download-file">
								<a href= "files/downloadables/3 - 2015 NCAE Examiner`s Handbook-REVISED 7.15.15.doc"><img src= "img/icon-pdf.ico">2015 NCAE Examiner`s Handbook - REVISED 7, 15, 15</a>
							</section>
							<section class= "download-file">
								<a href= "files/downloadables/"><img src= "img/icon-pdf.ico">NCAE AS 2015</a>
							</section>
							<section class= "download-file">
								<a href= "files/downloadables/"><img src= "img/icon-pdf.ico">NCAE COR 2015</a>
							</section>
							<section class= "download-file">
								<a href= "files/downloadables/"><img src= "img/icon-pdf.ico">NCAE HEADER 2015</a>
							</section>
							<section class= "download-file">
								<a href= "files/downloadables/"><img src= "img/icon-excel.ico">Private Schs Directory & NCAE Testing Center</a>
							</section>
						</section>
					</section>
					<section class= "download-info">
						<h3>2014 NCAE Private Schools</h3>
						<div class= "line"></div>
						<section class= "form-info">
							<section class= "download-file">
								<a href= "files/downloadables/"><img src= "img/icon-excel.ico">2014 Private School Masterlist of Learners</a>
							</section>
						</section>
					</section>
					<section class= "download-info">
						<h3>2016 to 2017 Accomodation Form</h3>
						<div class= "line"></div>
						<section class= "form-info">
							<section class= "download-file">
								<a href= "files/downloadables/"><img src= "img/icon-excel.ico">Accomodation Form 1</a>
							</section>
							<section class= "download-file">
								<a href= "files/downloadables/"><img src= "img/icon-excel.ico">Accomodation Form 1 (Supplemental for SHS)</a>
							</section>
						</section>
					</section>
					<section class= "download-info">
						<h3>2016 to 2017 Accomodation Form</h3>
						<div class= "line"></div>
						<section class= "form-info">
							<section class= "download-file">
								<a href= "files/downloadables/"><img src= "img/icon-excel.ico">2014 Private School Profile End of SY</a>
							</section>
							<section class= "download-file">
								<a href= "files/downloadables/"><img src= "img/icon-excel.ico">2013 - 2014 Year End Form</a>
							</section>
							<section class= "download-file">
								<a href= "files/downloadables/"><img src= "img/icon-excel.ico">Enrollment Report as June - BOSY 2014 - 2015</a>
							</section>
							<section class= "download-file">
								<a href= "files/downloadables/"><img src= "img/icon-excel.ico">NCAE & NAT Forms</a>
							</section>
							<section class= "download-file">
								<a href= "files/downloadables/"><img src= "img/icon-excel.ico">SY 2014 - 15 Private School Profile</a>
							</section>
						</section>
					</section>
				</section>
			</section>
		</section>
		<section class= "footer-container">
			<?php include 'include/footer-container.php';?>
        </section>
        <section class= "modal-login-register" id= "modal-login-register">
        	<?php include 'include/login-register-modal.php';?>
        </section>
		<?php include 'include/error-message-modal.php';?>
	</body>
</html>