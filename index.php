<!DOCTYPE HTML> 
<html>
<head>

<title>d2d</title>
</head>
<body style="background-color:#abcdef"> 
<?php
$regemailErr=$regpassErr = "";
$regemail=$regpassword="";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
   if ($ema=empty($_POST["regemail"])) {
     $regemailErr = "Email is required";
   } else {
     $regemail = $_POST["regemail"];
   }
   
   if ($pas=empty($_POST["regpassword"])) {
     $regpassErr = "Password is required";
   } else {
     $regpassword = $_POST["regpassword"];
   }
}
?>
<h2>REGISTRERA HÄR OM DU ÄR EN ANVÄNDARE</h2>
<p><span class="error">* required field.</span></p>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> 
   E-mail: <input type="email" name="regemail">
   <span class="error">* <?php echo $regemailErr;?></span>
   <br><br>
   Password: <input type="password" name="regpassword"></input>
   <span class="error">* <?php echo $regpassErr;?></span>
   <br><br>
   <input type="submit" name="submit" value="Submit"> 
</form>
<p>
  <?php
  echo "<h2>Your Input:</h2>";
  echo $regemail;
  echo "<br>";
  echo $regpassword;
  echo "<br>";
  ?>
</p>

<?php
$emailErr=$passErr = "";
$email=$password="";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
   if ($ema=empty($_POST["email"])) {
     $emailErr = "Email is required";
   } else {
     $email = $_POST["email"];
   }
   
   if ($pas=empty($_POST["password"])) {
     $passErr = "Password is required";
   } else {
     $password = $_POST["password"];
   }
}
?>
<p>
  <h2>Redan registrerad? Titta här.</h2>
  <form method="post" action="userpage.php"> 
   E-mail: <input type="email" name="email">
   <span class="error">* <?php echo $emailErr;?></span>
   <br><br>
   Password: <input type="password" name="password"></input>
   <span class="error">* <?php echo $passErr;?></span>
   <br><br>
   <input type="submit" name="submit" value="Submit"> 

</p>
	<h2>Titta här om du är en drajver</h2>
	<a href="driverpage.php">Click</a>
</p>
</body>
</html>