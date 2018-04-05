/*[INPUBOX 이미지] 시작*/
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
/* [INPUBOX 이미지] 끝*/