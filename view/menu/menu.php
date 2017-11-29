  <?php  
if(!isset($_SESSION)){session_start();}
$addedString = "";
if(isset( $_SESSION['currentItem'])){
    if( $_SESSION['currentItem'] != 0){
        $addedString = "../";
    }
}
?>
        <!--
        |========================
        |  MOBILE MENU
        |========================
        -->
        <div class="menu-spacing">
            <div class="container">
                <div class="row">
                    <div class="mobile-menu-area visible-xs visible-sm">
                        <div class="mobile-menu">
                            <nav id="mobile-menu-active">
                                <ul class="main">
                                <?php 
                                            require_once $_SERVER ["DOCUMENT_ROOT"] . "/4sail/model/category.php";
                                            $aCategory = new Category();
                                            $aCategoryList = $aCategory->getListOfAllDBObjects();
                                         
                                            foreach($aCategoryList as $aLocalCategory){
                                                $aLI =  '<li ';
                                                
                                                if($aLocalCategory['cat_id'] == $_SESSION['currentCategory']){
                                                    $aLI .=' class="active" ';
                                                }
                                
                                                
                                                $tempPath =  '><a class="main-a"  href="./';
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
                </div>
            </div>
        </div>