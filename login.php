<?
if(!isset($_SESSION)) 
{ 
  //세션이 없다면 세션을 새로 시작해서 로그인
  session_start();
}else{
  include_once $_SERVER['DOCUMENT_ROOT']."/inc/conn.inc";
  $conn = getConnection();
  $student_code = $_SESSION['student_code'];
  //이후 돌아가기 버튼을 사용자별로 다르게 하기 위해 db값 확인
  $admin_check = "select admin from user_info_max where student_code = '$student_code'";
  $admin = mysqli_query($conn, $admin_check);
  $row_admin = mysqli_fetch_array($admin);
}
?>
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
  <script type="text/javascript" src="./js/js-all.js"></script>
  <title>모바일인터넷과 영단어</title>
</head>
<body>
  <div data-role="page" id="page_login">
    <div data-role="header" align="center">
      <p id="date_write"></p>
      <script>
        dateWrite();
      </script>
    </div>
    <div class="container" align="center">
      <img width="20%" height="10%" src="img/mark.png">
      <?

      // print_r($_SESSION);
      //세션에서 학번, 비밀번호 데이터가 들어왔는지 확인
      //로그인 한 상태에서 로그인 페이지로 접속 할 시 로그인 중 이라는 페이지 출력
      if(isset($_SESSION['student_code']) || isset($_SESSION['password'])){
        $student_code = $_SESSION['student_code'];
        $name = $_SESSION['name'];
        echo "<p><strong>$name</strong>(";
        echo $_SESSION["student_code"];
        echo ")님은 이미 로그인하고 있습니다.</br>";
        if($row_admin['admin'] != 0){
          echo "<a href=\"admin.php\">[돌아가기]</a> ";
        }else{
          echo "<a href=\"main.php\">[돌아가기]</a> ";          
        }
        echo "<a href=\"logout.php\">[로그아웃]</a></p>";
      }else{
        //로그인 한 상태가 아닐 때 로그인 할 수 있는 페이지를 출력
        ?>
        <form method="post" action="./login_check.php">
          <div class="form-input">
            <img src="img/user.png">
            <input type="text" name="student_code" placeholder="Enter Student Code" >
          </div>
          <div class="form-input">
            <img  src="img/Lock.png">
            <input type="password" name="password" placeholder="Enter Password">
          </div>
          <input type="submit" name="submit" value="LOGIN" class="btn-login"><br>
        </form>
        <a href="https://pt.daelim.ac.kr/">Forget Password?</a>
        &nbsp&nbsp&nbsp
        <a href="./signUp.html">Sign Up ID/PW</a>
        <? } ?>
      </div>
    </div>
  </body>
  </html>
      <!-- 
        <input name="img_box" type="text" style="background:url(img/user.png) no-repeat;" onFocus="return Img_in();" onFocusout="return Img_out(this.value);" placeholder="       Enter Student Code">

        <input name="img_box2" type="text" style="background:url(img/Lock.png) no-repeat;" onFocus="return Img_in2();" onFocusout="return Img_out2(this.value);">
      -->