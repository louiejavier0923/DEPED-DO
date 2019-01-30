getUSer($('.eval-user-info').attr('name'));
getPublishedVacancy();

$(document).ready(function(){

	$('body')
	.on('click','#exit',function(){
		// logout button click
		var confirmation = confirm('Are you sure you want to log out?');
		if (confirmation) {
			$.ajax({
				type:'POST',
				url:'../RES/PSB-RESOURCES/PHP/session-logout.php',
				data:''
			}).done(function(b){
				if(b){
					window.location.href = "../evaluator-login-form.php";
				}
			})
		}
	})
	.on('keyup change blur','.applicant-filters',function(){

		var job = $('#published_vacancy_select').val(),
		applicant_name = $('#applicant_namesearch').val();

		$.ajax({
			type:'POST',
			url:'../RES/PSB-RESOURCES/PHP/model.php',
			data:{
				action:'get_applicant_list-test',
				a:job,
				b:applicant_name,
				c:user_id
			}
		}).done(function(data){
			// console.log(data);
			$('.content-info').html(data);
			setEditableInputGrades($('.evaluator-criteria').html());
		});

	})
	.on('blur','.input-grade',function(){

		var lim,
		grade = $(this).val(),
		criteria = $(this).prop('name'),
		pid = $('#published_vacancy_select').val();

		switch(criteria){
			case 'EDUCATION':
				lim = 20;
			break;

			case 'EXPERIENCE':
				lim = 15;
			break;

			case 'TRAINING':
				lim = 10;
			break;

			case 'ELIGIBILITY':
				lim = 15;
			break;

			case 'INTERVIEW':
				lim = 10;
			break;

			case 'DEMO':
				lim = 15;
			break;

			case 'COMMUNICATION':
				lim = 15;
			break;
		}

		if (grade<0 || grade>lim || grade=="") {
			// alert('Invalid grade entered!');
			alertError('Invalid grade entered! Try Again!');
			// $(this).focus();
		}
		else{

			var uid = $(this).parent('.content').siblings('.content:first-child').children('.applicant-id').html();

			// console.log(uid+' / '+criteria+' / '+grade+' / '+user_id);

			$.ajax({
				type:'POST',
				url:'../RES/PSB-RESOURCES/PHP/model.php',
				data:{
					action:'insert_applicant_point',
					a:uid,
					b:criteria,
					c:grade,
					d:user_id,
					e:pid,
					val:''
				}			
			}).done(function(data){
				// console.log(data);
				if (data) {
					$('.applicant-filters').blur();
				}
			})

		}

	})
	.on('click','#btn_save',function(){

		$('.applicant-filters').blur();
		saveAlert("Valid changes applied successfuly!")

	})
	.on('click','.eval-out-editbtn',function(){

		var e_win = $(this).parent('.eval-out').siblings('.educ-window');
		e_win.toggle();

	})
	.on('click','.ee-cancel',function(){

		var e_win = $(this).parent('.ewc-grid2-col').parent('.ewc-grid2').parent('.educ-window-content').parent('.educ-window');
		e_win.css({
			'display':'none'
		})
	})
	.on('click','.ex-cancel,.el-cancel',function(){

		var e_win = $(this).parent('.ewc-grid2-col').parent('.educ-window-content').parent('.educ-window');
		e_win.css({
			'display':'none'
		})
	})
	.on('click','.ee-save',function(){

		var additional = 0;
		
		var e_win = $(this).parent('.ewc-grid2-col').parent('.ewc-grid2').parent('.educ-window-content').parent('.educ-window');
		
		var gwa = parseFloat($(this).parent('.ewc-grid2-col').siblings('.input-gwa').val()),
		uid = $(this).siblings('.applicant-id').html(),
		pid = $('#published_vacancy_select').val(),
		master = $(this).parent('.ewc-grid2-col').parent('.ewc-grid2').siblings('.ewc-grid').children('.ewc-grid-input').children('input[type=checkbox].checkbox-master'),
		doctor = $(this).parent('.ewc-grid2-col').parent('.ewc-grid2').siblings('.ewc-grid').children('.ewc-grid-input').children('input[type=checkbox].checkbox-doctor');
		
		if (master.is(':checked')==true && doctor.is(':checked')==false) {
			additional = 1;
		}
		else if((master.is(':checked')==true && doctor.is(':checked')==true)||(master.is(':checked')==false && doctor.is(':checked')==true)){
			additional = 2;
		}


		if (gwa>3 || gwa<1) {
			// alert('Invalid GWA! Enter a valid number!');
			alertError('Invalid GWA! Enter a valid number!');
		}
		else{
			var val = gwa.toString()+','+additional.toString();
			// console.log(val)
			$.ajax({
				type:'POST',
				url:'../RES/PSB-RESOURCES/PHP/model.php',
				data:{
					action:'insert_applicant_point',
					a:uid,
					b:'EDUCATION',
					c:parseFloat(educationPoints('7',gwa))+parseFloat(additional),
					d:user_id,
					e:pid,
					val:val
				}			
			}).done(function(data){
				// console.log(data);
				if (data) {
					$('.applicant-filters').blur();
				}
			}) 
		}
	})
	.on('click','.checkbox-master,.checkbox-doctor',function(){
		switch($(this).attr('name')){

			case 'master':
				if ($(this).is(':checked')==true) {
					$(this).parent('.ewc-grid-input').siblings('.ewc-grid-input:last-child').children('.checkbox-doctor').prop('checked',false);
				}
			break;

			case 'doctor':
				if ($(this).is(':checked')==true) {
					$(this).parent('.ewc-grid-input').siblings('.ewc-grid-input:first-child').children('.checkbox-master').prop('checked',false);
				}
			break;

		}

	})
	.on('click','.ex-save',function(){

		var mnths = $(this).parent('.exp-btns').siblings('.educ-window-content-form').children('.experience-months').val();
		var kvtlgu = $(this).parent('.exp-btns').siblings('.educ-window-content-form').children('.select-kvtlgu').val();
	
		var exp_points = parseFloat(experiencePoints('7',mnths))+parseFloat(kvtlgu);
		var exp_value = mnths.toString()+','+kvtlgu.toString();
		var uid = $(this).siblings('.applicant-id').html(),
		pid = $('#published_vacancy_select').val();
		// console.log(experiencePoints('7',mnths) +'/'+exp_value+'/'+exp_points);
		if(mnths==""||mnths=='0'){
			alertError("You've entered an invalid value! Try again!");
		}
		else{

			$.ajax({
				type:'POST',
				url:'../RES/PSB-RESOURCES/PHP/model.php',
				data:{
					action:'insert_applicant_point',
					a:uid,
					b:'EXPERIENCE',
					c:exp_points,
					d:user_id,
					e:pid,
					val:exp_value
				}			
			}).done(function(data){
				// console.log(data);
				if (data) {
					$('.applicant-filters').blur();
				}
			}) 

		}


	})
	.on('click','.el-save',function(){

		var valid = true;
		var rater = $(this).parent('.exp-btns').siblings('.elig-grid').children('.ewc-grid-input').children('input[type=radio]:checked').val();
		var rating = $(this).parent('.exp-btns').siblings('.educ-window-content-form').children('.eligibility-rating').val();
		var el_points=0,el_value='';
		var uid = $(this).siblings('.applicant-id').html(),
		pid = $('#published_vacancy_select').val();

		if(rater==undefined){
			// alert('Choose between LET/PBET!');
			alertError('Choose between LET/PBET!');
			valid = false;
		}
		if(rating>100||rating<75){
			// alert('Enter a valid number!');
			alertError('Enter a valid number!');
			valid = false;
		}
		
		if(valid){
			el_value = rating.toString()+','+rater.toString();
			el_points = eligibilityPoints(rater,parseFloat(rating));
			// console.log(el_points +'//'+el_value)
			// console.log(eligibilityPoints('LET',parseFloat(85)))

			$.ajax({
				type:'POST',
				url:'../RES/PSB-RESOURCES/PHP/model.php',
				data:{
					action:'insert_applicant_point',
					a:uid,
					b:'ELIGIBILITY',
					c:el_points,
					d:user_id,
					e:pid,
					val:el_value
				}			
			}).done(function(data){
				// console.log(data);
				if (data) {
					$('.applicant-filters').blur();
				}
			}) 
			
		}

	})
	.on('click','.ei-save',function(){

		var sum_points = $(this).parent('.exp-btns').siblings('.educ-window-content-form').children('.interview-rating').val();
		sum_points = parseFloat(sum_points);
		var equivalent = interviewPoints(sum_points);
		var uid = $(this).siblings('.applicant-id').html(),
		pid = $('#published_vacancy_select').val();

		if(sum_points==""||sum_points>15||sum_points<=0){
			// alert('Enter a valid value!');
			alertError('Enter a valid value!');
		}
		else{

			$.ajax({
				type:'POST',
				url:'../RES/PSB-RESOURCES/PHP/model.php',
				data:{
					action:'insert_applicant_point_interview',
					a:uid,
					b:'INTERVIEW',
					c:equivalent,
					d:user_id,
					e:pid,
					val:sum_points
				}			
			}).done(function(data){
				// console.log(data);
				if (data) {
					$('.applicant-filters').blur();
				}
			}) 

		}

	})
	.on('click','.ed-save',function(){

		var sum_points = $(this).parent('.exp-btns').siblings('.educ-window-content-form').children('.demo-rating').val();
		sum_points = parseFloat(sum_points);
		var equivalent = demoteachingPoints(sum_points);
		var uid = $(this).siblings('.applicant-id').html(),
		pid = $('#published_vacancy_select').val();

		if(sum_points==""||sum_points>60||sum_points<=0){
			// alert('Enter a valid value!');
			alertError('Enter a valid value!');
		}
		else{

			$.ajax({
				type:'POST',
				url:'../RES/PSB-RESOURCES/PHP/model.php',
				data:{
					action:'insert_applicant_point',
					a:uid,
					b:'DEMO',
					c:equivalent,
					d:user_id,
					e:pid,
					val:sum_points
				}			
			}).done(function(data){
				// console.log(data);
				if (data) {
					$('.applicant-filters').blur();
				}
			}) 

		}

	})
	.on('click','.ec-save',function(){

		var sum_points = $(this).parent('.exp-btns').siblings('.educ-window-content-form').children('.comm-rating').val();
		sum_points = parseFloat(sum_points);
		var equivalent = communicationPoints(sum_points);
		var uid = $(this).siblings('.applicant-id').html(),
		pid = $('#published_vacancy_select').val();

		if(sum_points==""||sum_points>100||sum_points<=0){
			// alert('Enter a valid value!');
			alertError('Enter a valid value!');
		}
		else{

			$.ajax({
				type:'POST',
				url:'../RES/PSB-RESOURCES/PHP/model.php',
				data:{
					action:'insert_applicant_point',
					a:uid,
					b:'COMMUNICATION',
					c:equivalent,
					d:user_id,
					e:pid,
					val:sum_points
				}			
			}).done(function(data){
				// console.log(data);
				if (data) {
					$('.applicant-filters').blur();
				}
			}) 

		}

	})
	.on('click','.alert-error-close',function(){
		$('body .message').remove();
	});

	// console.log(communicationPoints(98))

	setTimeout(function(){
		$('.applicant-filters').blur();
	},1000);

});