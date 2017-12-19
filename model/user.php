<?php
require_once 'BaseModel.php';
class User extends BaseModel {
	protected $table_name = 'user';
	protected $primary_key = "user_id";
	protected $user_id= 0;
	

	protected $first_name= "";
	protected $last_name= "";
	protected $email= "";
	protected $password= "";
	protected $phone= 0;
	protected $address= "";
	protected $points= 0;
	protected $rating = 0;


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
     * @return User
     */
    public function setUser_id($user_id){
        $this->user_id = $user_id;
        return $this;
    }

    /**
     * first_name
     * @return unkown
     */
    public function getFirst_name(){
        return $this->first_name;
    }

    /**
     * first_name
     * @param unkown $first_name
     * @return User
     */
    public function setFirst_name($first_name){
        $this->first_name = $first_name;
        return $this;
    }

    /**
     * last_name
     * @return unkown
     */
    public function getLast_name(){
        return $this->last_name;
    }

    /**
     * last_name
     * @param unkown $last_name
     * @return User
     */
    public function setLast_name($last_name){
        $this->last_name = $last_name;
        return $this;
    }

    /**
     * email
     * @return unkown
     */
    public function getEmail(){
        return $this->email;
    }

    /**
     * email
     * @param unkown $email
     * @return User
     */
    public function setEmail($email){
        $this->email = $email;
        return $this;
    }

    /**
     * password
     * @return unkown
     */
    public function getPassword(){
        return $this->password;
    }

    /**
     * password
     * @param unkown $password
     * @return User
     */
    public function setPassword($password){
        $this->password = $password;
        return $this;
    }

    /**
     * phone
     * @return unkown
     */
    public function getPhone(){
        return $this->phone;
    }

    /**
     * phone
     * @param unkown $phone
     * @return User
     */
    public function setPhone($phone){
        $this->phone = $phone;
        return $this;
    }

    /**
     * address
     * @return unkown
     */
    public function getAddress(){
        return $this->address;
    }

    /**
     * address
     * @param unkown $address
     * @return User
     */
    public function setAddress($address){
        $this->address = $address;
        return $this;
    }

    /**
     * points
     * @return unkown
     */
    public function getPoints(){
        return $this->points;
    }

    /**
     * points
     * @param unkown $points
     * @return User
     */
    public function setPoints($points){
        $this->points = $points;
        return $this;
    }
    
    /**
     * rating
     * @return unkown
     */
    public function getRating(){
    	return $this->rating;
    }
    
    /**
     * rating
     * @param unkown $rating
     * @return User
     */
    public function setRating($rating){
    	$this->rating = $rating;
    	return $this;
    }
    
    function addAccount(){
    	$internalAttributes = get_object_vars ( $this );
    	
    	include $_SERVER ["DOCUMENT_ROOT"] . '/4sail/DB/dbConnect.php';
    	
    	$stmt = $conn->prepare("INSERT INTO user (user_id, first_name, last_name, email, password, phone, address, points, rating) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
    	
    	$stmt->bind_param("issssssid", $user_id, $first_name, $last_name, $email, $password, $phone, $address, $points, $rating);
    	
    	$user_id = NULL;
    	$first_name = $this->first_name;
    	$last_name = $this->last_name;
    	$email = $this->email;
    	$password = $this->password;
    	$phone = $this->phone;
    	$address = $this->address;
    	$points = $this->points;
    	$rating = $this->rating;
    	
    	$stmt->execute();          
    	$id = mysqli_insert_id($conn);
    	if($id != 0){
    		echo "success";
    	}
    	
    	$stmt->close (); 
    	$conn->close ();
    	
    	return $id;
    }
    
    function updateAccount(){
        include $_SERVER ["DOCUMENT_ROOT"] . '/4sail/DB/dbConnect.php';
        $internalAttributes = get_object_vars ( $this );
        
        $stmt = $conn->prepare("UPDATE `user` SET `first_name` = ?, `last_name` = ?, `email` = ?, `password` = ?, `phone` = ?, `address` = ?, `points` = ?, `rating` = ?  WHERE `user_id` = ?");
        
      
        $stmt->bind_param("ssssssidi", $first_name, $last_name, $email, $password, $phone, $address, $points, $rating, $user_id);
       
        $user_id = $this->user_id;;
        $first_name = $this->first_name;
        $last_name = $this->last_name;
        $email = $this->email;
        $password = $this->password;
        $phone = $this->phone;
        $address = $this->address;
        $points = $this->points;
        $rating = $this->rating;
        
        $stmt->execute();
        $id = mysqli_insert_id($conn);
        if($id != 0){
            echo "success";
        }
        
        $stmt->close ();
        $conn->close ();
        
        return $id;
    }
    
    function updatePoints(){
        include $_SERVER ["DOCUMENT_ROOT"] . '/4sail/DB/dbConnect.php';
        $internalAttributes = get_object_vars ( $this );
        
        $stmt = $conn->prepare("UPDATE `user` SET  `points` = ?  WHERE `user_id` = ?");
        
        
        $stmt->bind_param("ii",$points, $user_id);
        
        $user_id = $this->user_id;;
       
        $points = $this->points;
        
        
        $stmt->execute();
        $id = mysqli_insert_id($conn);
        if($id != 0){
            echo "success";
        }
        
        $stmt->close ();
        $conn->close ();
        
        return $id;
    }
    
    function updateRating(){
        include $_SERVER ["DOCUMENT_ROOT"] . '/4sail/DB/dbConnect.php';
        $internalAttributes = get_object_vars ( $this );
        
        $stmt = $conn->prepare("UPDATE `user` SET  `rating` = ?  WHERE `user_id` = ?");
        
        
        $stmt->bind_param("di",$rating, $user_id);
        
         $user_id = $this->user_id;;
        
         $rating = $this->rating;
        
        
        $stmt->execute();
        $id = mysqli_insert_id($conn);
        if($id != 0){
            echo "success";
        }
        
        $stmt->close ();
        $conn->close ();
        
        return $id;
    }
    
    function getUser($id)
    {
        include $_SERVER["DOCUMENT_ROOT"] . '/4sail/DB/dbConnect.php';
        
        $internalAttributes = get_object_vars($this);
        
        $stmt = $conn->prepare("SELECT * FROM `user` WHERE `user_id` = ?");
        $stmt->bind_param("i", $id);
        
        $stmt->execute();
        
        $stmt->bind_result($user_id, $first_name, $last_name, $email, $password, $phone, $address, $points, $rating);
        
        $localObjects = array();
        
        while ($stmt->fetch()) {
            
            $anObject = Array();
            $anObject["primary_key"] = $this->primary_key;
            $anObject["table_name"] = $this->table_name;
            
            $anObject["user_id"] = $user_id;
            $anObject["first_name"] = $first_name;
            $anObject["last_name"] = $last_name;
            $anObject["email"] = $email;
            $anObject["password"] = $password;
            $anObject["phone"] = $phone;
            $anObject["address"] = $address;
            $anObject["points"] = $points;
            $anObject["rating"] = $rating;
           
            
            
            $localObjects+= $anObject;
        }
        /*
         * echo "<pre>";
         * print_r($localObjects);
         * echo "</pre>";
         */
        return $localObjects;
    }
    
    function getUserWhere($email, $pass)
    {
    	include $_SERVER["DOCUMENT_ROOT"] . '/4sail/DB/dbConnect.php';
    	
    	
    	$stmt = $conn->prepare("SELECT * FROM `user` WHERE `email` = ? AND `password` = ?");
    	$stmt->bind_param("ss", $email, $pass);
    	
    	$stmt->execute();
    	
    	$stmt->bind_result($user_id, $first_name, $last_name, $email_result, $password_result, $phone, $address, $points, $rating);
    	
    	$localObjects = array();
    	
    	while ($stmt->fetch()) {
    		
    		$anObject = Array();
    		$anObject["primary_key"] = $this->primary_key;
    		$anObject["table_name"] = $this->table_name;
    		
    		$anObject["user_id"] = $user_id;
    		$anObject["first_name"] = $first_name;
    		$anObject["last_name"] = $last_name;
    		$anObject["email"] = $email_result;
    		$anObject["password"] = $password_result;
    		$anObject["phone"] = $phone;
    		$anObject["address"] = $address;
    		$anObject["points"] = $points;
    		$anObject["rating"] = $rating;
    		
    		
    		
    		$localObjects+= $anObject;
    	}
    	
    	 
    	return $localObjects;
    }

}
