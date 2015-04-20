<?php 
$link = mysqli_connect('localhost','root',''); 
if (!$link) { 
	die('Could not connect to MySQL: ' . mysqli_error($link)); 
} 
echo 'Connection OK'; #mysqli_close($link);

$dbase = "CREATE DATABASE d2d;";
mysqli_query($link,$dbase);


$usertable = "CREATE TABLE IF NOT EXISTS d2d.Users (
	email varchar(40) PRIMARY KEY,
	password varchar(15));";
mysqli_query($link,$usertable);

$sellertable = "CREATE TABLE IF NOT EXISTS d2d.Sellers (
	email varchar(40) PRIMARY KEY,
	address varchar(80),
	bankaccount varchar(14),
	bankrouting varchar(6),
	FOREIGN KEY (email) REFERENCES Users(email));"; #Isa
mysqli_query($link,$sellertable);

$buyertable = "CREATE TABLE IF NOT EXISTS d2d.Buyers (
	email varchar(40) PRIMARY KEY, #(Zero or one) to (zero or one)
	creditcard char(16),
	address varchar(80));";
mysqli_query($link,$buyertable);

$packagetable = "CREATE TABLE IF NOT EXISTS d2d.Packages (
	packageID int PRIMARY KEY,
	contractID int,
	contents varchar(40),
	height int,
	width int,
	length int,
	weight int,
	price int,
	FOREIGN KEY (contractID) REFERENCES Contracts(contractID));"; #IsPartOf
mysqli_query($link,$packagetable);

$drivertable = "CREATE TABLE IF NOT EXISTS d2d.Drivers (
	driverID int PRIMARY KEY,
	bankacc varchar(14),
	bankrout varchar(6));";
mysqli_query($link,$drivertable);

$contracttable = "CREATE TABLE IF NOT EXISTS d2d.Contracts (
	contractID int PRIMARY KEY,
	sEmail varchar(40),
	bEmail varchar(40),
	opened datetime,
	signed datetime,
	paidFor datetime,
	dAssigned datetime,
	driverID int,
	pickedUp datetime,
	droppedOff datetime,
	satisfaction int(1),
	settled datetime,
	FOREIGN KEY (driverID) REFERENCES Drivers(driverID), #HasContract
	FOREIGN KEY (sEmail) REFERENCES Sellers(email), #Sells
	FOREIGN KEY (bEmail) REFERENCES Buyers(email));"; #Buys
mysqli_query($link,$contracttable);


#### FOR TESTING ####

// $add = "INSERT INTO d2d.Users SET email='a@a.a', password='aaa';
// mysqli_query($link,$add);

// $add = "INSERT INTO d2d.Users SET email='s@s.s', password='sss';
// mysqli_query($link,$add);

// $add = "INSERT INTO d2d.Users SET email='d@d.d', password='ddd';
// mysqli_query($link,$add);

// $add = "INSERT INTO d2d.Users SET email='f@f.f', password='fff';
// mysqli_query($link,$add);

// $add = "INSERT INTO d2d.Sellers (email, address, bankaccount, bankrouting) VALUES ('apa@slask.se', 'borhärjaha 1234 5 tr', '1234567890abcd', 'rout01' );";
// mysqli_query($link,$add);

// $add = "INSERT INTO d2d.Buyers (email, creditcard, address) VALUES ('tut@slask.se', '0987654321123456','gatanmanborpå 45 staden 68 tr');";
// mysqli_query($link,$add);

// $add = "INSERT INTO d2d.Contracts (contractID, sEmail, bEmail) VALUES ('1', 'apa@slask.se','tut@slask.se');";
// mysqli_query($link,$add);


//INSERT INTO Contracts (contractID, sEmail, bEmail) VALUES ('2', 'apa@slask.se','tut@slask.se');
//INSERT INTO ContractStatus (contractID, opened, signed, paidFor, dAssigned, driverID, pickedUp, droppedOff, satisfaction, settled) VALUES ('2',Null,Null,Null,Null,Null,Null,Null,Null,Null);


// $add = "INSERT INTO d2d.Drivers (driverID, bankacc, bankrout) VALUES ('1','12345678901234','123456');";
// mysqli_query($link,$add);

// $add = "INSERT INTO d2d.ContractStatus (contractID, opened, signed, paidFor, dAssigned, driverID, pickedUp, droppedOff, satisfaction, settled) VALUES ('1',Null,Null,Null,Null,'1',Null,Null,Null,Null);";
// mysqli_query($link,$add);

?>
