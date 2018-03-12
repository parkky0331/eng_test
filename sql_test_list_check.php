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
	for ($count=0; $count < 5 ; $count++) { 
			# code...

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