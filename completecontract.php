<?php
include("header.php");
$contractID= $_SESSION["contractID"];
$confirm_query = "UPDATE d2d.Contracts SET signed =now() WHERE contractID='$contractID';";
if(mysqli_query($link, $confirm_query)){
	echo"asd";
}else{
	echo "apa";
}
$_SESSION["contractID"]="";
header("Location: userpage.php");

?>