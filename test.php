<?
  include_once $_SERVER['DOCUMENT_ROOT']."/inc/conn.inc";
  $conn = getConnection();
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
			<table border="1">
				<tr align="center" bgcolor="#00FF62">
					<td>num</td>
					<td>eng</td>
					<td>mean</td>
					<td>answer</td>
					<td>answer</td>
					<td>answer</td>
				</tr>
				<?
				for ($count=0; $count < 5 ; $count++) { 

					//시험 문제 출력 부분
					//첫번째는 단어, 정답
					$sql = "select * from test_list_collect	where word_order = '$count'+1";

					$result = mysqli_query($conn, $sql);
					$row = mysqli_fetch_array($result);

					echo "
					<tr align='center'>
					<td>$row[word_order]</td>
					<td>$row[word_eng]</td>
					<td>$row[word_mean]</td>";

					for ($count_a=0; $count_a <3 ; $count_a++) {
						//두번째는 보기 세가지
						$value_a = mt_rand(1,100);
						$dbArray_a[$count_a] = $value_a;

						$sql = "select word_mean from test_list where word_num = '$dbArray_a[$count_a]'";

						$result_a = mysqli_query($conn, $sql);
						$row_a = mysqli_fetch_array($result_a);
						echo "
						<td>$row_a[word_mean]</td>";
					}
				}
				echo "</tr>";
				mysqli_close($conn);
				?>

			</table>
		</div>
	</div>

</body>
</html>