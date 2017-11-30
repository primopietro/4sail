<?php

require_once $_SERVER ["DOCUMENT_ROOT"] . "/4sail/model/item.php";
require_once $_SERVER ["DOCUMENT_ROOT"] . "/4sail/model/image.php";
require_once $_SERVER ["DOCUMENT_ROOT"] . "/4sail/model/category.php";

function loadStore($priceFrom, $priceTo, $orderBy, $orderSense, $search, $keyword){
    $anItem = new Item();
    $anItemList = array();
    
    //echo $priceFrom . " " . $priceTo . " " . $_SESSION['currentCategory'] . " ";
    
    //If no category is selected, show all products
    if($priceFrom ===null && $_SESSION['currentCategory'] == 0 || $_SESSION['currentCategory'] ==7 && $priceTo === null){
        //echo "no cat no price filt" . "<br>";
        $anItemList = $anItem->getListOfAllDBObjectsOrder($orderBy,$orderSense);
    }
    elseif ($_SESSION['currentCategory'] ==0  ||$_SESSION['currentCategory'] ==7 && $priceFrom !== null && $priceTo !== null){
        //echo "no cat price filt" . "<br>";
        $anItemList = $anItem->getListOfAllDBObjectsWhereSort('item_price < ' . $priceTo . ' AND item_price > ' . $priceFrom .'', null,null,$orderBy,$orderSense,$search,$keyword);
    }
    //Else if category and price range, show filtered products
    elseif($priceFrom !== null && $priceTo !== null){
        //echo "cat price filt" . "<br>";
        $anItemList = $anItem->getListOfAllDBObjectsWhereSort('item_cat =' .  $_SESSION['currentCategory'] . ' AND item_price < ' . $priceTo . ' AND item_price > ' . $priceFrom .'', null,null,$orderBy,$orderSense,$search,$keyword);
    }
    //Else show product for a certain category
    else{
        //echo "cat" . "<br>";
        $anItemList = $anItem->getListOfAllDBObjectsWhereSort('item_cat',' = ',$_SESSION['currentCategory'],null,null,$search,$keyword);
    }
    //for each item in list
    if (sizeof($anItemList) > 0) {
        foreach ($anItemList as $aLocalItem) {
            $aCategory = new Category();
            $aCategory = $aCategory->getObjectFromDB($aLocalItem['item_cat']);
            $component = '<div class="col-md-4 col-sm-4 vignetteFix">
                                        <div class="xt-feature">
                                            <div class="product-img ';
            if ($aLocalItem["points"] > 0) {
                $component .= " no0points ";
            }
            
            $anImage = new Image();
            $anImage = $anImage->getListOfAllDBObjectsWhereSort('item_id', ' = ', $aLocalItem["item_id"],null,null,null,null);
            $imgString = '<img src="images/notFound.gif" alt="" class="img-responsive">';
            if (sizeof($anImage) > 0) {
                $imgString = '<img src="images/' . current($anImage)['name'] . '" alt="" class="img-responsive">';
            }
            
            $component .= '">
                                                ' . $imgString . '
                                               </div>
                                            <div class="product-info">
                                                <div class="product-title">
                                                    <span class="category xt-uppercase">' . $aCategory["cat_title"] . '</span>
                                                    <span class="name xt-semibold">' . $aLocalItem["item_title"] . '</span>
                                                </div>
                                                <div class="price-tag pull-right">
                                                    <span class="new-price xt-semibold">' . $aLocalItem["item_price"] . '$</span>
                                                </div>
                                                <div class="xt-featured-caption">
                                                    <div class="product-title">
                                                        <span class="category xt-uppercase">' . $aCategory["cat_title"] . '</span>
                                                        <span class="name xt-semibold">' . $aLocalItem["item_title"] . '</span>
														<span class="name">Nb. points used: ' . $aLocalItem["points"] . '</span>
                                                    </div>
                                                    <div class="price-tag pull-right">
                                                        <span class="new-price xt-semibold">' . $aLocalItem["item_price"] . '$</span>
                                                    </div>
                                                    <div class="add-cart">
                                                        <a href="" class="btn btn-fill">Buy now</a>
                                                        <ul class="reaction">
                                                            <li><a href="./' . $aCategory["cat_id"] . '/' . $aLocalItem["item_id"] . '"><i class="fa fa-search"></i></a></li>
                                                        </ul>';
            
            if (isset($_SESSION['current_user'])) {
                $component .= '<a class="name xt-semibold" id="contactSeller" iditemtosend="'.$aLocalItem["item_id"] .'" idToSend="' . $aLocalItem["user_id"] . '">Contact Seller</a>';
            }
            
            $component .= '</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>';
            
            echo $component;
            
        }
    }
    else{
        echo "We found no items matching the criterias.";
    }
}

if (isset($_GET['filter']) && isset($_POST['priceTo']) && isset($_POST['priceFrom'])){
    session_start();
    //var_dump($_SESSION);
    $orderBy = isset($_POST['orderBy']) ? $_POST['orderBy'] : null;
    $orderSense = isset($_POST['orderSense']) ? $_POST['orderSense'] : null;
    $search = isset($_POST['search']) ? $_POST['search'] : null;
    $keyword  = isset($_POST['keyword']) ? $_POST['keyword'] : null;
    loadStore($_POST['priceFrom'], $_POST['priceTo'],$orderBy,$orderSense, $search, $keyword);
}

?>