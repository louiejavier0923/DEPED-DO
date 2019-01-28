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
	/*EDIT BUTTON*/
	$(document).on('click', '.edit', function(e) {
		$('#edit').modal('show');
    var id = $(this).attr("data-id");
    $("#id").val(id);
     $.ajax({
    type: 'POST',
    url: '../credentials/model.php',
    data: {action:'get_user_id',id:id},
    dataType: 'json',
    success: function(response){ 
       $('#email_edit').val(response.email);
       $('#password_edit').val(response.p_edit);
        $('#repassword_edit').val(response.cp_edit);
        
    }
  });
	});
	
  $('.delete').click(function(e){
    e.preventDefault();
    $('#delete').modal('show');
    var id = $(this).attr("data-id");
    $("#d_id").val(id);

  });

     $('#archive').click(function(e){
      e.preventDefault();
    var d_id = $("#d_id").val();
     $.ajax({
    type: 'POST',
    url: '../credentials/model.php',
    data: {action:'archive_user',d_id:d_id},
    dataType: 'json',
    success: function(response){
        alert(response.confirm);
     $('.alert-success').css("display","block").html(response.confirm);
     $('#delete').modal('hide');
     $("#reload").load(location.href + " #reload>*", "");
    }
  });        


 });



   $('#submit-user').click(function(e){
    e.preventDefault();
          add_user();
  });

   $('#close').click(function(e){
              $("#email").val("");
                   $("#my_pass").val("");
                   $("#cpassword").val("");
  
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
        $('.alert-success').css("display","block").html(response.message);
                  $('#addnew').modal('hide');
                   $("#email").val("");
                   $("#my_pass").val("");
                   $("#cpassword").val("");
            $("#reload").load(location.href + " #reload>*", "");
    }
  });
}
</script>
</body>
</html>
