<?php
session_start();

if(isset($_POST['email'], $_POST['psw'])){

    //get email and psw variables
    $email = $_POST['email'];
    $psw = $_POST['psw'];

    //validate email given (file to be written)

    // connect to database
    $conn = mysqli_connect('tethys.cse.buffalo.edu', 'seanjone', '50233994', 'cse442_542_2020_fall_teame_db');

    //check for connection
    if (!$conn) {
        echo "Database Connection Failed";
        echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
        echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
        exit();
    }

    //make query to MySQL database
    $query = mysqli_query($conn, "select * from 'user_table' where email = '$email'");
    $rows = mysqli_num_rows($query);
    $user_info = mysqli_fetch_array($query);

    if($rows == 0){
        $_SESSION['message'] = "Email or password incorrect.";
        header('location:loginForm.html');
        exit();
    } else {
        if(password_verify($psw, $user_info['psw']) == 1){
            //bring back to honmepage
            //look into session ids
            header('location:homepage.html');
            exit();
        } else {
            //incorrect password
            $_SESSION['message'] = "Password incorrect.";
            header('location:loginForm.html');
            exit();
        }
    }
} else {
    $_SESSION['message'] = "Error processing submitted form.";
    header('location:loginForm.html');
    exit();
}


