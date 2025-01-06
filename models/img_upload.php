<?php

session_start();
/* Getting file name */
$filename = $_FILES["file"]["name"];
$extension = end(explode(".", $filename));
$newfilename = $_SESSION['itm_code'] . "." . $extension;

/* Location */
$location = "../others/uploads/" . $newfilename;
$uploadOk = 1;
$imageFileType = pathinfo($location, PATHINFO_EXTENSION);

/* Valid Extensions */
$valid_extensions = array("jpg", "jpeg", "png");
/* Check file extension */
//strtolower->convert img extension to lowercase 
if (!in_array(strtolower($imageFileType), $valid_extensions)) {
    $uploadOk = 0;
}

if ($uploadOk == 0) {
    echo 0;
} else {
    /* Upload file */
    if (move_uploaded_file($_FILES['file']['tmp_name'], $location)) {
        echo 1;
    } else {
        echo 0;
    }
}