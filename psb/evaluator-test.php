<!DOCTYPE html>

<?php

session_start();

if(!isset($_SESSION['ID'])){
	header('location:../evaluator-login-form.php');
}
$id = $_SESSION['ID'];

?>

<html>
	<head>
		<title>Schools Division Office | PSB</title>
		<meta name= "viewport" content= "width=device-width, initial-scale=1" />
		<link rel="icon" href="../img/logo.png"/>

		<!-- CSS Libraries -->
		<link rel= "stylesheet" href= "../css/animate.min.css" type= "text/css" />
		<link rel= "stylesheet" href= "../css/font-awesome.css" type= "text/css" />

		<!-- Javascript Libraries -->
		<script typ= "text/javascript" src= "../jsp/jquery-2.1.4.min.js"></script>
		<script typ= "text/javascript" src= "../jsp/angular.min.js"></script>

		<!-- Custom CSS -->
		<link rel= "stylesheet" href="../css/main.css" type= "text/css" />
		<link rel= "stylesheet" href="../RES/PSb-RESOURCES/CSS/evaluator.css" type= "text/css" />
		<link rel= "stylesheet" href="../RES/PSb-RESOURCES/CSS/eval-test.css" type= "text/css" />
		
	</head>

	<body>
		<section class= "evaluation-form">
			<section class= "eval-user-info" name="<?php echo $id;?>">
				<a href="evaluator-main.php" id="back"><i class="fa fa-arrow-left"></i></a>
				<p id="evaluator_name"></p>
				<a id="exit">Log-out</a>
			</section>
			<section class= "eval-info">
				<section class= "eval-info-header">
					<h1 class="evaluator-criteria"><?php echo $_SESSION['CRITERIA'];?></h1>
					<div class= "line"></div>
					<section class= "header-filter">
						<input type= "text" placeholder= "Search ...." class="applicant-filters" id="applicant_namesearch">
						<select class="applicant-filters" id="published_vacancy_select">
							<option>A - Z</option>
							<option>Z - A</option>
						</select>
					</section>
				</section>
				<section class= "eval-info-content">
					<section class= "content-header">
						<section class= "header">
							<p>No.</p>
						</section>
						<section class= "header">
							<p>Teacher`s Name</p>
						</section>
						<section class= "header">
							<p>Address</p>
						</section>
						<section class= "header">
							<p>Email Address</p>
						</section>
						<!-- <section class= "header">
							<p>Age</p>
						</section> -->
						<section class= "header">
							<p>Education<br>20%</p>
						</section>
						<section class= "header">
							<p>Teaching<br>Experience<br>15%</p>
						</section>
						<section class= "header">
							<p>LET / PBET<br>Rating<br>15%</p>
						</section>
						<section class= "header">
							<p>Specialized<br>Training / Skills - 10%</p>
						</section>
						<section class= "header">
							<p>Interview<br>15%</p>
						</section>
						<section class= "header">
							<p>Demo<br>Teaching<br>15%</p>
						</section>
						<section class= "header">
							<p>English Comm.<br>Skills - 15%</p>
						</section>
						<section class= "header">
							<p>Total<br>Score<br>100%</p>
						</section>
						<!-- <section class= "header">
							<p>Rank</p>
						</section> -->
					</section>
					<section class= "content-info">
						<section class= "info-container">
							<section class= "content">
								<p>1</p>
							</section>
							<section class= "content">
								<p>Javier, Louie Samson</p>
							</section>
							<section class= "content">
								<p>Barangay Bahay Toro, Quezon City</p>
							</section>
							<section class= "content">
								<p>09067720950</p>
							</section>
							<section class= "content center-pos">
								<div class="eval-out">
									<button>Edit</button>
									<div class="eval-out-value">20</div>
								</div>
								<div class='educ-window'>
									<div class="educ-window-content">
										<div class="ewc-grid">
											<div class="ewc-grid-input">
												<input type="checkbox" name="degree"/>&nbsp;&nbsp;With MA or MS degree
											</div>
											<div class="ewc-grid-input">
												<input type="checkbox" name="degree"/>&nbsp;&nbsp;With Master or Doctors(PhD) degree
											</div>
										</div>
										<div class="ewc-grid2">
											<input type="number" placeholder="Enter GWA">
											<div class="ewc-grid2-col">
												<button>Cancel</button>
												<button>Save</button>
											</div>
										</div>
									</div>
								</div>
							</section>
							<section class= "content">
								<input type= "text">
							</section>
							<section class= "content">
								<input type= "text">
							</section>
							<section class= "content">
								<input type= "text">
							</section>
							<section class= "content">
								<input type= "text">
							</section>
							<section class= "content">
								<input type= "text">
							</section>
							<section class= "content">
								<input type= "text">
							</section>
							<section class= "content">
								<p>98</p>
							</section>
						</section>
					</section>
				</section>

				<section class="submit">

					<button>SAVE</button>
					
				</section>

			</section>

		</section>


<!-- Custom Javascripts -->
<script src="../RES/PSb-RESOURCES/JS/functions.js"></script>
<script src="../RES/PSb-RESOURCES/JS/pointing-function.js"></script>
<script src="../RES/PSb-RESOURCES/JS/evaluate-test.js"></script>

	</body>
</html>