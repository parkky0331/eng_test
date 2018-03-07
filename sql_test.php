<?
    //$connect = mysql_connect("localhost","octopus3","1234"); // DB 연결
    //mysql_select_db("octopus3_db", $connect);                // DB 선택
$connect = mysqli_connect("localhost","parkky0331","parkky0331_db", "parkky0331");
?>
<!DOCTYPE html>
<html>
<head>
	<!-- <meta charset="utf-8"> -->
	<title></title>
</head>
<body>
	<table width="640" border="1" cellpadding="5">
		<tr align="center" bgcolor="#00FF62">
			<td>num</td>
			<td>eng</td>
			<td>mean</td>
		</tr>
		<?
		$sql = "select * from test_list order by word_num";
		$result = mysqli_query($connect, $sql);
		$count = 1;

		while ($row = mysqli_fetch_array($result)) {

			echo "<tr align='center'>
			<td>$row[word_num]</td>
			<td>$row[word_eng]</td>
			<td>$row[word_mean]</td>
			</tr>";

			$count++;
		}
		mysqli_close($connect);
		?>

	</table>

</body>
</html>