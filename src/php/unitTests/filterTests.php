<?php  
include '../photoFilters.php';

function testNeg(){
	negativeFilter();
	$this->assertFileExists('../../tmp_store/negDownload.png');

}

function testSharp(){
	sharpenFilter();
	$this->assertFileExists('../../tmp_store/sharpenDownload.png');


}


function testGray(){
	grayscaleFilter();
	$this->assertFileExists('../../tmp_store/grayDownload.png');


}


testGray();




















?>