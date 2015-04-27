<?php
function update_shipping($link, $contractID){
	$ship_calc = "SELECT SUM(length*width*height/1000) FROM d2d.Packages WHERE contractID=$contractID;";
	$shipping = round(mysqli_query($link, $ship_calc)->fetch_row()[0]);
	$ship_query = "UPDATE d2d.Contracts SET shipPrice=$shipping WHERE contractID=$contractID;";
	$shipprice = mysqli_query($link,$ship_query);
}
?>