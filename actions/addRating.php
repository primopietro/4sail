<?php
if(!isset($_SESSION['current_user'])){session_start();}

require_once $_SERVER["DOCUMENT_ROOT"] . '/4sail/model/ratings.php';
require_once $_SERVER["DOCUMENT_ROOT"] . '/4sail/model/user.php';

$aRating = new Ratings();

$id_rater = htmlspecialchars ( $_SESSION['current_user']['user_id']);
$id_rated = htmlspecialchars ($_POST['id_rated'] );
$rating = htmlspecialchars ($_POST['rating'] );

$querryToCheck = " id_rater = '" . $id_rater . "' AND id_rated = '" . $id_rated . "'";

$checkRating = $aRating->getObjectFromDBWhere("", "", $querryToCheck);
$boolRating = 0;
if($checkRating != null){
	$boolRating = 1;
}

/*Add or update rater rating of rated*/
if($boolRating == 0){
	$aRating->setId_rater($id_rater);
	$aRating->setId_rated($id_rated);
	$aRating->setRating($rating);
	
	$aRating->addDBObject();
} else{
	$aRating->updateObjectDynamically("rating", $rating, $checkRating['id_rating']);
}



/*Update rated user rating*/
$aUser = new User();

$allRatings = $aRating->getListOfAllDBObjectsWhere("id_rated", "=", $id_rated);
$totalRating = 0;
$finalRating = 0;

if($allRatings != null){
	foreach($allRatings as $theRating){
		$totalRating += $theRating['rating'];
	}
	$finalRating = $totalRating/sizeof($allRatings);
} else{
	$finalRating = $rating;
}


$aUser->updateObjectDynamically("rating", $finalRating, $id_rated)
?>