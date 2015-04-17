<html>
<title>d2d Create DriverID</title>
<body>

<h2>Create new driver ID by clicking button below</h2>
<?php
$link = mysqli_connect("localhost","root","");
$get_max_query ="SELECT max(driverID) FROM d2d.Drivers;";
$slask = mysqli_query($link, $get_max_query);
$tut = mysqli_fetch_row($slask);


$bankAccErr=$bankRoutErr=$bankAcc=$bankRout="";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
   if ($ema=empty($_POST["bankAcc"])) {
     $regemailErr = "Enter bank account";
   } else {
     $bankAcc = $_POST["bankAcc"];
   }
   
   if ($pas=empty($_POST["bankRout"])) {
     $bankRoutErr = "Enter bank routing number";
   } else {
     $bankRout = $_POST["bankRout"];
   }
}
?>
<h2>REGISTRERA HÄR OM DU ÄR EN ANVÄNDARE</h2>
<p><span class="error">* required field.</span></p>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> 
   <span class="error">* <?php echo $bankAccErr;?></span>
   <br><br>
   <span class="error">* <?php echo $bankRoutErr;?></span>
   <br><br>
   <input type="submit" name="submit" value="Submit"> 
</form>
<p>

	<p>
		<?php echo $tut[0]+1?>
	</p>
		
</body>
</html>