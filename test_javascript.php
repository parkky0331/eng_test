<?
include_once $_SERVER['DOCUMENT_ROOT']."/inc/conn.inc";
$conn = getConnection();

$sql = "select * from test_conf where sql_check = 0";

$test_conf_sql = mysqli_query($conn, $sql);
$test_conf_row = mysqli_fetch_array($test_conf_sql);

$test_list_collect_sql = "select * from test_list_collect";

$test_list_collect_result = mysqli_query($conn, $test_list_collect_sql);
$test_list_collect_row = mysqli_fetch_array($test_list_collect_result);
// print_r($test_list_collect_row);

$test_list_collect_rownum = mysqli_num_rows($test_list_collect_result);
$test_list_collect_fieldnum = mysqli_num_fields($test_list_collect_result);
for($i = 0; $i < $test_list_collect_rownum; $i++){
	for($j = 0; $j < $test_list_collect_fieldnum; $j++){
		$test_list_collect_fullArray[$i][$j] = mysqli_result($test_list_collect_result, $i, $j);//시험문제 모아놓은 테이블 배열로 저장
	}
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
	<div data-role="page" id="page_index" data-theme="a">
		<div data-role="header" align="center">
			<p id="date_write"></p>
			<script>
				dateWrite();
			</script>
		</div>
		<div data-role="content">
			<?
			for($i = 1; $i < $test_conf_row['test_count']+1; $i++){


				echo "
				<b>$i 번 문제 : 
				";
				print($test_list_collect_fullArray[$i-1][1]);
				echo "</b>
				<fieldset>
				";
				for($j = 0; $j < 5; $j++){
					echo "<input type='button' onclick='check_answer('a')' value='"; print($test_list_collect_fullArray[$i-1][2]);echo "'>";
				}
				echo "				
				</fieldset>
				<br>
				";

				
			}

			?>





		</div>
	</div>

</body>
</html>















<!-- 
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
for ($count=0; $count < $test_conf_row['test_count'] ; $count++) { 

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

</table> -->