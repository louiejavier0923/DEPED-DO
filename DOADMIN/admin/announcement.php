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
       	News
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">News</li>
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
                  <th>UID</th>
                  <th>TITLE</th>
                  <th>DESCRIPTION</th>
                  <th>DATE POSTED</th>
                  <th>TOOLS</th>
                </thead>
                <tbody>
                  <?php
                    $sql = "SELECT * FROM announcement WHERE isActive = '1'";
                    $query = $conn->query($sql);
                    while($row = $query->fetch_assoc()){
                      echo "
                        <tr>
                          <td>".$row['NO']."</td>
                          <td>".$row['UID']."</td>
                          <td>".$row['TITLE']."</td>
                          <td>".$row['DESCRIPTION']."</td>
                          <td>".$row['DATE_PUB']."</td>

                          <td>
                            <button class='btn btn-success btn-sm edit btn-flat' data-id='".$row['UID']."'><i class='fa fa-edit'></i> Edit</button>
                            <button class='btn btn-danger btn-sm delete btn-flat' data-id='".$row['UID']."'><i class='fa fa-trash'></i> Archive</button>
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

  <?php include 'includes/announcement_modal.php'; ?>
</div>
<?php include 'includes/scripts.php'; ?>
<script>
$(function(){
	var id = $(this).data('id');
	$('.edit').click(function(e){
    e.preventDefault();
    $('#edit').modal('show');
    id = $(this).data('id');
    $("#edit_uid").val(id);
  $.ajax({
    type: 'POST',
    url: '../credentials/model.php',
    data: {action:'get_a_id',id:id},
    dataType: 'json',
    success: function(response){
     
      
       
       $('#edit_title').val(response.title);
       $('#edit_desc').val(response.desc);
      	$('#edit_date').val(response.date);

    
    }
  });
});
	/*EDIT NEWS*/
	$('#edit_news').click(function(e){
    e.preventDefault();
 
    var e_id = $("#edit_uid").val();
    var title = $('#edit_title').val();
    var desc =  $('#edit_desc').val();
    var date_pub = $('#edit_date').val();
    $.ajax({
    type: 'POST',
    url: '../credentials/model.php',
    data: {action:'edit_announcement',e_id:e_id, title:title, desc:desc, date_pub:date_pub},
    dataType: 'json',
    success: function(response){
        alert(response.confirm);
     $('.alert-success').css("display","block").html(response.confirm);
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
  });

    /*ARCHIVE NEWS*/
    $("#archive").click(function(e){
      e.preventDefault();
      var d_id = $("#d_id").val();
     $.ajax({
    type: 'POST',
    url: '../credentials/model.php',
    data: {action:'archive_announcement',d_id:d_id},
    dataType: 'json',
    success: function(response){
        alert(response.confirm);
     $('.alert-success').css("display","block").html(response.confirm);
     $('#delete').modal('hide');
     $("body").load(location.href + " body>*", "");

    }
  });
    });





		/* ADD SCHOOLS */
    $('#submit_news').click(function(e){
    e.preventDefault();
    add_news();
 
  });

 });

function add_news(action='add_announcement'){
        var title = $("#title").val();
        var description = $("#description").val();
        var a_date = $("#date").val();


  $.ajax({
    type: 'POST',
    url: '../credentials/model.php',
    data: {action:action, title:title, description:description,a_date:a_date},
    dataType: 'json',
    success: function(response){

               alert(response.message);
                 $('.alert-success').css("display","block").html(response.message);
                   $('#addnew').modal('hide');
                   $("#title").val("");
                   $("#description").val("");
                   $("#news_date").val("");
          $("#reload").load(location.href + " #reload>*", "");
   

    }
  }); 
}
</script>
</body>
</html>
