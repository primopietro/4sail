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

}
