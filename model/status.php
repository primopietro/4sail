<?php
require_once 'BaseModel.php';
class Status extends BaseModel {
	protected $table_name = 'status';
	protected $primary_key = "status_id";
	protected $status_id= 0;
	
	protected $status_name= 0;
	




    /**
     * status_id
     * @return unkown
     */
    public function getStatus_id(){
        return $this->status_id;
    }

    /**
     * status_id
     * @param unkown $status_id
     * @return Status
     */
    public function setStatus_id($status_id){
        $this->status_id = $status_id;
        return $this;
    }

    /**
     * status_name
     * @return unkown
     */
    public function getStatus_name(){
        return $this->status_name;
    }

    /**
     * status_name
     * @param unkown $status_name
     * @return Status
     */
    public function setStatus_name($status_name){
        $this->status_name = $status_name;
        return $this;
    }

}
