<?php


$anObject = null;
require_once $_SERVER["DOCUMENT_ROOT"] . '/4sail/model/item.php';

$anItem = new Item();

$cat = htmlspecialchars ( $_POST['item_cat'] );
$title = htmlspecialchars ($_POST ['item_title'] );
$price = htmlspecialchars ($_POST ['item_price'] );
$desc = htmlspecialchars ($_POST ['item_desc'] );
$key = htmlspecialchars ($_POST ['item_keywords'] );
$userId ="1";



$anItem->setItem_cat($cat);
$anItem->setItem_title($title);
$anItem->setItem_price($price);
$anItem->setItem_desc($desc);
$anItem->setItem_keywords($key);
$anItem->setUser_id($userId);

$anItem->addDBObject();
?>