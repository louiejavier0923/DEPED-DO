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
                            <button class='btn btn-danger btn-sm btn-flat delete' data-id='".$row['UID']."'><i class='fa fa-trash'></i> Delete</button>
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
	
	$('#pds_btn').click(function(e){
		$('#view_pds').modal('show');
	});
	
	$('#update-user').click(function(e){
		action='update_user_function';
		id = $(this).attr("data-id");
		email =$('#email_edit').val(); 
		pass =$('#password_edit').val(); 
		repass =$('#repassword_edit').val(); 
		status =$('#status_edit option:selected').text();
		if(status==='ACTIVATE'){
			status = '1'
		}else{
			status = '0'
		}
		
		if(pass===repass){
			$.ajax({
				type: 'POST',
				url: '../credentials/model.php',
				data: {action:action,email:email,pass:pass,status:status,id:id},
				dataType: 'json',
				success: function(response){
					if(response.e==='success'){
						alert('updated');
						$('#edit').modal('hide');
						//$("#reload").load(location.href + " #reload>*", "");
					}else{
						alert('e');
					}
					
				}
			});
		} else{
			alert('password doesnt match');
		}
		
	});

  $('.edit').click(function(e){
    e.preventDefault();

   
    var id = $(this).data('id');  

      $.ajax({
    type: 'POST',
    url: '../credentials/model.php',
    data: {action:'get_user_id',id:id},
    dataType: 'json',
    success: function(response){
             $('#edit').modal('show');
             $('#email_edit').val(response.email); 
             $('#password_edit').val(response.password); 
             $('#status_edit').val(response.status); 
			 $('#update-user').attr('data-id', id);
    } 
  });
  });

  $('.delete').click(function(e){
    e.preventDefault();
    $('#delete').modal('show');
    var id = $(this).data('id');
    getRow(id);
  });

   $('#submit-user').click(function(e){
    e.preventDefault();
          add_user();
  });
});


function add_user(action='add_user'){
        var email = $('#email').val();
         var password = $('#my_pass').val();
          var cpassword = $('#cpassword').val();

  $.ajax({
    type: 'POST',
    url: '../credentials/model.php',
    data: {action:action,email:email,password:password,cpassword:cpassword},
    dataType: 'json',
    success: function(response){
            $("#reload").load(location.href + " #reload>*", "");
    }
  });
}
/*
function table_refresh(action='table_refresh_user'){
        $.ajax({
    type: 'POST',
    url: '../credentials/model.php',
    data: {action:action},
    dataType: 'json',
    success: function(response){
           
                 
                $('.tbl_body').html(response.count);   
    }
  });
}

table_refresh();
*/
</script>
</body>
</html>
