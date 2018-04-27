<?
//DB연결
include_once $_SERVER['DOCUMENT_ROOT']."/inc/conn.inc";
$conn = getConnection();
//이전페이지에서 학번, 비밀번호 받아옴
$student_code = $_REQUEST['student_code'];
$name = $_REQUEST['name'];
$admin = $_REQUEST['admin'];
$password = $_REQUEST['password'];

//DB쿼리문 및 실행결과 저장
$check = "select * from user_info_max where student_code = '$student_code'";
$admin_check = "select admin from user_info_max where student_code = '$student_code'";
$result = mysqli_query($conn, $check);
$admin = mysqli_query($conn, $admin_check);

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
	<div data-role="page" id="page_index" data-theme="a">
		<div data-role="header" align="center">
			<p id="date_write"></p>
			<script>
				dateWrite();
			</script>
		</div>
		<div data-role="content">
			<h1>영단어 시험</h1>
			<h3>대림대학교 모바일인터넷과</h3>
			<?

			if($result->num_rows==1){
				$row = mysqli_fetch_array($result);
				$row_admin = mysqli_fetch_array($admin);
				if($row['password'] == $password){
					// session_start();
					$_SESSION['student_code'] = $student_code;
					$_SESSION['name'] = $name;
					$_SESSION['admin'] = $row_admin;
					if(isset($_SESSION['student_code'])){
						if($row_admin['admin'] != 0){
							//관리자로 로그인 했을 때 관리자 페이지로 리다이렉션
							echo "Login Complete<br>";
							echo "<a href=admin.php>Go Admin Page</a>";
							?><script type="text/javascript">location.href='./admin.php';</script><?
				// echo ("<script type='javascript'>location.replace('./admin.php');</script>");
				// header('Location: ./admin.php');
				// exit;
						}else{
							//관리자가 아닐 때 일반사용자 페이지로 리다이렉션
							echo "Login Complete<br>";
							echo "<a href=main.php>Go Main Page</a>";
							?><script type="text/javascript">location.href='./main.php';</script><?
				// echo ("<script type='javascript'>location.replace('./main.php');</script>");
				// header('Location: ./main.php');
				// exit;
						}
					}else{
						echo "session save failed";
					}
				}else{
					echo "wrong id or pw<br>";
					echo "<a href=login.php>Back Page</a>";
				}
			}else{
				echo "wrong id or pw<br>";
				echo "<a href=login.php>Back Page</a>";
			}






			?>
		</div>
	</div>

</body>
</html>