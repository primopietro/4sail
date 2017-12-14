<?php
if(!isset($_SESSION)){session_start();}
require_once $_SERVER["DOCUMENT_ROOT"] . '/4sail/model/user.php';

$_SESSION['isAdmin'] = false; 
$email = htmlspecialchars ($_POST['email']);
$password = htmlspecialchars ($_POST['password']);

$querry = 'email = "' . $email . '" AND password = "' . $password . '"';

$aUser = new User();
$aUser = $aUser->getObjectFromDBWhere('','', $querry);

if($aUser != null){
	$_SESSION['current_user'] = $aUser;
	
	if($aUser['email'] == 'admin'){
	    $_SESSION['isAdmin'] = true; 
	}
	
	//echo "success";
	
}else{
	//echo "fail";
}
?>