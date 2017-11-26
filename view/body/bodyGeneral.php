   <!--
        |========================
        |  PRODUCT SUB PAGE
        |========================
        -->
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
                        
                       
                        <div class="xt-top-product">
                            <h3>Top Rated Products</h3>
                            <div class="each-top-product">
                                <div class="top-item">
                                    <img src="assets/images/1.jpg" alt="" class="img-responsive">
                                    <div class="top-item-info">
                                        <a href=""><h4>T-SHIRT</h4></a>
                                        <span>$260</span>
                                        <del>$280</del>
                                    </div>
                                </div>                               
                                <div class="top-item">
                                    <img src="assets/images/3.jpg" alt="" class="img-responsive">
                                    <div class="top-item-info">
                                        <a href=""><h4>NEW LOOK</h4></a>
                                        <span>$260</span>
                                        <del>$280</del>
                                    </div>
                                </div>                                
                                <div class="top-item">
                                    <img src="assets/images/b2.jpg" alt="" class="img-responsive">
                                    <div class="top-item-info">
                                        <a href=""><h4>Shirt</h4></a>
                                        <span>$260</span>
                                        <del>$280</del>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="xt-side-deal">
                            <div class="xt-off-deal cover-bg white xt-deal xt-color-bg">
                                <span>summer collection 2017</span>
                                <h2 class="xt-deal-price">66<span>%<br>off</span></h2>
                                <a href="" class="btn btn-border">Shop now</a>
                            </div>
                        </div>
                    </aside>
                    <div class="col-md-9">
                        <!--end singlw item info -->
                        <div class="xt-feature-product">
                            <div class="section-separator">
                                <div class="xt-filter-nav">
                                    <div class="form-group col-md-4 col-sm-4 col-xs-12">
                                        <div class="xt-select xt-search-opt">
                                            <select class="xt-category-search select-beast">
                                                <option>Shirt</option>
                                                <option>Pant</option>
                                                <option>Jeans</option>
                                                <option>Jackets</option>
                                            </select>
                                        </div>
                                        <div class="xt-search-opt xt-search-btn">
                                            <button type="button" class="btn-search"><i class="fa fa-long-arrow-down"></i></button>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-3 col-xs-8 xt-show-item">
                                        <label>Show: </label>
                                        <div class="xt-select xt-search-opt xt-item-view-count">
                                            <select class="xt-category-search select-beast">
                                                <option>4</option>
                                                <option>8</option>
                                                <option>12</option>
                                                <option>20</option>
                                                <option>40</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-5 col-sm-5 col-xs-12">
                                        <div class="xt-page-pagination">
                                            <nav aria-label="Page navigation">
                                                <ul class="pagination xt-pagination">
                                                    <li class="active"><a href="#">1</a></li>
                                                    <li><a href="#">2</a></li>
                                                    <li><a href="#">3</a></li>
                                                    <li><a href="#">4</a></li>
                                                    <li><a href="#" aria-label="Next"><i class="fa fa-caret-right"></i></a></li>
                                                </ul>
                                            </nav>
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>
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
                                                    <span class="new-price xt-semibold">'.$aLocalItem["item_price"].'</span>
                                                </div>
                                                <div class="xt-featured-caption">
                                                    <div class="product-title">
                                                        <span class="category xt-uppercase">'.$aCategory["cat_title"].'</span>
                                                        <span class="name xt-semibold">'.$aLocalItem["item_title"].'</span>
                                                    </div>
                                                    <div class="price-tag pull-right">
                                                        <span class="new-price xt-semibold">'.$aLocalItem["item_price"].'</span>
                                                    </div>
                                                    <div class="add-cart">
                                                        <a href="" class="btn btn-fill">Add to cart</a>
                                                        <ul class="reaction">
                                                            <li><a href=""><i class="fa fa-search"></i></a></li>
                                                            <li><a href=""><i class="fa fa-heart-o"></i></a></li>
                                                            <li><a href=""><i class="fa fa-bar-chart-o"></i></a></li>
                                                        </ul>
                                                    </div>
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
                                <div class="xt-filter-nav padding-bottom-60">
                                    <div class="col-md-2 col-sm-2 col-xs-6">
                                        <div class="xt-view">
                                            <a href="" class="active"><i class="fa fa-th-large"></i></a>
                                            <a href=""><i class="fa fa-navicon"></i></a>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-3 col-xs-6 xt-show-item">
                                        <label>Show: </label>
                                        <div class="xt-select xt-search-opt xt-item-view-count">
                                            <select class="xt-category-search select-beast">
                                                <option>4</option>
                                                <option>8</option>
                                                <option>12</option>
                                                <option>20</option>
                                                <option>40</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group xt-shop-category col-md-4 col-sm-4 col-xs-12">
                                        <div class="xt-select xt-search-opt">
                                            <select class="xt-category-search select-beast">
                                                <option>Shirt</option>
                                                <option>Pant</option>
                                                <option>Jeans</option>
                                                <option>Jackets</option>
                                            </select>
                                        </div>
                                        <div class="xt-search-opt xt-search-btn">
                                            <button type="button" class="btn-search"><i class="fa fa-long-arrow-down"></i></button>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-3 col-xs-12">
                                        <div class="xt-page-pagination">
                                            <nav aria-label="Page navigation">
                                                <ul class="pagination xt-pagination">
                                                    <li class="active"><a href="#">1</a></li>
                                                    <li><a href="#">2</a></li>
                                                    <li><a href="#">3</a></li>
                                                    <li><a href="#">4</a></li>
                                                    <li><a href="#" aria-label="Next"><i class="fa fa-caret-right"></i></a></li>
                                                </ul>
                                            </nav>
                                        </div>
                                    </div>
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