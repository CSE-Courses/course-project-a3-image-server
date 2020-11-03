<?php
/*
 * Purpose: Process image that has been uploaded via upload image
 */

// Open a the file in binary mode
$image = fopen('../tmp_store/test.jpeg', 'rb');

if (!$image) {
    echo 'Unable to open image';
    exit;
}

// Attempt to read the exif headers
$headers = exif_read_data($image);

if (!$headers) {
    echo 'Unable to read exif headers from file';
    exit;
}

// output exif headers
foreach ($headers['COMPUTED'] as $header => $value) {
    printf('%s => %s', $header, $value);
    echo '<br>';
}