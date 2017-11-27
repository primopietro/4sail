<?php
require_once 'BaseModel.php';
class Item extends BaseModel {
	protected $table_name = 'item';
	protected $primary_key = "item_id";
	protected $item_id = 0;
	
	
	protected $item_cat = 0;
	protected $item_title = "";
	protected $item_price = 0;
	protected $item_desc = "";
	protected $item_keywords ="";
	protected $user_id = 0;





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
     * @return Item
     */
    public function setItem_id($item_id){
        $this->item_id = $item_id;
        return $this;
    }

    /**
     * item_cat
     * @return unkown
     */
    public function getItem_cat(){
        return $this->item_cat;
    }

    /**
     * item_cat
     * @param unkown $item_cat
     * @return Item
     */
    public function setItem_cat($item_cat){
        $this->item_cat = $item_cat;
        return $this;
    }

    /**
     * item_title
     * @return unkown
     */
    public function getItem_title(){
        return $this->item_title;
    }

    /**
     * item_title
     * @param unkown $item_title
     * @return Item
     */
    public function setItem_title($item_title){
        $this->item_title = $item_title;
        return $this;
    }

    /**
     * item_price
     * @return unkown
     */
    public function getItem_price(){
        return $this->item_price;
    }

    /**
     * item_price
     * @param unkown $item_price
     * @return Item
     */
    public function setItem_price($item_price){
        $this->item_price = $item_price;
        return $this;
    }

    /**
     * item_desc
     * @return unkown
     */
    public function getItem_desc(){
        return $this->item_desc;
    }

    /**
     * item_desc
     * @param unkown $item_desc
     * @return Item
     */
    public function setItem_desc($item_desc){
        $this->item_desc = $item_desc;
        return $this;
    }

    /**
     * item_keywords
     * @return unkown
     */
    public function getItem_keywords(){
        return $this->item_keywords;
    }

    /**
     * item_keywords
     * @param unkown $item_keywords
     * @return Item
     */
    public function setItem_keywords($item_keywords){
        $this->item_keywords = $item_keywords;
        return $this;
    }

    /**
     * user_id
     * @return unkown
     */
    public function getUser_id(){
        return $this->user_id;
    }

    /**
     * user_id
     * @param unkown $user_id
     * @return Item
     */
    public function setUser_id($user_id){
        $this->user_id = $user_id;
        return $this;
    }

}