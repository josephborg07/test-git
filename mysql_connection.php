<?php
$server="localhost";
$user="root";
$password="";
$db="test";
$conn=mysqli_connect($server, $user, $password, $db);

if(mysqli_connect_errno()){
	echo "MYSQL connection not established";
}
?>