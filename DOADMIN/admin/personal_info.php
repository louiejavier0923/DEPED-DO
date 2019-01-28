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
        User
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Users</li>
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
                  <th>STATUS</th>
                  <th>ISONLINE</th>
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
                          <td>".$status."</td>
                          <td>".$online."</td>
                          <td>
                            <button class='btn btn-success btn-sm btn-flat edit' data-id='".$row['UID']."'><i class='fa fa-edit'></i> Edit</button>
                            <button class='btn btn-sm btn-flat view-pds' data-id='".$row['UID']."'><i class='fa fa-edit'></i> PDS</button>
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
    
  <?php include 'includes/footer.php'; ?>
  <?php include 'includes/users-modal.php'; ?>
</div>
<?php include 'includes/scripts.php'; ?>
<script>

$(function(){
	
	$('.add_new').click(function(){
		$("#addnew input").val("");
	});
	$('#save_pds_info-btn').click(function(){
		action='add_user_with_pds_info_function';
		//personal info
		pds_surname = $('#addnew .pds_surname').val();
		pds_firstname = $('#addnew .pds_firstname').val();
		pds_nameextension = $('#addnew .pds_nameextension').val();
		pds_middlename = $('#addnew .pds_middlename').val();
		pds_dateofbirth = $('#addnew .pds_dateofbirth').val();
		pds_placeofbirth = $('#addnew .pds_placeofbirth').val();
		pds_gender = $("#addnew input[name='gender']:checked").val();
		civil_status = $("#addnew input[name='civil_status']:checked").val();
		pds_height = $('#addnew .pds_height').val();
		pds_weight = $('#addnew .pds_weight').val();
		pds_bloodtype = $('#addnew .pds_bloodtype').val();
		pds_gsisno = $('#addnew .pds_gsisno').val();
		pds_pagibigno = $('#addnew .pds_pagibigno').val();
		pds_philhealthno = $('#addnew .pds_philhealthno').val();
		pds_sssno = $('#addnew .pds_sssno').val();
		pds_tinno = $('#addnew .pds_tinno').val();
		pds_agencyemployee = $('#addnew .pds_agencyemployee').val();
		pds_citizenship = $("#addnew input[name='citi']:checked").val();
		pds_country = $('#addnew .pds_country option:selected').text();
		pds_rhouseblk = $('#addnew .pds_rhouseblk').val();
		pds_rstreet = $('#addnew .pds_rstreet').val();
		pds_rsubdivision = $('#addnew .pds_rsubdivision').val();
		pds_rbarangay = $('#addnew .pds_rbarangay').val();
		pds_rmunicipality = $('#addnew .pds_rmunicipality').val();
		pds_rprovince = $('#addnew .pds_rprovince').val();
		pds_rzipcode = $('#addnew .pds_rzipcode').val();
		pds_phouseblk = $('#addnew .pds_phouseblk').val();
		pds_pstreet = $('#addnew .pds_pstreet').val();
		pds_psubdivision = $('#addnew .pds_psubdivision').val();
		pds_pbarangay = $('#addnew .pds_pbarangay').val();
		pds_pmunicipality = $('#addnew .pds_pmunicipality').val();
		pds_pprovince = $('#addnew .pds_pprovince').val();
		pds_pzipcode = $('#addnew .pds_pzipcode').val();
		pds_telno = $('#addnew .pds_telno').val();
		pds_mobileno = $('#addnew .pds_mobileno').val();
		pds_emailaddress = $('#addnew .pds_emailaddress').val();
		
		//family background
		pds_spousesurname = $('#addnew .pds_spousesurname').val();
		pds_spousefirstname = $('#addnew .pds_spousefirstname').val();
		pds_spousenameextension = $('#addnew .pds_spousenameextension').val();
		pds_spousemiddlename = $('#addnew .pds_spousemiddlename').val();
		pds_spouseoccupation = $('#addnew .pds_spouseoccupation').val();
		pds_businessname = $('#addnew .pds_businessname').val();
		pds_businessaddress = $('#addnew .pds_businessaddress').val();
		pds_businesstelno = $('#addnew .pds_businesstelno').val();
		pds_fathersurname = $('#addnew .pds_fathersurname').val();
		pds_fatherfirstname = $('#addnew .pds_fatherfirstname').val();
		pds_fathernameextension = $('#addnew .pds_fathernameextension').val();
		pds_fathermiddlename = $('#addnew .pds_fathermiddlename').val();
		pds_mothermaindenname = $('#addnew .pds_mothermaindenname').val();
		pds_motherfirstname = $('#addnew .pds_motherfirstname').val();
		pds_mothersnameextension = $('#addnew .pds_mothersnameextension').val();
		pds_mothersmiddlename = $('#addnew .pds_mothersmiddlename').val();
		pds_children = $('#addnew .pds_children').val();
		pds_childrenBdate = $('#addnew .pds_childrenBdate').val();
		
		//Civil Service Eligibility
		pds_CS = $('#addnew .pds_CS').val();
		pds_CS_rating = $('#addnew .pds_CS_rating').val();
		pds_CS_date = $('#addnew .pds_CS_date').val();
		pds_CS_place = $('#addnew .pds_CS_place').val();
		pds_CS_licenceNo = $('#addnew .pds_CS_licenceNo').val();
		pds_CS_licenceDate = $('#addnew .pds_CS_licenceDate').val();
		
		//Work Experience
		pds_WE_FromDate = $('#addnew .pds_WE_FromDate').val();
		pds_WE_ToDate = $('#addnew .pds_WE_ToDate').val();
		pds_WE_PositionTitle = $('#addnew .pds_WE_PositionTitle').val();
		pds_WE_Place = $('#addnew .pds_WE_Place').val();
		pds_WE_MonthSalary = $('#addnew .pds_WE_MonthSalary').val();
		pds_WE_Salary = $('#addnew .pds_WE_Salary').val();
		pds_WE_AppointmentStatus = $('#addnew .pds_WE_AppointmentStatus').val();
		pds_WE_GovService = $('#addnew .pds_WE_GovService').val();
		
		//Voluntary work
		pds_VW_Name_Address = $('#addnew .pds_VW_Name_Address').val();
		pds_VW_FromDate = $('#addnew .pds_VW_FromDate').val();
		pds_VW_Todate = $('#addnew .pds_VW_Todate').val();
		pds_VW_NumbHours = $('#addnew .pds_VW_NumbHours').val();
		pds_VW_Work = $('#addnew .pds_VW_Work').val();
		
		//Learning and Development
		pds_LaD_Title = $('#addnew .pds_LaD_Title').val();
		pds_LaD_FromDate = $('#addnew .pds_LaD_FromDate').val();
		pds_LaD_ToDate = $('#addnew .pds_LaD_ToDate').val();
		pds_LaD_NumbHours = $('#addnew .pds_LaD_NumbHours').val();
		pds_LaD_Type = $('#addnew .pds_LaD_Type').val();
		pds_LaD_ConductBy = $('#addnew .pds_LaD_ConductBy').val();
		
		
		
		$.ajax({
			type: 'POST',
			url: '../credentials/model.php',
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
				
				
				if(response.exe==='success')
					$('#addnew').modal('hide');
				else 
					alert(response.error);
				
				
			}
		});
		
		
	});

	$('#edit_n_update_pds_info-btn').click(function(){
		action='update_user_function';
		id = $(this).attr("data-id");
		console.log(id);
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
		pds_surname = $('#addnew .pds_surname').val();
		pds_firstname = $('#addnew .pds_firstname').val();
		pds_nameextension = $('#addnew .pds_nameextension').val();
		pds_middlename = $('#addnew .pds_middlename').val();
		pds_dateofbirth = $('#addnew .pds_dateofbirth').val();
		pds_placeofbirth = $('#addnew .pds_placeofbirth').val();
		pds_gender = $("#addnew input[name='gender']:checked").val();
		civil_status = $("#addnew input[name='civil_status']:checked").val();
		pds_height = $('#addnew .pds_height').val();
		pds_weight = $('#addnew .pds_weight').val();
		pds_bloodtype = $('#addnew .pds_bloodtype').val();
		pds_gsisno = $('#addnew .pds_gsisno').val();
		pds_pagibigno = $('#addnew .pds_pagibigno').val();
		pds_philhealthno = $('#addnew .pds_philhealthno').val();
		pds_sssno = $('#addnew .pds_sssno').val();
		pds_tinno = $('#addnew .pds_tinno').val();
		pds_agencyemployee = $('#addnew .pds_agencyemployee').val();
		pds_citizenship = $("#addnew input[name='citi']:checked").val();
		pds_country = $('#addnew .pds_country option:selected').text();
		pds_rhouseblk = $('#addnew .pds_rhouseblk').val();
		pds_rstreet = $('#addnew .pds_rstreet').val();
		pds_rsubdivision = $('#addnew .pds_rsubdivision').val();
		pds_rbarangay = $('#addnew .pds_rbarangay').val();
		pds_rmunicipality = $('#addnew .pds_rmunicipality').val();
		pds_rprovince = $('#addnew .pds_rprovince').val();
		pds_rzipcode = $('#addnew .pds_rzipcode').val();
		pds_phouseblk = $('#addnew .pds_phouseblk').val();
		pds_pstreet = $('#addnew .pds_pstreet').val();
		pds_psubdivision = $('#addnew .pds_psubdivision').val();
		pds_pbarangay = $('#addnew .pds_pbarangay').val();
		pds_pmunicipality = $('#addnew .pds_pmunicipality').val();
		pds_pprovince = $('#addnew .pds_pprovince').val();
		pds_pzipcode = $('#addnew .pds_pzipcode').val();
		pds_telno = $('#addnew .pds_telno').val();
		pds_mobileno = $('#addnew .pds_mobileno').val();
		pds_emailaddress = $('#addnew .pds_emailaddress').val();
		
		//family background
		pds_spousesurname = $('#addnew .pds_spousesurname').val();
		pds_spousefirstname = $('#addnew .pds_spousefirstname').val();
		pds_spousenameextension = $('#addnew .pds_spousenameextension').val();
		pds_spousemiddlename = $('#addnew .pds_spousemiddlename').val();
		pds_spouseoccupation = $('#addnew .pds_spouseoccupation').val();
		pds_businessname = $('#addnew .pds_businessname').val();
		pds_businessaddress = $('#addnew .pds_businessaddress').val();
		pds_businesstelno = $('#addnew .pds_businesstelno').val();
		pds_fathersurname = $('#addnew .pds_fathersurname').val();
		pds_fatherfirstname = $('#addnew .pds_fatherfirstname').val();
		pds_fathernameextension = $('#addnew .pds_fathernameextension').val();
		pds_fathermiddlename = $('#addnew .pds_fathermiddlename').val();
		pds_mothermaindenname = $('#addnew .pds_mothermaindenname').val();
		pds_motherfirstname = $('#addnew .pds_motherfirstname').val();
		pds_mothersnameextension = $('#addnew .pds_mothersnameextension').val();
		pds_mothersmiddlename = $('#addnew .pds_mothersmiddlename').val();
		pds_children = $('#addnew .pds_children').val();
		pds_childrenBdate = $('#addnew .pds_childrenBdate').val();
		
		//Civil Service Eligibility
		pds_CS = $('#addnew .pds_CS').val();
		pds_CS_rating = $('#addnew .pds_CS_rating').val();
		pds_CS_date = $('#addnew .pds_CS_date').val();
		pds_CS_place = $('#addnew .pds_CS_place').val();
		pds_CS_licenceNo = $('#addnew .pds_CS_licenceNo').val();
		pds_CS_licenceDate = $('#addnew .pds_CS_licenceDate').val();
		
		//Work Experience
		pds_WE_FromDate = $('#addnew .pds_WE_FromDate').val();
		pds_WE_ToDate = $('#addnew .pds_WE_ToDate').val();
		pds_WE_PositionTitle = $('#addnew .pds_WE_PositionTitle').val();
		pds_WE_Place = $('#addnew .pds_WE_Place').val();
		pds_WE_MonthSalary = $('#addnew .pds_WE_MonthSalary').val();
		pds_WE_Salary = $('#addnew .pds_WE_Salary').val();
		pds_WE_AppointmentStatus = $('#addnew .pds_WE_AppointmentStatus').val();
		pds_WE_GovService = $('#addnew .pds_WE_GovService').val();
		
		//Voluntary work
		pds_VW_Name_Address = $('#addnew .pds_VW_Name_Address').val();
		pds_VW_FromDate = $('#addnew .pds_VW_FromDate').val();
		pds_VW_Todate = $('#addnew .pds_VW_Todate').val();
		pds_VW_NumbHours = $('#addnew .pds_VW_NumbHours').val();
		pds_VW_Work = $('#addnew .pds_VW_Work').val();
		
		//Learning and Development
		pds_LaD_Title = $('#addnew .pds_LaD_Title').val();
		pds_LaD_FromDate = $('#addnew .pds_LaD_FromDate').val();
		pds_LaD_ToDate = $('#addnew .pds_LaD_ToDate').val();
		pds_LaD_NumbHours = $('#addnew .pds_LaD_NumbHours').val();
		pds_LaD_Type = $('#addnew .pds_LaD_Type').val();
		pds_LaD_ConductBy = $('#addnew .pds_LaD_ConductBy').val();
		
		
		
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
				
				
				if(response.exe==='success')
					$('#view_pds').modal('hide');
				else 
					alert(response.error);
				
				
			}
		});
		
	});
	
	$('.view-pds').click(function(){
		$('#view_pds').modal('show');
		action='view_pds_function';
		id = $(this).attr("data-id");
		$('.update_pds_info-btn').attr('id',id);
		$('.update_pds_info-btn').html('Edit'); 
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
				//$("#view_pds .pds_gender").val(response.GENDER);//gender
				//$("#view_pds .civil_status").val(response.CIVIL_STATUS);//civil_status
				$("#view_pds .pds_height").val(response.HEIGHT);
				$("#view_pds .pds_weight").val(response.WEIGHT);
				$("#view_pds .pds_bloodtype").val(response.BLOOD_TYPE);
				$("#view_pds .pds_gsisno").val(response.GSIS_ID_NO);
				$("#view_pds .pds_pagibigno").val(response.PAG_IBIG_NO);
				$("#view_pds .pds_philhealthno").val(response.PHILHEALTH_NO);
				$("#view_pds .pds_sssno").val(response.SSS_NO);
				$("#view_pds .pds_tinno").val(response.TIN_NO);
				$("#view_pds .pds_agencyemployee").val(response.AGENCY_EMPLOYEE_NO);
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
				
				
				$("#view_pds input").prop('disabled', true);
			}
		});
	 
	});	
	
	$('.edit').click(function(){
		$('#view_pds').modal('show');
		$('.update_pds_info-btn').html('Update'); 
		action='view_pds_function';
		var id = $(this).attr('id');
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
					//$("#view_pds .pds_gender").val(response.GENDER);//gender
					//$("#view_pds .civil_status").val(response.CIVIL_STATUS);//civil_status
					$("#view_pds .pds_height").val(response.HEIGHT);
					$("#view_pds .pds_weight").val(response.WEIGHT);
					$("#view_pds .pds_bloodtype").val(response.BLOOD_TYPE);
					$("#view_pds .pds_gsisno").val(response.GSIS_ID_NO);
					$("#view_pds .pds_pagibigno").val(response.PAG_IBIG_NO);
					$("#view_pds .pds_philhealthno").val(response.PHILHEALTH_NO);
					$("#view_pds .pds_sssno").val(response.SSS_NO);
					$("#view_pds .pds_tinno").val(response.TIN_NO);
					$("#view_pds .pds_agencyemployee").val(response.AGENCY_EMPLOYEE_NO);
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
					$("#view_pds .pds_LaD_ConductBy").val(response.); */
					
				}
			});
	
  });
 


});



</script>
</body>
</html>
