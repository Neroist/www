<?php
function availableMissions($link, $driverID){
$availableQuery = "SELECT * FROM d2d.ContractStatus WHERE driverID IS NULL;";
$result = mysqli_query($link, $availableQuery);

if($result){
	if(!($result->num_rows ===0)){
		echo "<th>Contract ID </th>";
		echo "<th>Sellers address</th>";
		echo "<th>Buyers address</th>";
		#echo "<th>Number of packages</th>";
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
			#$packagesQuery = "SELECT * FROM d2d.Packages WHERE contractID = '$contractRow[0];";
			#$packages = mysqli_query($link,$packagesQuery);
			#$numPack = mysqli_num_rows($packages);
			#$packageslask = mysqli_num_rows ($packages);
			#$packagesRow = mysqli_fetch_row($packages);
			echo "<tr>";
			echo "<td>$resultRow[0]</td>"; #Contract ID
			echo "<td>$sellerRow[1]</td>"; #Seller Address
			echo "<td>$buyerRow[2]</td>"; #Buyer Adress
			#echo "<td>$packagesRow[0]</td>"; #Amount of packages
			echo "</tr>";

		}
	}
}
}
?>