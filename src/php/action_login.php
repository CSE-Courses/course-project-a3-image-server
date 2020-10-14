<?php
session_start();

//global connection variable from connect_db.php
global $conn;

if(isset($_POST['email'], $_POST['psw'])){

    //get email and psw variables
    $email = $_POST['email'];
    $psw = $_POST['psw'];

    //validate email given (file to be written)

    //connect to db
    include 'connect_db.php';

    //make query to MySQL database
    $query = mysqli_query($conn, "SELECT * FROM `user_table` WHERE email = '$email'");
    $rows = mysqli_num_rows($query);
    $user_info = mysqli_fetch_array($query);

    if($rows == 0){
        $_SESSION['message'] = "Email or password incorrect.";
        header('location:./styles/loginForm.html');
        exit();
    } else {
        if(password_verify($psw, $user_info['password'])){
            //bring back to homepage
            //look into session ids
            header('location:./styles/index.html');
            exit();
        } else {
            //incorrect password
            $_SESSION['message'] = "Password incorrect.";
            header('location:./styles/loginForm.html');
            exit();
        }
    }
} else {
    $_SESSION['message'] = "Error processing submitted form.";
    header('location:./styles/loginForm.html');
    exit();
}


