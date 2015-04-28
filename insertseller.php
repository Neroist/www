<?php
function insert_seller($link, $email){
	$insert_query="INSERT INTO d2d.Sellers SET email='$email';";
	$result= mysqli_query($link, $insert_query);
	if($result){
		return true;
	}
	else{
		return false;
	}
}
?>