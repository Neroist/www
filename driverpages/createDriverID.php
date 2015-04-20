<html>
<head>
<?php
include("../functions/header.php");
include("../functions/getavailablemissions.php");
?>
<title>d2d Create DriverID</title>
<body>

<h2>Create new driver ID by clicking button below</h2>
<?php

$bankAccErr=$bankRoutErr="";
$bankAcc=$bankRout="";
$message = $DID="";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $acc=empty($_POST["bankAcc"]);
  $rout=empty($_POST["bankRout"]);
  
  if ($acc) {
   $bankAccErr = "Enter bank account";
  } else {
   $bankAcc = $_POST["bankAcc"];
  }
  
  if ($rout) {
   $bankRoutErr = "Enter bank routing number";
  } else {
   $bankRout = $_POST["bankRout"];
  }
  if($bankAcc and $bankRout){
   $get_max_query ="SELECT max(driverID) FROM d2d.Drivers;";
   $max_check = mysqli_query($link, $get_max_query);
   $max_value = mysqli_fetch_row($max_check);
   $DID = $max_value[0]+1;
   $create_DID ="INSERT INTO d2d.Drivers SET driverID='$DID', bankacc='$bankAcc', bankrout='$bankRout';";
   if (mysqli_query($link,$create_DID)){
    $message = "Your new DriverID is ";
   }
  }
}
?>
<h2>REGISTRERA HÄR OM DU VILL KÖRA</h2>
<p><span class="error">* required field.</span></p>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> 
   Bank Account: <input type="number" name="bankAcc" maxlength="14">
   <span class="error">* <?php echo $bankAccErr;?></span>
   <br><br>
   Bank Routing number: <input type="number" name="bankRout" maxlength="6"></input>
   <span class="error">* <?php echo $bankRoutErr;?></span>
   <br><br>
   <input type="submit" name="submit" value="Submit"> 
</form>

<?php
echo $message,$DID;
?>
<br><br>

<a href="driverLogin.php">Back to Driver login</a>


		
</body>
</html>