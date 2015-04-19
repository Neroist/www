<script>
var counter = 1;
var limit = 20;
function addInput(divName){
	var a = "33"+3-"4"-3+"7";
	alert(a);
     if (counter == limit)  {
          alert("You have reached the limit of adding " + counter + " inputs");
     }
     else {
          var newdiv = document.createElement('div');
          newdiv.innerHTML = "Entry " + (counter + 1) + " <br><input type='text' name='myInputs[]'>";
          document.getElementById(divName).appendChild(newdiv);
          counter++;
     }
}
</script>

<form method="POST">
     <div id="dynamicInput">
          Entry 1<br><input type="text" name="myInputs[]">
     </div>
     <input type="button" value="Add another text input" onClick="addInput('dynamicInput');">
</form>