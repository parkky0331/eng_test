<? session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Logout</title>
</head>
<body>
	<? if (!isset($_SESSION["member_id"]) || !isset($_SESSION["member_password"])) { ?>
	<p style="text-align: center;">Not Logined</p>
	<p style="text-align: center;"><a href="login.php">Login</a></p>
	<? } else { ?>
	<? session_destroy(); ?>
	<p style="text-align: center;">Logout proceed</p>
	<p style="text-align: center;"><a href="login.php">Login</a></p>
	<? } ?>
</body>
</html>