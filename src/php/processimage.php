<?php
    /*
     * Author: Sean Jones
    * Purpose: Process image in tmp_store and store into database
    */

    session_start();
    //check if the user is logged in
    if(isset($_SESSION['email'])) {
        //connection variable from connect_db
        global $conn;
        // Open a the file in binary mode
        //name of the file stored in uploadimage
        $tmpname = $_SESSION['tmp_name'];
        $image = fopen($tmpname, 'rb');

        //make sure the file was opened
        if (!$image) {
            echo 'Unable to open image';
            exit;
        }

        // Attempt to read the exif headers
        $headers = exif_read_data($image);

        //make sure exif data was read properly
        if (!$headers) {
            echo 'Unable to read exif headers from file';
            exit;
        }

        //connect to db
        include 'connect_db.php';

        //insert query variables for db processing
        $fileType = $_FILES['file_upload']['type'];
        $fileSize = $_FILES['file_upload']['size'];
        $fileName = $_FILES['file_upload']['name'];
        $email = $_SESSION['email'];
        $imgtime = now(); //store current time as default if image does not have it
        if(isset($headers['FileDateTime'])){
            $imgtime = $headers['FileDateTime'];
        }
        //construct and execute query to store image info in db
        $qry ="INSERT INTO `imagestore`(`email`, `tmp_name`, `imagename`, `imgdatetime`, `lengthofimage`) VALUES ('$email','$tmpname','$fileName','$imgtime','$fileSize')";
        $insert_query = mysqli_query($conn, $qry);
    } else {
        $_SESSION['message'] = "Not Logged In";
        //header here
        header('location: ../index.html');
    }