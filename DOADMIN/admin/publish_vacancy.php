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
        PUBLISH VACANCY
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Publish Vacancy</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
      
            <div style="display: none;" class='alert alert-danger alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4><i class='icon fa fa-warning'></i> Error!</h4>
             hahaha
            </div>
       
            <div style="display: none;" class='alert alert-success alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4><i class='icon fa fa-check'></i> Success!</h4>
                hahaha
            </div>
        
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header with-border">
              <a href="#addnew" data-toggle="modal" class="btn btn-primary btn-sm btn-flat"><i class="fa fa-plus"></i> New</a>
            </div>
            <div class="box-body">
              <table id="example1" class="table table-bordered">
                <thead>
                  <th>PUID</th>
                  <th>TITLE</th>
                  <th>DESCRIPTION</th>
                  <th>NAME OF INCUMBENT</th>
                  <th>PUBLICATION DATE</th>
                  <th>EXPIRATION DATE</th>
                  <th>STATUS</th>
                  <th>SALARIES</th>
                  <th>ITEM NO</th>
                  <th>TOOLS</th>
                </thead>
                <tbody>
                  <?php
                    $sql = "SELECT * FROM publish_vacancy ORDER BY NO DESC";
                    $query = $conn->query($sql);
                    while($row = $query->fetch_assoc()){
                      echo "
                        <tr>
                          <td>".$row['UID']."</td>
                          <td>".$row['TITLE']."</td>
                          <td>".$row['DESCRIPTION']."</td>
                          <td>".$row['NOI']."</td>
                          <td>".$row['PUBLICATION_DATE']."</td>
                          <td>".$row['PUBLICATION_DATE_UNTIL']."</td>
                          <td>".$row['STATUS']."</td>
                          <td>".$row['SALARIES']."</td>
                          <td>".$row['ITEM_NO']."</td>
                          <td>
                            <button class='btn btn-success btn-sm edit btn-flat' data-id='".$row['UID']."'><i class='fa fa-edit'></i> Edit</button>
                            <button class='btn btn-danger btn-sm delete btn-flat' data-id='".$row['UID']."'><i class='fa fa-trash'></i> Delete</button>
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
  <?php include 'includes/publish_vacancy_modal.php'; ?>
</div>
<?php include 'includes/scripts.php'; ?>
<script>
$(function(){
  $('.edit').click(function(e){
    e.preventDefault();
    $('#edit').modal('show');
    var id = $(this).data('id');
   $.ajax({
    type: 'POST',
    url: '../credentials/model.php',
    data: {action:'get_vacancy_id',id:id},
    dataType: 'json',
    success: function(response){
     
      
       
       $('#edit_title').val(response.title);
       $('#edit_expiration').val(response.expiration);
       $('#edit_description').val(response.description);
       $('#edit_noi').val(response.noi);
        $('#edit_status').val(response.status);
       $('#edit_itemno').val(response.itemno);
       $('#edit_salaries').val(response.salaries);
       $('#edit_place').val(response.place);
     


    
    }
  });
  });

  $('.delete').click(function(e){
    e.preventDefault();
    $('#delete').modal('show');
    var id = $(this).data('id');
    getRow(id);
  });

    $('#edit_vacancy').click(function(e){
    e.preventDefault();
 
    var id = $(this).data('id');
    alert(id);
  });


    $('#submit_vacancy').click(function(e){
    e.preventDefault();

        add_vacancy();
   
 
  });
});



function add_vacancy(action='add_vacancy'){

        var title = $('#title').val();
        var expiration = $('#expiration').val();
        var description = $('#description').val();
        var noi = $('#noi').val();
        var status = $('#status').val();
        var itemno = $('#itemno').val();
        var salaries = $('#salaries').val();
         var place = $('#place').val();



  $.ajax({
    type: 'POST',
    url: '../credentials/model.php',
    data: {action:action,title:title,description:description,noi:noi,status:status,itemno:itemno,salaries:salaries,place:place,expiration:expiration},
    dataType: 'json',
    success: function(response){

               alert(response.message);
                 $('.alert-success').css("display","block").html(response.message);
                   $('#addnew').modal('hide');

    }
  });
}
</script>
</body>
</html>