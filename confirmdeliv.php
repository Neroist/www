<?php
function confirm_deliv($link, $contractID){
	$update_query = "UPDATE d2d.Contracts SET confirmedDeliv=now() WHERE contractID='$contractID';";
	$result = mysqli_query($link, $update_query);
	if($result){
		return true;
	}else{
		return false;
	}
}


?>