<!DOCTYPE HTML> 
<html>
<head>
<?php 
include("functions/header.php");
include("functions/login.php");
?>
<title>d2d</title>
</head>
<body style="background-color:#abcdef"> 
  <p>
      <h2>Registrera dej:</h2>
      <a href="registerpage.php">Clicky</a>
  </p>


  <?php
  var_dump($_SESSION);
    $_SESSION["useremail"] = "";
    $emailErr=$passErr = "";
    $email=$password="";
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      $ema=empty($_POST["email"]);
      $pas=empty($_POST["password"]);
       
      if ($ema) {
        $emailErr = "Email is required";
      } 
      else{
        $email = $_POST["email"];
      }

      if($pas){
        $passErr = "Password is required";
      } 
      else{
        $password = $_POST["password"];

      }
      if($email and $password){
        if (login($link, $email, $password)){
          $_SESSION["driverID"]="tutak";
          $_SESSION["useremail"]=$email;
          header("Location: userpages/userpage.php");
        }
      }
    }
  ?>



  <p>
    <h2>Redan registrerad? Titta här.</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> 
     E-mail: <input type="email" name="email">
     <span class="error">* <?php echo $emailErr;?></span>
     <br><br>
     Password: <input type="password" name="password"></input>
     <span class="error">* <?php echo $passErr;?></span>
     <br><br>
     <input type="submit" name="submit" value="Submit"> 
  <p>
      <?php
      echo "<h2>Your Input(debugging):</h2>";
      echo $email;
      echo "<br>";
      echo $password;
      echo "<br>";
      ?>
    </p>
  </p>
  	<h2>Titta här om du är en drajver</h2>
  	<a href="driverpage.php">Click</a>
  </p>
</body>
</html>