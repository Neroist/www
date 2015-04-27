<?php 
include("getpackages.php");
function getpurchases($link, $useremail){
	$buyerquery = "SELECT * FROM d2d.Contracts WHERE bEmail='$useremail';";
	$result = mysqli_query($link, $buyerquery);
	$creditquery="SELECT * FROM d2d.Buyers WHERE email = '$useremail';";
	$result2 = mysqli_query($link, $creditquery);

	if($result2){
		if($result2->num_rows===0){
			echo "You aren't part of a contract as a buyer.";
		}
		else {
			$row = $result2->fetch_assoc();
			if(is_null($row["creditcard"])){
				echo "Go back and enter a credit card number!";
			}
			else{
				if($result){
					if(!($result->num_rows ===0)){
						echo"<th>Contract ID</th>";
						echo"<th>Seller's email</th>";
						echo"<th>Packages</th>";
						echo"<th>Signed</th>";
						echo"<th>Payment</th>";
						echo"<th>Driver</th>";
						echo"<th>Picked up</th>";
						echo"<th>Dropped off</th>";
						echo"<th>Confirm deliv</th>";
						echo"<th>Settled</th>";
						
						
						while($row = mysqli_fetch_assoc($result)){
							$query = "SELECT * FROM d2d.Contracts WHERE contractID = $row[contractID];";
							$row2 = mysqli_fetch_assoc(mysqli_query($link, $query));
							$is_signed = !is_null($row2["signed"]);
							if($is_signed){
								$is_signed = !is_null($row2["signed"]);
								$is_paid = !is_null($row2["paidFor"]);
								$has_driver =!is_null($row2["dAssigned"]);
								$picked_up =!is_null($row2["pickedUp"]);
								$dropped_off = !is_null($row2["droppedOff"]);
								$confirmed_deliv =!is_null($row2["confirmedDeliv"]);
								$is_settled =!is_null($row2["settled"]);
								echo "<tr>";
									echo "<td>$row[contractID]</td>";
									echo "<td>$row[sEmail]</td>";
									echo "<td>";
										getpackages($link, $row["contractID"]);
									echo "</td>";
									if(!$is_signed){
										echo "-";
									}else{
										echo"<td>Signed at $row[signed]!</td>";
									}
									if(!$is_paid){
										echo "<td><form method='POST'> <button type='submit' name='paid' value='$row[contractID]'>Pay</button></td>";
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
										if($dropped_off){
											echo "<td><form method='POST'> <button type='submit' name='confirm' value='$row[contractID]'>Pay</button></td>";
										}
										else{
											echo "<td>-</td>";
										}
									}else{
										echo"<td>Paid for at $row[paidFor]!</td>";
									}
									if(!$is_settled){
										echo "<td>-</td>";
									}else{
										echo"<td>Settled at $row[settled]!</td>";
									}


								echo "</tr>";
							}
						}
					}
					else{
						echo "No active purchases.";
					}

		}
			}

		}

	}
}
?>