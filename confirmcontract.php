<?php
include("header.php");
include("addpackages.php");
include("updateshipping.php");
add_packages($link, $_SESSION["contractID"], $_POST["contents"], $_POST["heights"], $_POST["widths"], $_POST["lengths"], $_POST["weights"], $_POST["prices"]);
if(update_shipping($link, $_SESSION["contractID"])){
	echo "ASDHJ";
}
echo "Packages successfully added!";
?>

<h3>Sign your contract here</h3>
<a href="completecontract.php">Done</a>