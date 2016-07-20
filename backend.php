<?php

//tring the posted URL
$url = trim($_POST['url']);

//if short string that can not be URL return error message
if (strlen($url)<3) {
	echo json_encode(array('result'=>false,'message'=>'The URL is too short!'));
	die();
}

//get only headers not the full page and formate the result as array
$headers = get_headers($url, 1);

//if === false then the website is down or does not exists
if ($headers === false) {
	echo json_encode(array('result'=>false,'message'=>$url.' is down <img src="./img/sad-face.png">'));
} else {
	echo json_encode(array('result'=>true,'message'=>$url.' is up <img src="./img/smiling-face.png">'));
}