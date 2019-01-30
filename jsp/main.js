function login(action = 'login_function') {
    var login_email = $('#login_email').val();
    var login_password = $('#login_password').val();
    
     if(login_email=='' || login_email==null){
          alert("empty email");
     }
     else if(login_password=='' || login_password==null){
          alert("empty password");
     }
     else{         
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
                        window.location.href='email-verification.php';
                    break;
                    default:
                        alert(data.message);
                    break;
                }
            }
    });
  }
}



function update_password(action = "update_password") {
    var app_password = $('#applicant_password').val();
    var old_password = $('#applicant_oldPass').val();
    var new_password = $('#applicant_newPass').val();
    var confirm_password = $('#applicant_repeatPass').val();

    if (old_password == app_password ) {
        $('#applicant_oldPass').css('border', 'solid 1px rgb(0, 255, 0)');

        if (new_password == "" && confirm_password == "") {
            $('#applicant_newPass').css('border', 'solid 1px rgb(255, 0, 0)');
            $('#applicant_repeatPass').css('border', 'solid 1px rgb(255, 0, 0)');
        }
        else if (new_password == confirm_password) {
            $('#applicant_newPass').css('border', 'solid 1px rgb(0, 255, 0)');
            $('#applicant_repeatPass').css('border', 'solid 1px rgb(0, 255, 0)');

            $('.new_password').css('border', 'solid 1px rgb(220, 220, 220)');
            $('.new_password').attr('disabled', true);
            $('#okPassBtn').hide();
            $('#editPassBtn').show();
            $.ajax ({
                url: '../DOADMIN/credentials/model.php',
                method: 'post',
                data: {
                    action:action,
                    new_password:new_password
                },
                dataType: 'json',
                    success:function(data) {
                        switch (data.message){
                            case 'success':
                                alert(data.message);
                            break;
                            default:
                                alert(data.message);
                            break;
                        }
                    }
            });
        }
        else {
            $('#applicant_newPass').css('border', 'solid 1px rgb(255, 0, 0)');   
            $('#applicant_repeatPass').css('border', 'solid 1px rgb(255, 0, 0)');
        }
    }
    else {
        $('#applicant_oldPass').css('border', 'solid 1px rgb(255, 0, 0)');
    }
}

function update_applicant(action = 'update_applicant') {

    var app_firstname = $('#applicant_firstname').val();
    var app_middlename = $('#applicant_middlename').val();
    var app_lastname = $('#applicant_lastname').val();

    //FIRST NAME
    if (app_firstname == '') {
        $('#applicant_firstname').css("border", "solid 1px rgb(255, 0, 0)");
    }
    else {
        $('#applicant_firstname').css("border", "solid 1px rgb(0, 255, 0)");
    }

    //MIDDLE NAME
     if (app_middlename == '') {
        $('#applicant_middlename').css("border", "solid 1px rgb(255, 0, 0)");
    }
    else {
        $('#applicant_middlename').css("border", "solid 1px rgb(0, 255, 0)");
    }

    //LAST NAME
     if (app_lastname == '') {
        $('#applicant_lastname').css("border", "solid 1px rgb(255, 0, 0)");
    }
    else {
        $('#applicant_lastname').css("border", "solid 1px rgb(0, 255, 0)");
    }


    //FUNCTION
    if (app_firstname != "" & app_middlename != "" & app_lastname != "") {
        
        $('.fullname').attr('disabled', true);
        $('#okInfoBtn').hide();
        $('#editInfoBtn').show();
        $('.fullname').css('border', 'solid 1px rgb(220, 220, 220)');

        $.ajax ({
            url: '../DOADMIN/credentials/model.php',
            method: 'post',
            data: {
                action:action,
                fname:app_firstname,
                mname:app_middlename,
                lname:app_lastname
            },
            dataType: 'json',
                success:function(data) {
                    switch (data.message){
                        case 'success':
                            alert(data.message);
                        break;
                        default:
                            alert(data.message);
                        break;
                    }
                }
        });
    }
}

function register(action = 'register_function') {
    var reg_email = $('#reg_email').val();
    var reg_pass = $('#reg_pwd').val();
    var reg_confirm_pass = $('#reg_confirm_pwd').val();


    if(reg_email==''&& reg_pass=='') {
        alert('empty fields');
    }
    else {
        $('#loading').css("display","block");
        $('.loading-container').css("display","block");
        
        $.ajax({
            url:"DOADMIN/credentials/model.php",
            method:"POST",
            data:{action:action,email:reg_email,pwd:reg_pass,cpwd:reg_confirm_pass},
            dataType:"json",
                success:function(data){

                    switch(data.message){
                        case 'success':
                            alert(data.message);
                            $('#loading').css("display","none");
                            $('.loading-container').css("display","none");
                            window.location.href='email-verification.php';
                        break;
                        default:
                            alert(data.message);
                            $('#loading').css("display","none");
                            $('.loading-container').css("display","none");
                        break;
                    }
                }    
        });     
    }
}

function submit_pds(action='insert_pds_info') {
    var firstname = $('#pds_firstname').val();
    var surname = $('#pds_surname').val();
    var middlename = $('#pds_middlename').val();
    var nameextension = $('#pds_nameextension').val();
    var dateofbirth = $('#pds_dateofbirth').val();
    var placeofbirth = $('#pds_placeofbirth').val();
    var gender = $("input[name='gender']:checked"). val();
    var civilstatus = $("input[name='civil_status']:checked"). val();
    
    $.ajax({
        url:"../DOADMIN/credentials/model.php",
        method:"POST",
        data:{action:action},
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
        }

  function apply(action = 'apply_vacancy')
       {
       var vacancy_pid = $(this).data('id');   
     
                 
       alert(vacancy_pid);
  

        }


   function submit_pds(action='insert_pds_info')
      {
            
                                
                   
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
    var attachFileModal = document.getElementById('attach-file');
    var loginRegisterModal = document.getElementById('modal-login-register');
    var responsiveNav = document.getElementById('header-nav-responsive');
    var navContent = document.getElementById('header-content');
    var chooseFileModal = document.getElementById('attach-categ');
    var pdsModal = document.getElementById('pds-container');
    var messageModal = document.getElementById('message-modal');
    var fileModal = document.getElementById('file-modal');
    var statusCont = document.getElementById('status-container');
    var logsCont = document.getElementById('logs-container');
    var updateImage = document.getElementById('change-image');
    var errorMessage = document.getElementById('error-message');

    $('.fullname').attr('disabled', true);
    $('.new_password').attr('disabled', true);

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

        .on('click', '.statusBtn', function() {
            switch (this.id) {
                case 'statBtn':
                    statusCont.style.display= "block";
                    logsCont.style.display= "none";
                break;
                case 'logsBtn':
                    logsCont.style.display= "block";
                    statusCont.style.display= "none";
                break;
            }
        })

        .on('click', '#closeImageBtn', function() {
            updateImage.style.display= "none";
        })
        
        .on('click', '#updatePicBtn', function (){
            updateImage.style.display= "block";
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
            else if (e.target == loginRegisterModal) {
                loginRegisterModal.style.display= "none";
            }

            else if (e.target == responsiveNav) {
              responsiveNav.style.display= "none";
            }

            else if (e.target == pdsModal) {
              pdsModal.style.display= "none";
            }

            else if (e.target == messageModal) {
              messageModal.style.display= "none";
            }

            else if (e.target == fileModal) {
              fileModal.style.display= "none";
            }

            else if (e.target == updateImage) {
                updateImage.style.display= "none";
            }

            else if (e.target == errorMessage) {
                errorMessage.style.display= "none";
            }
        })

        .on('click', '#closeErrorBtn', function() {
            errorMessage.style.display= "none";
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
            $('.new_password').attr('disabled', false);
        })

        .on('click', '#submit_file', function() {
            chooseFileModal.style.display= "block";
        })

        .on('click', '#editInfoBtn', function() {
            $('.fullname').attr('disabled', false);
        })

        .on('click', '#cancelFileBtn', function() {
            chooseFileModal.style.display= "none";
        })

        .on('click', '#exitFileBtn', function() {
          chooseFileModal.style.display= "none";
        })

        .on('click', '#okFileBtn', function () {
                   var myuid = $('#myuid').val();
                 var file_data = $('#applicantfile').prop('files')[0];         
                   var form_data = new FormData();
                   form_data.append('file',file_data);

        $.ajax({
                    url:'../DOADMIN/credentials/upload_files.php',
                    dataType:'text',
                    cache:false,
                    contentType:false,
                    processData:false,
                    data:form_data,
                    type:'post'
                }).done(function(output_img){


                       $.ajax({
                         type: 'POST',
                            url: '../DOADMIN/credentials/model.php',
                            data: {action:'upload_applicant_files',myuid:myuid,img:output_img},
                            dataType: 'json',
                              success: function(response){
                              
                                     
                                  attachFileModal.style.display= "none";
          
                            }
                     });
                    // alert(output_img);
                     
                            
                });
        /*
            attachFileModal.style.display= "none";
            */
        })

        .on('click', '#okPassBtn', function() {
            update_password();
        })

        .on('click', '#accBtn', function () {
            loginRegisterModal.style.display= "block";
        })

        .on('click', "#joinBtn", function() {
            loginRegisterModal.style.display= "block";
        })

        .on('click', '#closeLogin', function() {
          loginRegisterModal.style.display= "none";
        })

        .on('click', '#burgerBtn', function() {
          responsiveNav.style.display= "block";
        })

        .on('click', '#seminarsBtn', function() {
          attachFileModal.style.display= "block";
        })

        .on('click', '#backFileBtn', function() {
          attachFileModal.style.display= "none";
        })

        .on('click', '#pdsBtn', function() {
          pdsModal.style.display= "block";
          moreInfoModal.style.display= "none";
        })

        .on('click', '#closePdsBtn', function() {
          pdsModal.style.display= "none";
        })

        .on('click', '#messageBtn', function() {
          messageModal.style.display= "block";
        })

        .on('click', '#exitMessageBtn', function() {
          messageModal.style.display= "none";
        })

        .on('click','#logoutBtn',function(){
          var confirmation = confirm('Are you sure you want to log out?');
          if (confirmation) {
            $.ajax({
              type:'POST',
              url:'../include/applicant-logout.php',
              data:''
            }).done(function(b){
              if(b){
                window.location.href = "../index.php";
              }
            })
          }
        })

        .on('click', '#closeFileBtn', function (){
          fileModal.style.display= "none";
        })

        .on('click', "#filesBtn", function() {
          fileModal.style.display= "block";
        })

        .on('click', '#applyBtn', function() {
         
         
            var vacant = $(this).data('id');
           
    $.ajax ({
        url: '../DOADMIN/credentials/model.php',
        method: 'POST',
        data: {
            action:'vacant-function',
            vacant_no:vacant
        },
        dataType: 'json',
            success:function(data) {
                      
                      switch(data.message){
                            case 'success':
                                  window.location.href='finish.php'
                                 
                            break;

                            default:
                                 alert(data.message);
                            break;

                      }
                     
                  
                
            }
    })
        })

       
        $('#submit_login_btn').click(function() {			
            login();
        });

        

        $('#submit_register_btn').click(function() {			
			register();
        });

        $('#submit_pds').click(function() {   
            //submit_pds();
        });

        $('#okInfoBtn').click(function (){
            update_applicant();
        });
});