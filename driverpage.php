<html>
<head>
<title>d2d Driver page</title>
</head>
<body>

<?php
$driverErr=$driverID="";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if ($ema=empty($_POST["driverID"])) {
   #if empty($_POST["name"]) {
    $driverErr = "DriverID is required";
  } else {
    $driverID = $_POST["name"];}
  }
?>

<h2>Enter here:</h2>


<p><span class="error">* required field.</span></p>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> 
  DriverID: <input type="text" name="driverID"></input>
  <span class="error">* <?php echo $driverErr;?></span>
  <br><br>

  <input type="submit" name="submit" value="Submit"> 
</form>

<p>

<a href="createDriverID.php">Create driverID</a>
</p>


<div>
	<a href="index.php">Back to main page</a>
</div>

</body>
</html>