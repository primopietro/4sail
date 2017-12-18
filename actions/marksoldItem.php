<?php
if(!isset($_SESSION['current_user'])){session_start();}

require_once $_SERVER["DOCUMENT_ROOT"] . '/4sail/model/item.php';

$aItem = new Item();


//get item element
$idItem = htmlspecialchars ( $_POST['idItem'] );


//delete item from bd
$aItem->updateObjectDynamically('sold','1',$idItem);

?>


