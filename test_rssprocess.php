<?php

// test process via rss


$feedurl="https://www.ebay.com/sch/i.html?_from=R40&_nkw=milwaukee+2767-20&_sacat=0&LH_ItemCondition=1000&LH_PrefLoc=1&LH_Sold=1&LH_Complete=1&_sop=16_rss=1";

$feed = implode(file($feedurl));
$xml = simplexml_load_string($feed);
$json = json_encode($xml);
$array = json_decode($json,TRUE);

print_r($array);

?>