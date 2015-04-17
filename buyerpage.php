<html>
<title>d2d Buyer page</title>
<?php include("header.php"); ?>
<body>

<p>
<h3>Your active purchases:</h3>
<table>
	<tbody>
		<?php 
		include("getpurchases.php");
		getpurchases($link, $_SESSION["useremail"])
		?>
	</tbody>
</table>
</p>


<p>
	<h3>Back to user page?</h3>
	<a href="userpage.php">Click here</a>
	
</p>


</body>
</html>