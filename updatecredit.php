<?php
function update_credit($link, $email, $creditcard){
	$query = "UPDATE d2d.Buyers SET creditcard='$creditcard' WHERE email='$email';";
	$result = mysqli_query($link, $query);
	if($link->affected_rows){
		return true;
	}else{
		return false;
	}
}


?>

