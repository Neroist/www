<!DOCTYPE HTML> 
<html>
<head>
<title>d2d</title>
</head>
<body> 

<?php
// define variables and set to empty values
$emailErr=$passErr = "";
$email=$password="";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
   if (empty($_POST["email"])) {
     $nameErr = "Email is required";
   } else {
     $name = $_POST["email"];
   }
   
   if (empty($_POST["password"])) {
     $emailErr = "Password is required";
   } else {
     $email = $_POST["password"];
   }
     
}

echo "tut";
?>

<h2>Registration</h2>
<p><span class="error">* required field.</span></p>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> 
   E-mail: <input type="text" name="email">
   <span class="error">* <?php echo $emailErr;?></span>
   <br><br>
   Password: <input type="password" name="password"></input>
   <span class="error">* <?php echo $passErr;?></span>
   <br><br>
   <input type="submit" name="submit" value="Submit"> 
</form>

<?php
echo "<h2>Your Input:</h2>";
echo $email;
echo "<br>";
echo $password;
echo "<br>";

?>

</body>
</html>