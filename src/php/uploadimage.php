<?php
    /*
    * Purpose: Upload image to tmp_store directory on server
    */
    session_start();

    //extract post variables
    extract($_POST);

    //change this based on file name
    $fileType = $_FILES['file_upload']['type'];
    $fileSize = $_FILES['file_upload']['size'];

    if($fileSize/1024 > "4096"){
        //file size should be less than 4 MB
        $_SESSION['message'] = "File size is too big. Please limit to 4MB.";
        //header call back to home
        header('location: ../index.html');
        exit();
    }
    /*
    //check for file type
    if($fileType != 'image/jpeg' && $fileType != 'image/JPG' && $fileType != 'image/png'){
        fwrite($debug, "HERE");
        //file type should be jpeg,jpg, or png
        $_SESSION['message'] = "Wrong file type";
        //header call
        header('location: ../index.html');
        exit();
    }
    */

    $fileUpload = "../tmp_store/".$_SESSION['email'].$_FILES['file_upload']['name'];

    //move image to tmo folder
    if(!move_uploaded_file($_FILES['file_upload']['tmp_name'], $fileUpload)){
        $_SESSION['message'] = "Could not move file to destination";
        //header here
        header('location: ../index.html');
        exit();
    }

    header('location: ../index.html');
    exit();







