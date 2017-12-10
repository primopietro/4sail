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
           <div class='none divLogin'></div>
           <div class='none divSignUp'></div>
           <div class='none divUserConsult'></div>
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
                        	    echo' <li><a id="btnSignUp">Sign up</a></li>';
                        	    echo' <li><a id="btnLogin">Login</a></li>';
                        	}else{

                        	    
                        	    require_once $_SERVER ["DOCUMENT_ROOT"] . "/4sail/model/message.php";
                        	    
                        	    $aMessage = new Message();
                        	    $aMessageCounter = $aMessage->getNBUnseenMessagesForUser($_SESSION['current_user']['user_id']);
                        	    
                        	    
                        	    echo' <li><a id="loadMessages">';
                        	    
                        	    if($aMessageCounter>0){
                        	        echo '<span >'.$aMessageCounter.'</span>';
                        	    }
                        	    
                        	    echo '<i style="font-size:18px;margin-right:15px;" class=" fa fa-comments-o" aria-hidden="true"></i></a></li>';
                        		echo' <li><a href="#">Points : '.$_SESSION['current_user']['points'].'</a></li>';
                        		echo' <li><a href="http://localhost/4sail/addItem.php">Sell an item</a></li>';
                        		
                        		if($_SESSION['isAdmin']){
                        		    echo' <li><a href="http://localhost/4sail/admin.php">ADMIN</a></li>';
                        		    
                        		}else{
                        		    echo' <li><a id="userConsult">'.$_SESSION['current_user']['first_name']. ' ' . $_SESSION['current_user']['last_name'] . '</a></li>';
                        		    
                        		}
                        		  echo' <li><a href="http://localhost/4sail/actions/logout.php">Logout</a></li>';

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
                                            $aCategoryList = $aCategory->getListOfAllDBObjects(null,null);
                                         
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
                                <input id="search" type="text" class="form-control" placeholder="Search 4 sails" />
                            </div>
                            <div class="form-group xt-form xt-search-cat col-md-4 col-sm-4 col-xs-5 padding-left-o ">
                               <!-- <div class="xt-select xt-search-opt">
                                    <select class="xt-dropdown-search select-beast">
                                     <?php /*
                                            require_once $_SERVER ["DOCUMENT_ROOT"] . "/4sail/model/category.php";
                                            $aCategory = new Category();
                                            $aCategoryList = $aCategory->getListOfAllDBObjects();
                                         
                                            foreach($aCategoryList as $aLocalCategory){
                                                $aLI =  '  <option>'.$aLocalCategory["cat_title"].'</option>';
                                                echo $aLI;
                                             }
                                       */?>
                                      
                                    </select>
                                </div>-->
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