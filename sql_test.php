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
	<table width="1024" border="1" cellpadding="5">
		<tr align="center" bgcolor="#00FF62">
			<td>num</td>
			<td>eng</td>
			<td>mean</td>
			<td>answer</td>
			<td>answer</td>
			<td>answer</td>
		</tr>
		<?
		for ($count=0; $count < 10 ; $count++) { 
			# code...
			$value = mt_rand(1, 100);
			$dbArray[$count] = $value;

			$sql = "select * from test_list	where word_num = '$dbArray[$count]'";

			$result = mysqli_query($connect, $sql);
			$row = mysqli_fetch_array($result);

			echo "
			<tr align='center'>
			<td>$row[word_num]</td>
			<td>$row[word_eng]</td>
			<td>$row[word_mean]</td>";


			for ($count_a=0; $count_a <3 ; $count_a++) { 
			# code...
				$value_a = mt_rand(1,100);
				$dbArray_a[$count_a] = $value_a;

				$sql = "select word_mean from test_list where word_num = '$dbArray_a[$count_a]'";

				$result_a = mysqli_query($connect, $sql);
				$row_a = mysqli_fetch_array($result_a);
				echo "
				<td>$row_a[word_mean]</td>";
			}
			echo "</tr>";
		}
		mysqli_close($connect);
		?>

	</table>

</body>
</html>