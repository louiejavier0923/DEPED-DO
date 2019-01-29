$(function(){
		
	function checking() {
	text='';
	$('.single-fields input').css('background-color', "#ffffff");
	$('.radio-fields').css('background-color', "#ffffff");
	$(".errors div").html('');
	count = 0;
    $('.single-fields input').each(function(){
		str = $(".errors div").html();
		if ($(this).val().length == 0) {
		   $(this).css('background-color', "#ffa0a0f7");
		   
           $(".errors div").html(str + (count == 0 ? '' :', ') +  $(this).attr("name"));
		   count++;
		} 
    });
	if($('input[name="Gender"]:checked').length === 0) {
		str = $(".errors div").html();
		$(".gender-fields").css('background-color', "#ffa0a0f7");
		$(".errors div").html(str +(count == 0 ? '' :', ') +  'Gender' );
		count++;
	}
	if($('input[name="Civil Status"]:checked').length === 0) {
		str = $(".errors div").html();
		$(".civilstat-fields").css('background-color', "#ffa0a0f7");
		$(".errors div").html(str +(count == 0 ? '' :', ') +  'Civil Status' );
		count++;
	}
	if($('input[name="Citizenship"]:checked').length === 0) {
		str = $(".errors div").html();
		$(".citizenship-fields").css('background-color', "#ffa0a0f7");
		$(".errors div").html(str +(count == 0 ? '' :', ') +  'Citizenship' );
		count++;
	}
	$('.spouse-fields input').each(function(){
		str = $(".errors div").html();
		if(($('.pds_spousesurname').val().length != 0) ||  ($('.pds_spousefirstname').val().length != 0) ||  ($('.pds_spousenameextension').val().length != 0) ||  ($('.pds_spousemiddlename').val().length != 0) ){
			if ($(this).val().length == 0) {
			   $(this).css('background-color', "#ffa0a0f7");
			   $(".errors div").html(str + (count == 0 ? '' :', ') +  $(this).attr("name"));
			   count++;
			} 
		}
		
    });
	
	
	/*if($('input[name="Civil Status"]:checked').length === 0) {
		$(".errors div").html(text + (count == 0 ? '' :', ') + 'Civil Status');
	}
	if($('input[name="Citizenship"]:checked').length === 0) {
		$(".errors div").html(text + (count == 0 ? '' :', ') +  'Citizenship');
	} */
	
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
	
	
	
	
	return count;
	
	}
	/* var phone_pattern = /([0-9]{10})|(\([0-9]{3}\)\s+[0-9]{3}\-[0-9]{4})/; 
	phone_pattern.test( input_value ); */
	
	
	$('.save_pds').click(function(){
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
	
	
	
	error = checking();
	
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