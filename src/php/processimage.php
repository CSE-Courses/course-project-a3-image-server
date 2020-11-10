<?php
    /*
     * Author: Sean Jones
    * Purpose: Process image in tmp_store and store into database
    */

    session_start();

    global $conn;
    // Open a the file in binary mode
    $image = fopen('../tmp_store/test.jpeg', 'rb');

    if (!$image) {
        echo 'Unable to open image';
        exit;
    }

    // Attempt to read the exif headers
    $headers = exif_read_data($image);

    if (!$headers) {
        echo 'Unable to read exif headers from file';
        exit;
    }

    //connect to db
    include 'connect_db.php';

    /*
     * 1) find all tables linked to email address
     * 2) if nothing there, then create a general table and insert into that table
     * 3) if there is a table, insert headers into it
     */

    //email session variable for user
    $email = $_SESSION['email'];

    //Now insert photo and headers into database with sql querys (talk to Mohit for formatting query) in for loop
    foreach ($headers['COMPUTED'] as $header => $value) {
        printf('%s => %s', $header, $value);
        echo '<br>';
        //put variables in here to store
        //$qry ="INSERT INTO `imagestore`(`email`, `imagename`, `imgdatetime`, `lengthofimage`) VALUES ('$mail','$fileName',now(),'$fileSize')";
        $insert_query = mysqli_query($conn, $qry);
    }