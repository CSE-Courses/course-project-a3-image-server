<?php
    session_start();

    extract($_POST);

    //change this based on file name
    $fileType = $_FILES['file_upload']['type'];
    $fileSize = $_FILES['file_upload']['size'];

    if($fileSize/1024 > "4096"){
        //file size should be less than 4 MB
        $_SESSION['message'] = "File size is too big. Please limit to 4MB.";
        //header call
        exit();
    }

    //check for file type
    if($fileType != 'image/jpeg' && $fileType != 'image/jpg' && $fileType != 'image/png'){
        //file type should be jpeg,jpg, or png
        $_SESSION['message'] = "Wrong file type";
        //header call
        exit();
    }

    $fileUpload = "./tmp_store/".$_FILES['file_upload']['name'];

    if(is_uploaded_file($_FILES['file_upload']['tmp_name'])){
        if(!move_uploaded_file($_FILES['file_upload']['tmp_name'], $fileUpload)){
            $_SESSION['message'] = "Could not move file to destination";
            //header here
            exit();
        }
    }






