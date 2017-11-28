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

}
