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
    
    function addWatchList(){
    	include $_SERVER ["DOCUMENT_ROOT"] . '/4sail/DB/dbConnect.php';
    	
    	$stmt = $conn->prepare("INSERT INTO watch_list (id_watch_list, user_id, item_id) VALUES (?, ?, ?)");
    	$stmt->bind_param("iii", $id_watch_list, $user_id, $item_id);
    	
    	$id_watch_list = NULL;
    	$user_id = $this->user_id;
    	$item_id = $this->item_id;
    	
    	$stmt->execute();
    	$id = mysqli_insert_id($conn);
    	
    	/*echo "<pre>";
    	print_r($stmt);
    	echo "</pre>";*/
    	
    	if($id != 0){
    		echo "success";
    	}
    	
    	$stmt->close ();
    	$conn->close ();
    	
    	return $id;
    }
    
    function getListOfAllWatchListWhere($user_id){
    	include $_SERVER ["DOCUMENT_ROOT"] . '/4sail/DB/dbConnect.php';
    	
    	$internalAttributes = get_object_vars ( $this);
    	
    	$stmt = $conn->prepare("SELECT wl.*, i.sold FROM watch_list wl
								JOIN item i ON i.item_id = wl.item_id 
								WHERE i.sold = ? AND wl.user_id = ?");
    	$stmt->bind_param("ii", $sold, $user_id);
    	
    	$sold = 0;
    	
    	$stmt->execute();
    	
    	$stmt->bind_result($id_watch_list, $user_id, $item_id, $item_sold);
    	
    	$localObjects = array ();
    	while($stmt->fetch()){
    		$anObject = Array ();
    		$anObject ["primary_key"] = $this->primary_key;
    		$anObject ["table_name"] = $this->table_name;
    		
    		$anObject["id_watch_list"] = $id_watch_list;
    		$anObject["user_id"] = $user_id;
    		$anObject["item_id"] = $item_id;
    		$anObject["item_sold"] = $item_sold;
    		
    		$localObjects [$id_watch_list] = $anObject;
    	}
    	/*echo "<pre>";
    	print_r($localObjects);
    	echo "</pre>";*/
    	return $localObjects;
    }
    
    function getWatchListWhere($user_id, $item_id)
    {
    	include $_SERVER["DOCUMENT_ROOT"] . '/4sail/DB/dbConnect.php';
    	
    	$stmt = $conn->prepare("SELECT * FROM `watch_list` WHERE `user_id` = ? AND `item_id` = ?");
    	$stmt->bind_param("ii", $user_id, $item_id);
    	
    	$stmt->execute();
    	
    	$stmt->bind_result($id_watch_list, $user_id_result, $item_id_result);
    	
    	$localObjects = array();
    	
    	while ($stmt->fetch()) {
    		
    		$anObject = Array();
    		$anObject["primary_key"] = $this->primary_key;
    		$anObject["table_name"] = $this->table_name;
    		
    		$anObject["id_watch_list"] = $id_watch_list;
    		$anObject["user_id"] = $user_id_result;
    		$anObject["item_id"] = $item_id_result;
    		
    		$localObjects += $anObject;
    	}
    	/*
    	 * echo "<pre>";
    	 * print_r($localObjects);
    	 * echo "</pre>";
    	 */
    	return $localObjects;
    }
    
    function deleteWatchListWhere($user_id, $item_id) {
    	include $_SERVER["DOCUMENT_ROOT"] . '/4sail/DB/dbConnect.php';
    	
    	$stmt = $conn->prepare("DELETE FROM `watch_list` WHERE `user_id` = ? AND `item_id` = ?");
    	$stmt->bind_param("ii", $user_id, $item_id);
    	
    	$stmt->execute();
    	
    	$stmt->close();
    	$conn->close ();
    }

}
