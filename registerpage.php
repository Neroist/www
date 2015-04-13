<html>
<title>d2d Register page</title>
<?php 
	$link = mysqli_connect("localhost","root","");
?>
<body style="background-color:#abcdef">



	<?php
		$success = "";
		$regemailErr=$regpassErr = "";
		$regemail=$regpassword="";
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
		  $regema=empty($_POST["regemail"]);
		  $regpas=empty($_POST["regpassword"]);
		  if($regema or $regpas){
		     if ($regema) {
		       $regemailErr = "Email is required";
		     } else {
		       $regemail = $_POST["regemail"];
		     }
		     
		     if ($regpas) {
		       $regpassErr = "Password is required";
		     } else {
		       $regpassword = $_POST["regpassword"];
		     }
		   }
		   else{
		   	$checkemail = "SELECT * FROM d2d.Users WHERE email ='$regemail';";
		   	$emailexists = mysqli_query($link, $checkemail);
		   	
		   	if(!$emailexists){
			   	$adduserquery = "INSERT INTO d2d.Users SET email='$regemail', password='$regpassword';";
			   	mysqli_query($link, $adduserquery);
			   	$success = "Successful registration";
			   	echo "tut";

		   	}
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
	  echo "<h2>Your Input(debugging):</h2>";
	  echo $regemail;
	  echo "<br>";
	  echo $regpassword;
	  echo "<br>";
	  echo $success;
	  ?>
	</p>



	<p>
	<a href="index.php">Back to main page</a>
	</p>


</body>
</html>