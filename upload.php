<?php
if (isset($_POST['submit'])){
    $file = $_FILES['file'];
    //print_r($)
    $imageName = $_FILES['file']['name'];
    $imageTmpName = $_FILES['file']['tmp_name'];
    $imageSize = $_FILES['file']['size'];
    $imageError = $_FILES['file']['error'];
    $imageType = $_FILES['file']['type'];

    $imageExt = explode('.', $imageName);
    $imageActualExt = strtolower(end($imageExt));

    $allowed = array('jpg', 'jpeg', 'png');

    if(in_array($imageActualExt, $allowed))
    {
        if($imageError === 0)
        {
          if($imageSize < 10000000)
          {
            $imageNameNew = uniqid('', true).".".$imageActualExt;
            $imageDestination = 'uploads/'.$imageNameNew;
            move_uploaded_file($imageTmpName, $imageDestination);
            header("Location: index.pxp?uploadsuccess");
          }
          else
          {
            echo "Your file is too big!";
          }
        }
        else echo "Error uploading your file!";
    }

    else
    {
      echo "You cannot upload files of this type!";
    }

}
