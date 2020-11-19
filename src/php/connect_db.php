<?php

// connect to database
$conn = mysqli_connect('tethys.cse.buffalo.edu', 'studentname', 'studentnumber', 'cse442_542_2020_fall_teame_db');

//check for connection
if (!$conn) {
    echo "Database Connection Failed\n";
    echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
    echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
    exit();
}
