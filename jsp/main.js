
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


       if(reg_email==''&& reg_pass==''){
               alert('empty fields');
       }
       else{
        $('#loading').css("display","block");
        $('.loading-container').css("display","block");
                 
      
            }

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
            var civilstatus = $("input[name='civil']:checked"). val();
            var height = $('#pds_height').val();
            var width = $('#pds_width').val();
            var bloodtype = $('#pds_bloodtype').val();
            var gsis = $('#pds_gsisno').val();
            var pagibig = $('#pds_pagibigno').val();
            var philhealth = $('#pds_philhealthno').val();
            var sssno = $('#pds_sssno').val();
            var tinno = $('#pds_tinno').val();
            var agencyemployee = $('#pds_agencyemployee').val();
            var citizenship = $("input[name='citi']:checked").val();
            var country = $('#pds_country').val();
             var rhouseblk = $('#pds_rhouseblk').val();
             var rstreet = $('#pds_rstreet').val();
             var rsubdivsion = $('#pds_rsubdivision').val();
             var rmunicipality = $('#pds_rmunicipality').val();
             var rprovince = $('#pds_rprovince').val();
             var rbarangay = $('#pds_rbarangay').val();
             var rzipcode = $('#pds_rzipcode').val();
             var phouseblk = $('#pds_phouseblk').val();
             var pstreet = $('#pds_pstreet').val();
             var psubdivision = $('#pds_psubdivision').val();
             var pbarangay = $('#pds_pbarangay').val();
              var pmunicipality = $('#pds_pmunicipality').val();
               var pprovince = $('#pds_pprovince').val();
                var pzipcode = $('#pds_pzipcode').val();
                var ptelno = $('#pds_telno').val();
                var pmobileno = $('#pds_mobileno').val();
                var pemailaddress = $('#pds_emailaddress').val();

                $.ajax({
               url:"../DOADMIN/credentials/model.php",
               method:"POST",
              data:{action:action, 
                firstname:firstname,
               surname:surname,
               middlename:middlename,
               nameextension:nameextension,
               dateofbirth:dateofbirth,
               placeofbirth:placeofbirth,
                civilstatus,civilstatus     
              },
               dataType:"json",
                   success:function(data){
                           
                                      alert(civilstatus);   
                                      }       
                          });
              }
                /*
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

               var placeofbirth = $('#pds_mothersmiddlename').val();
               
              
               data:{
                action:action,
               firstname:firstname,
               surname:surname,
               middlename:middlename,
               nameextension:nameextension,
               dateofbirth:dateofbirth,
               placeofbirth:placeofbirth,
               gender:gender,
              civilstatus:civilstatus,
              height:height,
              width:width,
              bloodtype:bloodtype,
              gsis:gsis,
              pagibig:pagibig,
              philhealth:philhealth,
              sssno:sssno,
              tinno:tinno,
              agencyemployee:agencyemployee,
              citizenship:citizenship,
              country:country,
              rhouseblk:rhouseblk,
              rstreet:rstreet,
              rsubdivsion:rsubdivsion,
              rmunicipality:rmunicipality,
              rprovince:rprovince,
              rbarangay:rbarangay,
              rzipcode:rzipcode,
              phouseblk:phouseblk,
              pstreet:pstreet,
              psubdivision:psubdivision,
              pbarangay:pbarangay,
              pmunicipality:pmunicipality,
              pprovince:pprovince,
              pzipcode:pzipcode,
              ptelno:ptelno,
              pmobileno:pmobileno,
              pemailaddress:pemailaddress
                },
                     
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
                          */
  

        








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