<?php 
$link = mysqli_connect('localhost','root',''); 
if (!$link) { 
	die('Could not connect to MySQL: ' . mysqli_error($link)); 
} 
echo 'Connection OK'; #mysqli_close($link);

$dbase = "CREATE DATABASE d2d;";
mysqli_query($link,$dbase);


$usertable = "CREATE TABLE secure_login.Users (
	email varchar(40) PRIMARY KEY,
	password varchar(15));";

function tutak($hej){

	echo $hej;
}



?>
