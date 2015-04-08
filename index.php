<html>
<head>
<title>D2D.se - Your safe middleman</title>
</head>
<body>

<p>
<?php echo 'Hello World<br/>'; ?>
<a href=next.php>click here</a>
</p>

<p>
<?php
session_start();
$username = "username";
$_SESSION['login_user']= $username;  // Initializing Session with value of PHP Variable
echo $_SESSION['login_user'];?>
</p>


<p>
<h1>sql har</h1>
<?php $d= mysqli_connect("localhost", "root", "");
if($d){
	echo "macaroni<br/>";
}
$s = mysqli_query($d,"SELECT * FROM secure_login.tut;");
$r = mysqli_fetch_row($s);
if($r[0]){
	echo "tutak";
}
echo "tut";


?>

</p>

</body>
</html>
