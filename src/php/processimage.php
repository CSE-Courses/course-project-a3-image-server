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
        $fileType = $_SESSION['file_upload_type'];
        $fileSize = $_SESSION['file_upload_size'];
        $fileName = $_SESSION['file_upload_name'];
        $email = $_SESSION['email'];
        $imgtime = date("His"); //store current time as default if image does not have it
        if(isset($headers['FileDateTime'])){
            $imgtime = $headers['FileDateTime'];
        }
        //construct and execute query to store image info in db
        $stmt = $conn->prepare("INSERT INTO `imagestore`(`email`, `tmp_name`, `imagename`, `imgdatetime`, `lengthofimage`) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssi", $s_email, $s_tmpname, $s_filename, $s_time, $s_filesize);
        
        $s_email = $email;
        $s_tmpname = $tmpname;
        $s_filename = $fileName;
        $s_time = $imgtime;
        $s_filesize = $fileSize;
        
        $stmt->execute();
        $stmt->close();

        $_SESSION['message'] = "Upload success";
        //back to home page
        header('location: ../index.html');
    } else {
        $_SESSION['message'] = "Not Logged In";
        //header here
        header('location: ../index.html');
    }