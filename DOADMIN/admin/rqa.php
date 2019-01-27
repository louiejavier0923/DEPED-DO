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
         RQA LIST
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">rqa list</li>
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
              <a href="" id="appointment" data-toggle="modal" class="btn btn-success btn-sm btn-flat">PRINT</a>
               
            </div>
            <div class="box-body">
              <table id="example1" class="table table-bordered">
                <thead>
                
                
                  <th>RANK</th>
                   <th>NAME</th>
                  <th>EDUCATION</th>
                   <th>ELIGIBILITY</th>
                  <th>EXPERIENCE</th>
                  <th>TRAINING</th>
                   <th>DEMO</th>
                    <th>COMMUNICATION</th>
                     <th>INTERVIEW</th>
                      <th>TOTAL POINTS</th>
                 
                </thead>
                <tbody>
                  <?php
                    $cnt='';
                    $sql = "SELECT * FROM view_rank where TOTALPOINTS > 70";
                    $query = $conn->query($sql);
                    while($row = $query->fetch_assoc()){
                      $cnt += 1;
                      echo "
                        <tr>
                          <td>".$cnt."</td>
                           <td>".$row['LASTNAME'].', '.$row['FIRSTNAME'].' '.$row['MIDDLENAME']. "</td>
                          <td>".$row['EDUCATION']."</td>
                          

                          
                          <td>".$row['EXPERIENCE']."</td>
                           <td>".$row['ELIGIBILITY']."</td>
                            <td>".$row['TRAINING']."</td>
                             <td>".$row['DEMO']."</td>
                              <td>".$row['COMMUNICATION']."</td>
                                <td>".$row['INTERVIEW_AVG']."</td>
                                 <td>".$row['TOTALPOINTS']."</td>
                         
                  

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
  


   
});






</script>
</body>
</html>
