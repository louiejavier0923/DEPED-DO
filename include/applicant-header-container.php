<section class= "applicant-header-profile">
	<a id= "more-infoBtn"><i class= "fa fa-ellipsis-v"></i></a>
	<p id= "rank">Rank: <span>Not Ranked</span></p>
	<img src= "../img/logo.png">
	<a id= "updatePicBtn">Change Profile Picture</a>
	<h3><?php echo $user['EMAIL']?></h3>
	<input type= "hidden" name= "teacher-no" id= "teacher-no" value= "<?php echo $user['UID'];?>">
	<p id= "position">TEACHER I</p>
</section>
<section class= "applicant-header-responsive">
	<a id= "menuBtn"><i class= "fa fa-bars"></i></a>
	<img src= "../img/logo.png">
	<p>Schools Division Office</p>
	<section class= "responsive-nav" id= "nav-menu">
		<section class= "nav-menu">
			<a href= "home.php" class= "applicantNav" id= "newsBtn">Home</a>
			<a href= "about.php" class= "applicantNav" id= "aboutBtn">About Us</a>
			<a href= "download.php" class= "applicantNav" id= "downloadBtn">Downloadable Forms</a>
			<a href= "contact.php" class= "applicantNav" id= "contactBtn">Contact Us</a>
			<a href= "fill-up.php" class= "applicantNav" id= "applyBtn">APPLY NOW!</a>
		</section>
	</section>
</section>
<section class= "applicant-header-nav">
	<a href= "home.php" class= "applicantNav" id= "newsBtn">Home</a>
	<a href= "about.php" class= "applicantNav" id= "aboutBtn">About Us</a>
	<a href= "download.php" class= "applicantNav" id= "downloadBtn">Downloadable Forms</a>
	<a href= "contact.php" class= "applicantNav" id= "contactBtn">Contact Us</a>
	<a href= "fill-up.php" class= "applicantNav" id= "applyBtn">APPLY NOW!</a>
	<a href= "logs.php" class= "applicantNav" id= "logsBtn">Status</a>
</section>