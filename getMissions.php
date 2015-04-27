<?php 
include("getpackages.php");
function getMissions($link, $driverID){

$missionsQuery = "SELECT * FROM d2d.Contracts WHERE driverID='$driverID';";
$result = mysqli_query($link, $missionsQuery);

if($result){
	if(!($result->num_rows===0)){
		echo "<th>Contract ID</th>";
		echo "<th>Seller address</th>";
		echo "<th>Seller email</th>";
		echo "<th>Buyer address</th>";
		echo "<th>Buyer email</th>";
		echo "<th>Packages included</th>";
		while($resultRow = mysqli_fetch_row($result)){
			$contractQuery = "SELECT * FROM d2d.Contracts WHERE contractID ='$resultRow[0]';";
			$contract = mysqli_query($link,$contractQuery);
			$contractRow = mysqli_fetch_row($contract);
			$sellerQuery = "SELECT * FROM d2d.Sellers WHERE email = '$contractRow[1]';";
			$seller = mysqli_query($link,$sellerQuery);
			$sellerRow = mysqli_fetch_row($seller);
			$buyerQuery ="SELECT * FROM d2d.Buyers WHERE email = '$contractRow[2]';";
			$buyer = mysqli_query($link,$buyerQuery);
			$buyerRow = mysqli_fetch_row($buyer);
			echo "<tr>";
			echo "<td>$resultRow[0]</td>"; #Contract ID
			echo "<td>$sellerRow[1]</td>"; #Seller Address
			echo "<td>$sellerRow[0]</td>"; #Seller Email
			echo "<td>$buyerRow[2]</td>"; #Buyer Adress
			echo "<td>$buyerRow[0]</td>"; #Buyer Email
			echo "<td>";
				getpackages($link, $resultRow[0]);
			echo "</td>";
			echo "</tr>";
		}
	}
	else echo "No active driving missions.";
}
}
?>