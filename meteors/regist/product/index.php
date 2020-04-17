<?php
// echo ("asd   sa");
// The page we wish to display
$file = $_GET['page'];

function &dvwaPageNewGrab() {
	$returnArray = array(
		'title'           => 'Damn Vulnerable Web Application (DVWA) v',
		'body'            => '',
	);
	return $returnArray;
}

$page = dvwaPageNewGrab();

if( isset( $file ) )
	include( $file );
else {
	header( 'Location:?page=include.php' );
	exit;
}

?>