<?php
if(!isset($_SESSION['current_user'])){session_start();}

require_once $_SERVER["DOCUMENT_ROOT"] . '/4sail/model/message.php';

$aMessage = new Message();


//get item element
$object = htmlspecialchars ( $_POST['object'] );
$messaged = htmlspecialchars ($_POST['messaged'] );
$fk_user_to = htmlspecialchars ($_POST['fk_user_to'] );
$item_id = htmlspecialchars ($_POST['item_id'] );

//add item to bd

$aMessage->setObject($object);
$aMessage->setMessaged($messaged);
$aMessage->setFk_user_to($fk_user_to);
$aMessage->setFk_item_id($item_id);
$aMessage->setFk_user_from($_SESSION['current_user']['user_id']);


$aMessage->addMessageToDB();

?>