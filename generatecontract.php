
<?php 
function generate_contract($link, $sEmail){
	$max_query = "SELECT MAX(contractID) FROM d2d.Contracts;";
	$result1 = mysqli_query($link, $max_query);
	$max = $result1->fetch_row()[0];
	$query = "INSERT INTO d2d.Contracts SET ContractId=$max+1, sEmail='$sEmail', opened=now();";
	$result2 = mysqli_query($link, $query);
	
	return $max+1;
}

?>