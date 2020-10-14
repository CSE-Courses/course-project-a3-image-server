<?php
session_start();

//global connection variable from connect_db.php
global $conn;

if(isset($_POST['email'], $_POST['psw'], $_POST['psw-repeat'])){

    // get values from post
    $email = $_POST['email'];
    $psw = $_POST['psw'];
    $psw_repeat = $_POST['psw-repeat'];

    //validate email here

    //make sure passwords match
    if($psw != $psw_repeat){
        $_SESSION['message'] = "Passwords do not match.";
        header('Location: https://www.google.com');
        exit();
    }

    //connect to db
    include 'connect_db.php';

    //make query to database to see if user already exists
    $query = mysqli_query($conn, "SELECT * FROM `user_table` WHERE email = '$email'");
    $rows = mysqli_num_rows($query);
    if($rows != 0){
        $_SESSION['message'] = "Email already in use. Please use a different email.";
        header('Location: https://www.google.com');
        exit();
    }

    //if not in database, insert new user into db
    $hash_psw = password_hash($psw, PASSWORD_BCRYPT, ['cost' => 12]);
    $insert_query = mysqli_query($conn, "INSERT INTO `user_table` (email, password) VALUES ('$email','$hash_psw')");

    //back to homepage
    header('Location: ../styles/index.html');
    exit();
} else {
    $_SESSION['message'] = "Error processing submitted form.";
    header('Location: https://www.google.com');
    exit();
}

