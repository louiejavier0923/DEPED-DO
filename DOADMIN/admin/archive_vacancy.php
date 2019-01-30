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
        ARCHIVE FOR VACANCY
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#"><i class="fa fa-dashboard"></i> Archives</a></li>
        <li class="active">Publish Vacancy</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
      
            <div style="display: none;" class='alert alert-danger alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4><i class='icon fa fa-warning'></i> Error!</h4>
           
            </div>
       
            <div style="display: none;" class='alert alert-success alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4><i class='icon fa fa-check'></i> Success!</h4>
             
            </div>
        
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-body" id="reload">
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
                    $sql = "SELECT * FROM publish_vacancy WHERE isActive = '0'";
                    
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
                            <button class='btn btn-success btn-sm archive btn-flat' data-id='".$row['UID']."'><i class='fa fa-check'></i> Retrieve</button>
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
  <?php include 'includes/archive_vacancy_modal.php'; ?>
</div>
<?php include 'includes/scripts.php'; ?>
<script>
$(function(){
  
               
          /*GET DELETE  ID*/
  $('.archive').click(function(e){
    e.preventDefault();
    $('#archive').modal('show');
    var id = $(this).data('id');
    $("#id").val(id);
  });

  /*  ARCHIVE BUTTON*/
  $(document).on('click', '#retrieve_vacancy', function(e){
   
    e.preventDefault();
    var id = $("#id").val();

      $.ajax({
    type: 'POST',
    url: '../credentials/model.php',
    data: {action:'retrieve_vacancy',id:id},
    dataType: 'json',
    success: function(response){
      alert(response.message);
             $('.alert-success').css("display","block").html(response.message);
           $('#archive').modal('hide');
        $("#reload").load(location.href + " #reload>*", ""); 
    }
  });
  });
});
</script>
</body>
</html>
