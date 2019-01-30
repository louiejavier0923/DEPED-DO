
function recalibrate(){



}

$(document).ready(function(){
    alert('hakdog')

    $.ajax({

        type:'POST',
        url:'model.php',
        dataType:'json',
        data:{
            action:'select-applicant-recalibrate',
            pid:'PID-0001'
        }

    }).done(function(a){

        console.log(a);

    })

})