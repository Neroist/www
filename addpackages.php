<?php
function add_package($link, $contractID, $contents, $height, $width, $length, $weight, $price){
	$max_query = "SELECT MAX(packageID) FROM d2d.Packages;";
	$max = mysqli_query($link, $max_query)->fetch_row()[0];
	$insert_query = "INSERT INTO d2d.Packages(packageID, contractID, contents, height, width, length, weight, price) VALUES($max+1, $contractID, '$contents', $height, $width, $length, $weight, $price);";
	mysqli_query($link,$insert_query);
}

function add_packages($link, $contractID, $contents, $heigths, $widths, $lengths, $weights, $prices){
	for($i = 0; $i < count($contents); $i++){
		var_dump($_POST);
		add_package($link, $contractID, $contents[$i], $heigths[$i], $widths[$i], $lengths[$i], $weights[$i], $prices[$i]);
	}

}

?>