
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
</head>
<body>
	<div class="container">
		<img width="20%" height="20%" src="img/mark.png">
		<div>		
			<?
			$student_code = $_POST['student_code'];
			$password = $_POST['password'];
			$password_re = $_POST['password_re'];
			$name = $_POST['name'];
			$student_class = $_POST['student_class'];

			if($password != $password_re){
				echo "비밀번호와 비밀번호 확인이 서로 다릅니다!!!!";
				echo "<a href=signUp.html>Back Page</a>";
				exit();
			}
			if($student_code == null || $password == null || $name == null || $student_class == null){
				echo "빈 칸을 모두 채워주세요";
				echo "<a href=signUp.html>Back Page</a>";
				exit();
			}

			$mysqli = mysqli_connect("localhost", "parkky0331", "parkky0331_db", "parkky0331");

			$check = "select * from user_info_max where student_code='$student_code'";
			$result = $mysqli->query($check);
			if($result->num_rows==1){
				echo "중복된 학번입니다.";
				echo "<a href=signUp.html>Back Page</a>";
				exit();
			}

			$signup = mysqli_query($mysqli, "insert into user_info_max (student_code, password, name, student_class) value('$student_code', '$password', '$name', '$student_class')");
			$signup = mysqli_query($mysqli, "insert into user_info_min (student_code, name) value('$student_code', '$name')");

			if($signup){
				echo "회원가입이 정상적으로 완료 되었습니다.";
				echo "<a href=login.html>Back Page</a>";
			}
			?>


		</div>
	</div>
</body>
</html>