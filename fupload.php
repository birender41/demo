<?php

$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
$check = getimagesize($_FILES["imageFile"]["tmp_name"]);
if ($check !== false) {
    if (move_uploaded_file($_FILES["imageFile"]["tmp_name"], $target_dir . basename($_FILES["imageFile"]["name"]))) {
        echo "File is an image - " . $check["mime"] . ".";
    }
    $uploadOk = 1;
} else {
    echo "File is not an image.";
    $uploadOk = 0;
}