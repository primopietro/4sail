<?php
if(!isset($_SESSION)){session_start();}
require_once 'static/header.php';
require_once 'view/header/header.php';
require_once 'view/menu/menu.php';
?>
 <div class="xt-product-subpage">    
            <div class="container">
                <div class="row">
                <aside class="col-md-3 product-sidebar">
                                             
                        
                       
                    </aside>
 <div class="col-md-9">
	<form action="actions/addItem.php"  method="post" enctype="multipart/form-data">
       	<select class="form-control" name="item_cat">
           <?php 
                require_once $_SERVER ["DOCUMENT_ROOT"] . "/4sail/model/category.php";
                $aCategory = new Category();
                $aCategoryList = $aCategory->getListOfAllDBObjects();
             
                foreach($aCategoryList as $aLocalCategory){
                    $aLI =  '  <option value="'.$aLocalCategory["cat_id"].'">'.$aLocalCategory["cat_title"].'</option>';
                    echo $aLI;
                 }
            ?>
        </select><br>
    	<input class="form-control" type="text" name="item_title" placeholder="Title"required><br>
    	<input class="form-control " type="number" name="item_price" placeholder="Price $"required><br>
    	<input class="form-control" type="text" name="item_desc" placeholder="Description"required><br>
        <i class="fa fa-bullhorn"></i><label class="label copy">To get referral advantages and receive advance payment, please enter your PAYPAL.ME link below.</label>
        <a href="https://www.paypal.com/paypalme/grab?locale.x=en_US&country.x=CA" class="label copy">CLICK HERE TO CREATE ONE</a>
        <input class="form-control" type="text" name="link" placeholder="Paypal.me link - example: paypal.me/myname"required><br>
    	<input class="form-control" type="text" name="item_keywords" placeholder="Keywords"required><br>
    	
    	<input class="form-control" placeholder="Points" type="number" name="item_points" min="0" max="<?php
        echo    $_SESSION['current_user']['points'];
        ?>" required><br>
        <div class="file-loading">
            <input id="input-fa" class="file" name="fileToUpload" id="fileToUpload" type="file" data-show-upload="false" data-show-cancel="false" data-upload-url="">
        </div>

    	<button id="addObj" class="btn btn-fill" style='margin-top:10px;margin-bottom:10px;' type="submit">Add</button>
    </form>
</div>
</div>
</div>

   <?php
    require_once 'view/footer/footer.php';
   require_once 'static/footer.php';
?>
   
      

     
       
