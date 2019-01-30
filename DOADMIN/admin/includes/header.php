<!DOCTYPE html>
<html>
<head>
  	<meta charset="utf-8">
<script src="../bower_components/jquery/dist/jquery.min.js"></script>

 <link rel ="icon" href="../../img/logo.png">
    	<meta http-equiv="X-UA-Compatible" content="IE=edge">
  	<title>DIVISION OFFICE</title>
  	<!-- Tell the browser to be responsive to screen width --> 
  	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  	<!-- Bootstrap 3.3.7 -->
  	<link rel="stylesheet" href="../bower_components/bootstrap/dist/css/bootstrap.min.css">
  	<!-- Font Awesome -->
  	<link rel="stylesheet" href="../bower_components/font-awesome/css/font-awesome.min.css">
  	<!-- Ionicons -->
  	<link rel="stylesheet" href="../bower_components/Ionicons/css/ionicons.min.css">
  	<!-- Theme style -->
    <link rel="stylesheet" href="../dist/css/AdminLTE.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="../bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
    <!-- daterange picker -->
    <link rel="stylesheet" href="../bower_components/bootstrap-daterangepicker/daterangepicker.css">
    <!-- Bootstrap time Picker -->
    <link rel="stylesheet" href="../plugins/timepicker/bootstrap-timepicker.min.css">
    <!-- bootstrap datepicker -->
    <link rel="stylesheet" href="../bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="../dist/css/skins/_all-skins.min.css">
  	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  	<!--[if lt IE 9]>
  	<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  	<![endif]-->

  	<!-- Google Font -->
  	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

  	<style type="text/css">
  		.mt20{
  			margin-top:20px;
  		}
      .bold{
        font-weight:bold;
      }

     /* chart style*/
      #legend ul {
        list-style: none;
      }

      #legend ul li {
        display: inline;
        padding-left: 30px;
        position: relative;
        margin-bottom: 4px;
        border-radius: 5px;
        padding: 2px 8px 2px 28px;
        font-size: 14px;
        cursor: default;
        -webkit-transition: background-color 200ms ease-in-out;
        -moz-transition: background-color 200ms ease-in-out;
        -o-transition: background-color 200ms ease-in-out;
        transition: background-color 200ms ease-in-out;
      }

      #legend li span {
        display: block;
        position: absolute;
        left: 0;
        top: 0;
        width: 20px;
        height: 100%;
        border-radius: 5px;
      }
      #retrieve {
        
      }
  	</style>
    <script>
  $(function(){
  $("#admin_save").click(function(){
  var user = $("#username").val();
  var pass = $("#password").val();
  var fn = $("#firstname").val();
  var ln = $("#lastname").val();
  var cpass = $("#curr_password").val();
  var admin_pass = $("#admin_pass").val();
  var id = $("#admin_id").val();


  
  if(user == "" || pass == "" || fn == "" || ln == "")
  {
      alert("Fill up all forms!");
      
       
     
     
  }
  else if(admin_pass===cpass)
  {
    $.ajax({
        type: 'POST',
        url: '../credentials/model.php',
        data: {action:'edit_admin', id:id, ln:ln, fn:fn, user:user, pass:pass},
        dataType: 'json',
        success: function(response){
          if(response.confirm==='success'){
            alert("Update Success!");
            $("#profile").modal("hide");

          }else{
            alert('e');
          }
          
        }
      });
   
  }
  else{

      alert("Your current password is Incorrect!"); 
  }



});
 $( "#firstname" ).keypress(function(e) {
                    var key = e.keyCode;
                    if (key >= 48 && key <= 57) {
                        e.preventDefault();
                    }
                });
 $( "#lastname" ).keypress(function(e) {
                    var key = e.keyCode;
                    if (key >= 48 && key <= 57) {
                        e.preventDefault();
                    }
                });
});

    </script>
</head>