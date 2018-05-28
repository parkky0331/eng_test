/* [INPUTBOX 이미지] 시작*/
var c=false;
// 포커스가 인풋 박스안에 있을때 배경이미지 지우기
function Img_in (value) {
    img_box.style.backgroundImage="";
    c=true;
}

// 포커스가 인풋 박스를 벗어났을때 배경이미지 살리기 (입력값이 있으면 살리지 않기)
function Img_out (value) {
    if (value != ""){
       img_box.style.backgroundImage="";
   }else{
    img_box.style.backgroundImage="url(http://sstatic.naver.net/search/img3/h1_naver.gif)";
    c= false;
}
}
/* [INPUTBOX 이미지] 끝*/
//#########################################################
/* 날짜 표기 시작 */
function dateWrite(){
    var date = new Date();

    var year = date.getFullYear();
    var month = date.getMonth()+1;
    var day = date.getDate();
    if (("" + month).length == 1) { month = "0" + month; }
    if (("" + day).length   == 1) { day   = "0" + day;   }

    document.getElementById("date_write").innerHTML = year + month + day;
}
/* 날짜 표기 끝 */
//#########################################################
/* 뒤로가기 시작 */
function backbtn(){
    history.back();
}
/* 뒤로가기 끝 */
/* 문제 출력 부분 시작 */

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

/* 문제 출력 부분 끝 */