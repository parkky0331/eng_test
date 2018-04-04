<!DOCTYPE html>
<html>
<head>
  <link rel="shortcut icon" type="image/x-icon" href="" />
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0" user-scalable=no minimum-scale=1/>
  <!-- <link rel="stylesheet" href="css/bootstrap.css"> -->
  <link rel="stylesheet" href="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css" />
  <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
  <script src="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>
  <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.6/umd/popper.min.js"></script> -->
  <!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"></script> -->
  <title>모바일인터넷과 영단어</title>
</head>
<body>
  <div class="container">
    <img src="img/mark2.png">
    <form>
      <div class="menu"><!-- 영단어 공부 -->
        <a href="sql_test_list_check.php"><img src="img/btn1.png"></a>
      </div>
      <div class="menu2"><!-- 영단어 시험 -->
        <a href="test.php"><img src="img/btn2.png"></a>
      </div>
      <div class="menu3"><!-- 시험 결과 -->
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