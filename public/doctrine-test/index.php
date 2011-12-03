<?php
echo "<pre>";
require_once "bootstrap.php";
/*
//$jurisdiction = new Entities\Jurisdiction(5);
$jurisdiction = $entityManager->find('Entities\Jurisdiction', 5);
$jurisdiction->title = "Folsom";
$entityManager->persist($jurisdiction);

//$bid = new Entities\Bid(1);
$bid = $entityManager->find('Entities\Bid', 1);
$bid->title = "Test";
$bid->subtype = "RFP";
$bid->project_code = "Blah";
$bid->description = "Test 12345";

$bid->city = $jurisdiction;
$entityManager->persist($bid);
$entityManager->flush();
*/
$bid = $entityManager->find('Entities\Bid', 1);
echo $bid->city->title;
/*
$article = new Entities\Article(21);
//$article = $entityManager->find('Entities\Article', 21);
$article->title = "test ack";
$article->body  = "test";
echo $article->title;

$entityManager->persist($article);
$entityManager->flush();
*/

//echo "Created Article with ID " . $article->getId()."\n";
