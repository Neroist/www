<html>
<?php 
include("header.php");
include("insertseller.php");
include("generatecontract.php");
$formError= "";
$addErr=$brErr=$bnErr="";
$banknumber=$bankrouting=$address="";
if(empty($_SESSION["contractID"])){
  $_SESSION["contractID"]=generate_contract($link, $_SESSION["useremail"]);
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
      $address_empty=empty($_POST["address"]);
      $bankrouting_empty=empty($_POST["bankrouting"]);
      $banknumber_empty =empty($_POST["bankaccount"]);
       
      if ($address_empty) {
        $addErr = "Pick-up address is required";
      } 
      else{
        $address = $_POST["address"];
      }

      if($bankrouting_empty){
        $brErr = "Bank routing number is required";
      } 
      else{
        $bankrouting = $_POST["bankrouting"];

      }
      if($banknumber_empty){
      	$bnErr = "Bank account number is required";
      }else{
      	$banknumber = $_POST["bankaccount"];
      }

      if($banknumber and $address and $bankrouting){
        
          if(insert_seller($link, $_SESSION["useremail"], $bankrouting, $banknumber, $address)){

          	header("Location: newcontract2.php");
        }else{
        	$formError = "Something went wrong, try again.";
        }
      }

    }

?>
<body>
<h2>Enter your info here:</h2>





<p><span class="error">* required field.</span></p>
	<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> 
	   Pick-up address: <input type="text" name="address">
	   <span class="error">* <?php echo $addErr;?></span>
	   <br><br>
	   Bank routing number: <input type="text" name="bankrouting"></input>
	   <span class="error">* <?php echo $brErr;?></span>
	   <br><br>
	   Bank account number: <input type="text" name="bankaccount"></input>
	   <span class="error">* <?php echo $bnErr;?></span>
	   <br><br>


	   <input type="submit" name="submit" value="Submit"> 

	</form>
	<p>

<p>
	<?php echo $formError ?>
</p>


</body>
</html>