<?php
    /*
    * Purpose: Upload image to tmp_store directory on server
    */
    require 'vendor/autoload.php';

	$imagine = new Imagine\Gd\Imagine();
    session_start();
    if(isset($_SESSION['email'])){
        //extract post variables
        extract($_POST);

        //change this based on file name
        $fileType = $_FILES['file_upload']['type'];
        $fileSize = $_FILES['file_upload']['size'];
        $fileName = $_FILES['file_upload']['name'];
        //set session variables so these can be accessed in processimage
        $_SESSION['file_upload_type'] = $fileType;
        $_SESSION['file_upload_size'] = $fileSize;
        $_SESSION['file_upload_name'] = $fileName;

        if($fileSize/1024 > "4096"){
            //file size should be less than 4 MB
            $_SESSION['message'] = "File size is too big. Please limit to 4MB.";
            //header call back to home
            header('location: ../index.html');
            exit();
        }

        //check for file type
        if($fileType != 'image/jpeg' && $fileType != 'image/JPG' && $fileType != 'image/png'){
            //file type should be jpeg,jpg, or png
            $_SESSION['message'] = "Wrong file type";
            //header call
            header('location: ../index.html');
            ?>
            <script>alert("Submission Error");</script>
            <?php
            exit();
        }

        //check if user directory exists and make one if not
        $userDir = "../tmp_store/".$_SESSION['email'];
        if(!is_dir($userDir)){
            mkdir($userDir);
        }

        $fileUpload = "../tmp_store/".$_SESSION['email']."/".$_FILES['file_upload']['name'];
        //Define session variable to store tmp_name
        $_SESSION['tmp_name'] = $fileUpload;

        //move image to tmp folder
        if(!move_uploaded_file($_FILES['file_upload']['tmp_name'], $fileUpload)){
            $_SESSION['message'] = "Could not move file to destination";
            //header here
            header('location: ../index.html');
            exit();
        }

if(isset($_POST['gray'])){
     $imagine = new Imagine\Gd\Imagine();

    $filePath = $_SESSION['tmp_name'];
	$image = $imagine->open($filePath);

	$image->effects()->grayscale();
	$out = '../tmp_store/test.png';
	file_put_contents($out, $image);
	if(file_exists($out)){
		$fileName = basename($out);
		$fileSize = filesize($out);
		header('Content-Description: File Transfer');
		header("Content-Type: image/jpeg");
		header("Content-Disposition: attachment; filename=".$fileName);
		header('Expires: 0');
		header('Cache-Control: must-revalidate');
		header('Pragma: public');
		header("Content-Length: " . $fileSize);
		readfile($out);
exit;
}else{
echo '<script>alert("The file/files can not be downloaded")</script>'; 

}

}

if(isset($_POST['neg'])){
     $imagine = new Imagine\Gd\Imagine();

    $filePath = $_SESSION['tmp_name'];
	$image = $imagine->open($filePath);

	$image->effects()->negative();
	$out = '../tmp_store/test.png';
	file_put_contents($out, $image);
	if(file_exists($out)){
		$fileName = basename($out);
		$fileSize = filesize($out);
		header('Content-Description: File Transfer');
		header("Content-Type: image/jpeg");
		header("Content-Disposition: attachment; filename=".$fileName);
		header('Expires: 0');
		header('Cache-Control: must-revalidate');
		header('Pragma: public');
		header("Content-Length: " . $fileSize);
		readfile($out);
exit;
}else{
echo '<script>alert("The file/files can not be downloaded")</script>'; 

}

}



if(isset($_POST['sharp'])){
     $imagine = new Imagine\Gd\Imagine();

    $filePath = $_SESSION['tmp_name'];
	$image = $imagine->open($filePath);

	$image->effects()->sharpen();
	$out = '../tmp_store/test.png';
	file_put_contents($out, $image);
	if(file_exists($out)){
		$fileName = basename($out);
		$fileSize = filesize($out);
		header('Content-Description: File Transfer');
		header("Content-Type: image/jpeg");
		header("Content-Disposition: attachment; filename=".$fileName);
		header('Expires: 0');
		header('Cache-Control: must-revalidate');
		header('Pragma: public');
		header("Content-Length: " . $fileSize);
		readfile($out);
exit;
}else{
echo '<script>alert("The file/files can not be downloaded")</script>'; 

}

}








    } else {
        $_SESSION['message'] = "Not Logged In";
        //header here
        header('location: ../index.html');
    }


?>



