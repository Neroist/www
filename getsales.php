<?php 
include("getpackages.php");
function getsales($link, $useremail){
	$buyerquery = "SELECT * FROM d2d.Contracts WHERE sEmail='$useremail';";
	$result = mysqli_query($link, $buyerquery);
	
	
	if($result){
		if(!($result->num_rows===0)){
			echo"<th>Contract ID</th>";
			echo"<th>Buyer's email</th>";
			echo"<th>Packages</th>";
			echo"<th>ShipPrice</th>";
			echo"<th>Signed</th>";
			echo"<th>Payment</th>";
			echo"<th>Driver</th>";
			echo"<th>Picked up</th>";
			echo"<th>Dropped off</th>";
			echo"<th>Confirm deliv</th>";
			echo"<th>Settled</th>";
			echo"<th>Satisfaction</th>";
			while($row = mysqli_fetch_assoc($result)){
				
				$shipprice = $row["shipPrice"];
				$is_signed = !is_null($row["signed"]);
				$is_paid = !is_null($row["paidFor"]);
				$has_driver =!is_null($row["dAssigned"]);
				$picked_up =!is_null($row["pickedUp"]);
				$dropped_off = !is_null($row["droppedOff"]);
				$confirmed_deliv =!is_null($row["confirmedDeliv"]);
				$is_settled =!is_null($row["settled"]);
				$has_satisfaction = !is_null($row["satisfaction"]);
				echo "<tr>";
					echo "<td>$row[contractID]</td>";
					echo "<td>$row[bEmail]</td>";
					echo "<td>";
					getpackages($link, $row["contractID"]);
					echo "<td>$shipprice kr</td>";	
					echo "</td>";
				if(!$is_signed){
					echo "<td>-</td>";
				}else{
					echo"<td>Signed at $row[signed]!</td>";
				}
				if(!$is_paid){
					echo "<td>-</td>";
				}else{
					echo"<td>Paid for at $row[paidFor]!</td>";
				}
				if(!$has_driver){
					echo "<td>-</td>";
				}else{
					echo"<td>Driver assigned at $row[dAssigned]!</td>";
				}
				if(!$picked_up){
					echo "<td>-</td>";
				}else{
					echo"<td>Picked up at $row[pickedUp]!</td>";
				}
				if(!$dropped_off){
					echo "<td>-</td>";
				}else{
					echo"<td>Dropped off at $row[droppedOff]!</td>";
				}
				if(!$confirmed_deliv){
					
						echo "<td>-</td>";
					
				}else{
					echo"<td>Confirmed delivery at $row[confirmedDeliv]!</td>";
				}
				if(!$is_settled){
					echo "<td>-</td>";
				}else{
					echo"<td>Settled at $row[settled]!</td>";
				}
				if(!$has_satisfaction)
					echo "<td>-</td>";
				else{
					echo "<td>$row[satisfaction]</td>";
				}
						
				echo "</tr>";
			}
		}
		else{
			echo "No active sales.";
		}

	}
}
?>