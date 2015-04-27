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
		include("confirmdeliv.php");
		include("addSatisfaction.php");
		if($_SERVER["REQUEST_METHOD"]==="POST"){
			$empty_paid = empty($_POST["paid"]);
			if(!$empty_paid){
				payfor($link, $_POST["paid"]);
				$_POST["paid"]="";
				header("Location: $_SERVER[PHP_SELF]");
			}
			$empty_confirmed = empty($_POST["confirm"]);
			if(!$empty_confirmed and !$empty_satisfaction){
				add_satisfaction($link, $_POST["satisfactionID"], $_POST["satisfaction"]);
				confirm_deliv($link, $_POST["confirm"]);
				$_POST["confirm"]="";
				$_POST["satisfaction"]="";
				header("Location: $_SERVER[PHP_SELF]");
			}
			$empty_satisfaction = empty($_POST["satisfaction"]);
			
		}
		var_dump($_POST);
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