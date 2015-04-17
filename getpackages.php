<script language="javascript"> 
function toggle() {
	var ele = document.getElementById("toggleText");
	var text = document.getElementById("displayText");
	if(ele.style.display == "block") {
    		ele.style.display = "none";
		text.innerHTML = "show";
  	}
	else {
		ele.style.display = "block";
		text.innerHTML = "hide";
	}
} 
</script>
<?php
function getpackages($link, $contractID){
	$get_package_query = "SELECT * FROM d2d.Packages WHERE contractID=$contractID;";
	$result = mysqli_query($link, $get_package_query);
	
	echo "<a id=\"displayText\" href=\"javascript:toggle();\">show</a>";
	
	$tableconts = "<table border=\"1\"><th>PackageID</th>
	<th>Contents</th>
	<th>Height</th>
	<th>Width</th>
	<th>Length</th>
	<th>Weight</th>
	<th>Price</th>";
	while($row = mysqli_fetch_row($result)){
		$pid = $row[0];$cont=$row[2];$height=$row[3];$width=$row[4];$length=$row[5];$weight=$row[5];$price=$row[6];
		$tableconts .=  "
		<tr>
		<td>$pid</td>
		<td>$cont</td>
		<td>$height</td>
		<td>$width</td>
		<td>$length</td>
		<td>$weight</td>
		<td>$price</td>
		</tr>";	
	}
	$tableconts.= "</table>";
	echo "<div id=\"toggleText\" style=\"display: none\">$tableconts</div>"; 
	
}
?>