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
         CALIBRATE LIST
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">recalibrate list</li>
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
              <a href="" id="recalibrate" data-toggle="modal" class="btn btn-success btn-sm btn-flat">RECALIBRATE</a>
               
            </div>
            <div class="box-body">
              <table id="example1" class="table table-bordered">
                <thead>
                
                
                  <th>NO</th>
                    <th>UID</th>
                   <th>EDUCATION</th>
                   <th>EXPERIENCE</th>
                  <th>ELIGIBILITY</th>
                   <th>TRAINING</th>
                  <th>INTERVIEW</th>
                  <th>DEMO</th>
                   <th>COMMUNICATION</th>
                
                   
                 
                </thead>
                <tbody>
                  <?php
                    $cnt='';
                    $sql = "SELECT  c.UID,c.EDU,c.EXP,c.ELIG,c.TRAINING,c.INTERVIEW,c.DEMO,c.COMMUNICATION FROM calibrate c";
                    $query = $conn->query($sql);
                    while($row = $query->fetch_assoc()){
                      $cnt += 1;
                      /*
                        $status = ($row['IS_CALIBRATED'])?'<span class="label label-success pull-right">CALIBRATED</span>':'<span class="label label-danger pull-right">NOT CALIBRATED</span>';
                        */
                      echo "
                        <tr>
                          <td>".$cnt."</td>
                           <td>".$row['UID']."</td>
                            <td>".$row['EDU']."</td>
                           <td>".$row['EXP']."</td>
                          <td>".$row['ELIG']."</td>
                          
                          <td>".$row['TRAINING']."</td>
                          
                          <td>".$row['INTERVIEW']."</td>
                           <td>".$row['DEMO']."</td>
                            <td>".$row['COMMUNICATION']."</td>
                           
                          
                         
                  

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
   $('#select_year').change(function(){
    window.location.href = 'home.php?year='+$(this).val();
  });

   $('#recalibrate').click(function(e){
    e.preventDefault();
              var EDUCATION = $("#example1").map(function() {
              var $tr = $(this);
              var id = $tr.find("td:nth-child(3)").text();
              return id;
              }).toArray();


   $.ajax({
    type: 'POST',
    url: '../credentials/model.php',
    data: {action:'recab',EDUCATION:EDUCATION},
    dataType: 'json',
    success: function(response){ 
 
                alert(response.data);
        
    }
  });

                 
  });

   
});






</script>
</body>
</html>
