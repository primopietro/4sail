<?php
require_once 'BaseModel.php';
class Message extends BaseModel {
	protected $table_name = 'message';
	protected $primary_key = "message_id";
	protected $message_id = 0;
	
	protected $fk_user_from= 0;
	protected $fk_user_to = 0;
	protected $object = "";
	protected $messaged = "";
	protected $date_sent = "";
	protected $date_viewed = "";
	
	protected $fk_item_id =0;
	protected $isResponse = "";
	protected $response_id = "";
	

    /**
     * message_id
     * @return unkown
     */
    public function getMessage_id(){
        return $this->message_id;
    }

    /**
     * message_id
     * @param unkown $message_id
     * @return Message
     */
    public function setMessage_id($message_id){
        $this->message_id = $message_id;
        return $this;
    }

    /**
     * fk_user_from
     * @return unkown
     */
    public function getFk_user_from(){
        return $this->fk_user_from;
    }

    /**
     * fk_user_from
     * @param unkown $fk_user_from
     * @return Message
     */
    public function setFk_user_from($fk_user_from){
        $this->fk_user_from = $fk_user_from;
        return $this;
    }

    /**
     * fk_user_to
     * @return unkown
     */
    public function getFk_user_to(){
        return $this->fk_user_to;
    }

    /**
     * fk_user_to
     * @param unkown $fk_user_to
     * @return Message
     */
    public function setFk_user_to($fk_user_to){
        $this->fk_user_to = $fk_user_to;
        return $this;
    }

    /**
     * object
     * @return unkown
     */
    public function getObject(){
        return $this->object;
    }

    /**
     * object
     * @param unkown $object
     * @return Message
     */
    public function setObject($object){
        $this->object = $object;
        return $this;
    }

    /**
     * messaged
     * @return unkown
     */
    public function getMessaged(){
        return $this->messaged;
    }

    /**
     * messaged
     * @param unkown $messaged
     * @return Message
     */
    public function setMessaged($messaged){
        $this->messaged = $messaged;
        return $this;
    }


    /**
     * date_sent
     * @return unkown
     */
    public function getDate_sent(){
        return $this->date_sent;
    }

    /**
     * date_sent
     * @param unkown $date_sent
     * @return Message
     */
    public function setDate_sent($date_sent){
        $this->date_sent = $date_sent;
        return $this;
    }

    /**
     * date_viewed
     * @return unkown
     */
    public function getDate_viewed(){
        return $this->date_viewed;
    }

    /**
     * date_viewed
     * @param unkown $date_viewed
     * @return Message
     */
    public function setDate_viewed($date_viewed){
        $this->date_viewed = $date_viewed;
        return $this;
    }


    /**
     * isResponse
     * @return unkown
     */
    public function getIsResponse(){
        return $this->isResponse;
    }

    /**
     * isResponse
     * @param unkown $isResponse
     * @return Message
     */
    public function setIsResponse($isResponse){
        $this->isResponse = $isResponse;
        return $this;
    }

    /**
     * response_id
     * @return unkown
     */
    public function getResponse_id(){
        return $this->response_id;
    }

    /**
     * response_id
     * @param unkown $response_id
     * @return Message
     */
    public function setResponse_id($response_id){
        $this->response_id = $response_id;
        return $this;
    }
    
    public function getNBUnseenMessagesForUser($userID){
        include $_SERVER ["DOCUMENT_ROOT"] . '/4sail/DB/dbConnect.php';
        $query = "SELECT COUNT(message_id) as msgCounter
            FROM message m 
            WHERE m.fk_user_to = ". $userID . " AND m.isResponse = 0 AND m.date_viewed IS NULL";
        $result = $conn->query ( $query );
        
      
        
        if ($result->num_rows > 0) {
            $localObjects = array ();
            while ( $row = $result->fetch_assoc () ) {
                $anObject = Array ();
                foreach ( $row as $aRowName => $aValue ) {
                    $anObject [$aRowName] = $aValue;
                }
                
                $localObjects = $anObject;
            }
            
            $conn->close ();
            return $localObjects['msgCounter'];
        }
        $conn->close ();
        return 0;
    }

    public function getMessageListForUser($userID) {
        include $_SERVER ["DOCUMENT_ROOT"] . '/4sail/DB/dbConnect.php';
        
        $internalAttributes = get_object_vars ( $this);
        
        $sql = "SELECT * FROM `" . $this->table_name . "`";
        
        
        $sql .= " WHERE fk_user_to =  ".$userID." ";
        
        $sql .= ' order by   COALESCE(date_viewed, 0) ASC, message_id DESC  ';
        
        
        
        $result = $conn->query ( $sql );
        
        if ($result->num_rows > 0) {
            $localObjects = array ();
            while ( $row = $result->fetch_assoc () ) {
                $anObject = Array ();
                $anObject ["primary_key"] = $this->primary_key;
                $anObject ["table_name"] = $this->table_name;
                foreach ( $row as $aRowName => $aValue ) {
                    $anObject [$aRowName] = $aValue;
                }
                
                $localObjects [$row [$this->primary_key]] = $anObject;
            }
            
            $conn->close ();
            return $localObjects;
        }
        $conn->close ();
        return null;
    }
    
    //NOT USED ANYMORE
    /*public function addMessageToDB() {
        $internalAttributes = get_object_vars ( $this );
        
        include $_SERVER ["DOCUMENT_ROOT"] . '/4sail/DB/dbConnect.php';
        
        $definition = "INSERT INTO `" . $this->table_name . "`";
        
        $attributes = " ( ";
        $values = " VALUES (";
        $lastElement = end ( $internalAttributes );
        $counter =0;
        
        foreach ( $internalAttributes as $rowName => $value ) {
            if ($rowName != "table_name" && $rowName != "primary_key") {
                
                $attributes .= "`" . $rowName . "`";
                if ($value == null) {
                    if($rowName  == 'date_sent'){
                        $values .= "CURRENT_TIMESTAMP";
                    }else if($rowName  == 'isResponse'){
                        $values .= "0";
                    }
                    else {
                        $values .= "NULL";
                    }
                   
                } else {
                    $values .= "'" . $value . "'";
                }
                
                if ((sizeof($internalAttributes)-1) > $counter) {
                    $attributes .= ",";
                    $values .= ",";
                }
            }
            $counter++;
        }
        
        $attributes .= " ) ";
        $values .= " ) ";
        
        $sql = $definition . $attributes . $values;
        
        $id = 0;
        
        if (! $result = $conn->query ( $sql )) {
            //echo $sql;
            echo " fail";
            exit ();
        } else {
            //echo "success";
            $id = mysqli_insert_id($conn);
        }
        
        $conn->close ();
        
        return $id;
    }*/

    /**
     * fk_item_id
     * @return unkown
     */
    public function getFk_item_id(){
        return $this->fk_item_id;
    }

    /**
     * fk_item_id
     * @param unkown $fk_item_id
     * @return Message
     */
    public function setFk_item_id($fk_item_id){
        $this->fk_item_id = $fk_item_id;
        return $this;
    }
    
    function addMessage(){
    	include $_SERVER ["DOCUMENT_ROOT"] . '/4sail/DB/dbConnect.php';
    	
    	$stmt = $conn->prepare("INSERT INTO message (message_id, fk_user_from, fk_user_to, object, messaged, date_sent, date_viewed, isResponse, response_id, fk_item_id) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    	$stmt->bind_param("iiissssiii", $message_id, $fk_user_from, $fk_user_to, $object, $messaged, $date_sent, $date_viewed, $isResponse, $response_id, $fk_item_id);
    	
    	$message_id = NULL;
    	$fk_user_from = $this->fk_user_from;
    	$fk_user_to = $this->fk_user_to;
    	$object = $this->object;
    	$messaged = $this->messaged;
    	$date_sent = $this->date_sent;
    	$date_viewed = NULL;
    	$isResponse = 0;
    	$response_id = NULL;
    	$fk_item_id = $this->fk_item_id;
    	
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

}
