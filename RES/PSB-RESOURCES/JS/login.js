$(document).ready(function(){

	$('body')
	.on('blur','.input-form input',function(){

		if($(this).val()!=""){
			$(this).siblings('label').addClass('inputsNotNull');
		}
		else{
			$(this).siblings('label').removeClass('inputsNotNull');
		}

	})
	.on('click','#loginBtn',function(){

		var email = $('#emailTxtbox').val(),
		pass = $('#passTxtbox').val();

		if(email==""||pass==""){
			// alert('Fill all fields!');
			alertError("Fill all fields!");
		}
		else{

			$.ajax({
				type:'POST',
				url:'RES/PSB-RESOURCES/PHP/model.php',
				data:{
					action:'login',
					a:email,
					b:pass
				}
			}).done(function(user_id){
				// console.log(data);
				if(user_id!=""){
					// alert('logged in kana!');
					$.ajax({
						type:'POST',
						url:'RES/PSB-RESOURCES/PHP/session-login.php',
						data:{
							a:user_id
						}
					}).done(function(data){
						if(data){
							window.location.href = "PSB/evaluator-main.php";
						}
					});

				}
				else{
					// alert('Email or Password Incorrect! Please try again.');
					alertError("Email or Password Incorrect! Try again!");
				}

			})

		}

	})
	.on('keypress','#passTxtbox',function(e){
		if (e.which == 13) {
			$('#loginBtn').click();
		}
	})
	.on('click','.alert-error-close',function(){
		$('body .message').remove();
	})
	
})