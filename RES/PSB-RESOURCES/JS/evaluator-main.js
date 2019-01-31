getUSer($('.eval-user-info').attr('name'));

$(document).ready(function(){

	$('body').
	on('click','#exit',function(){
		alertLogout();
	})
	.on('click','.eval-options a',function(){

		var criteria = '';

		switch(this.id){

			case 'btn_education':
				criteria = 'EDUCATION';
			break;

			case 'btn_experience':
				criteria = 'EXPERIENCE';
			break;

			case 'btn_training':
				criteria = 'TRAINING';
			break;

			case 'btn_eligibility':
				criteria = 'ELIGIBILITY';
			break;

			case 'btn_interview':
				criteria = 'INTERVIEW';
			break;

			case 'btn_demo':
				criteria = 'DEMO TEACHING';
			break;

			case 'btn_comm':
				criteria = 'ENGLISH COMMUNICATION SKILLS';
			break;
		}

		$.ajax({
			type:'POST',
			url:'../RES/PSB-RESOURCES/PHP/set-criteria.php',
			data:{
				a:criteria
			}
		}).done(function(data){
			if(data){
				window.location.href = "evaluator-test.php";
			}
		})

	})
	.on('click','.logout-yes',function(){
		$.ajax({
			type:'POST',
			url:'../RES/PSB-RESOURCES/PHP/session-logout.php',
			data:''
		}).done(function(b){
			if(b){
				window.location.href = "../evaluator-login-form.php";
			}
		})
	})
	.on('click','.logout-no',function(){
		$('body .message').remove();
	})

})