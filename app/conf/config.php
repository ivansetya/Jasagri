<?php

$db_server = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "jasagri";

$connection = new mysqli($db_server, $db_user, $db_pass, $db_name);
if($connection->connect_error){
	die("error");
}
?>