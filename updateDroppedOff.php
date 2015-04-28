<?php
function updateDroppedOff($link,$contractID){
	echo "slaskar har jfdsklaö";
		$dropoffQuery = "UPDATE d2d.Contracts SET droppedOff=now() WHERE ContractID='$contractID';";
		$result = mysqli_query($link,$dropoffQuery);
		if($result){
			return True;
		}
		else{
			return False;
		}
}