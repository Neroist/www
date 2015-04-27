<?php
function updatePickup($link,$contractID){
	echo "slaskar har jfdsklaö";
		$pickupQuery = "UPDATE d2d.Contracts SET pickedUp=now() WHERE ContractID='$contractID';";
		$result = mysqli_query($link,$pickupQuery);
		if($result){
			return True;
		}
		else{
			return False;
		}
}