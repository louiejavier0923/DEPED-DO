getUSer($('.eval-user-info').attr('name'));

$(document).ready(function(){

	$('body').
	on('click','#exit',function(){
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

})