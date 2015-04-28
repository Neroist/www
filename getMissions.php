<?php 
include("getpackages.php");
function getMissions($link, $driverID){

$missionsQuery = "SELECT * FROM d2d.Contracts WHERE driverID='$driverID';";
$result = mysqli_query($link, $missionsQuery);

if($result){
	if(!($result->num_rows ===0)){
		echo"<th>Contract ID</th>";
		echo"<th>Seller's email</th>";
		echo"<th>Packages</th>";
		//echo"<th>ShipPrice</th>";
		//echo"<th>Signed</th>";
		//echo"<th>Payment</th>";
		echo"<th>Mission taken (DRIVER)</th>";
		echo"<th>Picked up</th>";
		echo"<th>Dropped off</th>";
		echo"<th>Confirm deliv</th>";
		echo"<th>Settled</th>";
		echo"<th>Satisfaction</th>";
		
		while($row = mysqli_fetch_assoc($result)){
			
			$is_signed = !is_null($row["signed"]);
			if($is_signed){
				//$shipPrice=$row["shipPrice"];
				//$is_paid = !is_null($row["paidFor"]);
				$has_driver =!is_null($row["dAssigned"]);
				$picked_up =!is_null($row["pickedUp"]);
				$dropped_off = !is_null($row["droppedOff"]);
				$confirmed_deliv =!is_null($row["confirmedDeliv"]);
				$is_settled =!is_null($row["settled"]);
				$has_satisfaction = !is_null($row["satisfaction"]);
				echo "<tr>";
					echo "<td>$row[contractID]</td>";
					echo "<td>$row[sEmail]</td>";
					echo "<td>";
						getpackages($link, $row["contractID"]);
					echo "</td>";
					//echo "<td>$shipPrice</td>";


					if(!$has_driver){
						echo "<td>-</td>";
					}else{
						echo"<td>Mission taken at $row[dAssigned]!</td>";
					}
					//if(!$picked_up){
						//echo "<td>Här ska det bli en knapp</td>";
					if(!$picked_up){
						echo "<td><form method='POST'> <button type='submit' name='picked_up' value='$row[contractID]'>Pick up</button></form></td>";
					}else{
						echo"<td>Picked up at $row[pickedUp]!</td>";
					}
					if(!$dropped_off){
						if ($picked_up){
							echo "<td><form method='POST'> <button type='submit' name='dropped_off' value='$row[contractID]'>Drop off</button></form></td>";
						}
						else{
							echo "<td>-</td>";
						}
					}else{
						echo"<td>Dropped off at $row[droppedOff]!</td>";
					}
					if(!$confirmed_deliv){
						echo "<td>-</td>";
					}else{
						echo"<td>Confirmed at $row[confirmedDeliv]!</td>";
					}
					if(!$is_settled){
						echo "<td>-</td>";
					}else{
						echo"<td>Settled at $row[settled]!</td>";
					}
					if(!$has_satisfaction){
						echo "<td>-</td>";
						}
					else{
						echo "<td>$row[satisfaction]</td>";
					}
				echo "</tr>";
			}
		}
	}
	else{
		echo "No active purchases.";
	}

}




// if($result){
// 	if(!($result->num_rows===0)){
// 		echo "<th>Contract ID</th>";
// 		echo "<th>Seller address</th>";
// 		echo "<th>Seller email</th>";
// 		echo "<th>Buyer address</th>";
// 		echo "<th>Buyer email</th>";
// 		echo "<th>Packages included</th>";
// 		while($resultRow = mysqli_fetch_row($result)){
// 			$contractQuery = "SELECT * FROM d2d.Contracts WHERE contractID ='$resultRow[0]';";
// 			$contract = mysqli_query($link,$contractQuery);
// 			$contractRow = mysqli_fetch_row($contract);
// 			$sellerQuery = "SELECT * FROM d2d.Sellers WHERE email = '$contractRow[1]';";
// 			$seller = mysqli_query($link,$sellerQuery);
// 			$sellerRow = mysqli_fetch_row($seller);
// 			$buyerQuery ="SELECT * FROM d2d.Buyers WHERE email = '$contractRow[2]';";
// 			$buyer = mysqli_query($link,$buyerQuery);
// 			$buyerRow = mysqli_fetch_row($buyer);
// 			echo "<tr>";
// 			echo "<td>$resultRow[0]</td>"; #Contract ID
// 			echo "<td>$sellerRow[1]</td>"; #Seller Address
// 			echo "<td>$sellerRow[0]</td>"; #Seller Email
// 			echo "<td>$buyerRow[2]</td>"; #Buyer Adress
// 			echo "<td>$buyerRow[0]</td>"; #Buyer Email
// 			echo "<td>";
// 				getpackages($link, $resultRow[0]);
// 			echo "</td>";
// 			echo "</tr>";
// 		}
// 	}
//	else echo "No active driving missions.";
//}
}
?>