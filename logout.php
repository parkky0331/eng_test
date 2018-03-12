<?
session_start();
$res = session_destroy();
if($res){
	header('Location: ./main.php');
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel = "stylesheet" type="text/css" href="css/style.css"></link>
	<title></title>
</head>
<body>

</body>
</html>