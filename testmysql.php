<?php 
$link = mysqli_connect('localhost','root',''); 
if (!$link) { 
	die('Could not connect to MySQL: ' . mysqli_error($link)); 
} 
echo 'Connection OK'; #mysqli_close($link);

$dbase = "CREATE DATABASE d2d;";
mysqli_query($link,$dbase);


$usertable = "CREATE TABLE d2d.Users (
	email varchar(40) PRIMARY KEY,
	password varchar(15));";
mysqli_query($link,$usertable);

//$buyertable = "CREATE TABLE d2d.Buyers (
//	)
$slask = 3;

$contracttable = "CREATE TABLE d2d.Contract (
	)"



?>
