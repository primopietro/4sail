<?php
require_once 'BaseModel.php';
class Image extends BaseModel {
	protected $table_name = 'image';
	protected $primary_key = "image_id";
	
	protected $image_id = 0;
	protected $item_id = 0;
	protected $name= "";

    /**
     * image_id
     * @return unkown
     */
    public function getImage_id(){
        return $this->image_id;
    }

    /**
     * image_id
     * @param unkown $image_id
     * @return Image
     */
    public function setImage_id($image_id){
        $this->image_id = $image_id;
        return $this;
    }

    /**
     * item_id
     * @return unkown
     */
    public function getItem_id(){
        return $this->item_id;
    }

    /**
     * item_id
     * @param unkown $item_id
     * @return Image
     */
    public function setItem_id($item_id){
        $this->item_id = $item_id;
        return $this;
    }


    /**
     * name
     * @return unkown
     */
    public function getName(){
        return $this->name;
    }

    /**
     * name
     * @param unkown $name
     * @return Image
     */
    public function setName($name){
        $this->name = $name;
        return $this;
    }
    
    function addImage(){
    	include $_SERVER ["DOCUMENT_ROOT"] . '/4sail/DB/dbConnect.php';
    	
    	$stmt = $conn->prepare("INSERT INTO image (image_id, item_id, name) VALUES (?, ?, ?)");
    	$stmt->bind_param("iis", $image_id, $item_id, $name);
    	
    	$image_id = NULL;
    	$item_id = $this->item_id;
    	$name = $this->name;
    	
    	$stmt->execute();
    	$id = mysqli_insert_id($conn);
    	
    	if($id != 0){
    		echo "success";
    	}
    	
    	$stmt->close ();
    	$conn->close ();
    	
    	return $id;
    }
    
    
    function getImageWhereItem($idItem)
    {
        include $_SERVER["DOCUMENT_ROOT"] . '/4sail/DB/dbConnect.php';
        
        $internalAttributes = get_object_vars($this);
        
        $stmt = $conn->prepare("SELECT * FROM `image` WHERE `item_id` = ?");
        $stmt->bind_param("i", $idItem);
        
        $stmt->execute();
        
        $stmt->bind_result($image_id, $item_id, $name);
        
        $localObjects = array();
        
        while ($stmt->fetch()) {
            
            $anObject = Array();
            $anObject["primary_key"] = $this->primary_key;
            $anObject["table_name"] = $this->table_name;
            
            $anObject["image_id"] = $image_id;
            $anObject["item_id"] = $item_id;
            $anObject["name"] = $name;
            
            
            $localObjects[$item_id] = $anObject;
        }
        /*
         * echo "<pre>";
         * print_r($localObjects);
         * echo "</pre>";
         */
        return $localObjects;
    }

}
