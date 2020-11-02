<?php
/*
 * Purpose: Process image that has been uploaded via upload image
 */

// Open a the file in binary mode
$image = fopen('../tmp_store/##NAME', 'rb');

if (!$image) {
    echo 'Error: Unable to open image for reading';
    exit;
}

// Attempt to read the exif headers
$headers = exif_read_data($image);

if (!$headers) {
    echo 'Error: Unable to read exif headers';
    exit;
}