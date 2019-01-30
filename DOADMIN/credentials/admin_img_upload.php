<?php

    if($_FILES['file']['error'] > 0){
        print_r('');
    }
    else{
        if(move_uploaded_file($_FILES['file']['tmp_name'],'.../images/'.$_FILES['file']['name'])){
        	/*
            print_r($_FILES['file']['name']);
            */
        }
    }

?>