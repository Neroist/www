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
			echo"<th>Shipping total</th>";
			while($row = mysqli_fetch_row($result)){
				$ship_query = "SELECT shipPrice FROM d2d.Contracts WHERE contractID=$row[0];";
				$result2= mysqli_query($link, $ship_query);
				$row2=mysqli_fetch_row($result2);
				$shipprice = $row2[0];
				
				echo "<tr>";
					echo "<td>$row[0]</td>";
					echo "<td>$row[2]</td>";
					echo "<td>";
					getpackages($link, $row[0]);
					echo "<td>$shipprice kr</td>";	
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