<?php

// test simple dom to get list of matching results

define('__ROOT__', dirname(dirname(__FILE__)));
require_once('simpledom/simple_html_dom.php');

// setup variables
$search_term='Milwaukee 2767-20';

// start url
$start_url="https://www.ebay.com/sch/i.html?_nkw=milwaukee+2767-20&_sacat=0&_sop=16&rt=nc&LH_PrefLoc=1";

// _nkw=milwaukee+2767-20

// new url
$url = $start_url.'&_nkw='.urlencode($search_term);

// Create DOM from URL or file
$html = file_get_html($url);

// grab all links
print_r($html);

// Find all anchors, returns a array of element objects
$ret = $html->find('a');

print_r($ret);

?>