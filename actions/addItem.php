<?php
if(!isset($_SESSION['current_user'])){session_start();}

$anObject = null;
require_once $_SERVER["DOCUMENT_ROOT"] . '/4sail/model/item.php';
require_once $_SERVER["DOCUMENT_ROOT"] . '/4sail/model/user.php';
require_once $_SERVER["DOCUMENT_ROOT"] . '/4sail/model/image.php';

$anItem = new Item();
$anImage = new Image();

//get item element
$cat = htmlspecialchars ( $_POST['item_cat'] );
$title = htmlspecialchars ($_POST ['item_title'] );
$price = htmlspecialchars ($_POST ['item_price'] );
$desc = htmlspecialchars ($_POST ['item_desc'] );
$key = htmlspecialchars ($_POST ['item_keywords'] );
$points = htmlspecialchars ($_POST ['item_points'] );
$userId ="1";


//add item to bd
$anItem->setItem_cat($cat);
$anItem->setItem_title($title);
$anItem->setItem_price($price);
$anItem->setItem_desc($desc);
$anItem->setItem_keywords($key);
$anItem->setUser_id($userId);
$anItem->setPoints($points);



$anItem->addDBObject();

$aUser = new User();
$newPoints = $_SESSION['current_user']['points'] - $points;
$_SESSION['current_user']['points'] = $newPoints;
$aUser = $aUser->updateObjectDynamically("points", $newPoints, $_SESSION['current_user']['user_id']);


//---get image---
$target_dir = "../images/";
$ImageName= basename($_FILES["fileToUpload"]["name"]);
$target_file = $target_dir . $ImageName;
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }
    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
        // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }

    $anItemList = $anItem->getListOfAllDBObjectsNoSort();
    
    $aTempitem = current($anItemList);
    
    
    $anImage->setName($ImageName);
    $anImage->setItem_id($aTempitem["item_id"]);
    $anImage->addDBObject();
 
    header("Location: ../index.php");
?>