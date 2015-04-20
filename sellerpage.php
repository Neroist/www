<html>
<title>d2d Sellers page</title>
<?php 
include("header.php");
include("getsales.php");
?>
<body>
	<p>
		<h3>Your active sales:</h3>
		<table border="1">
			
				<?php 
				getsales($link, $_SESSION["useremail"]);

				?>
			
		</table>
	</p>


	<p>
		<h3>Back to user page?</h3>
		<a href="userpage.php">Click here</a>
	</p>
</body>
</html>