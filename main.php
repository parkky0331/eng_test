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
  <script type="text/javascript" src="js/js-all.js"></script>
  <title>모바일인터넷과 영단어</title>
</head>
<body>
  <div data-role="page" id="page_index">
    <div data-role="header" align="center">
      <p id="date_write"></p>
      <script>
        dateWrite();
      </script>
      <?
        // echo "$_SESSION['name']";
        // echo "$_SESSION['student_code']";
      ?>
    </div>
    <div data-role="content">
      <img style="width: 100px; height: 100px; display: block; margin-left: auto; margin-right: auto;" src="img/mark2.png">
      <form>
        <div><!-- 영단어 공부 -->
          <!-- <a href="sql_test_list_check.php">영단어 공부</a> -->
          <button class="btn-sign" onclick="location.href='sql_test_list_check.php'">영단어 공부</button>
        </div>
        <div><!-- 영단어 시험 -->
          <!-- <a href="test.php">영단어 시험</a> -->
          <button class="btn-sign" onclick="location.href='test.php'">영단어 시험</button>
        </div>
        <div><!-- 시험 결과 -->
          <!-- <a href="#">시험 결과</a> -->
          <button class="btn-sign" onclick="location.href='#'">시험 결과</button>
        </div>
      </form>
    </div>
    <div align="center">
      <?
      if(!isset($_SESSION['student_code'])){
        session_start();
        ?><script type="text/javascript">location.href='login.php';</script><?
        // header('Location: ./login.php');
      }
      echo "홈(로그인 성공)";
      echo "<a href=logout.php>로그아웃</a>";
      ?>
    </div>    
  </div>
</body>
</html>