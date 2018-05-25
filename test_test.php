<?
include_once $_SERVER['DOCUMENT_ROOT']."/inc/conn.inc";
$conn = getConnection();

$test_conf_sql = "select * from test_conf where sql_check = 0";

$test_conf_sql_result = mysqli_query($conn, $test_conf_sql);
$test_conf_row = mysqli_fetch_array($test_conf_sql_result);

print_r($test_conf_row);

echo "$test_conf_row[test_delay]";
?>
<script language="javascript">
var delay=<?php echo "$test_conf_row[test_delay]"; ?>; //시간설정
var correctAnswers=new Array("a","a","a","a","a");  //정답
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
	<div data-role="page" id="page_order01" data-theme="a">
		<div data-role="header">
			<a href="#" data-rel="back">뒤로가기</a>
			<h2>문제 예시</h2>
		</div>
		<div data-role="content">
			<!-- 제한시간 : <B><span id="timeLeft"></span></B> 초<br> -->
			<br>
			<div id="answerBoard"> </div>
			<br>
			<div id="question1" style="display:none">
				<b>1번문제 ?</b><br>
				<fieldset>
					<input type="button" onclick="check_answer('a')" value="가나다">
					<input type="button" onclick="check_answer('b')" value="라마바">
					<input type="button" onclick="check_answer('c')" value="사아자">
					<input type="button" onclick="check_answer('d')" value="차카타">
				</fieldset>
				<? echo "TEST"; ?>
			</div>

			<div id="question2" style="display:none">
				<b>2번 문제?</b><br>
				<fieldset>
					<input type="button" onclick="check_answer('a')" value="가나다">
					<input type="button" onclick="check_answer('b')" value="라마바">
					<input type="button" onclick="check_answer('c')" value="사아자">
					<input type="button" onclick="check_answer('d')" value="차카타">
				</fieldset>
			</div>

			<div id="question3" style="display:none">
				<b>3번 문제?</b><br>
				<fieldset>
					<input type="button" onclick="check_answer('a')" value="가나다">
					<input type="button" onclick="check_answer('b')" value="라마바">
					<input type="button" onclick="check_answer('c')" value="사아자">
					<input type="button" onclick="check_answer('d')" value="차카타">
				</fieldset>
			</div>

			<div id="question4" style="display:none">
				<b>4번 문제 ?</b><br>
				<fieldset>
					<input type="button" onclick="check_answer('a')" value="가나다">
					<input type="button" onclick="check_answer('b')" value="라마바">
					<input type="button" onclick="check_answer('c')" value="사아자">
					<input type="button" onclick="check_answer('d')" value="차카타">
				</fieldset>
			</div>

			<div id="question5" style="display:none">
				<b>5번 문제?</b><br>
				<fieldset>
					<input type="button" onclick="check_answer('a')" value="가나다">
					<input type="button" onclick="check_answer('b')" value="라마바">
					<input type="button" onclick="check_answer('c')" value="사아자">
					<input type="button" onclick="check_answer('d')" value="차카타">
				</fieldset>
			</div>
			<div align="center">
				<div id="hide_timer">
					제한시간 : <B><span id="timeLeft"></span></B> 초<br>
				</div>
				<div id="quizScore" style="display:none">
				</div>
			</div>

		</div>
	</div>
</body>