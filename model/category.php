<?php
require_once 'BaseModel.php';
class Category extends BaseModel {
	protected $table_name = 'category';
	protected $primary_key = "cat_id";
	protected $cat_id = 0;
	protected $cat_title = "";



    /**
     * cat_id
     * @return unkown
     */
    public function getCat_id(){
        return $this->cat_id;
    }

    /**
     * cat_id
     * @param unkown $cat_id
     * @return Category
     */
    public function setCat_id($cat_id){
        $this->cat_id = $cat_id;
        return $this;
    }

    /**
     * cat_title
     * @return unkown
     */
    public function getCat_title(){
        return $this->cat_title;
    }

    /**
     * cat_title
     * @param unkown $cat_title
     * @return Category
     */
    public function setCat_title($cat_title){
        $this->cat_title = $cat_title;
        return $this;
    }
    
    
    function getCategoWhere($id)
    {
        include $_SERVER["DOCUMENT_ROOT"] . '/4sail/DB/dbConnect.php';
        
        $internalAttributes = get_object_vars($this);
        
        $stmt = $conn->prepare("SELECT * FROM `category` WHERE `cat_id` = ?");
        $stmt->bind_param("i", $id);
        
        $stmt->execute();
        
        $stmt->bind_result($cat_id, $cat_title);
        
        $localObjects = array();
        
        while ($stmt->fetch()) {
            
            $anObject = Array();
            $anObject["primary_key"] = $this->primary_key;
            $anObject["table_name"] = $this->table_name;
            
            $anObject["cat_id"] = $cat_id;
            $anObject["cat_title"] = $cat_title;
        
            
            
            $localObjects += $anObject;
        }
        /*
         * echo "<pre>";
         * print_r($localObjects);
         * echo "</pre>";
         */
        return $localObjects;
    }
    
    function getCatego()
    {
        include $_SERVER["DOCUMENT_ROOT"] . '/4sail/DB/dbConnect.php';
        
        $internalAttributes = get_object_vars($this);
        
        $stmt = $conn->prepare("SELECT * FROM `category`");
     
        
        $stmt->execute();
        
        $stmt->bind_result($cat_id, $cat_title);
        
        $localObjects = array();
        
        while ($stmt->fetch()) {
            
            $anObject = Array();
            $anObject["primary_key"] = $this->primary_key;
            $anObject["table_name"] = $this->table_name;
            
            $anObject["cat_id"] = $cat_id;
            $anObject["cat_title"] = $cat_title;
            
            
            
            $localObjects[$cat_id] = $anObject;
        }
        /*
         * echo "<pre>";
         * print_r($localObjects);
         * echo "</pre>";
         */
        return $localObjects;
    }
}
