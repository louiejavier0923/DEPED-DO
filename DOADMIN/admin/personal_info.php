<?php include 'includes/session.php'; ?>
<?php include 'includes/header.php'; ?>
	
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <?php include 'includes/navbar.php'; ?>
  <?php include 'includes/menubar.php'; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Personal Information
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Personal Information</li>
      </ol>
    </section>


          <section class="content">
      
            <div style="display: none;" class='alert alert-danger alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4><i class='icon fa fa-warning'></i> Error!</h4>
           
            </div>
       
            <div style="display: none;" class='alert alert-success alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4><i class='icon fa fa-check'></i> Success!</h4>
             
            </div>
      
    <!-- Main content -->
    <section class="content">
      <?php
        if(isset($_SESSION['error'])){
          echo "
            <div class='alert alert-danger alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4><i class='icon fa fa-warning'></i> Error!</h4>
              ".$_SESSION['error']."
            </div>
          ";
          unset($_SESSION['error']);
        }
        if(isset($_SESSION['success'])){
          echo "
            <div class='alert alert-success alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4><i class='icon fa fa-check'></i> Success!</h4>
              ".$_SESSION['success']."
            </div>
          ";
          unset($_SESSION['success']);
        }
      ?>
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header with-border">
              <a href="#addnew" data-toggle="modal" class="btn btn-primary btn-sm btn-flat"><i class="fa fa-plus"></i> New</a>
            </div>
            <div class="box-body" id="reload">
              <table id="example1" class="table table-bordered">
                <thead>
                  <th class="hidden"></th>
                  <th>No.</th>
                  <th>FULL NAME</th>
                  <th>EMAIL</th>
                  <th>TOOLS</th>
                
                </thead>
                <tbody class="tbl_body">
                  <?php
                    $sql = "SELECT u.UID as 'UID', concat(p.FIRSTNAME,' ',p.MIDDLENAME,' ',p.LASTNAME,' ',p.EXTENSION_NAME,' ') as 'fullname', u.EMAIL as 'EMAIL', u.STATUS as 'STATUS', u.IS_ONLINE as 'IS_ONLINE' FROM personal_info as p INNER JOIN user as u ON p.UID = u.UID";
                    $query = $conn->query($sql);
					$NO = 1;
                    while($row = $query->fetch_assoc()){
                      $online = $row['IS_ONLINE'];
                      switch ($online) {
                        case '0':
                           $online="offline";
                          break;
                        
                        default:
                           $online="online";
                          break;
                      }

                      $status = ($row['STATUS'])?'<span class="label label-success pull-right">activate</span>':'<span class="label label-danger pull-right">not activate</span>';
                      echo "
                        <tr>
                          <td class='hidden'></td>
                          <td>".$NO."</td>
                          <td>".$row['fullname']."</td>
                          <td>".$row['EMAIL']."</td>
                          <td>
                            <button class='btn btn-sm btn-flat view-pds' data-id='".$row['UID']."'><i class='fa fa-edit'></i>View PDS</button>
							<button class='btn btn-danger btn-sm btn-flat delete' data-id='".$row['UID']."'><i class='fa fa-archive'></i> Archive</button>
                          </td>
                        </tr>
                      ";
					  $NO+=1;
                    }
                  ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </section>   
  </div>
    <?php include 'includes/view-PDS.php'; ?>
  <?php include 'includes/footer.php'; ?>
	
</div>
<script src="../../jsp/jquery-2.1.4.min.js"></script>
<?php include 'includes/scripts.php'; ?>
<script>

$(function(){
	var texterror ='';
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
					texterror+=$(this).attr("name");
							$("#error-message").css('display','block');
							document.getElementById('error-info').innerHTML = "Please input all required fields!";   	    	
							document.getElementById('error-header').innerHTML = "Error!";
					$(this).css('background-color', "#ffa0a0f7");
				   
				   //$(".errors div").html(str + (count == 0 ? '' :', ') +  $(this).attr("name"));
				   count++;
				}
			   
			} 
		});
		/* if($('input[name="Gender"]:checked').length === 0) {
			str = $(".errors div").html();
			$(".gender-fields").css('background-color', "#ffa0a0f7");
			//$(".errors div").html(str +(count == 0 ? '' :', ') +  'Gender' );
			
			texterror+=$(this).attr("name");
			count++;
		}
		if($('input[name="Civil Status"]:checked').length === 0) {
			str = $(".errors div").html();
			$(".civilstat-fields").css('background-color', "#ffa0a0f7");
			//$(".errors div").html(str +(count == 0 ? '' :', ') +  'Civil Status' );
			
			texterror+=$(this).attr("name");count++;
		}
		if($('input[name="Citizenship"]:checked').length === 0) {
			str = $(".errors div").html();
			$(".citizenship-fields").css('background-color', "#ffa0a0f7");
			//$(".errors div").html(str +(count == 0 ? '' :', ') +  'Citizenship' );
			texterror+=$(this).attr("name");
			count++;
		} */
		$('.spouse-fields input').each(function(){
			str = $(".errors div").html();
			if(($('.pds_spousesurname').val().length != 0) ||  ($('.pds_spousefirstname').val().length != 0) ||  ($('.pds_spousenameextension').val().length != 0) ||  ($('.pds_spousemiddlename').val().length != 0) ){
				if ($(this).val().length == 0) {
					if($(this).hasClass("not-require")){
					
					}else{
					 $(this).css('background-color', "#ffa0a0f7");
					//$(".errors div").html(str + (count == 0 ? '' :', ') +  $(this).attr("name"));
					texterror+=$(this).attr("name");
					count++;
					}
				  
				} 
			}
		});
		return 0;
	
	
    }
	
	
	
	
	$('.view-pds').click(function(){
		$('#view_pds').modal('show');
		id = $(this).attr("data-id");
		$('#update_pds_info-btn').attr('id',id);
		
	   //$('#success-pds').modal('show');
	});
	$('#update_pds_info-btn').click(function(){
		action='update_pds_function';
		error = checking();
		/* email =$('#email_edit').val(); 
		pass =$('#password_edit').val(); 
		repass =$('#repassword_edit').val(); 
		status =$('#status_edit option:selected').text();
		if(status==='ACTIVATE'){
			status = '1'
		}else{
			status = '0'
		} */
		
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
			url: '../credentials/model.php',
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
					
					$('#success-pds').modal('show');
							$("#success-message").css('display','block');
							document.getElementById('success-info').innerHTML = "Succeessfully update Info.!";   	    	
							document.getElementById('success-header').innerHTML = "Success!";
				window.location.href="application.php";
				}else {
					
				
					$('#error-pds').modal('show');
							$("#error-message").css('display','block');
							document.getElementById('error-info').innerHTML = "Please input all required fields!";   	    	
							document.getElementById('error-header').innerHTML = "Error!";
				}
				
			}
			});
		}else{
			alert(texterror);
		}
	});
	
	$('.view-pds').click(function(){
		$('#view_pds').modal('show');
		action='view_pds_function';
		$("#view_pds input").val("");

		$.ajax({
			type: 'POST',
			url: '../credentials/model.php',
			data: {action:action,id:id},
			dataType: 'json',
			success: function(response){
				$("#view_pds .pds_surname").val(response.LASTNAME);
				$("#view_pds .pds_firstname").val(response.FIRSTNAME);
				$("#view_pds .pds_nameextension").val(response.EXTENSION_NAME);
				$("#view_pds .pds_middlename").val(response.MIDDLENAME);
				$("#view_pds .pds_dateofbirth").val(response.BIRTHDATE);
				$("#view_pds .pds_placeofbirth").val(response.BIRTHPLACE);
				if(response.GENDER==="Male"){
					$("#male").prop("checked", true);
				}else{
					$("#female").prop("checked", true);
					
				}
				if(response.CIVIL_STATUS==="Single"){
					$("#single").prop("checked", true);
				}else if(response.CIVIL_STATUS==="Married"){
					$("#married").prop("checked", true);
				}else if(response.CIVIL_STATUS==="Widow"){
					$("#widow").prop("checked", true);
				}else if(response.CIVIL_STATUS==="Separated"){
					$("#seperated").prop("checked", true);
				}else{
					$("#others").prop("checked", true);
				}
				
				$("#view_pds .pds_height").val(response.HEIGHT);
				$("#view_pds .pds_weight").val(response.WEIGHT);
				$("#view_pds .pds_bloodtype").val(response.BLOOD_TYPE);
				$("#view_pds .pds_gsisno").val(response.GSIS_ID_NO);
				$("#view_pds .pds_pagibigno").val(response.PAG_IBIG_NO);
				$("#view_pds .pds_philhealthno").val(response.PHILHEALTH_NO);
				$("#view_pds .pds_sssno").val(response.SSS_NO);
				$("#view_pds .pds_tinno").val(response.TIN_NO);
				$("#view_pds .pds_agencyemployee").val(response.AGENCY_EMPLOYEE_NO);
				if(response.CITIZENSHIP==="Filipino"){
					$("#fili").prop("checked", true);
				}else if(response.CITIZENSHIP==="Dual Citizenship"){
					$("#dual").prop("checked", true);
				}else if(response.CITIZENSHIP==="By Birth"){
					$("#bybirth").prop("checked", true);
				}else if(response.CITIZENSHIP==="By Naturalization"){
					$("#bynatu").prop("checked", true);
				}
				
				//$("#view_pds .pds_citizenship").val(response.CITIZENSHIP);//citizenship
				//$("#view_pds .pds_country").val(response.);//country
				$("#view_pds .pds_rhouseblk").val(response.RESIDENTIAL_LOTNO);
				$("#view_pds .pds_rstreet").val(response.RESIDENTIAL_STREET);
				$("#view_pds .pds_rsubdivision").val(response.RESIDENTIAL_SUBDIVISION);
				$("#view_pds .pds_rbarangay").val(response.RESIDENTIAL_BARANGAY);
				$("#view_pds .pds_rmunicipality").val(response.RESIDENTIAL_MUNICIPALITY);
				$("#view_pds .pds_rprovince").val(response.RESIDENTIAL_PROVINCE);
				$("#view_pds .pds_rzipcode").val(response.RESIDENTIAL_ZIP_CODE);
				$("#view_pds .pds_phouseblk").val(response.PERMANENT_LOTNO);
				$("#view_pds .pds_pstreet").val(response.PERMANENT_STREET);
				$("#view_pds .pds_psubdivision").val(response.PERMANENT_SUBDIVISION);
				$("#view_pds .pds_pbarangay").val(response.PERMANENT_BARANGAY);
				$("#view_pds .pds_pmunicipality").val(response.PERMANENT_MUNICIPALITY);
				$("#view_pds .pds_pprovince").val(response.PERMANENT_PROVINCE);
				$("#view_pds .pds_pzipcode").val(response.PERMANENT_ZIP_CODE);
				$("#view_pds .pds_telno").val(response.TELEPHONE_NO);
				$("#view_pds .pds_mobileno").val(response.MOBILE_NO);
				$("#view_pds .pds_emailaddress").val(response.EMAIL);
				$("#view_pds .pds_spousesurname").val(response.spousesurname);
				$("#view_pds .pds_spousefirstname").val(response.spousefirstname);
				$("#view_pds .pds_spousenameextension").val(response.spousenameextension);
				$("#view_pds .pds_spousemiddlename").val(response.spousemiddlename);
				$("#view_pds .pds_spouseoccupation").val(response.spouseoccupation);
				$("#view_pds .pds_businessname").val(response.businessname);
				$("#view_pds .pds_businessaddress").val(response.businessaddress);
				$("#view_pds .pds_businesstelno").val(response.businesstelno);
				$("#view_pds .pds_fathersurname").val(response.fathersurname);
				$("#view_pds .pds_fatherfirstname").val(response.fatherfirstname);
				$("#view_pds .pds_fathernameextension").val(response.fathernameextension);
				$("#view_pds .pds_fathermiddlename").val(response.fathermiddlename);
				$("#view_pds .pds_mothermaindenname").val(response.mothermaindenname);
				$("#view_pds .pds_motherfirstname").val(response.motherfirstname);
				$("#view_pds .pds_mothersnameextension").val(response.mothersnameextension);
				$("#view_pds .pds_mothersmiddlename").val(response.mothersmiddlename);
				/* $("#view_pds .pds_children").val(response.);
				$("#view_pds .pds_childrenBdate").val(response.);
				$("#view_pds .pds_CS").val(response.);
				$("#view_pds .pds_CS_rating").val(response.);
				$("#view_pds .pds_CS_date").val(response.);
				$("#view_pds .pds_CS_place").val(response.);
				$("#view_pds .pds_CS_licenceNo").val(response.);
				$("#view_pds .pds_CS_licenceDate").val(response.);
				$("#view_pds .pds_WE_FromDate").val(response.);
				$("#view_pds .pds_WE_ToDate").val(response.);
				$("#view_pds .pds_WE_PositionTitle").val(response.);
				$("#view_pds .pds_WE_Place").val(response.);
				$("#view_pds .pds_WE_MonthSalary").val(response.);
				$("#view_pds .pds_WE_Salary").val(response.);
				$("#view_pds .pds_WE_AppointmentStatus").val(response.);
				$("#view_pds .pds_WE_GovService").val(response.);
				$("#view_pds .pds_VW_Name_Address").val(response.);
				$("#view_pds .pds_VW_FromDate").val(response.);
				$("#view_pds .pds_VW_Todate").val(response.);
				$("#view_pds .pds_VW_NumbHours").val(response.);
				$("#view_pds .pds_VW_Work").val(response.);
				$("#view_pds .pds_LaD_Title").val(response.);
				$("#view_pds .pds_LaD_FromDate").val(response.);
				$("#view_pds .pds_LaD_ToDate").val(response.);
				$("#view_pds .pds_LaD_NumbHours").val(response.);
				$("#view_pds .pds_LaD_Type").val(response.);
				$("#view_pds .pds_LaD_ConductBy").val(response.);
				*/
				
				
			}
		});
	 
	});	
	
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
	


});



</script>
</body>
</html>
