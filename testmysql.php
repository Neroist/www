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
	confirmedDeliv datetime,
	satisfaction int(1),
	settled datetime,
	shipPrice int,
	FOREIGN KEY (driverID) REFERENCES Drivers(driverID), #HasContract
	FOREIGN KEY (sEmail) REFERENCES Sellers(email), #Sells
	FOREIGN KEY (bEmail) REFERENCES Buyers(email));"; #Buys
mysqli_query($link,$contracttable);

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

$eventQuery ="CREATE EVENT d2d.settling ON SCHEDULE EVERY 40 SECOND DO UPDATE d2d.Contracts SET Settled=now() 
WHERE NOT ConfirmedDeliv IS NULL AND Settled IS NULL;";
mysqli_query($link,$eventQuery);
$triggerQuery="CREATE TRIGGER d2d.dAssignTime BEFORE UPDATE ON d2d.Contracts
    FOR EACH ROW
     BEGIN
         IF NOT NEW.driverID IS NULL AND OLD.driverID IS NULL THEN
             SET NEW.dAssigned = now();
         END IF;
     END;";
mysqli_query($link,$triggerQuery);



#### FOR TESTING ####

 $add = "INSERT INTO d2d.Users SET email='a@a.a', password='a';";
 mysqli_query($link,$add);

// $add = "INSERT INTO d2d.Users SET email='b@b.b', password='bbb';";
// mysqli_query($link,$add);

// $add = "INSERT INTO d2d.Users SET email='c@c.c', password='ccc';";
// mysqli_query($link,$add);

// $add = "INSERT INTO d2d.Users SET email='d@d.d', password='ddd';";
// mysqli_query($link,$add);

// $add = "INSERT INTO d2d.Sellers SET email='a@a.a', address='Gata A', bankaccount='444555666',bankrouting='112233';";
// mysqli_query($link,$add);

// $add = "INSERT INTO d2d.Sellers SET email='b@b.b', address='Stad B', bankaccount='456456456',bankrouting='445566';";
// mysqli_query($link,$add);

// $add = "INSERT INTO d2d.Buyers SET email='c@c.c', address='Ort C', creditcard='11111111111234';";
// mysqli_query($link,$add);

// $add = "INSERT INTO d2d.Buyers SET email='d@d.d', address='Landskap D', creditcard='22222222221234';";
// mysqli_query($link,$add);

// $add = "INSERT INTO d2d.Drivers SET driverID='1', bankacc='111234', bankrout='5678';";
// mysqli_query($link,$add);

// $add = "INSERT INTO d2d.Drivers SET driverID='2', bankacc='112345', bankrout='6789';";
// mysqli_query($link,$add);

// $add = "INSERT INTO d2d.Drivers SET driverID='3', bankacc='113456', bankrout='7890';";
// mysqli_query($link,$add); 

// $add ="INSERT INTO d2d.Contracts SET contractID='1',semail='a@a.a',bemail='c@c.c',opened=now(),signed=now(),paidFor=now(),dAssigned=now(),
// 		driverID='1',pickedUp=now(),droppedOff=now(),confirmedDeliv=now(),satisfaction=1;";
// mysqli_query($link,$add);


?>
