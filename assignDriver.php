<?php 
function assignDriver($link, $DriverID,$chosen){
		$assignQuery = "UPDATE d2d.Contracts SET DriverID='$DriverID' WHERE ContractID='$chosen';";
		$result = mysqli_query($link,$assignQuery);
		if ($result){
			$_POST["submitMission"]="";
			header("Location: driverMissions.php");
		}
		
	}
?>
