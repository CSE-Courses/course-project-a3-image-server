<?php
/*
Purpose: To download a file in browser


Pass the file path as a paramater. Make sure the file path is with respect whatever folder the file is in that is making the request and using this function. NOT THE PHP FOLDER!!!!


If this function is needed to downlaod something other than an image use same code except change line 17
header("Content-Type: *insert file type here* ")
*/
function download($filePath){

if(file_exists($filePath)){
$fileName = basename($filePath);
$fileSize = filesize($filePath);
header('Content-Description: File Transfer');
header("Content-Type: image/jpeg");
header("Content-Disposition: attachment; filename=".$fileName);
header('Expires: 0');
header('Cache-Control: must-revalidate');
header('Pragma: public');
header("Content-Length: " . $fileSize);
readfile($filePath);
exit;
}else{
echo '<script>alert("The file/files can not be downloaded")</script>'; 

}
}



?>