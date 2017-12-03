<?php
if(!isset($_SESSION['current_user'])){session_start();}

require_once $_SERVER["DOCUMENT_ROOT"] . '/4sail/model/user.php';

$aUser = new User();


//get item element
$first_name = htmlspecialchars ( $_POST['first_name'] );
$last_name = htmlspecialchars ($_POST['last_name'] );
$email = htmlspecialchars ($_POST['email'] );
$password = htmlspecialchars ($_POST['password'] );
$phone = htmlspecialchars ($_POST['phone'] );
$address = htmlspecialchars ($_POST['address'] );

$points = 1000;

//add item to bd

$aUser->setFirst_name($first_name);
$aUser->setLast_name($last_name);
$aUser->setEmail($email);
$aUser->setPassword($password);
$aUser->setPhone($phone);
$aUser->setAddress($address);
$aUser->setPoints($points);


$aUser->addDBObject();

?>