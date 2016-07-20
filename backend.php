<?php

$url = trim($_POST['url']);

if (strlen($url)<3) {
	echo json_encode(array('result'=>false,'message'=>'The URL is too short!'));
	die();
}

$headers = get_headers($url, 1);
if ($headers === false) {
	echo json_encode(array('result'=>false,'message'=>$url.' is down <img src="./img/sad-face.png">'));
} else {
	echo json_encode(array('result'=>true,'message'=>$url.' is up <img src="./img/smiling-face.png">'));
}