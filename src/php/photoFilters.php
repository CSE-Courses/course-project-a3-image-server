<?php
require 'vendor/autoload.php';

$imagine = new Imagine\Gd\Imagine();

//open image and apply the effects and then save the image. 
function negativeFilter(){
$imagine = new Imagine\Gd\Imagine();

$image = $imagine->open('../tmp_store/test.jpeg');
$image->effects()->negative();
$image->rotate(90);


$image->save('../tmp_store/download.png');
header("Content-disposition: attachment; filename=\"../tmp_store/download.png\"");
}


function sharpenFilter(){
$imagine = new Imagine\Gd\Imagine();

$image = $imagine->open('../tmp_store/test.jpeg');

$image->effects()->sharpen();
$image->rotate(90);
$image->save('../tmp_store/download.png');
header("Content-disposition: attachment; filename=\"../tmp_store/download.png\"");
}

function grayscaleFilter(){
$imagine = new Imagine\Gd\Imagine();


$image = $imagine->open('../tmp_store/test.jpeg');

$image->effects()->grayscale();
$image->rotate(90);

$image->save('../tmp_store/download.png');
header("Content-disposition: attachment; filename=\"../tmp_store/download.png\"");
}

if(isset($_POST['grayscale'])){
grayscaleFilter();
}
if(isset($_POST['negative'])){
negativeFilter();
}
if(isset($_POST['sharpen'])){
sharpenFilter();
}


?>