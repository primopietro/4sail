<?php
if(!isset($_SESSION['current_user'])){session_start();}

require_once $_SERVER["DOCUMENT_ROOT"] . '/4sail/model/message.php';
require_once $_SERVER["DOCUMENT_ROOT"] . '/4sail/assets/prettifyDate.php';
use PrettyDateTime\PrettyDateTime;

$aMessage = new Message();

$aMessageList = $aMessage->getMessageListForUser($_SESSION['current_user']['user_id'] );
$finalString = "";
if($aMessageList != null){
    if(sizeof($aMessageList)>0){
        foreach($aMessageList as $aLocalMessage){
            $finalString .= "<div idmsg='".$aLocalMessage['message_id']."' class='4sMessage ";
            
            if($aLocalMessage['date_viewed'] == null){
                $finalString .= "newMessage";
            }else{
                $finalString .= "regularMessage";
            }
            
            $finalString .= "'>";
            
            $dateTime = new DateTime($aLocalMessage['date_sent'], new DateTimeZone('America/New_York') );
             $now = new DateTime(null, new DateTimeZone('America/New_York'));
          
             
             
            $finalString .= "<span class='msgObj'>" .$aLocalMessage['object'] ."</span> &nbsp; <span style='float:right;'>" .PrettyDateTime::parse($dateTime,$now) ."</span>" ;
            $finalString .= "</div>";
            
        }
    }
}


echo $finalString;

