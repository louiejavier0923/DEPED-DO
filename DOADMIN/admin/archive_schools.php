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
       	ARCHIVE FOR SCHOOLS
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#"><i class="fa fa-dashboard"></i> Archives</a></li>
        
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
              <div class="box-body" id="reload">
              <table id="example1" class="table table-bordered">
                <thead>
                  <th>NO</th>
                  <th>SID</th>
                  <th>SCHOOL NAME</th>
                  <th>SCHOOL ADDRESS</th>
                  <th>TOOLS</th>
                </thead>
                <tbody>
                  <?php
                    $sql = "SELECT * FROM schools WHERE isActive = '0'";
                    $query = $conn->query($sql);
                    while($row = $query->fetch_assoc()){
                      echo "
                        <tr>
                          <td>".$row['NO']."</td>
                          <td>".$row['SID']."</td>
                          <td>".$row['SCHOOL_NAME']."</td>
                          <td>".$row['SCHOOL_ADDRESS']."</td>

                          <td>
                            <button class='btn btn-success btn-sm delete btn-flat' data-id='".$row['SID']."'><i class='fa fa-check'></i> Retrieve</button>
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

  <?php include 'includes/archive_school_modal.php'; ?>
</div>
<?php include 'includes/scripts.php'; ?>
<script>
$(function(){
	 /*ARCHIVE BUTTON*/

	 $('.delete').click(function(e){
    e.preventDefault();
    $('#delete').modal('show');
    var id = $(this).data('id');
    $("#d_id").val(id);
  });

   /*RETRIEVE SCHOOLS*/

      $("#retrieve").click(function(e){
      e.preventDefault();
      var id = $("#d_id").val();
     $.ajax({
    type: 'POST',
    url: '../credentials/model.php',
    data: {action:'retrieve_schools',id:id},
    dataType: 'json',
    success: function(response){
        alert(response.confirm);
     $('.alert-success').css("display","block").html(response.confirm);
     $('#delete').modal('hide');
    }
  });
    });

 });


</script>
</body>
</html>
