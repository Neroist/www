<?php

function insert_seller($link, $email, $bankrouting, $bankaccount, $address){
	$insert_query="INSERT INTO d2d.Sellers SET email='$email', address='$address', bankaccount='$bankaccount', bankrouting='$bankrouting';";
	$result= mysqli_query($link, $insert_query);
	if($result){

		return true;
	}else{
		$update_query=" UPDATE d2d.Sellers 
						SET address='$address', bankaccount='$bankaccount', bankrouting='$bankrouting'
						WHERE email='$email';";
		$result2=mysqli_query($link, $update_query);
		if($result2){
			return true;
		}else{
			return false;
		}
	}
}
?>
