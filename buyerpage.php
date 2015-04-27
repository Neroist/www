<html>
<title>d2d Buyer page</title>
<?php include("header.php"); ?>
<body>

<p>
<h3>Your active purchases:</h3>
<table border="1">
		
		<?php 
		include("getpurchases.php");
		include("payfor.php");
		if($_SERVER["REQUEST_METHOD"]==="POST"){
			$empty_paid = empty($_POST["paid"]);
			if(!$empty_paid){
				payfor($link, $_POST["paid"]);
				header("Location: $_SERVER[PHP_SELF]");
			}
		}
		getpurchases($link, $_SESSION["useremail"])
		?>
	
</table>
</p>


<p>
	<h3>Back to user page?</h3>
	<a href="userpage.php">Click here</a>
	
</p>


</body>
</html>