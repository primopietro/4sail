<?php
require_once 'BaseModel.php';
class WatchList extends BaseModel {
	protected $table_name = 'watch_list';
	protected $primary_key = "id_watch_list";
	protected $id_watch_list = 0;
	
	protected $user_id = 0;
	protected $item_id = 0;


    /**
     * id_watch_list
     * @return INT
     */
    public function getId_watch_list(){
        return $this->id_watch_list;
    }

    /**
     * id_watch_list
     * @param INT $id_watch_list
     * @return WatchList
     */
    public function setId_watch_list($id_watch_list){
        $this->id_watch_list = $id_watch_list;
        return $this;
    }

    /**
     * user_id
     * @return INT
     */
    public function getUser_id(){
        return $this->user_id;
    }

    /**
     * user_id
     * @param INT $user_id
     * @return WatchList
     */
    public function setUser_id($user_id){
        $this->user_id = $user_id;
        return $this;
    }

    /**
     * item_id
     * @return INT
     */
    public function getItem_id(){
        return $this->item_id;
    }

    /**
     * item_id
     * @param INT $item_id
     * @return WatchList
     */
    public function setItem_id($item_id){
        $this->item_id = $item_id;
        return $this;
    }

}
