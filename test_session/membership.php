<?session_start();
// $member_id = $_SESSION["member_id"]
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>User Page</title>
</head>
<body>
	<? if (!isset($_SESSION["member_id"]) || !isset($_SESSION["member_password"])) { ?>
	<p style="text-align: center;">Not Logined</p>
	<p style="text-align: center;"><a href="login.php">Login</a></p>
	<? } else { ?>
	<p style="text-align: center;">Welcome</p>
	<p style="text-align: center;"><? echo $_SESSION["member_id"]; ?></p>
	<p style="text-align: center;"><a href="logout.php">Logout</a></p>
	<? } ?>
</body>
</html>