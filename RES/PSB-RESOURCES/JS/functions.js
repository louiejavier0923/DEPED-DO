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

	$('.input-grade').prop('disabled',true);

	switch(criteria){

		case 'EDUCATION':
			$('.e-education').prop('disabled',false);
		break;

		case 'EXPERIENCE':
			$('.e-experience').prop('disabled',false);
		break;

		case 'TRAINING':
			$('.e-training').prop('disabled',false);
		break;

		case 'ELIGIBILITY':
			$('.e-let').prop('disabled',false);
		break;

		case 'INTERVIEW':
			$('.e-interview').prop('disabled',false);
		break;

	}

	$('.e-demo,.e-communication').prop('disabled',false);

}