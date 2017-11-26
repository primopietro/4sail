<?php
require_once 'BaseModel.php';
class Transaction extends BaseModel {
	protected $table_name = 'transaction';
	protected $primary_key = "trans_id";
	protected $trans_id= 0;
	
	protected $buy_user_id= 0;
	protected $product_id= 0;
	protected $sell_user_id= 0;
	protected $status_id= 0;
	
	


    /**
     * trans_id
     * @return unkown
     */
    public function getTrans_id(){
        return $this->trans_id;
    }

    /**
     * trans_id
     * @param unkown $trans_id
     * @return Transaction
     */
    public function setTrans_id($trans_id){
        $this->trans_id = $trans_id;
        return $this;
    }

    /**
     * buy_user_id
     * @return unkown
     */
    public function getBuy_user_id(){
        return $this->buy_user_id;
    }

    /**
     * buy_user_id
     * @param unkown $buy_user_id
     * @return Transaction
     */
    public function setBuy_user_id($buy_user_id){
        $this->buy_user_id = $buy_user_id;
        return $this;
    }

    /**
     * product_id
     * @return unkown
     */
    public function getProduct_id(){
        return $this->product_id;
    }

    /**
     * product_id
     * @param unkown $product_id
     * @return Transaction
     */
    public function setProduct_id($product_id){
        $this->product_id = $product_id;
        return $this;
    }

    /**
     * sell_user_id
     * @return unkown
     */
    public function getSell_user_id(){
        return $this->sell_user_id;
    }

    /**
     * sell_user_id
     * @param unkown $sell_user_id
     * @return Transaction
     */
    public function setSell_user_id($sell_user_id){
        $this->sell_user_id = $sell_user_id;
        return $this;
    }

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
     * @return Transaction
     */
    public function setStatus_id($status_id){
        $this->status_id = $status_id;
        return $this;
    }

}
