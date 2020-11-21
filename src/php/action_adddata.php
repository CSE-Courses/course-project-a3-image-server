<?php

    /*
    * Author: Sean Jones
    * Purpose: Add data stored in session variables to sql database (adding metadata to image).
    */

    session_start();
    global $conn; // global connection variable to database
    include 'connect_db.php'; // connect to database


