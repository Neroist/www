<html>
<title>d2d Users page</title>
	<body>
		<?php
			include("header.php");
			if(!$_SESSION["useremail"]){
				header("Location: index.php");
			}
			$useremail=$_SESSION["useremail"];
			$_SESSION["contractID"]="";

			echo "You are logged in as $useremail";
		?>
		<p>
			<h3>Are you a seller?</h3>
			<a href="sellerpage.php">Here are your active sales</a>
		</p>
		<p>
			<h3>Are you a buyer?</h3>
			<a href="buyerpage.php">Here are your active purchases</a>
		</p>
		<p>
			<h3>Logout </h3>
			<a href="index.php">Click here</a>
		</p>
		<p>
			<h3>New contract</h3>
			<a href="newcontract1.php">Here</a>
		</p>
		<p>
			<h3>Update credit card info (for buyers)</h3>
			<a href="addcreditcard.php">Here</a>
		</p>
	</body>
</html>