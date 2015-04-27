<?php
include("header.php");
include("updatecredit.php");
$credErr="";
$creditcard="";
$success="";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
      $emptycred=empty($_POST["creditcard"]);
      
      if ($emptycred) {
        $credErr = "creditcard info is required";
      } 
      else{
        $creditcard = $_POST["creditcard"];
      }

      
      if($creditcard){
        if (update_credit($link, $_SESSION["useremail"], $creditcard)){
          $success="You successfully updated your creditcard info.";
        }else{
      	$success="You are not registered as a buyer in any contract.";
      }
      }
    }
?>

<h3>Hello, update your credit card info on this page.</h3>


<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> 
	   Credit card info (16 numbers): <input type="text" name="creditcard">
	   <span class="error">* <?php echo $credErr;?></span>

</form>

<?php 
echo $success;
?>

<h3>Back to userpage</h3>
<a href="userpage.php">Click</a>