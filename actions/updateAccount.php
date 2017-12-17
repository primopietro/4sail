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


//update item in bd
$aUser->setUser_id($_SESSION['current_user']['user_id']);
$aUser->setFirst_name($first_name);
$aUser->setLast_name($last_name);
$aUser->setEmail($email);
$aUser->setPassword($password);
$aUser->setPhone($phone);
$aUser->setAddress($address);
$aUser->setPoints($_SESSION['current_user']['points']);
$aUser->setRating($_SESSION['current_user']['rating']);


/*$aUser->updateDBObject();*/
$aUser->updateAccount();
$_SESSION['current_user'] = $aUser->getObjectFromDB($_SESSION['current_user']['user_id']);
?>