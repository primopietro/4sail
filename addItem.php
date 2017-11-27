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
    	<input class="form-control " type="text" name="item_price" placeholder="Price $"required><br>
    	<input class="form-control" type="text" name="item_desc" placeholder="Description"required><br>
    	<input class="form-control" type="text" name="item_keywords" placeholder="Keywords"required><br>
    	<input class="form-control" type="file" name="fileToUpload" id="fileToUpload">
    	<button id="addObj" class="btn btn-fill" style='margin-top:10px;margin-bottom:10px;' type="submit">Add</button>
    </form>
</div>
</div>
</div>

   <?php
    require_once 'view/footer/footer.php';
   require_once 'static/footer.php';
?>
   
      

     
       
