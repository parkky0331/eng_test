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
  <title></title>
  <meta charset="utf-8">
  <link rel = "stylesheet" type="text/css" href="css/style.css"></link>
</head>
<body>
    <div class="container">
      <img src="img/mark.png">
     </div>
</body>
</html>