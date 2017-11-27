<?php
require_once 'BaseModel.php';
class User extends BaseModel {
	protected $table_name = 'transaction';
	protected $primary_key = "user_id";
	protected $user_id= 0;
	

	protected $first_name= "";
	protected $last_name= "";
	protected $email= "";
	protected $password= "";
	protected $phone= 0;
	protected $address= "";
	protected $points= 0;


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

}