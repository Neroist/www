<html>
<head>
<?php 
include("../functions/header.php");
?>
<title>d2d Driver page</title>
</head>
<body>

<?php
$_SESSION["driverID"] = "";
$driverErr=$driverID="";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $ema=empty($_POST["driverID"]);
  if ($ema) {
    $driverErr = "DriverID is required. Must be a number.";
  } else {
    $driverID = $_POST["driverID"];
    $loginquery = "SELECT DriverID FROM d2d.Drivers WHERE DriverID = '$driverID';"; 
    $logincheck = mysqli_query($link, $loginquery);
    $driverInfo = mysqli_fetch_row($logincheck);
    if ($driverID = $driverInfo[0]) {
      $_SESSION["driverID"]=$driverID;
      header("Location: driverpages/drivermissions.php");
    }
    else {
      echo "Invalid DriverID";
    }
  }
}
?>

<h2>Enter your driver IDhere:</h2>

<p><span class="error">* required field.</span></p>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> 
  DriverID: <input type="number" name="driverID"></input>
  <span class="error">* <?php echo $driverErr;?></span>
  <br><br>

  <input type="submit" name="submit" value="Submit"> 
</form>

<p>

<a href="createDriverID.php">Create driverID</a>
</p>


<div>
	<a href="../index.php">Back to main page</a>
</div>

</body>
</html>

