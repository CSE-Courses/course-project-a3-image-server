<?php
session_start();
if(isset($_POST['email'], $_POST['psw'], $_POST['psw-repeat'])){

    // get values from post
    $email = $_POST['email'];
    $psw = $_POST['psw'];
    $psw_repeat = $_POST['psw-repeat'];

    //validate email here

    //make sure passwords match
    if(password_verify($psw,$psw_repeat) != 1){
        $_SESSION['message'] = "Passwords do not match.";
        header('location:registrationForm.html');
        exit();
    }

    // connect to database
    $conn = mysqli_connect('tethys.cse.buffalo.edu', 'seanjone', '50233994', 'cse442_542_2020_fall_teame_db');

    //check for connection
    if (!$conn) {
        echo "Database Connection Failed";
        echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
        echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
        exit();
    }

    //make query to database to see if user already exists
    $query = mysqli_query($conn, "select * from 'user_table' where email = '$email' ");
    $rows = mysqli_num_rows($query);
    if($rows != 0){
        $_SESSION['message'] = "Email already in use. Please use a different email.";
        header('location:registrationForm.html');
        exit();
    }

    //if not in database, insert new user into db
    $hash_psw = password_hash($psw, PASSWORD_BCRYPT, ['cost' => 12]);
    $insert_query = mysqli_query($conn, "INSERT INTO 'user_table' (email, password) VALUES ('$email','$hash_psw')");

    //back to homepage
    header('location:homepage.html');
    exit();
} else {
    $_SESSION['message'] = "Error processing submitted form.";
    header('location:registrationForm.html');
    exit();
}