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

$sellertable = "CREATE TABLE d2d.Sellers (
	email varchar(40) PRIMARY KEY,
	address varchar(80),
	bankaccount varchar(14),
	bankrouting varchar(6),
	FOREIGN KEY (email) REFERENCES Users.email);";
mysqli_query($link,$sellertable);

$buyertable = "CREATE TABLE d2d.Buyers (
	email varchar(40) PRIMARY KEY,
	creditcard char(16),
	address varchar(80),
	FOREIGN KEY (email) REFERENCES Users.email));";
mysqli_query($link,$buyertable);

$contracttable = "CREATE TABLE d2d.Contracts (
	contractID char(12) PRIMARY KEY,
	sEmail varchar(40),
	bEmail varchar(40),
	FOREIGN KEY (sEmail) REFERENCES Sellers.email),
	FOREIGN KEY (bEmail) REFERENCES Buyers.email));";
mysqli_query($link,$contracttable);

$packagetable = "CREATE TABLE d2d.Packages (
	packageID char(14) PRIMARY KEY,
	contractID char(12),
	contents varchar(40),
	height int,
	width int,
	length int,
	weight int,
	price int,
	FOREIGN KEY (contractID) REFERENCES Contracts.contractID));";
mysqli_query($link,$packagetable);

$drivertable = "CREATE TABLE d2d.Drivers (
	driverID char(10) PRIMARY KEY,
	bankacc varchar(14),
	bankrout varchar(6));";
mysqli_query($link,$drivertable);

$statustable = "CREATE TABLE d2d.contractStatus (
	contractID char(12) PRIMARY KEY,
	opened datetime,
	signed datetime,
	paidFor datetime,
	dAssigned datetime,
	driverID char(10),
	pickedUp datetime,
	droppedOff datetime,
	satisfaction int(1),
	settled datetime,
	FOREIGN KEY (contractID) REFERENCES Contracts.contractID);";
mysqli_query($link,$statustable);

?>
