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
				action:'get_applicant_list',
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
					e:pid
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

	});

	setTimeout(function(){
		$('.applicant-filters').blur();
	},1000);

});