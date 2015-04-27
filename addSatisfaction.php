<?php
function add_satisfaction($link, $contractID, $satisfaction){
	$update_query = "UPDATE d2d.Contracts SET satisfaction=$satisfaction WHERE contractID='$contractID';";
	$result = mysqli_query($link, $update_query);
	
	if($result){
		return true;
	}else{
		return false;
	}
}


?>