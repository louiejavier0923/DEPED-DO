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
                   <th>NAME</th>
                   <th>PID</th>
                  <th>CRITERIA</th>
                   <th>VALUE</th>
                  <th>EQUIVALENT POINTS</th>
                  <th>TOTAL POINTS</th>
                   <th>STATUS</th>
                
                   
                 
                </thead>
                <tbody>
                  <?php
                    $cnt='';
                    $sql = "SELECT DISTINCT (u.UID) as 'ID',u.FIRSTNAME,u.LASTNAME,u.MIDDLENAME,u.TOTALPOINTS,n.IS_CALIBRATED,n.PID,a.CRITERIA_CODE,a.VALUE,a.EQUIVALENT_POINTS from view_rank u INNER JOIN application n on u.UID = n.UID INNER JOIN applicants_points a ON a.UID = u.UID where n.STATUS = '0' and u.TOTALPOINTS < 70";
                    $query = $conn->query($sql);
                    while($row = $query->fetch_assoc()){
                      $cnt += 1;
                        $status = ($row['IS_CALIBRATED'])?'<span class="label label-success pull-right">CALIBRATED</span>':'<span class="label label-danger pull-right">NOT CALIBRATED</span>';
                      echo "
                        <tr>
                          <td>".$cnt."</td>
                           <td>".$row['ID']."</td>
                            <td>".$row['PID']."</td>
                           <td>".$row['LASTNAME'].', '.$row['FIRSTNAME'].' '.$row['MIDDLENAME']. "</td>
                          <td>".$row['CRITERIA_CODE']."</td>
                          

                          
                          <td>".$row['VALUE']."</td>
                           <td>".$row['EQUIVALENT_POINTS']."</td>
                            <td>".$row['TOTALPOINTS']."</td>
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
   $('#select_year').change(function(){
    window.location.href = 'home.php?year='+$(this).val();
  });

   $('#recalibrate').click(function(e){
    e.preventDefault();
              var value = $("#example1").map(function() {
              var $tr = $(this);
              var id = $tr.find("td:nth-child(6)").text();
              return id;
              }).toArray();

              var uid = $("#example1").map(function() {
              var $tr = $(this);
              var id = $tr.find("td:nth-child(2)").text();
              return id;
              }).toArray();


              alert(uid+value);


                 
  });

   
});






</script>
</body>
</html>
