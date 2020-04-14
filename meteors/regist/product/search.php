<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Credentials: true");
header('Content-Type: application/json');

// include database and object files
// include_once '../config/database.php';
include_once '../objects/product.php';
$host = "localhost";
$dbname = "api_db";
$username = "root";
$password = "";

// $connection = mysqli_connect($host, $username, $password, $dbname);

$GLOBALS["___mysqli_ston"] = mysqli_connect($host, $username, $password, $dbname);
// $result = mysqli_query($GLOBALS["___mysqli_ston"],  $query) or die('<pre>' . ((is_object($GLOBALS["___mysqli_ston"])) ? mysqli_error($GLOBALS["___mysqli_ston"]) : (($___mysqli_res = mysqli_connect_error()) ? $___mysqli_res : false)) . '</pre>');


// if (!$connection) {
//     die("Connection Failed:" . mysqli_connect_error());
// }


// get database connection
// $database = new Database();
// $db = $database->getConnection();

// prepare product object
// $product = new Product($db);

// set ID property of record to read





// $product->id = isset($_GET['id']) ? $_GET['id'] : die();
// $id = $_GET['id'];
// $query = mysqli_query($connection, "SELECT name, description, price FROM products WHERE id = $id");




// read the details of product to be edited
// $product->readOne();
// if(isset($_GET['Submit'])){

//     // Retrieve data

//     $id = $_GET['id'];

//     $getid = "SELECT first_name, last_name FROM users WHERE user_id = '$id'";
//     $result = mysql_query($getid) or die('<pre>' . mysql_error() . '</pre>' );

//     $num = mysql_numrows($result);

//     $i = 0;

// }







// while ($row = mysqli_fetch_assoc($result)) {
//     // Get values
//     $first = $row["name"];
//     $last  = $row["description"];

//     // Feedback for end user
//     $html .= "<pre>ID: {$id}<br />First name: {$first}<br />Surname: {$last}</pre>";
// }

// mysqli_close($GLOBALS["___mysqli_ston"]);






// while ($data = mysqli_fetch_array($query)) {
//     echo "test";
//     echo $product->id;
//     echo $product->name;
//     echo $product->description;
//     echo $product->price;
//     echo $product->category_id;
//     echo $product->category_name;
// }




// if($product->name!=null){
//     // create array
//     $product_arr = array(
//         "id" =>  $product->id,
//         "name" => $product->name,
//         "description" => $product->description,
//         "price" => $product->price,
//         "category_id" => $product->category_id,
//         "category_name" => $product->category_name,
 
//     );


//     // $first = mysql_result($result,$i,"name");
//     // $last = mysql_result($result,$i,"category_ide");
    
//     // echo '<pre>';
//     // echo 'ID: ' . $product->id . '<br>Description ' . $product->description . '<br>category id: ' . $product->category_id;
//     // echo '</pre>';

//     // $i++;
 
//     // set response code - 200 OK
//     http_response_code(200);
 
//     // make it json format
//     echo json_encode($product_arr);
// }
 
// else{
//     // set response code - 404 Not found
//     http_response_code(404);
 
//     // tell the user product does not exist
//     echo json_encode(array("message" => "Product does not exist."));
// }


$id = $_REQUEST[ 'id' ];

	// Check database
	$query  = "SELECT * FROM products JOIN categories ON products.category_id = categories.id WHERE products.id_event = '$id';";
	
	$result = mysqli_query($GLOBALS["___mysqli_ston"],  $query ) or die( '<pre>' . ((is_object($GLOBALS["___mysqli_ston"])) ? mysqli_error($GLOBALS["___mysqli_ston"]) : (($___mysqli_res = mysqli_connect_error()) ? $___mysqli_res : false)) . '</pre>' );

	// Get results

	$categories_arr=array();
	$categories_arr["records"]=array();
	// ----------------------------------------------------new function
	while( $row = mysqli_fetch_assoc( $result ) ) {
		// Get values
		extract($row);
		$event = $row["event"];
		$price= $row["price"];
		$description  = $row["description"];

		// echo($event);
		// echo($price);
		// echo($description);

		// $var1 =json_encode($event);
		// $var2 =json_encode($price);
		// $var3 =json_encode($description);
		// Feedback for end user
		// $html .= "<pre>ID: {$id}<br />First name: {$first}<br />Surname: {$last}</pre>";

		// ---------------------------addd new function
		$category_item=array(
            "event" => $event,
            "price" => $price,
            "description" => html_entity_decode($description)
        );
 
		array_push($categories_arr["records"], $category_item);
		echo json_encode($categories_arr);
	}

	mysqli_close($GLOBALS["___mysqli_ston"]);