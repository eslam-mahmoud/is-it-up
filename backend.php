<?php
require 'config.php';
require 'vendor/autoload.php'; // include Composer goodies
require 'classes/isitup.php';


//do the work
$url = isset($_POST['url'])?$_POST['url']:null;
$isitup = new isitup($url);
$result = $isitup->check();
echo json_encode($result);

//connect to mongo DB
$mongoClient = new MongoDB\Client(MONGODB_URL);
//select the DB and collection that we will work on
$historyCollection = $mongoClient->{MONGODB_NAME}->{MONGODB_COLLECTION};
//Insert new document in the collection with the result of the check
$result = $historyCollection->insertOne( [ 'url' => $result['url'], 'status' => $result['status'], 'time' => time() ] );