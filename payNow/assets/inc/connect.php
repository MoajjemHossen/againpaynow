<?php 

$hostName = "localhost";
$userName= "admin";
$password = "1234";
$dbName	  = "coding_server";

$dbConnect = mysqli_connect($hostName, $userName, $password, $dbName );

if ($dbConnect == false) {
	echo "<h1>Error Establesing!!!!</h1>";
}

 ?>
