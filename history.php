<?php
require 'config.php';
require 'vendor/autoload.php'; // include Composer goodies
require 'classes/isitup.php';

$result = array();
try {	
	//connect to mongo DB
	$mongoClient = new MongoDB\Client(MONGODB_URL);
	//select the DB and collection that we will work on
	$historyCollection = $mongoClient->{MONGODB_NAME}->{MONGODB_COLLECTION};
	//find last X documents inserted
	$cursor = $historyCollection->find([],
	    [
	        'limit' => 25,
	        'sort' => ['time' => -1],
	    ]
	);
	foreach ($cursor as $document) {
		unset($document['_id']);
	    $result[] = $document;
	}
} catch (Exception $e) {
	//Do nothing :D
}
echo json_encode($result);
