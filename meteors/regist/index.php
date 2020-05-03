<?php 
if(isset($_POST['submit'])){

    $name =$_POST['name'];

    $url ="http://localhost/api/$name";

    $client=curl_exec($url);

}

?>