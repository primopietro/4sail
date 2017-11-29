<?php  
if(!isset($_SESSION)){session_start();}
$addedString = "";
if(isset( $_SESSION['currentItem'])){
    if( $_SESSION['currentItem'] != 0){
        $addedString = "../";
    }
}
?>
           <div class='allpage'></div>
<!--
        |========================
        |  HEADER
        |========================
        -->
           <header id="xt-home" class="xt-header">
            <div class="header-top">
                <div class="container">
                    <div class="xt-language col-md-6 col-sm-6 col-xs-12">
                        <div class="each-nav">
                            <a class="navbar-brand" href="http://localhost/4sail/" style='padding-top: 15px;font-size: 42px;font-weight: 900;'>4Sail</a>
                          
                        </div>
                    </div>
                    
                    <div class="user-nav pull-right col-md-6 col-sm-6 col-xs-12">
                        <ul>
                        	<?php
                        	if(!isset($_SESSION['current_user'])){
                        	    echo' <li><a href="actions/login.php">Sign up</a></li>';
                        	    echo' <li><a href="actions/login.php">Login</a></li>';
                        	}else{
                        		echo' <li>Points : '.$_SESSION['current_user']['points'].'</li>';
                        	    echo' <li><a href="addItem.php">Sell an item</a></li>';
                        	    echo' <li><a href="actions/logout.php">Logout</a></li>';
                        	}
                        	?>
                           
                        </ul>
                    </div>
                </div>
            </div>
          
             <!--Mobile Menu-->
            <div class="main-color-bg">
                <div class="container">
                    <div class="row">
                        <div class="col-md-3 left-menu-wrapper">
                            <div class="xt-sidenav hidden-xs hidden-sm">
                                <nav>
                                    <ul class="xt-side-menu" data-toggle="collapse" data-target="#4sailCategories">
                                        <li>
                                            <a href="#">All Category</a>
                                            <ul id='4sailCategories' class="xt-dropdown collapse">
                                            <?php 
                                            require_once $_SERVER ["DOCUMENT_ROOT"] . "/4sail/model/category.php";
                                            $aCategory = new Category();
                                            $aCategoryList = $aCategory->getListOfAllDBObjects();
                                         
                                            foreach($aCategoryList as $aLocalCategory){
                                                $aLI =  '<li><a ';
                                                
                                                if($aLocalCategory['cat_id'] == $_SESSION['currentCategory']){
                                                    $aLI .=' class="activeMenu" ';
                                                }
                                
                                                
                                                $tempPath =  'href="./';
                                                if(isset( $_SESSION['currentItem'])){
                                                    if( $_SESSION['currentItem'] != 0){
                                                        $tempPath =  'href="../';
                                                    }
                                                }
                                                
                                                $aLI .=  $tempPath;
                                                
                                                 $aLI .= $aLocalCategory['cat_id'].'"> '.$aLocalCategory['cat_title'].'</a></li>';
                                                echo $aLI;
                                             }
                                            ?>
                                               
                                    </ul>
                                </nav>
                            </div>
                        </div>
                        
                        <div class="col-md-8 col-sm-10 col-xs-12 xt-header-search">
                            <div class="form-group xt-form search-bar  col-md-8 col-sm-8 col-xs-7 padding-right-o">
                                <input type="text" class="form-control" placeholder="Search 4 sails" />
                            </div>
                            <div class="form-group xt-form xt-search-cat col-md-4 col-sm-4 col-xs-5 padding-left-o ">
                                <div class="xt-select xt-search-opt">
                                    <select class="xt-dropdown-search select-beast">
                                     <?php 
                                            require_once $_SERVER ["DOCUMENT_ROOT"] . "/4sail/model/category.php";
                                            $aCategory = new Category();
                                            $aCategoryList = $aCategory->getListOfAllDBObjects();
                                         
                                            foreach($aCategoryList as $aLocalCategory){
                                                $aLI =  '  <option>'.$aLocalCategory["cat_title"].'</option>';
                                                echo $aLI;
                                             }
                                       ?>
                                      
                                    </select>
                                </div>
                                <div class="xt-search-opt xt-search-btn">
                                    <button type="button" class="btn btn-primary btn-search"><i class="fa fa-search"></i></button>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-1 col-sm-2 col-xs-2">
                           
                        </div>
                    </div>
                </div>
            </div>

        </header>