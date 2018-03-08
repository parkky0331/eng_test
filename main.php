<!DOCTYPE html>
<html>
<head>
  <title></title>
  <meta charset="utf-8">
  <link rel = "stylesheet" type="text/css" href="css/style2.css"></link>
</head>
<body>
  <div class="container">
    <img src="img/mark2.png">
    <form>
      <div class="menu">
        <a href="#"><img src="img/btn1.png"></a>
      </div>
      <div class="menu2">
        <a href="#"><img src="img/btn2.png"></a>
      </div>
      <div class="menu3">
        <a href="#"><img src="img/btn3.png"></a>
      </div>
    </form>
  </div>
  <div align="center">
    <?
    session_start();
    if(!isset($_SESSION['student_code'])){
      header('Location: ./login.html');
    }
    echo "홈(로그인 성공)";
    echo "<a href=logout.php>로그아웃</a>";
    ?>
  </div>    
</body>
</html>