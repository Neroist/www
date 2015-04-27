<?php 
function assignDriver($link, $DriverID,$chosen){
		$assignQuery = "UPDATE d2d.Contracts SET DriverID='$DriverID' WHERE ContractID='$chosen';";
		$result = mysqli_query($link,$assignQuery);
		$assignTime = "UPDATE d2d.Contracts SET dAssigned=now() WHERE ContractID='$chosen';";
		mysqli_query($link,$assignTime);
		if ($result){
			return true;
		}
		else{
			return false;
		}
	}
?>
