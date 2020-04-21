<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Credentials: true");
header('Content-Type: application/json');

// include_once '../objects/product.php';
$host = "localhost";
$dbname = "api_db";
$username = "root";
$password = "";

$html ="";
 
$GLOBALS["___mysqli_ston"] = mysqli_connect($host, $username, $password, $dbname);

$event = $_GET['event'];

	// Check database
	$query  = "SELECT price, event FROM products JOIN categories ON products.category_id = categories.id WHERE products.id_event = $event;";
	$result = mysqli_query($GLOBALS["___mysqli_ston"],  $query ) or die('<pre>' . mysqli_error($GLOBALS["___mysqli_ston"]) . '</pre>' );
	// $result = mysqli_query($GLOBALS["___mysqli_ston"],  $query ) or die( '<pre>' . ((is_object($GLOBALS["___mysqli_ston"])) ? mysqli_error($GLOBALS["___mysqli_ston"]) : (($___mysqli_res = mysqli_connect_error()) ? $___mysqli_res : false)) . '</pre>' );

	$categories_arr=array();
	$categories_arr["records"]=array();
	// ----------------------------------------------------new function
	while( $row = mysqli_fetch_assoc( $result ) ) {
		// Get values
		extract($row);
		// $event = $row["event"];
		$price= $row["price"];
		$category_name  = $row["event"];
	
		$category_item=array(
            "event" => $event,
            "price" => $price,
            // "category_name" => html_entity_decode($category_name)
        );
 
		array_push($categories_arr["records"], $category_item);
				// Feedback for end user
		// $html .= "<pre>ID: {$id}<br />First name: {$event}<br />Surname: {$description}</pre>";
	}

	echo json_encode($categories_arr);

	mysqli_close($GLOBALS["___mysqli_ston"]);