
<?php
require_once 'BaseModel.php';

class Item extends BaseModel
{

    protected $table_name = 'item';

    protected $primary_key = "item_id";

    protected $item_id = 0;

    protected $item_cat = 0;

    protected $item_title = "";

    protected $item_price = 0;

    protected $item_desc = "";

    protected $item_keywords = "";

    protected $user_id = 0;

    protected $points = 0;

    protected $link = NULL;

    protected $sold = 0;

    protected $date_created = "";

    /**
     * item_id
     * 
     * @return unkown
     */
    public function getItem_id()
    {
        return $this->item_id;
    }

    /**
     * item_id
     * 
     * @param unkown $item_id
     * @return Item
     */
    public function setItem_id($item_id)
    {
        $this->item_id = $item_id;
        return $this;
    }

    /**
     * sold
     * 
     * @return unkown
     */
    public function getSold()
    {
        return $this->sold;
    }

    /**
     * item_id
     * 
     * @param unkown $sold
     * @return sold
     */
    public function setSold($sold)
    {
        $this->sold = $sold;
        return $this;
    }

    /**
     * link
     * 
     * @return unkown
     */
    public function getLink()
    {
        return $this->link;
    }

    /**
     * link
     * 
     * @param unkown $link
     * @return Item
     */
    public function setLink($link)
    {
        $this->link = $link;
        return $this;
    }

    /**
     * item_cat
     * 
     * @return unkown
     */
    public function getItem_cat()
    {
        return $this->item_cat;
    }

    /**
     * item_cat
     * 
     * @param unkown $item_cat
     * @return Item
     */
    public function setItem_cat($item_cat)
    {
        $this->item_cat = $item_cat;
        return $this;
    }

    /**
     * item_title
     * 
     * @return unkown
     */
    public function getItem_title()
    {
        return $this->item_title;
    }

    /**
     * item_title
     * 
     * @param unkown $item_title
     * @return Item
     */
    public function setItem_title($item_title)
    {
        $this->item_title = $item_title;
        return $this;
    }

    /**
     * item_price
     * 
     * @return unkown
     */
    public function getItem_price()
    {
        return $this->item_price;
    }

    /**
     * item_price
     * 
     * @param unkown $item_price
     * @return Item
     */
    public function setItem_price($item_price)
    {
        $this->item_price = $item_price;
        return $this;
    }

    /**
     * item_desc
     * 
     * @return unkown
     */
    public function getItem_desc()
    {
        return $this->item_desc;
    }

    /**
     * item_desc
     * 
     * @param unkown $item_desc
     * @return Item
     */
    public function setItem_desc($item_desc)
    {
        $this->item_desc = $item_desc;
        return $this;
    }

    /**
     * item_keywords
     * 
     * @return unkown
     */
    public function getItem_keywords()
    {
        return $this->item_keywords;
    }

    /**
     * item_keywords
     * 
     * @param unkown $item_keywords
     * @return Item
     */
    public function setItem_keywords($item_keywords)
    {
        $this->item_keywords = $item_keywords;
        return $this;
    }

    /**
     * user_id
     * 
     * @return unkown
     */
    public function getUser_id()
    {
        return $this->user_id;
    }

    /**
     * user_id
     * 
     * @param unkown $user_id
     * @return Item
     */
    public function setUser_id($user_id)
    {
        $this->user_id = $user_id;
        return $this;
    }

    /**
     * points
     * 
     * @return unkown
     */
    public function getPoints()
    {
        return $this->points;
    }

    /**
     * points
     * 
     * @param unkown $points
     * @return Item
     */
    public function setPoints($points)
    {
        $this->points = $points;
        return $this;
    }

    public function getItemListForUser($userID)
    {
        include $_SERVER["DOCUMENT_ROOT"] . '/4sail/DB/dbConnect.php';
        
        $internalAttributes = get_object_vars($this);
        
        $sql = "SELECT * FROM `" . $this->table_name . "`";
        
        $sql .= " WHERE user_id =  " . $userID . "  order by sold ASC, item_id ASC ";
        
        $result = $conn->query($sql);
        
        if ($result->num_rows > 0) {
            $localObjects = array();
            while ($row = $result->fetch_assoc()) {
                $anObject = Array();
                $anObject["primary_key"] = $this->primary_key;
                $anObject["table_name"] = $this->table_name;
                foreach ($row as $aRowName => $aValue) {
                    $anObject[$aRowName] = $aValue;
                }
                
                $localObjects[$row[$this->primary_key]] = $anObject;
            }
            
            $conn->close();
            return $localObjects;
        }
        $conn->close();
        return null;
    }

    /**
     * date_created
     * 
     * @return unkown
     */
    public function getDate_created()
    {
        return $this->date_created;
    }

    /**
     * date_created
     * 
     * @param unkown $date_created
     * @return Item
     */
    public function setDate_created($date_created)
    {
        $this->date_created = $date_created;
        return $this;
    }

    function addItem()
    {
        include $_SERVER["DOCUMENT_ROOT"] . '/4sail/DB/dbConnect.php';
        
        $stmt = $conn->prepare("INSERT INTO item (item_id, item_cat, item_title, item_price, item_desc, item_keywords, user_id, date_created, points, link, sold) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("iisissisisi", $item_id, $item_cat, $item_title, $item_price, $item_desc, $item_keywords, $user_id, $date_created, $points, $link, $sold);
        
        $item_id = NULL;
        $item_cat = $this->item_cat;
        $item_title = $this->item_title;
        $item_price = $this->item_price;
        $item_desc = $this->item_desc;
        $item_keywords = $this->item_keywords;
        $user_id = $this->user_id;
        $date_created = $this->date_created;
        $points = $this->points;
        $link = $this->link;
        $sold = $this->sold;
        
        $stmt->execute();
        $id = mysqli_insert_id($conn);
        
        if ($id != 0) {
            echo "success";
        }
        
        $stmt->close();
        $conn->close();
        
        return $id;
    }

    function updateItem()
    {
        include $_SERVER["DOCUMENT_ROOT"] . '/4sail/DB/dbConnect.php';
        
        $stmt = $conn->prepare("UPDATE `item` SET `item_cat` = ?, `item_title` = ?, `item_price` = ?, `item_desc` = ?, `item_keywords` = ?, `points` = ?, `link` = ?, `sold` = ? WHERE `item_id` = ?");
        $stmt->bind_param("isissisii", $item_cat, $item_title, $item_price, $item_desc, $item_keywords, $points, $link, $sold, $item_id);
        
        $item_id = $this->item_id;
        $item_cat = $this->item_cat;
        $item_title = $this->item_title;
        $item_price = $this->item_price;
        $item_desc = $this->item_desc;
        $item_keywords = $this->item_keywords;
        $user_id = $this->user_id;
        $date_created = $this->date_created;
        $points = $this->points;
        $link = $this->link;
        $sold = $this->sold;
        
        $stmt->execute();
        $id = mysqli_insert_id($conn);
        
        if ($id != 0) {
            echo "success";
        }
        
        $stmt->close();
        $conn->close();
        
        return $id;
    }

    function updateSold()
    {
        include $_SERVER["DOCUMENT_ROOT"] . '/4sail/DB/dbConnect.php';
        $internalAttributes = get_object_vars($this);
        
        $stmt = $conn->prepare("UPDATE `item` SET `sold` = ?  WHERE `item_id` = ?");
        
        $stmt->bind_param("ii", $sold, $item_id);
        
        $item_id = $this->item_id;
        
        $sold = $this->sold;
        
        $stmt->execute();
        $id = mysqli_insert_id($conn);
        if ($id != 0) {
            echo "success";
        }
        
        $stmt->close();
        $conn->close();
        
        return $id;
    }

    function getItem($id)
    {
        include $_SERVER["DOCUMENT_ROOT"] . '/4sail/DB/dbConnect.php';
        
        $internalAttributes = get_object_vars($this);
        
        $stmt = $conn->prepare("SELECT * FROM `item` WHERE `item_id` = ?");
        $stmt->bind_param("i", $id);
        
        $stmt->execute();
        
        $stmt->bind_result($item_id, $item_cat, $item_title, $item_price, $item_desc, $item_keywords, $user_id,  $date_created, $points, $link,$sold);
        
        $localObjects = array();
        
        while ($stmt->fetch()) {
            
            $anObject = Array();
            $anObject["primary_key"] = $this->primary_key;
            $anObject["table_name"] = $this->table_name;
            
            $anObject["item_id"] = $item_id;
            $anObject["item_cat"] = $item_cat;
            $anObject["item_title"] = $item_title;
            $anObject["item_price"] = $item_price;
            $anObject["item_desc"] = $item_desc;
            $anObject["item_keywords"] = $item_keywords;
            $anObject["user_id"] = $user_id;
            $anObject["points"] = $points;
            $anObject["link"] = $link;
            $anObject["sold"] = $sold;
            $anObject["date_created"] = $date_created;
            
            $localObjects += $anObject;
        }
        /*
         * echo "<pre>";
         * print_r($localObjects);
         * echo "</pre>";
         */
        return $localObjects;
    }
    

    function getItemsForUser($idUser)
    {
        include $_SERVER["DOCUMENT_ROOT"] . '/4sail/DB/dbConnect.php';
        
        $internalAttributes = get_object_vars($this);
        
        $stmt = $conn->prepare("SELECT * FROM `item` WHERE `user_id` = ?");
        $stmt->bind_param("i", $idUser);
        
        $stmt->execute();
        
        $stmt->bind_result($item_id, $item_cat, $item_title, $item_price, $item_desc, $item_keywords, $user_id,  $date_created, $points, $link,$sold);
        
        $localObjects = array();
        
        while ($stmt->fetch()) {
            
            $anObject = Array();
            $anObject["primary_key"] = $this->primary_key;
            $anObject["table_name"] = $this->table_name;
            
            $anObject["item_id"] = $item_id;
            $anObject["item_cat"] = $item_cat;
            $anObject["item_title"] = $item_title;
            $anObject["item_price"] = $item_price;
            $anObject["item_desc"] = $item_desc;
            $anObject["item_keywords"] = $item_keywords;
            $anObject["user_id"] = $user_id;
            $anObject["points"] = $points;
            $anObject["link"] = $link;
            $anObject["sold"] = $sold;
            $anObject["date_created"] = $date_created;
            
            $localObjects[$item_id] = $anObject;
        }
        /*
         * echo "<pre>";
         * print_r($localObjects);
         * echo "</pre>";
         */
        return $localObjects;
    }

    function getListOfAllDBObjectsWhereSortPrice($priceTo,$priceFrom, $orderBy, $orderSense, $search, $keyword) {
        include $_SERVER ["DOCUMENT_ROOT"] . '/4sail/DB/dbConnect.php';
        $isSearch = false;
        $internalAttributes = get_object_vars ( $this);
        $keyword2 = $keyword;
        $sql = "SELECT * FROM `" . $this->table_name . "`";


        $sql .= " WHERE item_price < ? AND item_price > ? AND sold !=1 ";


        //search things
        if($search == 'active' && $keyword !==null){
            echo '<div>Results for "'.$keyword.'".</div>';
            $sql .= "AND (item_keywords LIKE CONCAT('%',?,'%') OR item_title LIKE CONCAT('%',?,'%') ) ";
            $isSearch = true;
        }

        //order things
        if($this->table_name == "item" && $orderBy == null && $orderSense == null){
            $sql .= 'order by points DESC, item_id DESC';
        }
        elseif($this->table_name == "item" && $orderBy == 'price' && $orderSense == 'DESC'){
            $sql .= 'order by points DESC, item_price DESC';
        }
        elseif($this->table_name == "item" && $orderBy == 'price' && $orderSense == 'ASC'){
            $sql .= 'order by points DESC, item_price ASC';
        }
        //echo $sql;

        $stmt = $conn->prepare($sql);

        if ($isSearch == true) {
            $stmt->bind_param("iiss", $priceTo, $priceFrom, $keyword, $keyword2);
        }else{
            $stmt->bind_param("ii", $priceTo, $priceFrom);
        }


        $stmt->execute();
        $result = $stmt->get_result();
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


    function getListOfAllDBObjectsWhereSortCat($cat, $orderBy, $orderSense, $search, $keyword) {
        include $_SERVER ["DOCUMENT_ROOT"] . '/4sail/DB/dbConnect.php';
        $isSearch = false;
        $internalAttributes = get_object_vars ( $this);
        $keyword2 = $keyword;
        $sql = "SELECT * FROM `" . $this->table_name . "`";


        $sql .= " WHERE item_cat = ? AND sold !=1 ";


        //search things
        if($search == 'active' && $keyword !==null){
            echo '<div>Results for "'.$keyword.'".</div>';
            $sql .= "AND (item_keywords LIKE CONCAT('%',?,'%') OR item_title LIKE CONCAT('%',?,'%') ) ";
            $isSearch = true;
        }

        //order things
        if($this->table_name == "item" && $orderBy == null && $orderSense == null){
            $sql .= 'order by points DESC, item_id DESC';
        }
        elseif($this->table_name == "item" && $orderBy == 'price' && $orderSense == 'DESC'){
            $sql .= 'order by points DESC, item_price DESC';
        }
        elseif($this->table_name == "item" && $orderBy == 'price' && $orderSense == 'ASC'){
            $sql .= 'order by points DESC, item_price ASC';
        }
        //echo $sql;

        $stmt = $conn->prepare($sql);

        if ($isSearch == true) {
            $stmt->bind_param("iss", $cat, $keyword, $keyword2);
        }else{
            $stmt->bind_param("i", $cat);
        }


        $stmt->execute();
        $result = $stmt->get_result();
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


    function getListOfAllDBObjectsWhereSortCatPrice($priceTo,$priceFrom,$cat, $orderBy, $orderSense, $search, $keyword) {
        include $_SERVER ["DOCUMENT_ROOT"] . '/4sail/DB/dbConnect.php';
        $isSearch = false;
        $internalAttributes = get_object_vars ( $this);
        $keyword2 = $keyword;
        $sql = "SELECT * FROM `" . $this->table_name . "`";


        $sql .= " WHERE item_price < ? AND item_price > ? AND item_cat = ? AND sold !=1 ";


        //search things
        if($search == 'active' && $keyword !==null){
            echo '<div>Results for "'.$keyword.'".</div>';
            $sql .= "AND (item_keywords LIKE CONCAT('%',?,'%') OR item_title LIKE CONCAT('%',?,'%') ) ";
            $isSearch = true;
        }

        //order things
        if($this->table_name == "item" && $orderBy == null && $orderSense == null){
            $sql .= 'order by points DESC, item_id DESC';
        }
        elseif($this->table_name == "item" && $orderBy == 'price' && $orderSense == 'DESC'){
            $sql .= 'order by points DESC, item_price DESC';
        }
        elseif($this->table_name == "item" && $orderBy == 'price' && $orderSense == 'ASC'){
            $sql .= 'order by points DESC, item_price ASC';
        }
        //echo $sql;

        $stmt = $conn->prepare($sql);

        if ($isSearch == true) {
            $stmt->bind_param("iiiss", $priceTo, $priceFrom, $cat, $keyword, $keyword2);
        }else{
            $stmt->bind_param("iii", $priceTo, $priceFrom,$cat);
        }


        $stmt->execute();
        $result = $stmt->get_result();
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
    


}
