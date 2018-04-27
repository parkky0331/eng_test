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
			<table data-role="table" data-mode="reflow" class="ui-responsive" border="1px">
				<thead>
					<tr align="center">
						<td>num</td>
						<td>eng</td>
						<td>mean</td>
					</tr>
				</thead>
				<tbody>
					<?
					for($count = 0; $count < 5; $count++){
						$sql_list_reset = "delete from test_list_collect where word_order = '$count'+1";
						$result_list_reset = mysqli_query($conn, $sql_list_reset);
					}

					for ($count=0; $count < 5 ; $count++) { 
					//랜덤으로 문제 추출
					// 아직 중복체크는 확인 못 함
						$value = mt_rand(1, 100);
						$dbArray[$count] = $value;

						$sql = "select * from test_list	where word_num = '$dbArray[$count]'";

						$result = mysqli_query($conn, $sql);
						$row = mysqli_fetch_array($result);

						echo "
						<tr align='center'>
						<td>$row[word_num]</td>
						<td>$row[word_eng]</td>
						<td>$row[word_mean]</td>";

						$sql_listup = "insert into test_list_collect (word_num, word_eng, word_mean, word_order) values";
						$sql_listup .= "($row[word_num], '$row[word_eng]', '$row[word_mean]', $count+1)";
						$result_listup = mysqli_query($conn, $sql_listup);


						for ($count_a=0; $count_a <3 ; $count_a++) { 
						//보기로 사용 할 수 있는 값 저장
							$value_a = mt_rand(1,100);
							$dbArray_a[$count_a] = $value_a;

			// 	$sql = "select word_mean from test_list where word_num = '$dbArray_a[$count_a]'";

			// 	$result_a = mysqli_query($connect, $sql);
			// 	$row_a = mysqli_fetch_array($result_a);
			// 	echo "
			// 	<td>$row_a[word_mean]</td>";
			// }
						}
						echo "</tr>";
					}
					mysqli_close($conn);
					?>

				</tbody>
			</table>
		</div>
	</div>

</body>
</html>