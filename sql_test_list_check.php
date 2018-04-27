<?
    //$connect = mysql_connect("localhost","octopus3","1234"); // DB 연결
    //mysql_select_db("octopus3_db", $connect);                // DB 선택
include_once $_SERVER['DOCUMENT_ROOT']."/inc/conn.inc";
$conn = getConnection();

// mysql_query("set session character_set_connection=utf8;");

// mysql_query("set session character_set_results=utf8;");

// mysql_query("set session character_set_client=utf8;");


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
		<button onclick="window.history.back()">뒤로가기</button>
		</div>
		<div data-role="popup" id="table-column-toggle-popup" class="ui-table-columntoggle-popup">
			<fieldset data-role="controlgroup">
				<label>단어<input type="checkbox" checked data-cacheval="false" locked="true"></input></label>
				<label>뜻<input type="checkbox" checked data-cacheval="false" locked="true"></input></label>
			</fieldset>
		</div>
		<a href="#table-column-toggle-popup" class="ui-table-columntoggle-btn ui-btn ui-btn-b ui-corner-all ui-shadow ui-mini" data-rel="popup">단어 / 뜻</a>
		<table data-role="table" id="table-column-toggle" data-mode="columntoggle" data-enhanced="true" class="ui-table ui-table-columntoggle" data-column-btn-theme="b">
			<thead>
				<tr align="center">
					<!-- <th data-priority="1" data-colstart="1" class="ui-table-priority-1 ui-table-cell-visible">num</th> -->
					<th data-priority="2" data-colstart="2" class="ui-table-priority-2 ui-table-cell-visible">단어</th>
					<th data-priority="3" data-colstart="3" class="ui-table-priority-3 ui-table-cell-visible">뜻</th>
				</tr>
			</thead>
			<tbody>
				<?
				for ($count=0; $count < 5 ; $count++) { 
				//저장되어있는 시험용 db table 출력
					$sql = "select * from test_list_collect	where word_order = '$count'+1";

					$result = mysqli_query($conn, $sql);
					$row = mysqli_fetch_array($result);

					echo "
					<tr align='center'>
					<td class=\"ui-table-priority-2 ui-table-cell-visible\">$row[word_eng]</td>
					<td class=\"ui-table-priority-3 ui-table-cell-visible\">$row[word_mean]</td>";

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