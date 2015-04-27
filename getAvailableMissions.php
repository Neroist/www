<?php
include("assignDriver.php");
function getAvailableMissions($link, $driverID){
$availableQuery = "SELECT * FROM d2d.Contracts WHERE driverID IS NULL AND NOT paidFor IS NULL;";
$result = mysqli_query($link, $availableQuery);

#echo $_SESSION["submitMission"];
if($result){
	if(!($result->num_rows ===0)){
		echo "<th>Contract ID </th>";
		echo "<th>Sellers address</th>";
		echo "<th>Buyers address</th>";
		while($resultRow =mysqli_fetch_row($result)){
			$contractQuery = "SELECT * FROM d2d.Contracts WHERE contractID ='$resultRow[0]';";
			$contract = mysqli_query($link,$contractQuery);
			$contractRow = mysqli_fetch_row($contract);
			$sellerQuery = "SELECT * FROM d2d.Sellers WHERE email = '$contractRow[1]';";
			$seller = mysqli_query($link,$sellerQuery);
			$sellerRow = mysqli_fetch_row($seller);
			$buyerQuery ="SELECT * FROM d2d.Buyers WHERE email = '$contractRow[2]';";
			$buyer = mysqli_query($link,$buyerQuery);
			$buyerRow = mysqli_fetch_row($buyer);

			$CID = $resultRow[0];
			echo "<tr>";
			?>
			<td><form method="post">
			<input type="submit" name="submitMission" value="<?php echo $CID;?>">
			</form></td>
			<?php
			#echo "<td>$CID</td>"; #Contract ID
			echo "<td>$sellerRow[1]</td>"; #Seller Address
			echo "<td>$buyerRow[2]</td>"; #Buyer Adress
			echo "</tr>";

		}
	}
		else echo "No driving missions are available at this time.";
}
}
?>