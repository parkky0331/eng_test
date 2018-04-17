<? session_start(); ?>
<?
$member_id = "user";
$member_password = "password";
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Login proc</title>
</head>
<body>
	<? if(!isset($_POST["member_id"])){ ?>
	<p style="text-align: center;">ID is non typed</p>
	<p style="text-align: center;"><a href="login.php">Login</a></p>
	<?} else if (!isset($_POST["member_password"])) { ?>
	<p style="text-align: center;">PW is non typed</p>
	<p style="text-align: center;"><a href="login.php">Login</a></p>
	<?} else { ?>
	<? if (strcmp($_POST["member_id"], $member_id) != 0) {?>
	<p style="text-align: center;">ID is not same.</p>
	<p style="text-align: center;"><a href="login.php">re Login</a></p>
	<? } else if (strcmp($_POST["member_password"], $member_password) != 0) { ?>
	<p style="text-align: center;">PW is not same.</p>
	<p style="text-align: center;"><a href="login.php">re Login</a></p>
	<?} else { ?>
	<? $_SESSION["member_id"] = $_POST["member_id"]; ?>
	<? $_SESSION["member_password"] = $_POST["member_password"]; ?>
	<p style="text-align: center;">Login Done</p>
	<p style="text-align: center;"><a href="membership.php">User Page</a></p>
	<? } ?>
	<? } ?>
</body>
</html>
