<html>
<title>d2d Users page</title>
<body>
<?php  
var_dump($_POST);
$link = mysqli_connect("localhost", "root", "");
$email=$_POST["email"];
$pass =$_POST["password"];
$check_login_query = "SELECT email, password FROM d2d.Users WHERE email=$email and password=$pass";
$result = mysqli_query($link, $check_login_query);

if($result){
	echo "mariachio";
}else{
	echo "tutbandet";
}

?>


<p>
<h3>Are you a seller?</h3>
"Link here"

</p>


<p>
<h3>Are you a buyer?</h3>
"Link here"

</p>

<p>
Logout options here
</p>


</body>
</html>