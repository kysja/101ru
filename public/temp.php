<?php

$t = <<<TXT
001.jpg~~
002.jpg~~By the way, freight locomotives were colored black, and passenger&rsquo;s locomotives were green or blue.
003.jpg~~
004.jpg~~A huge collection of specialty vehicles.
005.jpg~~A car for transportation of hot iron.
006.jpg~~Snow cleaning machines.
007.jpg~~A collection of cars,
008.jpg~~&hellip;tractors, and cross-country vehicles.
009.jpg~~
010.jpg~~There is a subway car as well.
011.jpg~~An electric locomotive VL-60k and a diesel locomotive ChME2.
012.jpg~~An electric locomotive ChS3 and a diesel locomotive TE2.
013.jpg~~An electric locomotive VL40s.
014.jpg~~A diesel locomotive TEP60.
015.jpg~~A railroad cars.
016.jpg~~Those cars are for transporting prisoners.
017.jpg~~The passenger&rsquo;s cars.
018.jpg~~A kitchen.
019.jpg~~An electric locomotive ChS4.
020.jpg~~A diesel locomotive TEP80.
TXT;


$dbh = new PDO('mysql:host=localhost;dbname=101ru', 'root', 'mysql');

$sth = $dbh->prepare("INSERT INTO post_items (`description`, `image`, `sort`, `post_id`) VALUES (:description, :image, :sort, :post_id );");

$sort = 0;
$lines = explode("\n", $t);

foreach ($lines as $line) {
    list($image, $description) = explode('~~', $line);
    $description = trim($description);
    $sort++;
    $sth->execute(array(
        ':description' => $description,
        ':image' => $image,
        ':sort' => $sort,
        ':post_id' => 24,
    ));
}

echo "Done";

