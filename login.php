<?php
function login($link, $email, $password){
	$query = "SELECT * FROM d2d.Users WHERE email='$email';";
	$result = mysqli_query($link,$query);

	if(!$result){
		return false;
	}
	$row = mysqli_fetch_row($result);
	if($row[1]===$password){
		return true;
	}
	else{
		return false;
	}



}
?>