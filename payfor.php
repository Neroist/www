<?php
function payfor($link, $contractID){
	$update_query = "UPDATE d2d.Contracts SET paidFor=now() WHERE contractID='$contractID';";
	$result = mysqli_query($link, $update_query);
	if($result){
		return true;
	}else{
		return false;
	}
}


?>