$(function(){
	$(".single-fields input").keyup(function () {
		$(this).css('background-color', "#ffffff");
	});
	$(".radio-fields").change(function () {
		$(this).css('background-color', "#ffffff");
	});
	$('input[type="date"]').change(function() {
		$(this).css('background-color', "#ffffff");
	});
	$('.pds_gsisno').keyup(function(){
		$(this).val($(this).val().replace(/(\d{4})\-?(\d{7})\-?(\d{1})/,'$1-$2-$3'));
	});
	$('.pds_pagibigno').keyup(function(){
		$(this).val($(this).val().replace(/(\d{4})\-?(\d{4})\-?(\d{4})/,'$1-$2-$3'));
	});
	$('.pds_philhealthno').keyup(function(){
		$(this).val($(this).val().replace(/(\d{2})\-?(\d{9})\-?(\d{1})/,'$1-$2-$3'));
	});
	$('.pds_sssno').keyup(function(){
		$(this).val($(this).val().replace(/(\d{2})\-?(\d{7})\-?(\d{1})/,'$1-$2-$3'));
	});
	$('.pds_tinno').keyup(function(e){
		$(this).val($(this).val().replace(/(\d{3})\-?(\d{3})\-?(\d{3})\-?(\d{4})/,'$1-$2-$3-$4'));
	});
	$('.pds_agencyemployee').keyup(function(e){
		$(this).val($(this).val().replace(/(\d{3})\-?(\d{4})/,'$1-$2'));
	});
	$('.pds_telno').keyup(function(e){
		$(this).val($(this).val().replace(/(\d{3})\-?(\d{4})/,'$1-$2'));
	});

	/* $(".pds_pagibigno").keyup(function (e) {
      if($(this).val().length === 14) return;
      if(e.keyCode === 8 || e.keyCode === 37 || e.keyCode === 39) return;
      let newStr = '';
      let groups = $(this).val().split('-');
      for(let i in groups) {
       if (groups[i].length % 4 === 0) {
        newStr += groups[i] + "-"
       } else {
        newStr += groups[i];
       }
      }
      $(this).val(newStr);
    }); */
	function checking() {
	text='';
	$('.single-fields input').css('background-color', "#ffffff");
	$('.radio-fields').css('background-color', "#ffffff");
	$(".errors div").html('');
	count = 0;
    $('.single-fields input').each(function(){
		str = $(".errors div").html();
		if ($(this).val().length == 0) {
			if($(this).hasClass("not-require")){
				
			}else{
				
    	       	    	$("#error-message").css('display','block');
    	       	    	document.getElementById('error-info').innerHTML = "Please input all required fields!";   	    	
    	       	    	document.getElementById('error-header').innerHTML = "Error!";
				$(this).css('background-color', "#ffa0a0f7");
			   
			   //$(".errors div").html(str + (count == 0 ? '' :', ') +  $(this).attr("name"));
			   count++;
			}
		   
		} 
    });
	if($('input[name="Gender"]:checked').length === 0) {
		str = $(".errors div").html();
		$(".gender-fields").css('background-color', "#ffa0a0f7");
		//$(".errors div").html(str +(count == 0 ? '' :', ') +  'Gender' );
		count++;
	}
	if($('input[name="Civil Status"]:checked').length === 0) {
		str = $(".errors div").html();
		$(".civilstat-fields").css('background-color', "#ffa0a0f7");
		//$(".errors div").html(str +(count == 0 ? '' :', ') +  'Civil Status' );
		count++;
	}
	if($('input[name="Citizenship"]:checked').length === 0) {
		str = $(".errors div").html();
		$(".citizenship-fields").css('background-color', "#ffa0a0f7");
		//$(".errors div").html(str +(count == 0 ? '' :', ') +  'Citizenship' );
		count++;
	}
	$('.spouse-fields input').each(function(){
		str = $(".errors div").html();
		if(($('.pds_spousesurname').val().length != 0) ||  ($('.pds_spousefirstname').val().length != 0) ||  ($('.pds_spousenameextension').val().length != 0) ||  ($('.pds_spousemiddlename').val().length != 0) ){
			if ($(this).val().length == 0) {
				if($(this).hasClass("not-require")){
				
				}else{
				 $(this).css('background-color', "#ffa0a0f7");
				//$(".errors div").html(str + (count == 0 ? '' :', ') +  $(this).attr("name"));
				count++;
			}
			  
			} 
		}
		
    });
	
	/* var names = []
    $('.radio-fields input:radio').each(function () {
        var rname = $(this).attr('name');
        if ($.inArray(rname, names) == -1) names.push(rname);
    });
	$.each(names, function (i, name) {
        if ($('input[name="' + name + '"]:checked').length == 0) {
           $(".errors div").html(text + (count == 0 ? '' :', ') +  'please check '+ name);
        }
    }); */
	
	
	/* var phone_pattern = /([0-9]{10})|(\([0-9]{3}\)\s+[0-9]{3}\-[0-9]{4})/; 
	phone_pattern.test( input_value ); */
	
	
	return count;
	
	}
	
 $( ".pds_surname" ).keypress(function(e) {
                    var key = e.keyCode;
                    if (key >= 48 && key <= 57) {
                        e.preventDefault();
                    }
                });
 $( ".pds_firstname" ).keypress(function(e) {
                    var key = e.keyCode;
                    if (key >= 48 && key <= 57) {
                        e.preventDefault();
                    }
                });
  $( ".pds_nameextension" ).keypress(function(e) {
                    var key = e.keyCode;
                    if (key >= 48 && key <= 57) {
                        e.preventDefault();
                    }
                });
   $( ".pds_middlename" ).keypress(function(e) {
                    var key = e.keyCode;
                    if (key >= 48 && key <= 57) {
                        e.preventDefault();
                    }
                });
   	$(".pds_height").keypress(function (e) {
     //if the letter is not digit then display error and don't type anything
     if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
        //display error message
     
               return false;
    }
   });
   		$(".pds_weight").keypress(function (e) {
     //if the letter is not digit then display error and don't type anything
     if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
        //display error message
     
               return false;
    }
   });
   			$(".pds_pagibigno").keypress(function (e) {
     //if the letter is not digit then display error and don't type anything
     if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
        //display error message
     
               return false;
    }
   });
   				$(".pds_gsisno").keypress(function (e) {
     //if the letter is not digit then display error and don't type anything
     if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
        //display error message
     
               return false;
    }
   });
   					$(".pds_philhealthno").keypress(function (e) {
     //if the letter is not digit then display error and don't type anything
     if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
        //display error message
     
               return false;
    }
   });
   						$(".pds_sssno").keypress(function (e) {
     //if the letter is not digit then display error and don't type anything
     if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
        //display error message
     
               return false;
    }
   });
   	$(".pds_tinno").keypress(function (e) {
     //if the letter is not digit then display error and don't type anything
     if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
        //display error message
     
               return false;
    }
   });
   		$(".pds_agencyemployee").keypress(function (e) {
     //if the letter is not digit then display error and don't type anything
     if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
        //display error message
     
               return false;
    }
   });
   			$(".pds_telno").keypress(function (e) {
     //if the letter is not digit then display error and don't type anything
     if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
        //display error message
     
               return false;
    }
   });
	$(".pds_mobileno").keypress(function (e) {
     //if the letter is not digit then display error and don't type anything
     if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
        //display error message
     
               return false;
    }
   });

	$(".pds_pzipcode").keypress(function (e) {
     //if the letter is not digit then display error and don't type anything
     if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
        //display error message
     
               return false;
    }
   });

$(".pds_rzipcode").keypress(function (e) {
     //if the letter is not digit then display error and don't type anything
     if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
        //display error message
     
               return false;
    }
   });


	var childname = [];
	var childBDay = [];
	var CS = [];
	var CS_rating = [];
	var CS_date = [];
	var CS_place = [];
	var CS_licenceNo = [];
	var CS_licenceDate = [];
	var WE_FromDate = [];
	var WE_ToDate = [];
	var WE_PositionTitle = [];
	var WE_Place = [];
	var WE_MonthSalary = [];
	var WE_Salary = [];
	var WE_AppointmentStatus = [];
	var WE_GovService = [];
	var VW_Name_Address = [];
	var VW_FromDate = [];
	var VW_Todate = [];
	var VW_NumbHours = [];
	var VW_Work = [];
	var LaD_Title = [];
	var LaD_FromDate = [];
	var LaD_ToDate = [];
	var LaD_NumbHours = [];
	var LaD_Type = [];
	var LaD_ConductBy = [];
	
	function get_MultiRrows() {
		childname = [];
		childBDay = [];
		CS = [];
		CS_rating = [];
		CS_date = [];
		CS_place = [];
		CS_licenceNo = [];
		CS_licenceDate = [];
		WE_FromDate = [];
		WE_ToDate = [];
		WE_PositionTitle = [];
		WE_Place = [];
		WE_MonthSalary = [];
		WE_Salary = [];
		WE_AppointmentStatus = [];
		WE_GovService = [];
		VW_Name_Address = [];
		VW_FromDate = [];
		VW_Todate = [];
		VW_NumbHours = [];
		VW_Work = [];
		LaD_Title = [];
		LaD_FromDate = [];
		LaD_ToDate = [];
		LaD_NumbHours = [];
		LaD_Type = [];
		LaD_ConductBy = [];
	
		
		$('.pds_children').each(function(){
			childname.push($(this).val());
		});
		$('.pds_childrenBdate').each(function(){
			childBDay.push($(this).val());
		});
		$('.pds_CS').each(function(){
			CS.push($(this).val());
		});
		$('.pds_CS_rating').each(function(){
			CS_rating.push($(this).val());
		});
		$('.pds_CS_date').each(function(){
			CS_date.push($(this).val());
		});
		$('.pds_CS_place').each(function(){
			CS_place.push($(this).val());
		});
		$('.pds_CS_licenceNo').each(function(){
			CS_licenceNo.push($(this).val());
		});
		$('.pds_CS_licenceDate').each(function(){
			CS_licenceDate.push($(this).val());
		});
		$('.pds_WE_FromDate').each(function(){
			WE_FromDate.push($(this).val());
		});
		$('.pds_WE_ToDate').each(function(){
			WE_ToDate.push($(this).val());
		});
		$('.pds_WE_PositionTitle').each(function(){
			WE_PositionTitle.push($(this).val());
		});
		$('.pds_WE_Place').each(function(){
			WE_Place.push($(this).val());
		});
		$('.pds_WE_MonthSalary').each(function(){
			WE_MonthSalary.push($(this).val());
		});
		$('.pds_WE_Salary').each(function(){
			WE_Salary.push($(this).val());
		});
		$('.pds_WE_AppointmentStatus').each(function(){
			WE_AppointmentStatus.push($(this).val());
		});
		$('.pds_WE_GovService').each(function(){
			WE_GovService.push($(this).val());
		});
		$('.pds_VW_Name_Address').each(function(){
			VW_Name_Address.push($(this).val());
		});
		$('.pds_VW_FromDate').each(function(){
			VW_FromDate.push($(this).val());
		});
		$('.pds_VW_Todate').each(function(){
			VW_Todate.push($(this).val());
		});
		$('.pds_VW_NumbHours').each(function(){
			VW_NumbHours.push($(this).val());
		});
		$('.pds_VW_Work').each(function(){
			VW_Work.push($(this).val());
		});
		$('.pds_LaD_Title').each(function(){
			LaD_Title.push($(this).val());
		});
		$('.pds_LaD_FromDate').each(function(){
			LaD_FromDate.push($(this).val());
		});
		$('.pds_LaD_ToDate').each(function(){
			LaD_ToDate.push($(this).val());
		});
		$('.pds_LaD_NumbHours').each(function(){
			LaD_NumbHours.push($(this).val());
		});
		$('.pds_LaD_Type').each(function(){
			LaD_Type.push($(this).val());
		});
		$('.pds_LaD_ConductBy').each(function(){
			LaD_ConductBy.push($(this).val());
		});
		
		
	}
	/* function generate_newRow() {
		if ($('.pre-pds_children').val().length > 0 && $('.pre-pds_childrenBdate').val().length > 0) {
			get_MultiRrows();
			var i;
			text = '';
			for (i = 0; i < childname.length; ++i) {
				text += '<section class= "content-info"><section class= "info"><input type= "text" value ="'+ childname[i] +'" class="pds_children"></section><section class= "info"><input type= "date" value= "'+ childBDay[i] +'" class="pds_childrenBdate"></section></section>';
			}
			new_field = '<section class= "content-info"><section class= "info"><input type= "text" class="pds_children pre-pds_children"></section><section class= "info"><input type= "date" class="pds_childrenBdate pre-pds_childrenBdate"></section></section>';
			
			text += new_field;
			$(".children-form").html(text);
		}
	}
	$(".pre-pds_children").on('change keyup paste mouseup', function() {
		generate_newRow();
	});
	$(".pre-pds_childrenBdate").on('change keyup paste mouseup', function() {
		generate_newRow();
	}); */
	
	/* $( ".pre-pds_children" ).keypress(function() {
		generate_newRow();
	});
	$('.pre-pds_childrenBdate').change(function() {
		generate_newRow();
	}); */
	
	/* $(".pds_country").change(function () {
		get_MultiRrows();
	}); */





	$('.edit_pds').click(function(){
		get_MultiRrows();
	error = checking();
	//window.location.href="application.php";
	action='update_pds_function';
	id = $(this).attr("data-id");
	//personal info
	pds_surname = $('.pds_surname').val();
	pds_firstname = $('.pds_firstname').val();
	pds_nameextension = $('.pds_nameextension').val();
	pds_middlename = $('.pds_middlename').val();
	pds_dateofbirth = $('.pds_dateofbirth').val();
	pds_placeofbirth = $('.pds_placeofbirth').val();
	pds_gender = $("input[name='Gender']:checked").val();
	civil_status = $("input[name='Civil Status']:checked").val();
	pds_height = $('.pds_height').val();
	pds_weight = $('.pds_weight').val();
	pds_bloodtype = $('.pds_bloodtype').val();
	pds_gsisno = $('.pds_gsisno').val();
	pds_pagibigno = $('.pds_pagibigno').val();
	pds_philhealthno = $('.pds_philhealthno').val();
	pds_sssno = $('.pds_sssno').val();
	pds_tinno = $('.pds_tinno').val();
	pds_agencyemployee = $('.pds_agencyemployee').val();
	pds_citizenship = $("input[name='Citizenship']:checked").val();
	pds_country = $('.pds_country option:selected').text();
	pds_rhouseblk = $('.pds_rhouseblk').val();
	pds_rstreet = $('.pds_rstreet').val();
	pds_rsubdivision = $('.pds_rsubdivision').val();
	pds_rbarangay = $('.pds_rbarangay').val();
	pds_rmunicipality = $('.pds_rmunicipality').val();
	pds_rprovince = $('.pds_rprovince').val();
	pds_rzipcode = $('.pds_rzipcode').val();
	pds_phouseblk = $('.pds_phouseblk').val();
	pds_pstreet = $('.pds_pstreet').val();
	pds_psubdivision = $('.pds_psubdivision').val();
	pds_pbarangay = $('.pds_pbarangay').val();
	pds_pmunicipality = $('.pds_pmunicipality').val();
	pds_pprovince = $('.pds_pprovince').val();
	pds_pzipcode = $('.pds_pzipcode').val();
	pds_telno = $('.pds_telno').val();
	pds_mobileno = $('.pds_mobileno').val();
	pds_emailaddress = $('.pds_emailaddress').val();
	
	//family background
	pds_spousesurname = $('.pds_spousesurname').val();
	pds_spousefirstname = $('.pds_spousefirstname').val();
	pds_spousenameextension = $('.pds_spousenameextension').val();
	pds_spousemiddlename = $('.pds_spousemiddlename').val();
	pds_spouseoccupation = $('.pds_spouseoccupation').val();
	pds_businessname = $('.pds_businessname').val();
	pds_businessaddress = $('.pds_businessaddress').val();
	pds_businesstelno = $('.pds_businesstelno').val();
	pds_fathersurname = $('.pds_fathersurname').val();
	pds_fatherfirstname = $('.pds_fatherfirstname').val();
	pds_fathernameextension = $('.pds_fathernameextension').val();
	pds_fathermiddlename = $('.pds_fathermiddlename').val();
	pds_mothermaindenname = $('.pds_mothermaindenname').val();
	pds_motherfirstname = $('.pds_motherfirstname').val();
	pds_mothersnameextension = $('.pds_mothersnameextension').val();
	pds_mothersmiddlename = $('.pds_mothersmiddlename').val();
	
	
	
	
	if (error < 1) {
		
		$.ajax({
		type: 'POST',
		url: '../DOADMIN/credentials/model-pds.php',
		data: {action:action,id:id,
			
			pds_surname:pds_surname,
			pds_firstname:pds_firstname,
			pds_nameextension:pds_nameextension,
			pds_middlename:pds_middlename,
			pds_dateofbirth:pds_dateofbirth,
			pds_placeofbirth:pds_placeofbirth,
			pds_gender:pds_gender,
			civil_status:civil_status,
			pds_height:pds_height,
			pds_weight:pds_weight,
			pds_bloodtype:pds_bloodtype,
			pds_gsisno:pds_gsisno,
			pds_pagibigno:pds_pagibigno,
			pds_philhealthno:pds_philhealthno,
			pds_sssno:pds_sssno,
			pds_tinno:pds_tinno,
			pds_agencyemployee:pds_agencyemployee,
			pds_citizenship:pds_citizenship,
			pds_country:pds_country,
			pds_rhouseblk:pds_rhouseblk,
			pds_rstreet:pds_rstreet,
			pds_rsubdivision:pds_rsubdivision,
			pds_rbarangay:pds_rbarangay,
			pds_rmunicipality:pds_rmunicipality,
			pds_rprovince:pds_rprovince,
			pds_rzipcode:pds_rzipcode,
			pds_phouseblk:pds_phouseblk,
			pds_pstreet:pds_pstreet,
			pds_psubdivision:pds_psubdivision,
			pds_pbarangay:pds_pbarangay,
			pds_pmunicipality:pds_pmunicipality,
			pds_pprovince:pds_pprovince,
			pds_pzipcode:pds_pzipcode,
			pds_telno:pds_telno,
			pds_mobileno:pds_mobileno,
			pds_emailaddress:pds_emailaddress,
			
			pds_spousesurname:pds_spousesurname,
			pds_spousefirstname:pds_spousefirstname,
			pds_spousenameextension:pds_spousenameextension,
			pds_spousemiddlename:pds_spousemiddlename,
			pds_spouseoccupation:pds_spouseoccupation,
			pds_businessname:pds_businessname,
			pds_businessaddress:pds_businessaddress,
			pds_businesstelno:pds_businesstelno,
			pds_fathersurname:pds_fathersurname,
			pds_fatherfirstname:pds_fatherfirstname,
			pds_fathernameextension:pds_fathernameextension,
			pds_fathermiddlename:pds_fathermiddlename,
			pds_mothermaindenname:pds_mothermaindenname,
			pds_motherfirstname:pds_motherfirstname,
			pds_mothersnameextension:pds_mothersnameextension,
			pds_mothersmiddlename:pds_mothersmiddlename,
			
			childname:childname,
			childBDay:childBDay,
			CS:CS,
			CS_rating:CS_rating,
			CS_date:CS_date,
			CS_place:CS_place,
			CS_licenceNo:CS_licenceNo,
			CS_licenceDate:CS_licenceDate,
			WE_FromDate:WE_FromDate,
			WE_ToDate:WE_ToDate,
			WE_PositionTitle:WE_PositionTitle,
			WE_Place:WE_Place,
			WE_MonthSalary:WE_MonthSalary,
			WE_Salary:WE_Salary,
			WE_AppointmentStatus:WE_AppointmentStatus,
			WE_GovService:WE_GovService,
			VW_Name_Address:VW_Name_Address,
			VW_FromDate:VW_FromDate,
			VW_Todate:VW_Todate,
			VW_NumbHours:VW_NumbHours,
			VW_Work:VW_Work,
			LaD_Title:LaD_Title,
			LaD_FromDate:LaD_FromDate,
			LaD_ToDate:LaD_ToDate,
			LaD_NumbHours:LaD_NumbHours,
			LaD_Type:LaD_Type,
			LaD_ConductBy:LaD_ConductBy
			},
		dataType: 'json',
		success: function(response){
			
			
			if(response.exe==='success'){
				
			
				alert(response.exe);
			window.location.href="application.php";
			}else 

				alert(response.error);
			
			
		}
		});
	
	}
	});
	
	$('.save_pds').click(function(){
	error = checking();
	
	
	action='add_user_with_pds_info_function';
	
	//temp default value
	pds_gender = 'male';
	pds_citizenship = 'filipino';
	civil_status = 'single'
	//personal info
	pds_surname = $('.pds_surname').val();
	pds_firstname = $('.pds_firstname').val();
	pds_nameextension = $('.pds_nameextension').val();
	pds_middlename = $('.pds_middlename').val();
	pds_dateofbirth = $('.pds_dateofbirth').val();
	pds_placeofbirth = $('.pds_placeofbirth').val();
	pds_gender = $("input[name='Gender']:checked").val();
	civil_status = $("input[name='Civil Status']:checked").val();
	pds_height = $('.pds_height').val();
	pds_weight = $('.pds_weight').val();
	pds_bloodtype = $('.pds_bloodtype').val();
	pds_gsisno = $('.pds_gsisno').val();
	pds_pagibigno = $('.pds_pagibigno').val();
	pds_philhealthno = $('.pds_philhealthno').val();
	pds_sssno = $('.pds_sssno').val();
	pds_tinno = $('.pds_tinno').val();
	pds_agencyemployee = $('.pds_agencyemployee').val();
	pds_citizenship = $("input[name='Citizenship']:checked").val();
	pds_country = $('.pds_country option:selected').text();
	pds_rhouseblk = $('.pds_rhouseblk').val();
	pds_rstreet = $('.pds_rstreet').val();
	pds_rsubdivision = $('.pds_rsubdivision').val();
	pds_rbarangay = $('.pds_rbarangay').val();
	pds_rmunicipality = $('.pds_rmunicipality').val();
	pds_rprovince = $('.pds_rprovince').val();
	pds_rzipcode = $('.pds_rzipcode').val();
	pds_phouseblk = $('.pds_phouseblk').val();
	pds_pstreet = $('.pds_pstreet').val();
	pds_psubdivision = $('.pds_psubdivision').val();
	pds_pbarangay = $('.pds_pbarangay').val();
	pds_pmunicipality = $('.pds_pmunicipality').val();
	pds_pprovince = $('.pds_pprovince').val();
	pds_pzipcode = $('.pds_pzipcode').val();
	pds_telno = $('.pds_telno').val();
	pds_mobileno = $('.pds_mobileno').val();
	pds_emailaddress = $('.pds_emailaddress').val();
	
	//family background
	pds_spousesurname = $('.pds_spousesurname').val();
	pds_spousefirstname = $('.pds_spousefirstname').val();
	pds_spousenameextension = $('.pds_spousenameextension').val();
	pds_spousemiddlename = $('.pds_spousemiddlename').val();
	pds_spouseoccupation = $('.pds_spouseoccupation').val();
	pds_businessname = $('.pds_businessname').val();
	pds_businessaddress = $('.pds_businessaddress').val();
	pds_businesstelno = $('.pds_businesstelno').val();
	pds_fathersurname = $('.pds_fathersurname').val();
	pds_fatherfirstname = $('.pds_fatherfirstname').val();
	pds_fathernameextension = $('.pds_fathernameextension').val();
	pds_fathermiddlename = $('.pds_fathermiddlename').val();
	pds_mothermaindenname = $('.pds_mothermaindenname').val();
	pds_motherfirstname = $('.pds_motherfirstname').val();
	pds_mothersnameextension = $('.pds_mothersnameextension').val();
	pds_mothersmiddlename = $('.pds_mothersmiddlename').val();
	pds_children = $('.pds_children').val();
	pds_childrenBdate = $('.pds_childrenBdate').val();
	
	//Civil Service Eligibility
	pds_CS = $('.pds_CS').val();
	pds_CS_rating = $('.pds_CS_rating').val();
	pds_CS_date = $('.pds_CS_date').val();
	pds_CS_place = $('.pds_CS_place').val();
	pds_CS_licenceNo = $('.pds_CS_licenceNo').val();
	pds_CS_licenceDate = $('.pds_CS_licenceDate').val();
	
	//Work Experience
	pds_WE_FromDate = $('.pds_WE_FromDate').val();
	pds_WE_ToDate = $('.pds_WE_ToDate').val();
	pds_WE_PositionTitle = $('.pds_WE_PositionTitle').val();
	pds_WE_Place = $('.pds_WE_Place').val();
	pds_WE_MonthSalary = $('.pds_WE_MonthSalary').val();
	pds_WE_Salary = $('.pds_WE_Salary').val();
	pds_WE_AppointmentStatus = $('.pds_WE_AppointmentStatus').val();
	pds_WE_GovService = $('.pds_WE_GovService').val();
	
	//Voluntary work
	pds_VW_Name_Address = $('.pds_VW_Name_Address').val();
	pds_VW_FromDate = $('.pds_VW_FromDate').val();
	pds_VW_Todate = $('.pds_VW_Todate').val();
	pds_VW_NumbHours = $('.pds_VW_NumbHours').val();
	pds_VW_Work = $('.pds_VW_Work').val();
	
	//Learning and Development
	pds_LaD_Title = $('.pds_LaD_Title').val();
	pds_LaD_FromDate = $('.pds_LaD_FromDate').val();
	pds_LaD_ToDate = $('.pds_LaD_ToDate').val();
	pds_LaD_NumbHours = $('.pds_LaD_NumbHours').val();
	pds_LaD_Type = $('.pds_LaD_Type').val();
	pds_LaD_ConductBy = $('.pds_LaD_ConductBy').val();
	
	
	if (error < 1) {
		
		$.ajax({
		type: 'POST',
		url: '../DOADMIN/credentials/model-pds.php',
		data: {action:action,
			
			pds_surname:pds_surname,
			pds_firstname:pds_firstname,
			pds_nameextension:pds_nameextension,
			pds_middlename:pds_middlename,
			pds_dateofbirth:pds_dateofbirth,
			pds_placeofbirth:pds_placeofbirth,
			pds_gender:pds_gender,
			civil_status:civil_status,
			pds_height:pds_height,
			pds_weight:pds_weight,
			pds_bloodtype:pds_bloodtype,
			pds_gsisno:pds_gsisno,
			pds_pagibigno:pds_pagibigno,
			pds_philhealthno:pds_philhealthno,
			pds_sssno:pds_sssno,
			pds_tinno:pds_tinno,
			pds_agencyemployee:pds_agencyemployee,
			pds_citizenship:pds_citizenship,
			pds_country:pds_country,
			pds_rhouseblk:pds_rhouseblk,
			pds_rstreet:pds_rstreet,
			pds_rsubdivision:pds_rsubdivision,
			pds_rbarangay:pds_rbarangay,
			pds_rmunicipality:pds_rmunicipality,
			pds_rprovince:pds_rprovince,
			pds_rzipcode:pds_rzipcode,
			pds_phouseblk:pds_phouseblk,
			pds_pstreet:pds_pstreet,
			pds_psubdivision:pds_psubdivision,
			pds_pbarangay:pds_pbarangay,
			pds_pmunicipality:pds_pmunicipality,
			pds_pprovince:pds_pprovince,
			pds_pzipcode:pds_pzipcode,
			pds_telno:pds_telno,
			pds_mobileno:pds_mobileno,
			pds_emailaddress:pds_emailaddress,
			
			pds_spousesurname:pds_spousesurname,
			pds_spousefirstname:pds_spousefirstname,
			pds_spousenameextension:pds_spousenameextension,
			pds_spousemiddlename:pds_spousemiddlename,
			pds_spouseoccupation:pds_spouseoccupation,
			pds_businessname:pds_businessname,
			pds_businessaddress:pds_businessaddress,
			pds_businesstelno:pds_businesstelno,
			pds_fathersurname:pds_fathersurname,
			pds_fatherfirstname:pds_fatherfirstname,
			pds_fathernameextension:pds_fathernameextension,
			pds_fathermiddlename:pds_fathermiddlename,
			pds_mothermaindenname:pds_mothermaindenname,
			pds_motherfirstname:pds_motherfirstname,
			pds_mothersnameextension:pds_mothersnameextension,
			pds_mothersmiddlename:pds_mothersmiddlename,
			pds_children:pds_children,
			pds_childrenBdate:pds_childrenBdate,
			
			pds_CS:pds_CS,
			pds_CS_rating:pds_CS_rating,
			pds_CS_date:pds_CS_date,
			pds_CS_place:pds_CS_place,
			pds_CS_licenceNo:pds_CS_licenceNo,
			pds_CS_licenceDate:pds_CS_licenceDate,
			
			pds_WE_FromDate:pds_WE_FromDate,
			pds_WE_ToDate:pds_WE_ToDate,
			pds_WE_PositionTitle:pds_WE_PositionTitle,
			pds_WE_Place:pds_WE_Place,
			pds_WE_MonthSalary:pds_WE_MonthSalary,
			pds_WE_Salary:pds_WE_Salary,
			pds_WE_AppointmentStatus:pds_WE_AppointmentStatus,
			pds_WE_GovService:pds_WE_GovService,
			
			pds_VW_Name_Address:pds_VW_Name_Address,
			pds_VW_FromDate:pds_VW_FromDate,
			pds_VW_Todate:pds_VW_Todate,
			pds_VW_NumbHours:pds_VW_NumbHours,
			pds_VW_Work:pds_VW_Work,
			
			pds_LaD_Title:pds_LaD_Title,
			pds_LaD_FromDate:pds_LaD_FromDate,
			pds_LaD_ToDate:pds_LaD_ToDate,
			pds_LaD_NumbHours:pds_LaD_NumbHours,
			pds_LaD_Type:pds_LaD_Type,
			pds_LaD_ConductBy:pds_LaD_ConductBy 
			},
		dataType: 'json',
		success: function(response){
			
			
			if(response.exe==='success'){
				
			
				alert(response.exe);
			$("input").val("");
			}else
				alert(response.error);
			
			
		}
		});
	
	}
	});
	
	
});