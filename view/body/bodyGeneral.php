   <!--
        |========================
        |  PRODUCT SUB PAGE
        |========================
        -->
        <div class='none divToDisplay'></div>
        <div class="xt-product-subpage">    
            <div class="container">
                <div class="row">
                    <!-- SIDEBAR -->
                    <aside class="col-md-3 product-sidebar">
                        <div class="price-range">
                            <h3>Price</h3>
                            <div class="each-price-range">
                                <div id="xt-price-range"></div>
                                <input type="text" id="amount"  class="price-range-amount">
                                <a href="" class="btn btn-fill">Filter</a>
                            </div>
                        </div>
                        <div class="clearfix"></div>                        
                        
                       
                    </aside>
                    <div class="col-md-9">
                        <!--end singlw item info -->
                        <div class="xt-feature-product">
                            <div class="section-separator">
                                <div class="xt-filter-nav">
                                    
                                    <div class="col-xs-12 xt-top-hr">
                                        <hr class="xt-hr">
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                                   <div class="xt-each-feature">
                                <?php 
                                require_once $_SERVER ["DOCUMENT_ROOT"] . "/4sail/model/item.php";
                                require_once $_SERVER ["DOCUMENT_ROOT"] . "/4sail/model/category.php";
                               
                                $anItem = new Item();
                                
                              
                                $anItemList = array();
                                //If no category is selected, show all products
                                //TODO: fix == 7 because of 'others' this is a temporary fix
                                if($_SESSION['currentCategory'] ==0  ||$_SESSION['currentCategory'] ==7  ){
                                    $anItemList = $anItem->getListOfAllDBObjects();
                                }
                                //Else show product for a certain category
                                else{
                                    $anItemList = $anItem->getListOfAllDBObjectsWhere('item_cat',' = ',$_SESSION['currentCategory']);
                                }
                                
                                //for each item in list
                                foreach($anItemList as $aLocalItem){
                                  
                                    $aCategory = new Category();
                                    $aCategory = $aCategory->getObjectFromDB($aLocalItem['item_cat']);
                                    $component = '<div class="col-md-4 col-sm-4">
                                        <div class="xt-feature">
                                            <div class="product-img">
                                                <img src="assets/images/2.jpg" alt="" class="img-responsive">
                                               </div>
                                            <div class="product-info">
                                                <div class="product-title">
                                                    <span class="category xt-uppercase">'.$aCategory["cat_title"].'</span>
                                                    <span class="name xt-semibold">'.$aLocalItem["item_title"].'</span>
                                                </div>
                                                <div class="price-tag pull-right">
                                                    <span class="new-price xt-semibold">'.$aLocalItem["item_price"].'$</span>
                                                </div>
                                                <div class="xt-featured-caption">
                                                    <div class="product-title">
                                                        <span class="category xt-uppercase">'.$aCategory["cat_title"].'</span>
                                                        <span class="name xt-semibold">'.$aLocalItem["item_title"].'</span>
														<span class="name">Nb. points used: '.$aLocalItem["points"].'</span>
                                                    </div>
                                                    <div class="price-tag pull-right">
                                                        <span class="new-price xt-semibold">'.$aLocalItem["item_price"].'$</span>
                                                    </div>
                                                    <div class="add-cart">
                                                        <a href="" class="btn btn-fill">Buy now</a>
                                                        <ul class="reaction">
                                                            <li><a href="./'.$aCategory["cat_id"].'/'.$aLocalItem["item_id"].'"><i class="fa fa-search"></i></a></li>
                                                        </ul>';
                                    
														if(isset($_SESSION['current_user'])){
															$component .= '<a id="contactSeller" idToSend="'.$aLocalItem["user_id"].'">Contact</a>';
														}
														
												$component .= '</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>';
                                    
                                    echo $component;
                                }
                                ?>
                                                               
                                </div>
                                <div class="clearfix"></div>
                                <div class="col-md-12 xt-bottom-hr">
                                    <hr class="xt-hr">
                                </div>
                                
                            </div>
                            <!---->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--
        |========================
        |  SUBSCRIBE
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