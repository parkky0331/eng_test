<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0" user-scalable=no minimum-scale=1/>
	<!-- <link rel="stylesheet" href="css/bootstrap.css"> -->
	<link rel="stylesheet" href="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css" />
	<script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
	<script src="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>
	<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.6/umd/popper.min.js"></script> -->
	<!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"></script> -->
	<script type="text/javascript" src="./js/js-all.js"></script>
	<style>
	.clearfix{
		overflow: auto;
	}
</style>
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
			<h1>관리자 페이지</h1>
			<h3>대림대학교 모바일인터넷과</h3>
			<?
			// session_start();
			if(!isset($_SESSION['student_code'])){
				header('Location: ./login.php');
			}
			// function logout(){
			// 	header('Location: ./logout.php');
			// }
			// if(isset($_GET['logout'])){
			// 	logout();
			// }
			echo "홈(로그인 성공)";
			echo "<a href=logout.php>로그아웃</a>";
			?>
			<button class="btn-sign" onclick="location.href='sql_test.php'">문제 리스트 생성</button>
			<button class="btn-sign" onclick="location.href='sql_test_list_check.php'">생성된 문제 리스트 확인</button>
		</div>
	</div>

</body>
</html>