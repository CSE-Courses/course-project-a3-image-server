<?php
session_start();

//global connection variable from connect_db.php
global $conn;

if(isset($_POST['email'], $_POST['psw'])){

    //get email and psw variables
    $email = $_POST['email'];
    $psw = $_POST['psw'];

    //connect to db
    include 'connect_db.php';

    //make query to MySQL database
    $query = mysqli_query($conn, "SELECT * FROM `user_table` WHERE email = '$email'");
    $rows = mysqli_num_rows($query);
    $user_info = mysqli_fetch_array($query);

    if($rows == 0){
        $_SESSION['message'] = "Email or password incorrect.";
        header('location: ../loginForm.html');
        exit();
    } else {
        if(password_verify($psw, $user_info['password'])){
            //bring back to homepage
            //look into session ids
            //set login status for this user to be true (1)
            mysqli_query($conn, "UPDATE `user_table` SET login_status = 1 WHERE email = '$email'");
            header('location: ../index.html');
            exit();
        } else {
            //incorrect password
            $_SESSION['message'] = "Password incorrect.";
            header('location: ../loginForm.html');
            exit();
        }
    }
} else {
    $_SESSION['message'] = "Error processing submitted form.";
    header('location: ../loginForm.html');
    exit();
}


