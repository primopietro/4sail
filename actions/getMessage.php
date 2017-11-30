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
    $finalString .='<img src="http://localhost/4sail/'  . $imgString .'" alt="" class="img-responsive">';
    $finalString .="</a >";
    
    $finalString .="<h4>".$aMessageToBeDisplayed['object']."</h4>";


    $finalString.= "<h3> Sent by ".$aUserDisplayed['first_name'].", ".$aUserDisplayed['last_name']."</h3>";
    $finalString.= "<h3> Phone ".$aUserDisplayed['phone'].", ".$aUserDisplayed['email']."</h3>";
    $finalString.= "<h2> At ".$aMessageToBeDisplayed['date_sent']. "</h2>";

    $finalString .="<div>".$aMessageToBeDisplayed['messaged']."</div>";
    
    $now = new DateTime(null, new DateTimeZone('America/New_York'));
    
    $aMessage->updateObjectDynamically('date_viewed', date_format($now,"Y/m/d H:i:s"), $messageID);
}


echo $finalString;



