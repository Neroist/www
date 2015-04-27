<html>
<?php 
include("header.php");
include("insertbuyer.php");
include("buyertocontract.php");
$formError= "";
$addErr=$emailErr="";
$bEmail=$bAddress="";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
      $address_empty=empty($_POST["bAddress"]);
      $email_empty=empty($_POST["bEmail"]);
      
       
      if ($address_empty) {
        $addErr = "Pick-up address is required";
      } 
      else{
        $bAddress = $_POST["bAddress"];
      }

      if($email_empty){
        $emailErr = "Bank routing number is required";
      } 
      else{
        $bEmail = $_POST["bEmail"];

      }

      if($bEmail and $bAddress){
        
          if(insert_buyer($link, $bEmail, $bAddress) and buyer_to_contract($link, $bEmail, $_SESSION["contractID"])){

          	header("Location: newcontract3.php");
        }else{
        	$formError = "Something went wrong, try again.";
        }
      }

    }

?>
<body>
<h2>Enter buyer's info here:</h2>

<p><span class="error">* required field.</span></p>
	<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> 
	   Buyer's email: <input type="email" name="bEmail">
	   <span class="error">* <?php echo $emailErr;?></span>
	   <br><br>
	   Buyer's address: <input type="text" name="bAddress"></input>
	   <span class="error">* <?php echo $addErr;?></span>
	   <br><br>

	   <input type="submit" name="submit" value="Submit"> 

	</form>
	<p>

<p>
	<?php echo $formError ?>
</p>


</body>
</html>