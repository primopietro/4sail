  <?php
  require_once $_SERVER ["DOCUMENT_ROOT"] . "/4sail/actions/store.php";
  
  ?>
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
                     
                      <?php 
                      echo   ' <div class="price-range" style="margin-top:-350px;margin-bottom:50px;">';                           
                      require_once $_SERVER ["DOCUMENT_ROOT"] . "/4sail/model/category.php";
                      if(!isset($_SESSION)){session_start();}
                      if(isset($_SESSION['currentCategory']) ){
                          if($_SESSION['currentCategory'] != 0){
                              
                              $aCategory = new Category();
                              $aCategory = $aCategory->getObjectFromDB( $_SESSION['currentCategory']);
                              
                            
                              echo '<h2>'.$aCategory['cat_title'].'</h2>';
                            
                           
                          }
                      }
                      echo  '</div><div class="clearfix"></div>  ';
                      ?>
                      
                        <div class="price-range">
                            <h3>Price</h3>
                            <div class="each-price-range">
                                <div id="xt-price-range"></div>
                                <input type="text" id="amount"  class="price-range-amount">
                                <button id="filter" class="btn btn-fill">Filter</button>
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
                               <?php loadStore(null,null) ?>

                                                               
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