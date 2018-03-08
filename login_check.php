
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
			session_start();
			$student_code = $_POST['student_code'];
			$password = $_POST['password'];
			$mysqli = mysqli_connect("localhost", "parkky0331", "parkky0331_db", "parkky0331");

			$check = "select * from user_info_max where student_code = '$student_code'";
			$result = $mysqli->query($check);
			if($result->num_rows==1){
				$row = $result->fetch_array(MYSQLI_ASSOC);	//하나의 열을 배열로 가져오기
				if($row['password'] == $password){
					$_SESSION['student_code'] = $student_code;
					if(isset($_SESSION['student_code'])){
						header('Location: ./main.php');
					}else{
						echo "sesstion save failed";
					}
				}else{
					echo "wrong id or pw";
					echo "<a href=login.html>Back Page</a>";
				}
			}else{
				echo "wrong id or pw";
				echo "<a href=login.html>Back Page</a>";
			}
			?>
		</div>


	</div>
</body>
</html>