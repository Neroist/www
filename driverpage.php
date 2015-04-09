<html>
<title>d2d Driver page</title>
<body>

<p>
<h3>Enter here:</h3>

<?php//define variables...
$driverErr = $driverID = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
   if (empty($_POST["name"])) {
    $driverErr = "DriverID is required";
  } else {
    $driverID = $_POST["name"];
  
}?>


<!--<p><span class="error">* required field.</span></p>-->
<p><span class="error">* required field.</span></p>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> 
   DriverID: <input type="text" name="driverID">
<!--   <span class="error">* <?php echo $driverErr;?></span> -->
   <br><br>

   <input type="submit" name="submit" value="Submit"> 
</form>
<p>






Create driverID
</p>


<div>
	<p>
		Back to user page?
	</p>
	<a href="index.php">Back to main page</a>
</div>

</body>
</html>