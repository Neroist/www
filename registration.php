<?php
function registration($link, $email, $password){
	$query = "INSERT INTO d2d.Users SET email='$email', password='$password';";
	$result = mysqli_query($link, $query);
	if($result){
		return true;
	}
	else{
		return false;
	}

}
?>