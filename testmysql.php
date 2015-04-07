<?php 
$link = mysqli_connect('localhost','root',''); 
if (!$link) { 
	die('Could not connect to MySQL: ' . mysqli_error($link)); 
} 
echo 'Connection OK'; #mysqli_close($link);
$sql = "CREATE TABLE secure_login.Users (
	userId int,
	email varchar(40) PRIMARY KEY,
	password varchar(15));";

if(mysqli_query($link, $sql)){
	echo "tut";
}else{
	echo "macarena";
}

?>
