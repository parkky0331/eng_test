<?
    //$connect = mysql_connect("localhost","octopus3","1234"); // DB 연결
    //mysql_select_db("octopus3_db", $connect);                // DB 선택
$connect = mysqli_connect("localhost","parkky0331","parkky0331_db", "parkky0331");
?>
<meta http-equiv="Content-Type" content="text/html;" /> 
<table width="1024" border="1" cellpadding="5">
	<tr align="center" bgcolor="#00FF62">
		<td>num</td>
		<td>eng</td>
		<td>mean</td>
	</tr>
	<?
	for($count = 0; $count < 5; $count++){
		$sql_list_reset = "delete from test_list_collect where word_order = '$count'+1";
		$result_list_reset = mysqli_query($connect, $sql_list_reset);
	}

	for ($count=0; $count < 5 ; $count++) { 
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

		$sql_listup = "insert into test_list_collect (word_num, word_eng, word_mean, word_order) values";
		$sql_listup .= "($row[word_num], '$row[word_eng]', '$row[word_mean]', $count+1)";
		$result_listup = mysqli_query($connect, $sql_listup);


		for ($count_a=0; $count_a <3 ; $count_a++) { 
			# code...
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
	mysqli_close($connect);
	?>

</table>