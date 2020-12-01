<?php

    /*
    * Author: Sean Jones
    * Purpose: Add data stored in session variables to sql database (adding metadata to image).
    */

    session_start();
    //check that a target file is set and user is logged in
    if(isset($_SESSION['email']) && isset($_SESSION['filename_to_update'])) {
        global $conn; // global connection variable to database
        include 'connect_db.php'; // connect to database

        $email = $_SESSION['email'];

        $colName = $_SESSION['insert_col_name']; // tag for data to insert
        $colData = $_SESSION['insert_data']; // data to insert into database
        $updateFile = $_SESSION['filename_to_update']; // should be file relative to php directory (going to load right from this value)

        $col_qry = "SELECT `$colName` FROM `imagestore`";
        $col_query = mysqli_query($conn, $col_qry);
        $num_rows = mysqli_num_rows($col_query);
        if($num_rows){
            //if column exists just update data
            $update = "UPDATE `imagestore` SET '$colName' = '$colData' WHERE email = '$email'";
            $update_qry = mysqli_query($conn, $update);
        } else {
            //if not, add column and insert data
            $add_col = "ALTER TABLE `imagestore` ADD '$colName' varchar(255)";
            $add_qry = mysqli_query($conn, $add_col);
        }

        //message for successful addition of data
        $_SESSION['message'] = 'Data addition success';
        //send user back to homepage
        header('location: ../index.html');
    } else {
        // alert that not signed in or no file has been selected
        $_SESSION['message'] = 'Not signed in or file not selected';
        // send user back to homepage for now
        header('location: ../index.html');
    }

