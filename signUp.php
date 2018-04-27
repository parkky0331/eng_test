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
	<div data-role="page" id="page_index" data-theme="a">
		<div data-role="header" align="center">
			<p id="date_write"></p>
			<script>
				dateWrite();
			</script>
		</div>
		<div class="content">
			<img width="20%" height="20%" src="img/mark.png">
			<div>		
				<?
			//입력된 정보 받아서 임시저장
				$student_code = $_REQUEST['student_code'];
				$password = $_REQUEST['password'];
				$password_re = $_REQUEST['password_re'];
				$name = $_REQUEST['name'];
				$student_class = $_REQUEST['student_class'];

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

				include_once $_SERVER['DOCUMENT_ROOT']."/inc/conn.inc";
				$conn = getConnection();

			//중복 된 학번인 경우 다시 할 수 있게
				$check = "select * from user_info_max where student_code='$student_code'";
				$result = mysqli_query($conn, $check);
				if($result->num_rows==1){
					echo "중복된 학번입니다.";
					echo "<a href=signUp.html>Back Page</a>";
					exit();
				}

				$signup = mysqli_query($mysqli, "insert into user_info_max (student_code, password, name, student_class) value('$student_code', '$password', '$name', '$student_class')");

			//값이 정상적으로 들어 오면 완료 되었다고 표시
				if($signup){
					echo '<script language="text/javascript">';
					echo 'alert("Register Done!")';
					echo '</script>';
					echo "회원가입이 정상적으로 완료 되었습니다.";
					echo "<a href=login.php>Back Page</a>";
				}
				?>
			</div>
		</div>
	</body>
	</html>