
<?php 
function generate_contract($link, $sEmail){
	$max_query = "SELECT ifnull(MAX(contractID),0) FROM d2d.Contracts;";
	$result1 = mysqli_query($link, $max_query);
	$new = $result1->fetch_row()[0]+1;
	$query = "INSERT INTO d2d.Contracts SET contractID=$new, sEmail='$sEmail', opened=now();";
	$result2 = mysqli_query($link, $query);
	return $new;
}

?>

