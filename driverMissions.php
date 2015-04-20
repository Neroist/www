<html>
<title>d2d Drivers page</title>
<?php 
include("header.php");
include("getMissions.php");
include("getAvailableMissions.php");
$driverID = $_SESSION["driverID"];
echo "You are logged in as driver number $driverID";
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

<br><br><br><br><br>
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


"A bunch of sql stuff" 
Här skall man kunna välja ett(!) uppdrag att plocka.
</p>



<p>
	<h3>Sign out and return to startpage?</h3>
	<a href="../index.php">Click here</a>
</p>

</body>
</html>