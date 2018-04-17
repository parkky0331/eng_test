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
	<title>모바일인터넷과 영단어</title>
</head>
<body>
	<div data-role="page" id="page_index" data-theme="">
		<div data-role="header" align="center">
			<p id="date_write"></p>
			<script>
				dateWrite();
			</script>
		</div>
		<table width="1024" border="1" cellpadding="5">
			<tr align="center" bgcolor="#00FF62">
				<td>num</td>
				<td>eng</td>
				<td>mean</td>
			</tr>
			<?
			for ($count=0; $count < 5 ; $count++) { 
				//저장되어있는 시험용 db table 출력
				$sql = "select * from test_list_collect	where word_order = '$count'+1";

				$result = mysqli_query($connect, $sql);
				$row = mysqli_fetch_array($result);

				echo "
				<tr align='center'>
				<td>$row[word_num]</td>
				<td>$row[word_eng]</td>
				<td>$row[word_mean]</td>";

				echo "</tr>";
			}
			mysqli_close($connect);
			?>

		</table>
	</div>
</div>

</body>
</html>