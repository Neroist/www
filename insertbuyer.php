<?php
function insert_buyer($link, $email, $address){
	$insert_query = "INSERT INTO d2d.Buyers(email, address) VALUES ('$email', '$address');";
	$result = mysqli_query($link, $insert_query);

	if($result){
		return true;
	}
	else{
		$update_query = "UPDATE d2d.Buyers SET address = '$address' WHERE email ='$email';";
		$result2 = mysqli_query($link, $update_query);
		if($result2){
			return true;
		}
		else{
			return false;
		}
	}

}




?>