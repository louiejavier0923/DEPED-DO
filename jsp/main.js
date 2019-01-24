
function login(action = 'login_function')
      {
      var login_email = $('#login_email').val();
      var login_password = $('#login_password').val();
                 
        $.ajax({
               url:"DOADMIN/credentials/model.php",
               method:"POST",
               data:{action:action,email:login_email,pwd:login_password},
               dataType:"json",
                   success:function(data){
                                         
                             switch(data.message){
                                               	
                                    case 'successful':
                                          window.location.href='applicants/home.php';
                                    break;

                                    case 'redirect':
                                          alert(data.message);
                                    break;

                                    default:
                                          alert(data.message);
                                    break;
                                                 }
                                           
                                                
 
                                                  
                                     
                                         }
                                                
                          });
  

        }


function register(action = 'register_function')
      {
      var reg_email = $('#reg_email').val();
      var reg_pass = $('#reg_pwd').val();
       var reg_confirm_pass = $('#reg_confirm_pwd').val();
     
                 
        $.ajax({
               url:"DOADMIN/credentials/model.php",
               method:"POST",
               data:{action:action,email:reg_email,pwd:reg_pass,cpwd:reg_confirm_pass},
               dataType:"json",
                   success:function(data){
                                         
                                            alert(data.message);
                                         }    
               });
  

        }

  function apply(action = 'apply_vacancy')
       {
       var vacancy_pid = $(this).data('id');   
     
                 
       alert(vacancy_pid);
  

        }


   function submit_pds(action='insert_pds_info')
      {
            var firstname = $('#pds_firstname').val();
            var surname = $('#pds_surname').val();
            var middlename = $('#pds_middlename').val();
            var nameextension = $('#pds_nameextension').val();
             var dateofbirth = $('#pds_dateofbirth').val();
            var placeofbirth = $('#pds_placeofbirth').val();
            var gender = $("input[name='gender']:checked"). val();
            var civilstatus = $("input[name='status']:checked"). val();
            var placeofbirth = $('#pds_height').val();
            var placeofbirth = $('#pds_width').val();
            var placeofbirth = $('#pds_bloodtype').val();
            var placeofbirth = $('#pds_gsisno').val();
            var placeofbirth = $('#pds_pagibigno').val();
            var placeofbirth = $('#pds_philhealthno').val();
            var placeofbirth = $('#pds_sssno').val();
            var placeofbirth = $('#pds_tinno').val();
            var placeofbirth = $('#pds_agencyemployee').val();
            var civilstatus = $("input[name='citizenship']:checked"). val();
            var placeofbirth = $('#pds_country').val();
             var placeofbirth = $('#pds_rhouseblk').val();
             var placeofbirth = $('#pds_rstreet').val();
             var placeofbirth = $('#pds_rsubdivision').val();
             var placeofbirth = $('#pds_rmunicipality').val();
             var placeofbirth = $('#pds_rprovince').val();
             var placeofbirth = $('#pds_rbarangay').val();
             var placeofbirth = $('#pds_rzipcode').val();
             var placeofbirth = $('#pds_phouseblk').val();
             var placeofbirth = $('#pds_pstreet').val();
             var placeofbirth = $('#pds_psubdivision').val();
             var placeofbirth = $('#pds_pbarangay').val();
              var placeofbirth = $('#pds_pmunicipality').val();
               var placeofbirth = $('#pds_pprovince').val();
                var placeofbirth = $('#pds_pzipcode').val();
                var placeofbirth = $('#pds_telno').val();
                var placeofbirth = $('#pds_mobileno').val();
                var placeofbirth = $('#pds_emailaddress').val();
                 var placeofbirth = $('#pds_spousesurname').val();
                  var placeofbirth = $('#pds_spousefirstname').val();
                   var placeofbirth = $('#pds_spousenameextension').val();
                    var placeofbirth = $('#pds_spousemiddlename').val();
                     var placeofbirth = $('#pds_spouseoccupation').val();
                      var placeofbirth = $('#pds_businessname').val();
                       var placeofbirth = $('#pds_businessaddress').val();
                        var placeofbirth = $('#pds_businesstelno').val();
                         var placeofbirth = $('#pds_fathersurname').val();
                          var placeofbirth = $('#pds_fatherfirstname').val();
                           var placeofbirth = $('#pds_fathernameextension').val();
                            var placeofbirth = $('#pds_fathermiddlename').val();
                             var placeofbirth = $('#pds_mothersurname').val();
                             var placeofbirth = $('#pds_motherfirstname').val();
                             var placeofbirth = $('#pds_mothersnameextension').val();
                             var placeofbirth = $('#pds_mothersmiddlename').val();
                             

        

        $.ajax({
               url:"../DOADMIN/credentials/model.php",
               method:"POST",
               data:{action:action},
               dataType:"json",
                   success:function(data){
                                            window.location.href= "finish.php";
                                         }    
               });
  

        }








$(document).ready(function() {

    $('.content-register').hide();
    var moreInfoModal = document.getElementById('more-info');

    $('body')
    .on('click', '.modal-tab', function() {
        switch (this.id) {
            case 'loginBtn':
                $('.content-login').show();
                $('.content-register').hide();
            break;

            case 'registerBtn':
                $('.content-login').hide();
                $('.content-register').show();
            break;
        }
    })
        
        .on('click', '#finishBtn', function() {
            $('#applyBtn').hide();
            window.location.href= "home.php";
        })

        .on('click', '#doneBtn', function() {
            window.location.href= "finish.php";
        })

        .on('click', '#more-infoBtn', function() {
            moreInfoModal.style.display= "block";
        })

        .on('click', window, function(e) {
            if (e.target == moreInfoModal) {
                moreInfoModal.style.display= "none";
            }
        })

        .on('click', '#accSettingBtn', function() {
            window.location.href= "account-setting.php";
        })

        .on('click', '#okBtn', function() {
            window.location.href= "home.php";
        })

        .on('click', '#editInfoBtn', function() {
            $('#okInfoBtn').show();
            $('#editInfoBtn').hide();
        })

        .on('click', '#editPassBtn', function() {
            $('#okPassBtn').show();
            $('#editPassBtn').hide();
        })

    $('#submit_login_btn').click(function() {			
				login();
    });
    $('#submit_register_btn').click(function() {			
				register();
    });

    $('.apply_btn').click(function() {   
          var vacancy_pid = $(this).data('id');                 
          alert(vacancy_pid);
          window.location.href='fill-up.php';
  
    });
      $('#submit_pds').click(function() {   
            submit_pds();
    });
});