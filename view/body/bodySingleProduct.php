  <?php  

  require_once $_SERVER ["DOCUMENT_ROOT"] . "/4sail/model/item.php";
  require_once $_SERVER ["DOCUMENT_ROOT"] . "/4sail/model/image.php";
  require_once $_SERVER ["DOCUMENT_ROOT"] . "/4sail/model/category.php";
  require_once $_SERVER ["DOCUMENT_ROOT"] . "/4sail/model/referral.php";
  $aCategory = new Category();
$addedString = "";
if(isset( $_SESSION['currentItem'])){
    if( $_SESSION['currentItem'] != 0){
        $addedString = "../";
    }
}
$referral = new Referral();
$getRef = false;
  if(isset($_GET['ref'])){
      $getRef =true;
      $referral = $referral->getRefByToken($_GET['ref']);
  }

$anItem = new Item();

$anItem = $anItem->getObjectFromDB($_SESSION['currentItem'] );
$aCategory = $aCategory->getObjectFromDB($anItem['item_cat']);
?>
 <!--
        |========================
        |   PRODUCT DESCRIPTION
        |========================
        -->
        <div class='none divToDisplay'></div>
        <section class="xt-xt-single-product">
            <div class="container">
                <div class="row">
                    <div class="col-md-3  padding-right-o"> <?php 
                      require_once $_SERVER ["DOCUMENT_ROOT"] . "/4sail/model/category.php";
                      if(!isset($_SESSION)){session_start();}
                      if(isset($_SESSION['currentCategory']) ){
                          if($_SESSION['currentCategory'] != 0){
                              
                              $aCategory = new Category();
                              $aCategory = $aCategory->getObjectFromDB( $_SESSION['currentCategory']);
                              
                              $string = ' <div class="price-range" style="position:absolute;"><h2 style="color:rgb(51, 51, 51);">';                           
                              $string .= $aCategory['cat_title'];
                              $string .= '</h2></div><div class="clearfix"></div>  ';
                            echo $string;
                          }
                      }
                     
                      ?></div>
                    <div class="col-md-9 col-md-offset-3 padding-o">
                        <div class="xt-product-inner">
                            <div class="col-md-5">
                                <div role="tabpanel" class="tab-pane active xt-product-tab">
                                    <div class="tab-content xt-pro-small-image">
                                        <!-- Tab panel-->
                                        
                                        <?php 
                                        $anImage = new Image();

                                        $anImage = $anImage->getListOfAllDBObjectsWhere('item_id', ' = ',$anItem["item_id"],null,null,null,null );
                                        $imgString = 'assets/images/s-1.jpg';

                                        if(sizeof($anImage)>0){
                                            $imgString = 'images/'.current($anImage)['name'];
                                        }
                                        ?>
                                        <div role="tabpanel" id="xt-pro-1" class="tab-pane fade active in">
                                            <a class="grouped_elements" data-fancybox="gallery" href="<?php echo $addedString .$imgString; ?>">
                                                <img src="<?php echo $addedString . $imgString; ?>" alt="" class="img-responsive">
                                            </a>
                                        </div>
                                        <!--  
                                        <div role="tabpanel" id="xt-pro-2" class="tab-pane fade">
                                            <a class="grouped_elements" data-fancybox="gallery" href="<?php echo $addedString; ?>assets/images/s-2.jpg">
                                                <img src="<?php echo $addedString; ?>assets/images/s-2.jpg" alt="" class="img-responsive">
                                            </a>
                                        </div>
                                        <div role="tabpanel" id="xt-pro-3" class="tab-pane fade active in">
                                            <a class="grouped_elements" data-fancybox="gallery" href="<?php echo $addedString; ?>assets/images/s-3.jpg">
                                                <img src="<?php echo $addedString; ?>assets/images/s-3.jpg" alt="" class="img-responsive">
                                            </a>
                                        </div>
                                        <div role="tabpanel" id="xt-pro-4" class="tab-pane fade">
                                            <a class="grouped_elements" data-fancybox="gallery" href="<?php echo $addedString; ?>assets/images/s-4.jpg">
                                                <img src="<?php echo $addedString; ?>assets/images/s-4.jpg" alt="" class="img-responsive">
                                            </a>
                                        </div>-->
                                    </div>
                                    <!-- Nav tabs
                                    <ul id="tablist" class="xt-pro-thumbs-list" role="tablist">
                                        <li role="presentation" class="">
                                            <a href="#xt-pro-1" role="tab" data-toggle="tab" aria-expanded="false">
                                               <img src="<?php echo $addedString; ?>assets/images/s-1.jpg" alt="product thumbs"> 
                                            </a>
                                        </li>
                                        <li role="presentation" class="">
                                            <a href="#xt-pro-2" role="tab" data-toggle="tab" aria-expanded="false">
                                               <img src="<?php echo $addedString; ?>assets/images/s-2.jpg" alt="product thumbs"> 
                                            </a>
                                        </li>
                                        <li role="presentation" class="active">
                                            <a href="#xt-pro-3" role="tab" data-toggle="tab" aria-expanded="true">
                                               <img src="<?php echo $addedString; ?>assets/images/s-3.jpg" alt="product thumbs"> 
                                            </a>
                                        </li>
                                        <li role="presentation" class="">
                                            <a href="#xt-pro-4" role="tab" data-toggle="tab" aria-expanded="false">
                                               <img src="<?php echo $addedString; ?>assets/images/s-4.jpg" alt="product thumbs"> 
                                            </a>
                                        </li> -->
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-7">
                                <div class="each-product-info">
                                    <h3 id="title"><?php echo $anItem["item_title"]?></h3>
                                    <span class="single-price"><b>Current Price:</b> $<?php echo $anItem["item_price"]?></span>
                                    <p><?php echo $anItem["item_desc"]?></p>
                                    
                                    <div class="product-add-cart">
                                        <?php if($anItem["link"] != '') {
                                            if ($getRef == true){
                                                echo '<a href="' . $anItem["link"] . '/' . $anItem["item_price"] . '" refId="'. $referral['id'] .'" data-toggle="tooltip" title="Always contact the seller first!" id="payRef" target="_blank" class="btn btn-fill btn-ref">Pay now</a>';
                                            }else {
                                                echo '<a href="' . $anItem["link"] . '/' . $anItem["item_price"] . '" data-toggle="tooltip" title="Always contact the seller first!" id="pay" target="_blank" class="btn btn-fill ">Pay now</a>';
                                            }
                                        }?>
                                         <?php  if(isset($_SESSION['current_user'])){
                                                            if($anItem["user_id"]==$_SESSION['current_user']['user_id']){
                                                                echo '<a   id="delete" value="'. $anItem["item_id"] .'" class="btn btn-fill delete" >Delete</a>';
                                                            }
                                                        }?>
                                        <?php
                                        if(isset($_SESSION['current_user'])) {
                                            if($anItem["link"] != '') {
                                                echo '<a href="" id="share" class="btn btn-fill">Referral link</a>';
                                            }
                                            
                                            require_once $_SERVER["DOCUMENT_ROOT"] . '/4sail/model/user.php';
                                            
                                            $aUser = new User();
                                            $theUser = $aUser->getObjectFromDB($anItem["user_id"]);
                                            
                                            echo "<label class='none' id='path' thepath='".$anItem["item_cat"]. "/".$anItem["item_id"]."'></label>";
                                            
                                            
                                            require_once $_SERVER["DOCUMENT_ROOT"] . '/4sail/model/ratings.php';
                                            $aRating = new Ratings();
                                            
                                            $querryToCheck = " id_rater = '" . $_SESSION['current_user']['user_id'] . "' AND id_rated = '" . $anItem["user_id"] . "'";
                                            $checkRating = $aRating->getObjectFromDBWhere("", "", $querryToCheck);
                                            
                                            if($checkRating != null){
                                            	echo "<div id='rating'><label id='theUser' user_id='".$theUser['user_id']."'>".$theUser['first_name']. " " .$theUser['last_name']." rating: ".round($theUser['rating'], 2)." stars</label><br>
												<section class='rating-widget'>
												  <!-- Rating Stars Box -->
												  <div class='rating-stars'>
												    <ul id='stars'>
												      <li class='star";
		                              					if($checkRating['rating'] >= 1){
		                                            		echo " selected ";
		                                            	}
														echo "' title='Poor' data-value='1'>
												        <i class='fa fa-star fa-fw'></i>
												      </li>
												      <li class='star";
														if($checkRating['rating'] >= 2){
															echo " selected ";
														}
												      	echo "' title='Fair' data-value='2'>
												        <i class='fa fa-star fa-fw'></i>
												      </li>
												      <li class='star";
												      	if($checkRating['rating'] >= 3){
												      		echo " selected ";
												      	}
												      echo"' title='Good' data-value='3'>
												        <i class='fa fa-star fa-fw'></i>
												      </li>
												      <li class='star";
												      if($checkRating['rating'] >= 4){
												      	echo " selected ";
												      }
												      echo "' title='Excellent' data-value='4'>
												        <i class='fa fa-star fa-fw'></i>
												      </li>
												      <li class='star";
												      if($checkRating['rating'] == 5){
												      	echo " selected ";
												      }
												      echo"' title='WOW!!!' data-value='5'>
												        <i class='fa fa-star fa-fw'></i>
												      </li>
												    </ul>
												  </div>
												</div>";
                                            } else{
                                            	echo "<div id='rating'><label id='theUser' user_id='".$theUser['user_id']."'>".$theUser['first_name']. " " .$theUser['last_name']." rating: ".round($theUser['rating'], 2)." stars</label><br>
												<section class='rating-widget'>
												  <!-- Rating Stars Box -->
												  <div class='rating-stars'>
												    <ul id='stars'>
												      <li class='star' title='Poor' data-value='1'>
												        <i class='fa fa-star fa-fw'></i>
												      </li>
												      <li class='star' title='Fair' data-value='2'>
												        <i class='fa fa-star fa-fw'></i>
												      </li>
												      <li class='star' title='Good' data-value='3'>
												        <i class='fa fa-star fa-fw'></i>
												      </li>
												      <li class='star' title='Excellent' data-value='4'>
												        <i class='fa fa-star fa-fw'></i>
												      </li>
												      <li class='star' title='WOW!!!' data-value='5'>
												        <i class='fa fa-star fa-fw'></i>
												      </li>
												    </ul>
												  </div>
												</div>";
                                            }
                                        }
                                        ?>
                                        <div><input id="reflink" class="input-lg none"><a href="#" id="copy" data-clipboard-target="reflink" class="label copy none">Copy to clipboard</a></div>
                                      </div>
                                    <div class="product-additional-info">
                                        <ul>
                                            <li><b>Sku:</b><?php echo $anItem["item_id"] ?></li>
                                            <li><b>Category:</b><a href="../<?php echo $aCategory["cat_id"]?>"><?php echo $aCategory["cat_title"]?></a></li>
                                            <li><b>Tag:</b> 
                                            <?php 
                                            $aListOfKeywords = null;
                                            if($anItem["item_keywords"] != null){
                                                if($anItem["item_keywords"] != ""){
                                                    $aListOfKeywords = $anItem["item_keywords"];
                                                    $aListOfKeywords =   explode(" ", $aListOfKeywords);
                                                }
                                            }
                                            if($aListOfKeywords != null){
                                                if(sizeof($aListOfKeywords)>0){
                                                    $counter = 0;
                                                    foreach($aListOfKeywords as $aKeyword){
                                                        echo '<a href="">'.$aKeyword.'</a>';
                                                        
                                                        $counter++;
                                                        if($counter < sizeOf($aListOfKeywords)){
                                                            echo ', ';
                                                        }
                                                       
                                                    }
                                                }
                                            }
                                            ?>
                                          
                                        </ul>
                                        <?php

                                            echo '<input id="infos" value="'. $anItem["item_id"] .' '. $anItem["user_id"] .'" class="hidden">';

                                            ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        
        <div class="clearfix"></div>
        
     
        <!--
        |========================
        |      SUBSCRIBE
        |========================
        -->
        <div class="black-bg">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <form class="form-inline xt-subscribe-form">
                            <div class="form-group col-xs-10 xt-subscribe">
                                <label for="subscribe">Subscribe</label>
                                <input type="text" class="form-control" id="subscribe" placeholder="Your email address">
                            </div>
                            <div class="col-md-2 col-xs-2">
                                <button type="submit" class="btn btn-fill"><i class="fa flaticon-home"></i></button>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <div class="xt-social">
                            <span>stay conected</span>
                            <ul>
                                <li><a href=""><i class="fa fa-facebook"></i></a></li>
                                <li><a href=""><i class="fa fa-twitter"></i></a></li>
                                <li><a href=""><i class="fa fa-linkedin"></i></a></li>
                                <li><a href=""><i class="fa fa-dribbble"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>