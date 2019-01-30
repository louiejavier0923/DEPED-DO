
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

    }).done(function(output){

        console.log(output.length);
        for(var i=0;i<output.length;i++){

            var new_points = parseFloat(educationPoints('22',output[i].GWA))+parseFloat(output[i].GWA_ADD);

            $.ajax({
                type:'POST',
                url:'model.php',
                data:{
                    action:'recalibrate_applicant',
                    a:output[i].UID,
                    b:output[i].PID,
                    c:new_points
                }
            }).done(function(data){
                if(data){
                    console.log(data);
                    alert('OKAY! -- '+data);
                }
            })

        }

    })

})