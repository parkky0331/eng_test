<?
    //$connect = mysql_connect("localhost","octopus3","1234"); // DB 연결
    //mysql_select_db("octopus3_db", $connect);                // DB 선택
$connect = mysqli_connect("localhost","parkky0331","parkky0331_db", "parkky0331");
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
</head>
<body>
	<div class="container">

		<img width="20%" height="20%" src="img/mark.png">
		<div>
			<?
			session_start();
			$student_code = $_POST['student_code'];
			$password = $_POST['password'];

			$check = "select * from user_info_max where student_code = '$student_code'";
			$admin_check = "select admin from user_info_max where student_code = '$student_code'";
			$result = mysqli_query($connect, $check);
			$admin = mysqli_query($connect, $admin_check);
			if($result->num_rows==1){
				$row = mysqli_fetch_array($result);
				$row_a = mysqli_fetch_array($admin);
				if($row[password] == $password){
					$_SESSION['student_code'] = $student_code;
					if(isset($_SESSION['student_code'])){
						if($row_a[admin] != 0){
							echo "$row_a[admin]";
							echo "관리자입니다.";
							header('Location: admin.php');
							exit;
						}
						echo "$row_a[admin]";
						echo "관리자가 아닙니다.";
						header('Location: main.php');
					}else{
						echo "session save failed";
					}
				}else{
					echo "wrong id or pw<br>";
					echo "<a href=login.html>Back Page</a>";
				}
			}else{
				echo "wrong id or pw<br>";
				echo "<a href=login.html>Back Page</a>";
			}
			?>
		</div>


	</div>
</body>
</html>