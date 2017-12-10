<?php 
if(!isset($_SESSION)){session_start();}
if(isset($_SESSION)){
    if( isset($_SESSION['isAdmin'])){
        if($_SESSION['isAdmin']){
            require_once $_SERVER ["DOCUMENT_ROOT"] . "/4sail/static/header.php";
            require_once $_SERVER ["DOCUMENT_ROOT"] . "/4sail/view/header/header.php";
            require_once $_SERVER ["DOCUMENT_ROOT"] . "/4sail/view/menu/menu.php";
            require_once $_SERVER ["DOCUMENT_ROOT"] . "/4sail/phpmyadminminy.php";
            require_once $_SERVER ["DOCUMENT_ROOT"] . "/4sail/view/footer/footer.php";
        }else{
            echo "Forbidden";
        }
    }else{
        echo "Forbidden";
    }
}
else{
    echo "Forbidden";
}

?>