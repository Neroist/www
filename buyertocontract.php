<?php
function buyer_to_contract($link, $bEmail, $contractID){
	$update_query = "UPDATE d2d.Contracts SET bEmail='$bEmail' WHERE contractID=$contractID;";
	$result = mysqli_query($link, $update_query);
	if($result){
		return true;
	}else{
		return false;
	}
}
?>