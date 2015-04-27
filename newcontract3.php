<script>
var counter = 1;
var limit = 20;
function addInput(divName){
     if (counter == limit)  {
          alert("You have reached the limit of adding " + counter + " inputs");
     }
     else {
          var newdiv = document.createElement('div');
          newdiv.innerHTML = "Package " + (counter + 1) + " <br>   Contents:<input type='text' name='contents[]'>"+
          "<br>   Height (cm):<input type='text' name='heights[]'>´"+
          "<br>   Width:<input type='text' name='widths[]'>"+
          "<br>   Length:<input type='text' name='lengths[]'>"+
          "<br>   Weight:<input type='text' name='weights[]'>"+
          "<br>   Price:<input type='text' name='prices[]'>;";
          document.getElementById(divName).appendChild(newdiv);
          counter++;
     }
}
</script>

<form method="POST" action="confirmcontract.php">
     <div id="dynamicInput" >
          Package 1
          <br>   Contents:<input type="text" name="contents[]">
          <br>   Height (cm):<input type="text" name="heights[]">
          <br>   Width:<input type="text" name="widths[]">
          <br>   Length:<input type="text" name="lengths[]">
          <br>   Weight:<input type="text" name="weights[]">
          <br>   Price:<input type="text" name="prices[]">
     </div>
     <input type="button" value="Add another package to contract" onClick="addInput('dynamicInput');">
     <input type="submit" name="submit" value="Confirm packages">
</form>


<?php 
     include("header.php");
     var_dump($_SESSION); 
     echo htmlspecialchars($_SERVER["PHP_SELF"]);?>