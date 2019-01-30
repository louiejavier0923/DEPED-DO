<!DOCTYPE html>

<html>
	<head>
		<?php
          session_start();
            if(isset($_SESSION['APPLICANTS_ID'])){
             header('location:applicants/home.php');
             }
         ?>
         <?php include 'DOADMIN/admin/includes/conn.php';?>
		<title>Home | Division Office</title>
		<?php include 'include/header-content.php';?>
	</head>
	<body>
		<section class= "header-container">
			<?php include 'include/header-container.php'; ?>
		</section>
		<section class= "body-container">
			<section class= "body-two">
				<section class= "four-half">
					<section class= "half-mission">
						<h3>Mission</h3>
						<div class= "line"></div>
						<p>To protect and promote the right of every Filipino to quality, equitable, culture-based, and complete basic education where:</p>
						<ol>
							<li>Student learn in a child-friendly, gender-sensitive, safe, and motivating environment</li>
							<li>Teachers facilitate learning and constantly nurture every learner</li>
							<li>Administrators and staff, as stewards of the institution, ensure an enabling and supportive environment for effective learning to happen</li>
							<li>Family, community, and other stakeholders are actively engaged and share the responsibility for developing life-long learners.</li>
						</ol>
					</section>
					<section class= "half-vision">
						<h3>Vision</h3>
						<div class="line"></div>
						<p>We dream of Filipinos who passionately love their country and whose competencies and values enable them to realize their potential and contribute meaningfully to building the nation.</p>
						<p>As a learner-centered public institution the Department of Education continuously improves itself to better serve its stakeholders.</p>
					</section>
				</section>
				<section class= "four-half">
					<section class= "slider">
						<div class= "slide"><img src= "img/2.jpg"></div>
						<div class= "slide"><img src= "img/3.jpg"></div>
						<div class= "slide"><img src= "img/4.jpg"></div>
						<div class= "slide"><img src= "img/5.png"></div>
					</section>
				</section>
			</section>
			<section class= "body-two">
				<section class= "two-side-info">
					<h4>Advisory</h4>
					<section class= "side-info">
						<p>October 26, 2018</p>
						<a href= "#">Div Advisory No, 296_Request to Conduct Scholarship Qualifying Exam for Grade 6 and 10 Pupils</a>
					</section>
					<section class= "side-info">
						<p>October 09, 2018</p>
						<a href= "#">No. 322 Division Advisory_Film Showing of Independent Film entitled (ANTOS HEART)</a>
					</section>
					<section class= "side-info">
						<p>October 09, 2018</p>
						<a href= "#">No. 323 Division Advisory_5TH DIVISION SPFL-CHINESSE MANDARI FESTIVAL OF TALENTS AND SEARCH FOR Mr. & Miss MANDARIN 2018</a>
					</section>
					<section class= "side-info">
						<p>October 09, 2018</p>
						<a href= "#">No. 324 Division Advisory_Conduct of School Advocacy Sessions to tragetd Schools in Quezon City</a>
					</section>
					<section class= "side-info">
						<p>October 09, 2018</p>
						<a href= "#">No. 325 Division Advisory_Request to Conduct Room to Room Markefting and Service campaign to Students, Faculty and Adminsitration Staff</a>
					</section>
					<section class= "side-info">
						<p>October 09, 2018</p>
						<a href= "#">No. 326 Division Advisory_Invitation to Participate in the Lecture Forum on Rebuilding CIvikization with the use of Innovation</a>
					</section>
					<section class= "side-info">
						<p>October 09, 2018</p>
						<a href= "#">No. 327 Division Advisory_ROBORAVE INTERNATION 2018</a>
					</section>
					<section class= "side-info">
						<p>October 09, 2018</p>
						<a href= "#">No. 328 Division Advisory_20TH INTERNATION ROBOT OLYMIAD</a>
					</section>
					<section class= "side-info">
						<p>October 09, 2018</p>
						<a href= "#">No. 329 Division Advisory_PEDAGOGICAL RETOOLING MATHEMATICS, LANGUAGES AND SCIENCE FOR JUNIOR HIGH SCHOOL (PRIMASL JHS)</a>
					</section>
					<section class= "side-info">
						<p>September 24, 2018</p>
						<a href= "#">Div Advisory No, 295_Orientation of Newly-hired Teachers (DOST Scholars-RA 10612)</a>
					</section>
					<a href= "#" id= "view">VIEW MORE</a>
				</section>
				<section class= "two-main-info">
					<section class= "main-info">
						<h1>News</h1>
						<div class= "line"></div>
						<section class= "info-latest">
							<img src= "img/news1.jpg" id= "news-img">
							<h1 id= "title">Dissemination of Presidential Proclamation No. 269</h1>
							<p id= "author">Roy L. Ilustre, August 10, 2017</p>
							<h3 id= "subtitle">Declaring the Regular Holidays and Special (Non-working Days for the year 2018)</h3>
							<p id= "memo-title">Division Memorandum No. 105, s. 2017</p>
							<a href= "#" id= "view-memo">View Memorandum</a>
							<p id= "info-content">For the information and guidance of all concerned, enclosed is a copy of DepEd Memorandum no. 127 s. 2017, from the Undersecretary, Officer In-Charge, Department of Education, dated July 31, 2017 entitled Declaring the Regular Holidays and Special (Non-working) Days for the year 2018, which is selfexplanatory. </p>
						</section>
					</section>
					<section class= "past-info">
						<section class= "past-content">
							<h2 id= "past-title">Division No. 187, s. 2019</h2>
							<p id= "past-info">Info Content</p>
							<a href= "#" id= "past-memo">View Memorandum</a>
						</section>
						<section class= "past-content">
							<h2 id= "past-title">Division No. 187, s. 2019</h2>
							<p id= "past-info">Info Content</p>
							<a href= "#" id= "past-memo">View Memorandum</a>
						</section>
						<section class= "past-content">
							<h2 id= "past-title">Division No. 187, s. 2019</h2>
							<p id= "past-info">Info Content</p>
							<a href= "#" id= "past-memo">View Memorandum</a>
						</section>
						<section class= "past-content">
							<h2 id= "past-title">Division No. 187, s. 2019</h2>
							<p id= "past-info">Info Content</p>
							<a href= "#" id= "past-memo">View Memorandum</a>
						</section>
					</section>
					<section class= "applicant-container">
						<h1>List Qualified Teachers</h1>
						<div class= "line"></div>
						<input type= "text" placeholder= "Search...">
						<section class= "applicant-table">
							<section class= "applicant-table-header">
								<section class= "header">
									<p>Rank</p>
								</section>
								<section class= "header">
									<p>Teacher`s Name</p>
								</section>
								<section class= "header">
									<p>Age</p>
								</section>
								<section class= "header">
									<p>Grade</p>
								</section>
							</section>
							<section class= "applicant-table-content">
		                	<?php
			                    $cnt='';
			                    $sql = "SELECT DISTINCT LASTNAME, FIRSTNAME, MIDDLENAME, TOTALPOINTS FROM view_rank";
			                    $query = $conn->query($sql);
			                    while($row = $query->fetch_assoc()){
			                      $cnt += 1;
		                    ?>
								<section class= "content-info">
									<section class= "info">
										<p><?php echo $cnt ?></p>
									</section>
									<section class= "info">
										<p><?php echo $row['LASTNAME']; ?>, <?php echo $row['FIRSTNAME']; ?> <?php echo $row['MIDDLENAME']; ?></p>
									</section>
									<section class= "info">
										<p>21</p>
									</section>
									<section class= "info">
										<p><?php echo $row['TOTALPOINTS']; ?></p>
									</section>
								</section>
							<?php
								}
                  			?>
							</section>
						</section>
					</section>
					<section class= "vacancy-container">
						<h1>LIST OF VACANT POSITIONS</h1>
						<div class= "line"></div>
					<?php 
						$sql = "SELECT * FROM publish_vacancy";
						$query = $conn->query($sql);
						while($row = $query->fetch_assoc()) {
					?>
						<section class= "vacant">
							<img src= "img/logo.png">
							<h3 id= "position"><?php echo $row['TITLE'];?></h3>
							<p id= "school"><?php echo $row['NOI'];?></p>
							<p id= "address"><?php echo $row['PUBLICATION_DATE'];?> | <?php echo $row['DESCRIPTION'];?></p>
							<a id= "joinBtn">APPLY</a>
						</section>
					<?php
						}
					?>
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