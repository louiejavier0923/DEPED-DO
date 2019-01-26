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
       	Schools
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Schools</li>
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
                  <th>SID</th>
                  <th>SCHOOL NAME</th>
                  <th>SCHOOL ADDRESS</th>
                  <th>TOOLS</th>
                </thead>
                <tbody class="schools_tbl">
                
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </section>   
  </div>
    

  <?php include 'includes/footer.php'; ?>

  <?php include 'includes/schools_modal.php'; ?>
</div>
<?php include 'includes/scripts.php'; ?>
<script>

function fetch_schools(action='fetch_schools_tbl'){
        $.ajax({
    type: 'POST',
    url: '../credentials/model.php',
    data: {action:action},
    dataType: 'json',
    success: function(response){
           
                 
            $('.schools_tbl').html(response.schools);
    }
  });
}


$(function(){
   fetch_schools();
	var id = $(this).data('id');
	$('.edit').click(function(e){
    e.preventDefault();
    $('#edit').modal('show');
    id = $(this).data('id');
    e.stopPropagation();
   $.ajax({
    type: 'POST',
    url: '../credentials/model.php',
    data: {action:'get_school_id',id:id},
    dataType: 'json',
    success: function(response){
     
      
       
       $('#edit_name').val(response.name);
       $('#edit_address').val(response.address);
      	$('#edit_id').val(id);
     


    
    }
  });
});
	/*EDIT SCHOOL_ADDRESS*/
	$('#edit_school').click(function(e){
    e.preventDefault();
 
    var id = $("#edit_id").val();
    var name = $('#edit_name').val();
    var address =  $('#edit_address').val();
       $.ajax({
    type: 'POST',
    url: '../credentials/model.php',
    data: {action:'edit_schools',id:id,name:name,address:address},
    dataType: 'json',
    success: function(response){
     		alert(response.confirm);
        $('.alert-success').css("display","block").html(response.message);
         $('#edit').modal('hide');
         $("#reload").load(location.href + " #reload>*", "");
    }
  });
  });


	 /*ARCHIVE BUTTON*/

	 $('.delete').click(function(e){
    e.preventDefault();
    $('#delete').modal('show');
    var id = $(this).data('id');
    $("#d_id").val(id);
    $("#d_id").hide();
  });

    /*ARCHIVE SCHOOLS*/
    $("#archive").click(function(e){
      e.preventDefault();
      var d_id = $("#d_id").val();
     $.ajax({
    type: 'POST',
    url: '../credentials/model.php',
    data: {action:'archive_schools',d_id:d_id},
    dataType: 'json',
    success: function(response){
        alert(response.confirm);
     $('.alert-success').css("display","block").html(response.message);
     $('#delete').modal('hide');
    }
  });
    });
  }); 

</script>
</body>
</html>