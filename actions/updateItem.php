<?php
if(!isset($_SESSION['current_user'])){session_start();}

$anObject = null;
require_once $_SERVER["DOCUMENT_ROOT"] . '/4sail/model/item.php';
require_once $_SERVER["DOCUMENT_ROOT"] . '/4sail/model/user.php';
require_once $_SERVER["DOCUMENT_ROOT"] . '/4sail/model/image.php';

$anItem = new Item();

$anItemBefore = new Item();
$anImage = new Image();





//get item element
$cat = htmlspecialchars ( $_POST['item_cat'] );
$title = htmlspecialchars ($_POST ['item_title'] );
$price = htmlspecialchars ($_POST ['item_price'] );
$desc = htmlspecialchars ($_POST ['item_desc'] );
$key = htmlspecialchars ($_POST ['item_keywords'] );
$pointsAfter = htmlspecialchars ($_POST ['item_points'] );
$link= htmlspecialchars ($_POST ['link'] );
$itemID= htmlspecialchars ($_POST ['item_id'] );
$anItemBefore = $anItemBefore->getItem($itemID);
$pointsBefore = $anItemBefore['points'];

$pointsDifference = $pointsBefore - $pointsAfter;


/*for prepare statement*/
$anItem->setItem_id($itemID);
$anItem->setItem_cat($cat);
$anItem->setItem_title($title);
$anItem->setItem_price($price);
$anItem->setItem_desc($desc);
$anItem->setItem_keywords($key);
$anItem->setLink('https://www.'.$link);
$anItem->setPoints($pointsAfter);
$anItem->setDate_created("666");
$anItem->updateItem();


/*$anItem->updateObjectDynamicallyNoEcho("item_cat", $cat, $itemID);
$anItem->updateObjectDynamicallyNoEcho("item_title", $title, $itemID);
$anItem->updateObjectDynamicallyNoEcho("item_price", $price, $itemID);
$anItem->updateObjectDynamicallyNoEcho("item_desc", $desc, $itemID);
$anItem->updateObjectDynamicallyNoEcho("item_keywords", $key, $itemID);
$anItem->updateObjectDynamicallyNoEcho("link", 'https://www.'.$link, $itemID);
$anItem->updateObjectDynamicallyNoEcho("points", $pointsAfter, $itemID);*/


$aUser = new User();
//If new points are smaller then old points
if($pointsDifference > $pointsBefore){
    
    $newPoints = $_SESSION['current_user']['points'] - $pointsDifference;
}
//If old points are smaller then new points
else if($pointsDifference < $pointsBefore){
    
    $newPoints = $_SESSION['current_user']['points'] + $pointsDifference;
}
else if($pointsAfter ==0){
    $newPoints = $_SESSION['current_user']['points'] + $pointsBefore;
}
//If both are the same
else{
    //Do nothing
    $newPoints = $_SESSION['current_user']['points'] ;
}

$_SESSION['current_user']['points'] = $newPoints;
$aUser->setUser_id($_SESSION['current_user']['user_id']);
$aUser->setPoints($newPoints);
$aUser->updatePoints();


header("Location: ../index.php");
?>