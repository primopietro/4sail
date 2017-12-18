<?php
if(!isset($_SESSION['current_user'])){session_start();}

require_once $_SERVER["DOCUMENT_ROOT"] . '/4sail/model/item.php';
require_once $_SERVER["DOCUMENT_ROOT"] . '/4sail/model/image.php';
$addedString = "";
$aItem = new Item();

$aItemList = $aItem->getItemsForUser($_SESSION['current_user']['user_id'] );
$finalString = "";
if($aItemList != null){
    if(sizeof($aItemList)>0){
        foreach($aItemList as $aLocalMessage){
            $anImage = new Image();            
            
            $anImage = $anImage->getImageWhereItem($aLocalMessage["item_id"],null,null,null,null );
            $imgString = 'assets/images/s-1.jpg';
            
            if(sizeof($anImage)>0){
                $imgString = 'images/'.current($anImage)['name'];
            }
            
            
            
            $finalString .= "<div idItem='".$aLocalMessage['item_id']."' class='4sItem ";

            if($aLocalMessage['sold'] == '0'){
                $finalString .= "newItem";
                $finalString .= "'>          <a class='grouped_elements' data-fancybox='gallery' href='$imgString'>
                                                <img src='$imgString' alt='' class='item-preview'>
                                            </a>
                                       <span style='float:left;'></span>";
            }else{
                $finalString .= "regularItem";
                $finalString .= "'>         <a class='grouped_elements' data-fancybox='gallery' href='$imgString'>
                                                <img src='$imgString' alt='' class='item-preview'>
                                            </a>
                                       <span style='float:left;'>(SOLD)&nbsp;</span>";
            }







            $finalString .= "<span class='msgObj'>" .$aLocalMessage['item_title'] ."</span> &nbsp; ";

   if($aLocalMessage['sold'] == '0'){
                $finalString .= "<button id='marksold' idItem='". $aLocalMessage['item_id'] ."' class='btn-sm' style='float:right;'>MARK SOLD</button>" ;

            }else{

            }
            $finalString .= "</div>";

        }
    }
}


echo $finalString;

