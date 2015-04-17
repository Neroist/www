<?php 
function getpurchases($link, $useremail){
$buyerquery = "SELECT * FROM d2d.Contracts WHERE bEmail='$useremail';";
$result = mysqli_query($link, $buyerquery);



if($result){
	if(!$result->num_rows ===0){
		echo"<th>Contract ID</th>";
		echo"<th>Seller's email</th>";
		while($row = mysqli_fetch_row($result)){
			echo "<tr>";
			echo "<td>$row[0]</td>";
			echo "<td>$row[1]</td>";
			echo "</tr>";
		}
	}
	else{
		echo "No active purchases.";
	}

}
}
?>