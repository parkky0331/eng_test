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
print($test_list_collect_rownum);
print($test_list_collect_fieldnum);
for($i = 0; $i < $test_list_collect_rownum; $i++){
	for($j = 0; $j < $test_list_collect_fieldnum; $j++){
		$test_list_collect_fullArray[$i][$j] = mysqli_result($test_list_collect_result, $i, $j);
	}
}
print_r($test_list_collect_fullArray[2][0]);

?>
<script language="javascript">
var delay=<? echo "$test_conf_row[test_delay]"; ?>; //시간설정
var correctAnswers = new Array();
<? $temp = 0; ?>
for(var i = 0; i < <? echo "$test_conf_row[test_count]"; ?>; i++){
	correctAnswers[i] = <? print($test_list_collect_fullArray[$temp][0]); ?>;
}
alert(correctAnswers.toString());
// var correctAnswers=new Array("a","a","a","a","a");  //정답
var q_num=1;
var timer;
var layer;
var clock=delay;
var score=0;

function show_question(){
	if (layer=eval("document.all.question"+q_num)){
		layer.style.display="inline";
		document.all.timeLeft.innerHTML=clock;
		hide_question();
	} else {
		document.all.timeLeft.innerHTML=0;
		document.all.quizScore.innerHTML="당신은 "+(q_num-1)+"문제중 "+score+"개를 맞췄습니다.";
		document.all.quizScore.style.display="inline";
	}
}

function hide_question(){
	if (clock>0) {
		document.all.timeLeft.innerHTML=clock;
		clock--;
		timer=setTimeout("hide_question()",1000);
	} else {
		clearTimeout(timer);
		document.all.answerBoard.innerHTML=" ";
		clock=delay;
		layer.style.display="none";
		q_num++;
		show_question();
	}
	hide_timer(clock);
}

function check_answer(answer){
	if (correctAnswers[q_num-1]==answer){
		score++;
		document.all.answerBoard.innerHTML="<font color=blue><b>정답입니다.</b></font>";
	} else {
		document.all.answerBoard.innerHTML="<font color=red><b>땡! 틀렸습니다.</b></font>";
	}
	clock=0;
	clearTimeout(timer);
	timer=setTimeout("hide_question()",700);
}
function hide_timer(clock){
	if(clock>0){
		document.getElementById("hide_timer").style.display = "block";
	}else{
		document.getElementById("hide_timer").style.display = "none";
	}
}

window.onload=show_question;
</script>
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

			</table>
		</div>
	</div>

</body>
</html>