$(document).ready(function(){

    $('body')
    .on('blur','.input-form input',function(){

        var val = $(this).val();

        if(val!=""){
            $(this).siblings('label').addClass('may-laman');
        }
        else{
            $(this).siblings('label').removeClass('may-laman');
        }

    })

})