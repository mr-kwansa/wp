<?php

ini_set ('display_errors', 'on');
ini_set ('log_errors', 'on');
ini_set ('display_startup_errors', 'on');
ini_set ('error_reporting', E_ALL);

//include db config file
require_once'../connection.php';
// require_once '../product.php';

//file type configuration
$allowTypes = array('jpg','jpeg','png','jfif','webp') ;

if(isset($product_photo) && !empty($product_photo)){
    $fileInputTagName = "product_photo";
    $target_dir = "../uploads";

//file upload path
$check = getimagesize($_FILES[$fileInputTagName]["tmp_name"]);  
$fileName = basename($_FILES[$fileInputTagName]['name']);
$targetFilePath = $target_dir . $fileName;
$imageFileType = strtolower(pathinfo($targetFilePath, PATHINFO_EXTENSION));


if($check) {

    //check if file already exists
    if(file_exists($targetFilePath)) {
        array_push($errors, "Image already exists, please choose another or rename that image");
}


//check file size
if($_FILES[$fileInputTagName]["size"] > 5000000){
    array_push($errors, "Sorry, your file is too large, please choose an image less than 5mb");
}


//check whether file type is valid
if(!(in_array($imageFileType, $allowTypes))){               
    array_push($errors, "Sorry, only JPG, JPEG and PNG files are allowed.");          
}

//if there are no errors
if(empty($errors)) {
    //rename file
    $temp = explode(".", $fileName);
    $newFileName = round(microtime(true) *1000) .".". $temp;
    //move image into folder upload file
    if(!move_uploaded_file($_FILES[$fileInputTagName]["tmp_name"], $target_dir.$newFileName)){
        array_push($errors, "Sorry, couldn't place image in folder during file upload.");
}else{
    array_push($errors,"Please upload an image");
}


}


}







}