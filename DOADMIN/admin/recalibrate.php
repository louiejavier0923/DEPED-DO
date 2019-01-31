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
              <a href="" id="recalibrate" data-toggle="modal" class="btn btn-success btn-sm btn-flat">RECALIBRATE using DO #22</a>
               
            </div>
            <div class="box-body">
              <table id="example1" class="table table-bordered">
                <thead>
                
                
                  <th>NO</th>
                    <th>Applicant ID</th>
                   <th>Full Name</th>
                   <th>Email</th>
                  <th>Total Points</th>
                
                   
                 
                </thead>
                <tbody class='table-ranker'>
                  
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
<script src='../../jsp/pointing-function.js'></script>
<script>
$(function(){
   $('#select_year').change(function(){
    window.location.href = 'home.php?year='+$(this).val();
  });

                 
});

function loadBelowAvg(){

  $.ajax({
    type:'POST',
    url:'../credentials/model-recalibrate.php',
    data:{
      action:'view-below-ranking'
    }
  }).done(function(data){
    $('.table-ranker').html(data);
  })

}

$(document).ready(function(){
  loadBelowAvg();

  $('body')
  .on('click','#recalibrate',function(){
    // alert('tanga ako! tanga!');
    
    $.ajax({

      type:'POST',
      url:'../credentials/model-recalibrate.php',
      dataType:'json',
      data:{
          action:'select-applicant-recalibrate'
      }

    }).done(function(output){

      // console.log(output);
      for(var i=0;i<output.length;i++){

          var new_points = parseFloat(educationPoints('22',output[i].GWA))+parseFloat(output[i].GWA_ADD);

          $.ajax({
              type:'POST',
              url:'../credentials/model-recalibrate.php',
              data:{
                  action:'recalibrate_applicant',
                  a:output[i].UID,
                  b:output[i].PID,
                  c:new_points
              }
          }).done(function(data){
                  // console.log(data);
              if(data){
                  // alert('OKAY! -- '+data);
                  saveAlert('Recalibration Done!');
              }
              loadBelowAvg();
          })

      }

    })
  })

})





</script>
</body>
</html>
