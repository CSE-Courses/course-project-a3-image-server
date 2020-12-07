<?php
session_start();
global $conn;
include 'connect_db.php';
if(isset($_POST['submit'])){

    $image_id = $_POST['id'];
    $location = $_POST['location'];
    $date = $_POST['date'];
    $time = $_POST['time'];
    $interval = intval($time)<12 ? 'AM':'PM';


    $sql="SELECT * from `imagemeta` where image_id='$image_id' ";

    if ($result=mysqli_query($conn,$sql))
    {
        // Return the number of rows in result set
        $rowcount=mysqli_num_rows($result);

        if($rowcount > 0){
            //already exist just update
            $query = mysqli_query($conn, "UPDATE  `imagemeta`
            SET `location` = '$location', `date_`='$date', `time_`='$time', `time_interval` = '$interval'
            WHERE  `image_id` = '$image_id'");

        }else{
            //doesn't exist just insert new record
            $query = mysqli_query($conn, "INSERT INTO `imagemeta` (image_id, location, date_,time_,time_interval) VALUES ('$image_id','$location','$date','$time','$interval')");

        }
    }

    if($query){
        $_SESSION['success']  = "Image record inserted successfully";
    }else{
        $_SESSION['error'] =  "Error something goes wrong....";
    }
    header('Location: ../view_images.php');
}
