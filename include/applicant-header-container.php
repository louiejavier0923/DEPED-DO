<section class= "applicant-header-profile">
	<a id= "more-infoBtn"><i class= "fa fa-ellipsis-v"></i></a>
	<p id= "rank">Rank: <span>Not Ranked</span></p>
	<img src= "../img/logo.png">
	<h3><?php echo $user['EMAIL']?></h3>
	<input type= "hidden" name= "teacher-no" id= "teacher-no" value= "<?php echo $user['UID'];?>">
	<p id= "position">TEACHER I</p>
</section>
<section class= "applicant-header-nav">
	<a href= "home.php" class= "applicantNav" id= "newsBtn">Home</a>
	<a href= "about.php" class= "applicantNav" id= "aboutBtn">About Us</a>
	<a href= "download.php" class= "applicantNav" id= "downloadBtn">Downloadable Forms</a>
	<a href= "contact.php" class= "applicantNav" id= "contactBtn">Contact Us</a>
	<a href= "fill-up.php" class= "applicantNav" id= "applyBtn">APPLY NOW!</a>
	<a href= "logs.php" class= "applicantNav" id= "logsBtn">Logs</a>
</section>