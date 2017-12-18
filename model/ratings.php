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
    
    function addRating(){
    	include $_SERVER ["DOCUMENT_ROOT"] . '/4sail/DB/dbConnect.php';
    	
    	$stmt = $conn->prepare("INSERT INTO ratings (id_rating, id_rater, id_rated, rating) VALUES (?, ?, ?, ?)");
    	$stmt->bind_param("iiii", $id_rating, $id_rater, $id_rated, $rating);
    	
    	$id_rating = NULL;
    	$id_rater = $this->id_rater;
    	$id_rated = $this->id_rated;
    	$rating = $this->rating;
    	
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

    function updateRating(){
        include $_SERVER ["DOCUMENT_ROOT"] . '/4sail/DB/dbConnect.php';
        $internalAttributes = get_object_vars ( $this );
        
        $stmt = $conn->prepare("UPDATE `ratings` SET  `rating` = ?  WHERE `id_rating` = ?");
        
        
        $stmt->bind_param("ii",$rating, $id_rating);
        
         $id_rating = $this->id_rating;;
        
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
}
