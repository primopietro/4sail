<?php
if(!isset($_SESSION)){session_start();}
require_once $_SERVER["DOCUMENT_ROOT"] . '/4sail/model/user.php';

$aUser = new User();
$aUser = $aUser->getObjectFromDB(1);

$_SESSION['current_user'] = $aUser;
header("Location: ../index.php");
?>