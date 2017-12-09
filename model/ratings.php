<?php
require_once 'BaseModel.php';
class Ratings extends BaseModel {
	protected $table_name = 'ratings';
	protected $primary_key = "id_rating";
	protected $id_rating = 0;
	

	protected $id_rater = 0;
	protected $id_rated = 0;
	protected $rating = 0;


    /**
     * id_rating
     * @return INT
     */
    public function getId_rating(){
        return $this->id_rating;
    }

    /**
     * id_rating
     * @param INT $id_rating
     * @return User
     */
    public function setId_rating($id_rating){
        $this->id_rating = $id_rating;
        return $this;
    }

    /**
     * id_rater
     * @return INT
     */
    public function getId_rater(){
        return $this->id_rater;
    }

    /**
     * id_rater
     * @param INT $id_rater
     * @return User
     */
    public function setId_rater($id_rater){
        $this->id_rater = $id_rater;
        return $this;
    }

    /**
     * id_rated
     * @return INT
     */
    public function getId_rated(){
        return $this->id_rated;
    }

    /**
     * id_rated
     * @param INT $id_rated
     * @return User
     */
    public function setId_rated($id_rated){
        $this->id_rated = $id_rated;
        return $this;
    }

    /**
     * rating
     * @return TINYINT
     */
    public function getRating(){
        return $this->rating;
    }

    /**
     * rating
     * @param TINYINT $rating
     * @return User
     */
    public function setRating($rating){
        $this->rating = $rating;
        return $this;
    }

}
