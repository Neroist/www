<?php 
include("getpackages.php");
function getsales($link, $useremail){
	$buyerquery = "SELECT * FROM d2d.Contracts WHERE sEmail='$useremail';";
	$result = mysqli_query($link, $buyerquery);
	if($result){
		if(!($result->num_rows===0)){
			echo"<th>Contract ID</th>";
			echo"<th>Buyer's email</th>";
			echo"<th>Packages in contract</th>";
			while($row = mysqli_fetch_row($result)){
				echo "<tr>";
					echo "<td>$row[0]</td>";
					echo "<td>$row[2]</td>";
					echo "<td>";
					getpackages($link, $row[0]);
					echo "</td>";
				echo "</tr>";
			}
		}
		else{
			echo "No active sales.";
		}

	}
}
?>