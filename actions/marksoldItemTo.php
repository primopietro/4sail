<?php
if(!isset($_SESSION['current_user'])){session_start();}

require_once $_SERVER["DOCUMENT_ROOT"] . '/4sail/model/item.php';
require_once $_SERVER["DOCUMENT_ROOT"] . '/4sail/model/message.php';
require_once $_SERVER["DOCUMENT_ROOT"] . '/4sail/model/referral.php';
require_once $_SERVER["DOCUMENT_ROOT"] . '/4sail/model/user.php';


//get item element
$idItem = htmlspecialchars ( $_POST['idItem'] );
$idRef = htmlspecialchars ( $_POST['idRef'] );
$idMsgToDelete = htmlspecialchars ( $_POST['idMsg'] );

$aReferral = new Referral();
$aItem = new Item();
$anotherItem = new Item();
$aMessage = new Message();
$aUser = new User();
$aUserBefore = new User();
/*$aReferral = $aReferral->getObjectFromDB($idRef);
$aItem = $aItem->getObjectFromDB($idItem);*/

$aReferral = $aReferral->getReferral($idRef);
$aItem = $aItem->getItem($idItem);

$pointstoAdd = (int)($aItem['points']/10);
/*$aUserBefore = $aUserBefore->getObjectFromDB($aReferral['ref_user_id']);*/
$aUserBefore = $aUserBefore->getUser($aReferral['ref_user_id']);
$pointsReward = $pointstoAdd + (int)($aUserBefore['points']);
$aUser->updateObjectDynamically('points',$pointsReward,$aReferral['ref_user_id']);

$aMessage->setObject('!!! POINTS AWARDED !!!');
$aMessage->setMessaged('Your referral link for the item : '.$aItem['item_title'].' has led to a successful purchase. '
    . $pointstoAdd.' points were added to your account.');
$aMessage->setFk_user_to($aReferral['ref_user_id']);
$aMessage->setFk_item_id($idItem);
$aMessage->setFk_user_from($aReferral['sell_user_id']);

date_default_timezone_set('UTC');
$aMessage->setDate_sent(date('Y-m-d h:i:s'));

$lastId = $aMessage->addMessage();

$lastId = $aMessage->addMessage();
 $aMessage->setMessage_id($idMsgToDelete);
 $aMessage->setIsResponse(0);
 $aMessage->setResponse_id($idRef)
 $aMessage->updateIsReponse();
 $aMessage->updateResponseId();

/*$aMessage->updateObjectDynamically('response_id',$idRef,$lastId);*/

//delete mark sold button from message
$aMessage->updateObjectDynamically('isResponse','0',(int)($idMsgToDelete));
//delete item from bd
/*$anotherItem->updateObjectDynamically('sold','1',$idItem);*/
$anotherItem->setItem_id($idItem);
$anotherItem->setSold(1);
$anotherItem->updateSold();
?>