<html>
<title>asdasd</title>
<body>

<?php
session_start();
$s = date('Y-m-d H:i:s');
echo $s; ?>
<a href=index.php>go back</a>

<?php echo $_SESSION['login_user'];?>
</body>


</html>
