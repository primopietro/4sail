<?php
if(!isset($_SESSION['current_user'])){session_start();}

require_once $_SERVER["DOCUMENT_ROOT"] . '/4sail/model/watch_list.php';
$aWatchList = new WatchList();


//get item element
$user_id = $_SESSION['current_user']['user_id'];
$item_id = htmlspecialchars ($_POST['item_id'] );

$querryToCheck = " user_id = '" . $user_id. "' AND item_id = '" . $item_id. "'";

$checkWatchList = $aWatchList->getWatchListWhere($user_id, $item_id);

if($checkWatchList == null){
	//add item to bd
	$aWatchList->setUser_id($user_id);
	$aWatchList->setItem_id($item_id);
	
	$aWatchList->addWatchList();
} else{
	$aWatchList->deleteWatchListWhere($user_id, $item_id);
	echo "exist";
}

?>