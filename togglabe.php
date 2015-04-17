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
 
<a id="displayText" href="javascript:toggle();">show</a> 

<?php
function togglabe($x){
	echo "<div id=\"toggleText\" style=\"display: none\"><h1>$x</h1></div>";
}

function getpackages($contractId){
	echo "ash";

}

?>