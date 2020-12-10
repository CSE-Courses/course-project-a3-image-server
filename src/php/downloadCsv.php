<?php

session_start();
if($_POST["export"]){
$conn = mysqli_connect("localhost", "root", "", "442-final");
	header('Content-Type: text/csv; charset=utf-8');
	header('Content-Disposition: attachment; filename=data.csv');
	$output =fopen("php://output","w");
	$user_email = ($_SESSION['email']); 
	$query = "SELECT * FROM imagestore where email = '$user_email'";
	$result = mysqli_query($conn, $query) or die(mysqli_error($conn));
	fputcsv($output,array(' ',"Location",'Date','Time','Image Id',"AM or PM"));

	$arr = array();
	while ($row = mysqli_fetch_array($result, MYSQLI_BOTH) ) {
	array_push($arr,$row["id"]);
}

	foreach($arr as $id) {
	$query2 = "SELECT * FROM imagemeta where image_id='$id'";
    $result2 = mysqli_query($conn, $query2) or die(mysqli_error($conn));
    while($row = mysqli_fetch_assoc($result2)){
    	fputcsv($output, $row);
    }
	}


fclose($output);
}





?>