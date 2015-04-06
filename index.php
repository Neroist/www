<html>
<head>
<title>D2D.se - Your safe middleman</title>
</head>
<body>

<p>
<?php echo 'Hello World'; ?>
<a href=next.php>click here</a>
</p>

<p>
<?php $d = "tutak"; ?>
<?php echo $d; ?>

<?php
session_start();
$username = "tutmeistro";
$_SESSION['login_user']= $username;  // Initializing Session with value of PHP Variable
echo $_SESSION['login_user'];?>
</p>


<p>
<h1>sql har</h1>
<?php $d= mysqli_connect("localhost", "root", "");
if($d){
	echo "macaroni<br/>";
}
$s = mysqli_query($d,"SELECT * FROM secure_login.Users;");
$r = mysqli_fetch_row($s);
echo($r[0]);echo($r[1]);


?>

</p>

</body>
</html>
