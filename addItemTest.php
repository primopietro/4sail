<?php
if(!isset($_SESSION)){session_start();}
require_once 'static/header.php';
?>

<div class="col-md-5">
	<form action="actions/addItem.php"  method="post" enctype="multipart/form-data">
       	<select class="form-control" name="item_cat">
          <option value="1">Électronique</option>
          <option value="2">Vêtements pour homme</option>
          <option value="3">Vêtement pour femme</option>
          <option value="4">Articles de sport</option>
          <option value="5">Meubles</option>
          <option value="6">Automobile</option>
          <option value="7">Autres</option>
        </select><br>
    	<input class="form-control" type="text" name="item_title" placeholder="Title"required><br>
    	<input class="form-control " type="text" name="item_price" placeholder="Price $"required><br>
    	<input class="form-control" type="text" name="item_desc" placeholder="Description"required><br>
    	<input class="form-control" type="text" name="item_keywords" placeholder="Keywords"required><br>
    	<input class="form-control" type="file" name="fileToUpload" id="fileToUpload">
    	<button id="addObj" class="btn btn-fill" type="submit">Add</button>
    </form>
</div>



   <?php
   require_once 'static/footer.php';
?>
   
      

     
       
