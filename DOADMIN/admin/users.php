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
        Users
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
        
        
     
          <!-- Table -->
 <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header with-border">
              <a href="#addnew" data-toggle="modal" class="btn btn-primary btn-sm btn-flat"><i class="fa fa-plus"></i>New</a>
            </div>
            <div class="box-body" id="reload">
              <table id="example1" class="table table-bordered">
                <thead>
                  <th>NO</th>
                  <th>UID</th>
                  <th>EMAIL</th>
                  <th>STATUS</th>
                </thead>
                <tbody>

                  <?php
                    $sql = "SELECT * FROM user";
                    $query = $conn->query($sql);
                    while($row = $query->fetch_assoc()){
                  $status = ($row['STATUS'])?'<span class="label label-success pull-left">activate</span>':'<span class="label label-danger pull-right">not activate</span>';
                  
                      echo "
                        <tr>
                          <td>".$row['NO']."</td>
                          <td>".$row['UID']."</td>
                          <td>".$row['EMAIL']."</td>
                          <td>".$status."</td>

                          <td>
                            <button class='btn btn-success btn-sm edit btn-flat' data-id='".$row['UID']."'><i class='fa fa-edit'></i> Edit</button>
                            <button class='btn btn-danger btn-sm delete btn-flat' data-id='".$row['UID']."'><i class='fa fa-archive'></i> Archive</button>
                          </td>
                        </tr>
                      ";
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
   $('#submit-user').click(function(e){
    e.preventDefault();
        var email = $('#email').val();
         var password = $('#my_pass').val();
          var cpassword = $('#cpassword').val();
          var status = $('#status').val();
 if(email == "" || password == "" || cpassword  == ""){

                     $('#error').css("display","block").html('Fill up all forms!');    
  }else{
             add_user();
    
  }
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
          var status = $('#status').val();
  $.ajax({
    type: 'POST',
    url: '../credentials/model.php',
    data: {action:action,email:email,password:password,cpassword:cpassword, status:status},
    dataType: 'json',
    success: function(response){
       

                 switch(response.message){
                   case 's':
                    setTimeout(function(){ $('.alert-success').fadeOut() }, 3000);
                     $('.alert-success').css("display","block").html('Successfully Added!');
                     $('#addnew').modal('hide');
                     $("#email").val("");
                     $("#my_pass").val("");
                     $("#cpassword").val("");
                     $("#reload").load(location.href + " #reload>*", "");
                   break;
                   case 'f':

                    setTimeout(function(){ $('.alert-danger').fadeOut() }, 3000);
                     $('.alert-danger').css("display","block").html('Email already used!');
                       $('#addnew').modal('hide');
                     $("#email").val("");
                     $("#my_pass").val("");
                     $("#cpassword").val("");
                     $("#reload").load(location.href + " #reload>*", "");
                   break;
                 }
                  
    }

  });
}
</script>
</body>
</html>
