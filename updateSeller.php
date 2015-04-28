<?php
function update_seller($link, $email, $bankrouting, $bankaccount, $address){
	$update_query=" UPDATE d2d.Sellers SET address='$address', bankaccount='$bankaccount', bankrouting='$bankrouting'
						WHERE email='$email';";
	$result=mysqli_query($link, $update_query);
	if($result){
		return true;
	}else{
		return false;
	}
}

?>