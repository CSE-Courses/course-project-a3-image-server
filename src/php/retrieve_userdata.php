<?php

    /*
    * Author: Sean Jones
    * Purpose: Retrieve user information from SQL database and store arrays for each image in a SESSION variable
    * Date: November 11, 2020
    */
    session_start();
    global $conn;

    //check if user is logged in
    if(isset($_SESSION['email'])){
        //connect to db
        include 'connect_db.php';

        //get user email
        $email = $_SESSION['email'];

        //construct query to get user info
        $qry = "SELECT * FROM `imagestore` WHERE email = '$email'";
        $retrievalQuery = mysqli_query($conn, $qry);

        //Define number of images variable
        $datasetSize = mysqli_num_rows($retrievalQuery);
        //set size session variable
        $_SESSION['dataSize'] = $datasetSize;
        //get user info array and iterate across rows
        $i = 0;
        while($user_data = mysqli_fetch_array($retrievalQuery)){
            $_SESSION['image'.strval($i)] = $user_data;
            $i = $i + 1;
        }

        //set session message showing successful retrieval and navigate to user page
        $_SESSION['message'] = "Data retrieval success.";
        //go to user page
        header('location: ../profilePage.html');
    } else {
        $_SESSION['message'] = "Not Logged In";
        header('location: ../index.html');
    }

