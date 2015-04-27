<html>
<title>d2d Drivers page</title>
<?php 
include("header.php");
include("getMissions.php");
include("getAvailableMissions.php");
$driverID = $_SESSION["driverID"];
$_SESSION["submitMission"]= "";
$slask = $_SESSION["submitMission"];
echo "You are logged in as driver number $driverID";
echo $slask;
?>
<body>

<p>
<h3>Your active driving missions:</h3>
<table>
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
<table>
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