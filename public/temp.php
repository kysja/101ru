<?php

$t = <<<TXT
002.jpg~~During the tour the icebreaker had its regular maintenance at the dock. Its engines are turned off. Diesel generators provide the power.
003.jpg~~The ship is located in No. 3 dock of the ship-repairing plant in Murmansk.
004.jpg~~The breathtaking view! When you see it, you immediately get the way it works. This huge ship crashes the ice with its massive body which has a specific shape. A part of the icebreaker is covered with the stainless steel to prevent the scratches and corrosion.
005.jpg~~There is a system that provides powerful air streams. It helps to reduce the friction of the icebreaker&rsquo;s keel on the ice. It is simple:
006.jpg~~The vessel is elevated due to its body maintenance. The workers are checking and fixing its rudder system. There are pictures of the propellers and rudders. Victory has 7 impressive and massive propellers which may be repaired during the sailing.
007.jpg~~
008.jpg~~&quot;50 Let Pobedy&quot; is the largest icebreaker in the world. Its length is 159,6 meters (521.65 feet), width is 30 meters (98 feet ), it is 17,2 meters high (56 feet), and its draft is about 11 meters (36 feet). Impressive, is not it?
009.jpg~~The only way to reach the ship in the dock is this gangway. Let&rsquo;s get to the ship!
deck_plan.jpg~~This is the ship&rsquo;s scheme. It has 14 levels and 1,300 rooms.
011.jpg~~First of all we visited the chief petty officers&#39; mess. There are two crews at the icebreaker, and each one works for four months. The captain met us very kindly, and we shake hands!
012.jpg~~There are flowers in each room. Lots of good-looking flowers far from the sun, it is amazing!
013.jpg~~We are talking in a very friendly manner, as we are friends for a long time. We asked questions and got the answers, and we had a delicious home-cooked meal.
014.jpg~~The main gangway starts right here and leads up to the third bridge. Two more gangways connect the third and the fourth bridges. The walls are decorated with the pictures of modern and old-style icebreakers.
015.jpg~~orridors, doors of cabins (on the right) and service rooms (on the left).
016.jpg~~The ship is equipped with large and small gangways. One may get lost without a scheme in his or her hands.
017.jpg~~The captain&rsquo;s cabin is very cozy and spacious, and it is very different from a cabin on a river vessel. Check out the wallpaper at the captain&rsquo;s computer with a view at the ship&rsquo;s prow!
018.jpg~~The press-conference was held in the conference-hall next to the captain&rsquo;s room.
019.jpg~~The gangway leads to the pilot room at the fourth level. The stunning view at the port!
020.jpg~~Three persons are responsible for navigation of the icebreaker at a time, and every ship control watch lasts for four hours.
021.jpg~~There are two pairs of the bridge equipment for safety and a lot of navigational equipment as well.
022.jpg~~This is the main navigation bridge of the &quot;50 Let Pobedy&quot;. This small steering wheel rotates the huge wheel pistons, and pistons rotate the giant heavy wheels that are responsible for the ship&rsquo;s direction.
024.jpg~~The icebreaker is filled once a five year. This is a picture of the engine room was made by&nbsp;<span class="ljuser  i-ljuser  i-ljuser-type-P     " lj:user="sergeydolya"><a class="i-ljuser-username" href="http://sergeydolya.livejournal.com/" target="_self"><b>sergeydolya</b></a></span>:
025.jpg~~At the middle bridge there are a cook room and a food storage.
026.jpg~~The storage is huge and divided into sections for different purposes.
027.jpg~~
028.jpg~~Phones are located all over the ship.
029.jpg~~There are on-board entertainment rooms, a fitness center, a library, a sauna, a pool, bars, etc.
030.jpg~~
031.jpg~~The fitness center.
032.jpg~~The sauna and the pool with the ocean&rsquo;s water.
033.jpg~~he vessel &quot;50 Let Pobedy&quot; is 10 meters long then other nuclear icebreakers. It has the modernized biological shielding complex and an ecological compartment.
034.jpg~~The night illumination.
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
        ':post_id' => 16,
    ));
    // $sth->debugDumpParams();
}

echo "Done";

