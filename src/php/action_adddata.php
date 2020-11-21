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

        $colName = $_SESSION['insert_col_name']; // tag for data to insert
        $colData = $_SESSION['insert_data']; // data to insert into database
        $updateFile = $_SESSION['filename_to_update']; // should be file relative to php directory (going to load right from this value)

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

