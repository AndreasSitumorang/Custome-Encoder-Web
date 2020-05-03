<?php
class Product{
    // database connection and table name
    private $conn;
    private $table_name = "products";

    // object properties
    public $id;
    public $name;
    public $description;
    public $price;
    public $category_id;
    public $category_name;
    public $created;


    public function __construct($db)
    {
        $this->conn = $db;
    }

       // search products
       function search($keywords)
       {
           $host = "localhost";
           $dbname = "api_db3";
           $username = "root";
           $password = "";
   
   
           $GLOBALS["___mysqli_ston"] = mysqli_connect($host, $username, $password, $dbname);
   
   
           if ($id = $_REQUEST['id']) {  
   

       $query  = "SELECT name, description, price FROM products WHERE id = '$id';";
       $result = mysqli_query($GLOBALS["___mysqli_ston"],  $query) or die('<pre>' . ((is_object($GLOBALS["___mysqli_ston"])) ? mysqli_error($GLOBALS["___mysqli_ston"]) : (($___mysqli_res = mysqli_connect_error()) ? $___mysqli_res : false)) . '</pre>');
   
        
       while ($row = mysqli_fetch_assoc($result)) {
            
           $first = $row["name"];
           $last  = $row["description"];
           $price = $row["price"];
   
           $products_arr=array(
                           "name" => $first,
                           "price" => $price,
                           "description" => $last,
                            
                       );
   
           http_response_code(200);
   
            echo json_encode($products_arr);
       }
   
       mysqli_close($GLOBALS["___mysqli_ston"]);
   } 
   else {
        http_response_code(404);
   
        echo json_encode(
           array("message" => "No products found.")
       );
   }
   
   

       }


}
