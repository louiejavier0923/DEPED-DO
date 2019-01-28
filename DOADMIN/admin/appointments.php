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
         APPOINTMENTS
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">appointments</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
       <div  style="display: none;" class='alert alert-success alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4><i class='icon fa fa-check'></i> Success!</h4>
          
            </div>
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
             <div class="pull-right">
                <form method="POST" class="form-inline" id="rankForm">
                  
                  
                  <button type="button" class="btn btn-primary btn-sm btn-flat" id="ranking"><span class="glyphicon glyphicon-print"></span> Appointments</button>
                </form>
              </div>
               
            </div>
            <div class="box-body">
              <table id="example1" class="table table-bordered">
                <thead>
                
                
                  <th>NO</th>
                   <th>NAME</th>
                  <th>SCHOOL NAME</th>
                   <th>ADDRESS</th>
                  <th>SALARY</th>
                  <th>PUBLISH DATE</th>
                   <th>EXPIRATION DATE</th>
                  
                      <th>REPLACEMENT NO</th>
                       <th>Status</th>
                 
                </thead>
                <tbody>
                  <?php
                    $cnt='';
                    
                    $sql = "SELECT * FROM appointment a join view_rank v On v.UID = a.UID join publish_vacancy pv ON pv.UID = a.VID join schools s ON s.SID = pv.PLACE_ASSIGNMENT GROUP BY v.UID";
                    $query = $conn->query($sql);

                    while($row = $query->fetch_assoc()){
                           if(strtotime($row['EXPIRATION_DATE']) < strtotime('-15 days')) {
                                $status='<span class="label label-danger pull-right">Expired</span>';
                            }
                            else{
                                  $status='<span class="label label-success pull-right">Ongoing</span>';
                            }

                      $cnt += 1;
                      echo "
                        <tr>
                          <td>".$cnt."</td>
                           <td>".$row['LASTNAME'].', '.$row['FIRSTNAME'].' '.$row['MIDDLENAME']. "</td>
                          <td>".$row['SCHOOL_NAME']."</td>
                          

                          
                          <td>".$row['SCHOOL_ADDRESS']."</td>
                           <td>".$row['SALARIES']."</td>
                            <td>".$row['DATE']."</td>
                             <td>".$row['EXPIRATION_DATE']."</td>
                              
                             
                                 <td>".$row['ITEM_NO']."</td>
                                 <td>".$status."</td>
                         
                  

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
  <?php include 'includes/ranking_modal.php'; ?>
</div>
<?php include 'includes/scripts.php'; ?>
<script>
$(function(){
    $('#ranking').click(function(e){
    e.preventDefault();
    $('#rankForm').attr('action', '../credentials/model_printables.php');
    $('#rankForm').submit();
  });


   
});






</script>
</body>
</html>
