var user_id = "";

function getUSer(id){

	$.ajax({
		type:'POST',
		url:'../RES/PSB-RESOURCES/PHP/model.php',
		dataType:'json',
		data:{
			action:'get_evaluator_name',
			a:id
		}
	}).done(function(data){
		// console.log(data)
		user_id = data[0];
		$('#evaluator_name').html(data[1]);
	});

}

function getPublishedVacancy(){

	$.ajax({
		type:'POST',
		url:'../RES/PSB-RESOURCES/PHP/model.php',
		data:{
			action:'get_published_vacancy'
		}
	}).done(function(data){
		// console.log(data);
		$('#published_vacancy_select').html(data);
	})

}

function setEditableInputGrades(criteria){
	// console.log(criteria);

	// $('.input-grade').prop('disabled',true);

	switch(criteria){

		case 'EDUCATION':
			$('.e-experience,.e-training input,.e-let,.e-interview,.e-demoteaching,.e-communication').css({
				'pointer-events':'none',
				'background-color': 'rgba(150,150,150,.5)'
			});
		break;

		case 'EXPERIENCE':
			$('.e-education,.e-training input,.e-let,.e-interview,.e-demoteaching,.e-communication').css({
				'pointer-events':'none',
				'background-color': 'rgba(150,150,150,.5)'
			});
		break;

		case 'TRAINING':
			$('.e-education,.e-experience,.e-let,.e-interview,.e-demoteaching,.e-communication').css({
				'pointer-events':'none',
				'background-color': 'rgba(150,150,150,.5)'
			});
		break;

		case 'ELIGIBILITY':
			$('.e-education,.e-experience,.e-training input,.e-interview,.e-demoteaching,.e-communication').css({
				'pointer-events':'none',
				'background-color': 'rgba(150,150,150,.5)'
			});
		break;

		case 'INTERVIEW':
			$('.e-education,.e-experience,.e-training input,.e-let,.e-demoteaching,.e-communication').css({
				'pointer-events':'none',
				'background-color': 'rgba(150,150,150,.5)'
			});
		break;

		case 'DEMO TEACHING':
			$('.e-education,.e-experience,.e-training input,.e-let,.e-interview,.e-communication').css({
				'pointer-events':'none',
				'background-color': 'rgba(150,150,150,.5)'
			});
		break;

		case 'ENGLISH COMMUNICATION SKILLS':
			$('.e-education,.e-experience,.e-training input,.e-let,.e-interview,.e-demoteaching').css({
				'pointer-events':'none',
				'background-color': 'rgba(150,150,150,.5)'
			});
		break;
	}

	// $('.e-demo,.e-communication').css('disabled',false);

}

function alertError(msg){

	var content = "<div class='message'>"+
				"<div class='message-inner'>"+
					"<div class='message-box'>"+
						"<div class='message-box-icon'><i class='fa fa-exclamation-circle'></i></div>"+
						"<div class='message-box-message'>"+msg+"</div>"+
						"<div class='message-box-btn'><button class='alert-error-close'>Close</button></div>"+
					"</div></div></div>";

	$('body').append(content);
	setTimeout(function(){
		$('body .message').remove();
	},3000)

}