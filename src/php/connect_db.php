<?php

// connect to database
$conn = mysqli_connect("localhost", "root", "", "442-final");

//check for connection
if (!$conn) {
    echo "Database Connection Failed\n";
    echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
    echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
    exit();
}
