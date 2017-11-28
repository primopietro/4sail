<?php
if(!isset($_SESSION['current_user'])){session_start();}

require_once $_SERVER["DOCUMENT_ROOT"] . '/4sail/model/message.php';

$aMessage = new Message();


//get item element
$object = htmlspecialchars ( $_POST['object'] );
$messaged = htmlspecialchars ($_POST ['messaged'] );
$fk_user_to = htmlspecialchars ($_POST ['fk_user_to'] );


//add item to bd

$aMessage->setObject($object);
$aMessage->setMessaged($messaged);
$aMessage->setFk_user_to($fk_user_to);
$aMessage->setFk_user_from($_SESSION['current_user']['user_id']);


$aMessage->addDBObject();

?>