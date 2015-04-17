<html>
<title>d2d Register page</title>
<?php 
	include("header.php");
?>
<body style="background-color:#abcdef">



	<?php
		$success = "";
		$regemailErr=$regpassErr = "";
		$regemail=$regpassword="";
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
		  $regema=empty($_POST["regemail"]);
		  $regpas=empty($_POST["regpassword"]);

	  
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
		   
	   if($regemail and $regpassword){
	   		$newuserquery = "INSERT INTO d2d.Users SET email='$regemail', password='$regpassword';";
	   		if(mysqli_query($link,$newuserquery)){
	   			$success =  "Successful registration!";

	   		}
	   		else{
	   			$success =  "That email is already in use.";
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