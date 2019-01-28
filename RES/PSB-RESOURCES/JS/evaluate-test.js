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
			alert('Invalid grade entered!');
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

	})
	.on('click','.eval-out-editbtn',function(){

		var e_win = $(this).parent('.eval-out').siblings('.educ-window');
		// e_win.css({
		// 	'display':'block'
		// })
		e_win.toggle();

	})
	.on('click','.ee-cancel',function(){

		var e_win = $(this).parent('.ewc-grid2-col').parent('.ewc-grid2').parent('.educ-window-content').parent('.educ-window');
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
			alert('Invalid GWA! Enter a valid number!');
		}
		else{
			var val = gwa.toString()+','+additional.toString();
			console.log(val)
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

	});

	setTimeout(function(){
		$('.applicant-filters').blur();
	},1000);

});