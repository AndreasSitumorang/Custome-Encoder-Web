<?php

$file = $_GET['page'];

function &PageGrab() {
	$returnArray = array(
		'body'            => '',
	);
	return $returnArray;
}

$page = PageGrab();

if( isset( $file ) )
	include( $file );
else {
	header( 'Location:?page=include.php' );
	exit;
}

?>