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
         PLACEMENT
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">placement</li>
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
            <div class="box-body">
              <table id="example1" class="table table-bordered">
                <thead>
                
                
                  <th>POSITION</th>
                  <th>SCHOOL</th>
                  <th>APPLICANTS</th>
                  <th>REPLACEMENT NO</th>
                 
                </thead>
                <tbody>
                  <?php
                    $sql = "SELECT * FROM publish_vacancy";
                    $query = $conn->query($sql);
                    while($row = $query->fetch_assoc()){
                      echo "
                        <tr>
                          <td>".$row['TITLE']."</td>
                          <td>".$row['PLACE_ASSIGNMENT']."</td>
                          <td>
                              <div class='form-group>
  

                           <div class='col-sm-9'>
                              <select class='form-control applicants_list'  name='status'>
                              
                              </select>
                           </div>
                         </div>

                          </td>
                          <td>".$row['ITEM_NO']."</td>
                         
                  

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
  <?php include 'includes/replacement_modal.php'; ?>
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
      var date = new Date(response.expiration);

    
       $('#edit_title').val(response.title);
       $('#edit_expiration').val(response.expiration);
       $('#edit_description').val(response.description);
       $('#edit_noi').val(response.noi);
       $('#edit_status').selectedIndex(response.status);
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

function applicants_list(action='applicants_list'){
        $.ajax({
    type: 'POST',
    url: '../credentials/model.php',
    data: {action:action},
    dataType: 'json',
    success: function(response){
           
                 
                $('.applicants_list').html(response);   
    }
  });
}

applicants_list();

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
                   $('#addnew').modal('hide');

    }
  });
}
</script>
</body>
</html>
