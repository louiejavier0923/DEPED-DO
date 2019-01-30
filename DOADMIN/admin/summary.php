<?php include 'includes/session.php'; ?>
<?php include 'includes/header.php'; ?>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <?php include 'includes/navbar.php'; ?>
  <?php include 'includes/menubar.php'; ?>
<?php 
  include '../timezone.php'; 
  $today = date('Y-m-d');
  $year = date('Y');
  if(isset($_GET['year'])){
    $year = $_GET['year'];
   
  }
?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
         SUMMARY
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">summary</li>
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
          
              </div>
               
            </div>
            <div class="box-body">
              <table id="example1" class="table table-bordered">
                <thead>
                
                
                  <th>UID</th>
                   <th>APPLICANT NAME</th>
                  <th>CRITERIA</th>
                  <th>EQUIVALENT POINTS</th>
                   <th>GRADED BY</th>
                 
                 
                </thead>
                <tbody>
                  <?php
                    $cnt='';

                    $sql = "SELECT a.UID,a.EQUIVALENT_POINTS,a.CRITERIA_CODE,a.VALUE,a.GRADED_BY, CONCAT(p.LASTNAME,' ',p.FIRSTNAME,' ',p.MIDDLENAME) as 'APPLICANT_NAME',p.UID,CONCAT(e.LASTNAME,' ',e.FIRSTNAME,' ',e.MIDDLENAME) as 'EVALUATOR_NAME',e.NO FROM applicants_points a INNER JOIN personal_info p ON p.UID = a.UID INNER JOIN evaluators_info_tbl e ON e.NO = a.GRADED_BY";
                    $query = $conn->query($sql);
                    while($row = $query->fetch_assoc()){
                      $cnt += 1;
                      
                      echo "
                        <tr>
                          <td>".$row['UID']."</td>
                           <td>".$row['APPLICANT_NAME']. "</td>
                          <td>".$row['CRITERIA_CODE']."</td>
                          

                           <td>".$row['EQUIVALENT_POINTS']."</td>
                          <td>".$row['EVALUATOR_NAME']."</td>
                             
                        
                         
                  

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
