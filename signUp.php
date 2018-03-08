
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