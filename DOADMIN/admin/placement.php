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
       <div class='alert alert-success alert-dismissible'>
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
        
                <a href="" id="unselect" style="display: none;" data-toggle="modal" class="btn btn-danger btn-sm btn-flat"></a>
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
                    $sql = "SELECT * FROM publish_vacancy WHERE APP_ISSET = '0'";
                    $query = $conn->query($sql);
                    while($row = $query->fetch_assoc()){
                      echo "
                        <tr>
                          <td>".$row['TITLE']."<input style='display:none;' type='checkbox' id=".$row['NO']." name=".$row['NO']." value=".$row['NO']."></td>
                          <td>".$row['PLACE_ASSIGNMENT']."</td>
                          <td>
                              <div class='form-group>
  

                           <div class='col-sm-9'>
                           
                             <select data-id=".$row['NO']." id='teachers-dropdown-id' class='teachers-dropdown form-control'>
                                                   
                                                  
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
              <div class="box-header with-border">
              <a href="" id="appointment" data-toggle="modal" class="btn btn-success btn-sm btn-flat">APPOINTMENT</a>
               
            </div>
            </div>
          </div>
        </div>
      </div>
    </section>   
  </div>
    
  <?php include 'includes/footer.php'; ?>
  <?php include 'includes/appointment_modal.php'; ?>
</div>
<?php include 'includes/scripts.php'; ?>
<script>
$(function(){
  

  $('#appointment').click(function(e){
          var ids = $("#example1 tr:has(input:checked)").map(function() {
              var $tr = $(this);
              var id = $tr.find("td:nth-child(3) option:selected").val();
              return id;
              }).toArray();

           var sids = $("#example1 tr:has(input:checked)").map(function() {
              var $tr = $(this);
              var id = $tr.find("td:nth-child(2)").text();
              return id;
              }).toArray();

              if(ids==''){
                 alert('no selected data');
              }
              else{

                       alert(sids);
                         $.ajax({
                             type: 'POST',
                             url: '../credentials/model.php',
                             data: {action:'set_appointment',uid:ids},
                             dataType: 'json',
                             success: function(response){
                                            switch(response.message){
                                              case 'success':
                                              $('.alert-success').html(response.message);
                                              break;
                                            }
                                                 
                                 }
                         });
              }
     
  });


$("#unselect").click(function(){
           $(".teachers-dropdown  option").attr("hidden",false); 
           $(".teachers-dropdown").val("SELECT -"); 
           $("#unselect").css("display","none"); 
           $('input:checkbox').prop('checked',false);
         
  });
$(".teachers-dropdown").change(function()
               {
           
                  var myid = $(this).data('id');
                  var count = $("[type='checkbox']:checked").length;
                   $(".teachers-dropdown  option").attr("hidden",false); //enable everything
                   $("#unselect").css('display','block') 
                 
                   $(':checkbox[value=' + myid + ']').prop('checked', true);
                   CountSelected();
                   DisableOptions(); //disable selected values

                });
function CountSelected(){
   var count = $("[type='checkbox']:checked").length;
     $("#unselect").html("DESELECT ALL"+"("+count+")"); 
}
function DisableOptions()
{
    var arr=[];

      $(".teachers-dropdown option:selected").each(function()
              {
                  
                  arr.push($(this).val());
                  
                   
              });

    $(".teachers-dropdown option").filter(function()
        {


              return $.inArray($(this).val(),arr)>-1;
            

   }).attr("hidden",true);   
   
}



 $(".teachers-dropdown  option").attr("hidden",false); 
           $(".teachers-dropdown").val("SELECT -"); 
   
});


function applicants_list(action='applicants_list'){
        $.ajax({
    type: 'POST',
    url: '../credentials/model.php',
    data: {action:action},
    dataType: 'json',
    success: function(response){
           
                 
                $('.teachers-dropdown').html(response.message);   
                            }
               });
  }

  applicants_list();



</script>
</body>
</html>
