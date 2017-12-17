<?php
require_once 'BaseModel.php';
class Referral extends BaseModel {
	protected $table_name = 'referral';
	protected $primary_key = "id";
	protected $id = 0;
	protected $ref_link = '';
	protected $item_id= 0;
	protected $ref_user_id = 0;
	protected $sell_user_id = 0;
	




    /**
     * id
     * @return unkown
     */
    public function getId(){
        return $this->id;
    }

    /**
     * id
     * @param unkown $id
     * @return Referral
     */
    public function setId($id){
        $this->id = $id;
        return $this;
    }

    /**
     * ref_link
     * @return unkown
     */
    public function getRef_link(){
        return $this->ref_link;
    }

    /**
     * id
     * @param unkown $id
     * @return Referral
     */
    public function setRef_link($ref_link){
        $this->ref_link = $ref_link;
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
     * @return Referral
     */
    public function setItem_id($item_id){
        $this->item_id = $item_id;
        return $this;
    }

    /**
     * ref_user_id
     * @return unkown
     */
    public function getRef_user_id(){
        return $this->ref_user_id;
    }

    /**
     * ref_user_id
     * @param unkown $ref_user_id
     * @return Referral
     */
    public function setRef_user_id($ref_user_id){
        $this->ref_user_id = $ref_user_id;
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
     * @return Referral
     */
    public function setSell_user_id($sell_user_id){
        $this->sell_user_id = $sell_user_id;
        return $this;
    }

    function getRefByToken($token) {
        include $_SERVER ["DOCUMENT_ROOT"] . '/4sail/DB/dbConnect.php';

        $internalAttributes = get_object_vars ( $this );


        $sql = "SELECT * FROM referral WHERE ref_link = '" .$token ."'";
        //echo $sql." ";
        $result = $conn->query ( $sql );

        if ($result->num_rows > 0) {
            $anObject = Array ();
            while ( $row = $result->fetch_assoc () ) {
                $anObject ["primary_key"] = $this->primary_key;
                $anObject ["table_name"] = $this->table_name;
                foreach ( $row as $aRowName => $aValue ) {
                    $anObject [$aRowName] = $aValue;
                    $this->$aRowName = $aValue;
                }
            }
            $conn->close ();
            return $anObject;
        }
        $conn->close ();
        return null;
    }
    
    function addRef(){
    	include $_SERVER ["DOCUMENT_ROOT"] . '/4sail/DB/dbConnect.php';
    	
    	$stmt = $conn->prepare("INSERT INTO referral (id, item_id, ref_user_id, sell_user_id, ref_link) VALUES (?, ?, ?, ?, ?)");
    	$stmt->bind_param("iiiis", $id, $item_id, $ref_user_id, $sell_user_id, $ref_link);
    	
    	$id = NULL;
    	$item_id= $this->item_id;
    	$ref_user_id = $this->ref_user_id;
    	$sell_user_id = $this->sell_user_id;
    	$ref_link = $this->ref_link;
    	
    	$stmt->execute();
    	$id_insert = mysqli_insert_id($conn);
    	
    	/*echo "<pre>";
    	 print_r($stmt);
    	 echo "</pre>";*/
    	
    	if($id_insert!= 0){
    		echo "success";
    	}
    	
    	$stmt->close ();
    	$conn->close ();
    	
    	return $id_insert;
    }

}
