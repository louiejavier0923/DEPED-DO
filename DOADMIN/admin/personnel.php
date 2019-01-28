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
        Personnel
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Personnel</li>
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
              <a href="#addnew" data-toggle="modal" class="btn btn-primary btn-sm btn-flat"><i class="fa fa-plus"></i> New</a>
            </div>
            <div class="box-body" id="reload">
              <table id="example1" class="table table-bordered">
                <thead>
                  <th>NO</th>
                  <th>LAST NAME</th>
                  <th>FIRST NAME</th>
                  <th>MIDDLE NAME</th>
                  <th>EMAIL</th>
                  <th>TOOLS</th>
                </thead>
                <tbody class="schools_tbl">
                     <?php
                       $sql = "SELECT * FROM evaluators_info_tbl WHERE ISACTIVE = '1'";
                    $query = $conn->query($sql);
                    while($row = $query->fetch_assoc()){
                      echo "
                       <tr>
                          <td>".$row['NO']."</td>
                          <td>".$row['LASTNAME']."</td>
                          <td>".$row['FIRSTNAME']."</td>
                          <td>".$row['MIDDLENAME']."</td>
                          <td>".$row['EMAIL']."</td>

                          <td>
                            <button class='btn btn-success btn-sm edit btn-flat' data-id='".$row['NO']."'><i class='fa fa-edit'></i> Edit</button>
                            <button class='btn btn-danger btn-sm delete btn-flat' data-id='".$row['NO']."'><i class='fa fa-archive'></i> Archive</button>
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
  
  <?php include 'includes/personnel_modal.php'; ?>
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
    data: {action:'get_personnel_id',id:id},
    dataType: 'json',
    success: function(response){ 

       $('#edit_ln').val(response.ln);
       $('#edit_fn').val(response.fn);
        $('#edit_mn').val(response.mn);
        $('#edit_email').val(response.email);
        $('#edit_pass').val(response.pass);
         $('#edit_cpass').val(response.cpass);
        
    }
  });
  });


  $('#update_personnel').click(function(e){
    e.preventDefault();
    var id = $("#id").val();
    var ln = $("#edit_ln").val();
    var fn = $("#edit_fn").val();
    var mn = $("#edit_mn").val();
    var email = $("#edit_email").val();
    var pass = $("#edit_pass").val();
    var cpass = $("#edit_cpass").val();
    
    if(pass===cpass){
      $.ajax({
        type: 'POST',
        url: '../credentials/model.php',
        data: {action:'edit_personnel', id:id, ln:ln, fn:fn, mn:mn, email:email, pass:pass},
        dataType: 'json',
        success: function(response){
          if(response.confirm==='success'){
            $('.alert-success').css("display","block").html(response.message);  
          $('#edit').modal('hide');
          }else{
            alert('e');
          }
          
        }
      });
    } else{
      alert('password doesnt match');
    }
    
  });

  $('.delete').click(function(e){
    e.preventDefault();
    $('#archive').modal('show');
    var id = $(this).attr("data-id");
    $("#archive_id").val(id);

  });

     $('#archive_personnel').click(function(e){
      e.preventDefault();
    var id = $("#archive_id").val();
     $.ajax({
    type: 'POST',
    url: '../credentials/model.php',
    data: {action:'archive_personnel',id:id},
    dataType: 'json',
    success: function(response){
        alert(response.confirm);
     $('.alert-success').css("display","block").html(response.confirm);
     $('#archive').modal('hide');
     $("#reload").load(location.href + " #reload>*", "");
    }
  });        


 });



   $('#submit_personnel').click(function(e){
    e.preventDefault();
          add_personnel();

  });

    $('#close').click(function(e){
                   $("#lname").val("");
                   $("#fname").val("");
                   $("#middlename").val("");
                   $("#email").val("");
                   $("#pass").val("");
                   $("#cpass").val("");
  });
});


function add_personnel(action='add_personnel'){
  
        var middlename = $("#middlename").val();
        var email = $('#email').val();
         var pass = $('#pass').val();
          var cpass = $('#cpass').val();
          var lname = $("#lname").val();
          var fname = $("#fname").val();
        if(pass===cpass){

  $.ajax({
    type: 'POST',
    url: '../credentials/model.php',
    data: {action:action, lname:lname, fname:fname, middlename:middlename, email:email, pass:pass, cpass:cpass},
    dataType: 'json',
    success: function(response){
        $('.alert-success').css("display","block").html(response.message);
                  $('#addnew').modal('hide');
                   $("#lname").val("");
                   $("#fname").val("");
                   $("#middlename").val("");
                   $("#email").val("");
                   $("#pass").val("");
                   $("#cpass").val("");
            $("#reload").load(location.href + " #reload>*", "");
    }
  });
} 
else
{
  alert("Passwords don't match!");
}
}


</script>
</body>
</html>
