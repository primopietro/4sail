<?php
if(!isset($_SESSION['current_user'])){session_start();}

require_once $_SERVER ["DOCUMENT_ROOT"] . "/4sail/model/item.php";
require_once $_SERVER ["DOCUMENT_ROOT"] . "/4sail/model/image.php";
require_once $_SERVER ["DOCUMENT_ROOT"] . "/4sail/model/category.php";
require_once $_SERVER["DOCUMENT_ROOT"] . '/4sail/model/watch_list.php';

$aWatchList = new WatchList();
$anItem = new Item();
$aCategory = new Category();
$anImage = new Image();

$myWatchList = $aWatchList->getListOfAllDBObjectsWhere("user_id", "=", $_SESSION['current_user']['user_id']);

$finalString = "";

if($myWatchList != null){
	foreach($myWatchList as $theWatchList){
		$theItem = $anItem->getObjectFromDB($theWatchList['item_id']);
		$theImage = $anImage->getListOfAllDBObjectsWhereSort('item_id', ' = ', $theItem["item_id"],null,null,null,null);
		$theCategory = $aCategory->getObjectFromDB($theItem['item_cat']);
		
		$imgString = '<img src="images/notFound.gif" alt="" class="img-responsive">';
		if (sizeof($theImage) > 0) {
			$pathImage = 'http://localhost/4sail/images/' . current($theImage)['name'];
			$imgString = '<img src="'.$pathImage.'" alt="" class="img-responsive">';
		}
		
		$finalString .= "<div class='col-md-6 col-sm-6 vignetteFix borderWatch'>
                            <div class='xt-feature'>
								<div class='product-img'>".$imgString."</div>

								<span class='category xt-uppercase'>" . $theCategory["cat_title"] . "</span>

								<div class='price-tag pull-right'>
                                	<span class='new-price xt-semibold'>" . $theItem["item_price"] . "$</span>
                                </div>

								<span id='title' class='name xt-semibold'>" . $theItem['item_title'] . "</span>
								
								<ul class='reaction pull-right'>
                                	<li><a href='./" . $theCategory["cat_id"] . "/" . $theItem["item_id"] . "'  data-toggle='tooltip' title='View details.' ><i class='fa fa-search'></i></a></li>
                                </ul>
							</div>
						</div>";
	}
}else{
	$finalString .= "<div>Your Watch list is empty.</div>";
}


echo $finalString;



