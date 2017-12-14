<?php
//if(!isset($_SESSION['current_user'])){session_start();}
require_once $_SERVER["DOCUMENT_ROOT"] . '/4sail/model/message.php';
require_once $_SERVER["DOCUMENT_ROOT"] . '/4sail/model/user.php';
require_once $_SERVER["DOCUMENT_ROOT"] . '/4sail/model/item.php';
require_once $_SERVER ["DOCUMENT_ROOT"] . "/4sail/model/image.php";


$finalString ="";




if(isset($_GET['idMessage'])){
	$messageID = htmlspecialchars($_GET['idMessage']);
	$aMessage = new Message();
	$aUser = new User();
	$anImage = new Image();
	
	
	$aMessageToBeDisplayed = $aMessage->getObjectFromDB($messageID);
	$aUserDisplayed = $aUser->getObjectFromDB($aMessageToBeDisplayed['fk_user_from']);
	$anImage = $anImage->getListOfAllDBObjectsWhere('item_id', ' = ',$aMessageToBeDisplayed["fk_item_id"] );
	
	
	
	$finalString ="";
	$imgString = 'images/notFound.gif';
	if(sizeof($anImage)>0){
		$imgString = 'images/'.current($anImage)['name'];
	}
	
	$finalString .="<a href='http://localhost/4sail/item/".current($anImage)['item_id']."'>";
	$finalString .='<img style="width:100%;" src="http://localhost/4sail/'  . $imgString .'" alt="" class="img-responsive">';
	$finalString .="</a >";
	
	
	
	$finalString.= "<h4 class=' title4SMessenger' style='margin-top: 10px; margin-left:15px;margin-right:15px;'> Sent by ".$aUserDisplayed['first_name'].", ".$aUserDisplayed['last_name']."</h4>";
	$finalString .="<h4 class=' margin-small object4SMessenger'>".$aMessageToBeDisplayed['object']." - </h4>";
	$finalString .="<div class=' text4SMessenger'>".$aMessageToBeDisplayed['messaged']." ";
	if ($aMessageToBeDisplayed['isResponse']==1)
    {
        $finalString .= "<button id='marksoldTo' idMessage='".$aMessageToBeDisplayed['message_id']."' idRef='". $aMessageToBeDisplayed['response_id'] ."' idItem='". current($anImage)['item_id'] ."' class='btn-sm' style='float:right;'>MARK SOLD</button>" ;
    }
    $finalString .="</div>";
	$finalString.= "<h5 class='margin-small'> Phone :".$aUserDisplayed['phone']."</h3>";
	$finalString.= "<h5 class='margin-small'> Email :".$aUserDisplayed['email']."</h3>";
	$finalString.= "<h5 class='margin-small'> Sent at : ".$aMessageToBeDisplayed['date_sent']. "</h5>";
	
	
	
	$now = new DateTime(null, new DateTimeZone('America/New_York'));
	
	$aMessage->updateObjectDynamicallyNoEcho('date_viewed', date_format($now,"Y/m/d H:i:s"), $messageID);
}


echo $finalString;



