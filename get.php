<?php
include_once('simple_html_dom.php');

function getWord($word)
{
	do
	{
		$html = file_get_html('http://dict.youdao.com/w/'.$word);
	}while($html == false);
	$rel = $html->find('div[id=relWordTab]')[0];
	echo $rel;
	file_put_contents('result.html',chr(0xEF).chr(0xBB).chr(0xBF).$rel, FILE_APPEND);
	echo $word."!";
}

$wordsStr = file_get_contents('Words.csv');
$wordsArr = explode(',',$wordsStr);
var_dump($wordsArr);

foreach ($wordsArr as $word)
{
	getWord($word);
}

?>
