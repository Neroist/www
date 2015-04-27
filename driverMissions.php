<html>
<title>d2d Drivers page</title>
<?php 
include("header.php");
include("getMissions.php");
include("getAvailableMissions.php");
include("updatePickup.php");
include("updateDroppedOff.php");
$driverID = $_SESSION["driverID"];
$_SESSION["submitMission"]= "";
$slask = $_SESSION["submitMission"];
echo "You are logged in as driver number $driverID";
echo $slask;

if ($_SERVER["REQUEST_METHOD"] == "POST"){
	$chosen_empty = empty($_POST["submitMission"]);
	if (!($chosen_empty)){
		assignDriver($link,$driverID,$_POST["submitMission"]);
		$_POST["submitMission"]="";
		header("Location: driverMissions.php");
	}
	$pickup_empty = empty($_POST["picked_up"]);
	if (!($pickup_empty)){

		updatePickup($link,$_POST["picked_up"]);
		$_POST["picked_up"]="";
		header("Location: driverMissions.php");
	}
	$dropoff_empty = empty($_POST["dropped_off"]);
	if (!($dropoff_empty)){
		updateDroppedOff($link,$_POST["dropped_off"]);
		$_POST["dropped_off"]="";
		header("Location: driverMissions.php");
	}
}
//var_dump($_POST);
?>
<body>

<p>
<h3>Your active driving missions:</h3>
<table border="1">
	<tbody>
		<?php 
		getMissions($link, $driverID);
		?>
	</tbody>
</table>
</p>

<br>
<p>
<h3>Available driving missions:</h3>
<table border="1">
	<tbody>
		<?php 
		getAvailableMissions($link, $driverID);
		?>
	</tbody>
</table>
</p>

</p>



<p>
	<h3>Sign out and return to startpage?</h3>
	<a href="../index.php">Click here</a>
</p>

</body>
</html>