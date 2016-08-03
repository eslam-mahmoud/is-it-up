<?php
require 'config.php';
require 'vendor/autoload.php'; // include Composer goodies
require 'classes/isitup.php';

//Get the url from POST request
$url = isset($_POST['url'])?$_POST['url']:null;
//create new object from is it up class
$isitup = new isitup($url);
//check on the status of the url
$isitupResult = $isitup->check();

try {	
	//connect to mongo DB
	$mongoClient = new MongoDB\Client(MONGODB_URL);
	//select the DB and collection that we will work on
	$historyCollection = $mongoClient->{MONGODB_NAME}->{MONGODB_COLLECTION};
	//Insert new document in the collection with the result of the check
	$result = $historyCollection->insertOne( [ 'url' => $isitupResult['url'], 'status' => $isitupResult['status'], 'time' => time() ] );
} catch (Exception $e) {
	//Do nothing :D
}

//display the result to the user
echo json_encode($isitupResult);
