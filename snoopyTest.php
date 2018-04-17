<?php
//Snoopy.class.php를 불러옵니다
require($_SERVER['DOCUMENT_ROOT'].'./Snoopy-2.0.0.tar.gz/Snoopy.class.php');
// include_once './Snoopy-2.0.0.tar.gz/Snoopy.class.php';
 
// //스누피를 생성해줍시다
$snoopy = new Snoopy;
 
// //스누피의 fetch함수로 제 웹페이지를 긁어볼까요? :)
$snoopy->fetch('https://maxivak.com/working-with-regular-expressions-preg_-and-utf-8-strings-in-php/#codesyntax_2');

// // $txt = $snoopy->results;
// // print_r($txt);
 
// //결과는 $snoopy->results에 저장되어 있습니다
// //preg_match 정규식을 사용해서 이제 본문인 article 요소만을 추출해보도록 하죠
preg_match('/<h1 class=\"entry-title  mb-3\"\>(.*)\<\/h1\>/is', $snoopy->results, $text);
 
// //이제 결과를 보면...?
echo $text[1];

// $snoopy=new snoopy;
// $o="";
// $snoopy->fetch("http://stock.daum.net/item/main.daum?code=002200");
// $txt=$snoopy->results;
// $rex="/\<em class=\"curPrice.+\"\>(.*)\<\/em\>/";
// preg_match_all($rex,$txt,$o);
// print_r($o[0][0]);
?>