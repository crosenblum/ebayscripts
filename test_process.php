<?php

// test the process first stage

// include simple dom html parser
include($_SERVER['DOCUMENT_ROOT'].'/ebayspecifics/simpledom/simple_html_dom.php');

// setup variables
$url="https://www.ebay.com/sch/i.html?_from=R40&_nkw=milwaukee+2767-20&_sacat=0&LH_ItemCondition=1000&LH_PrefLoc=1&LH_Sold=1&LH_Complete=1&_sop=16_rss=1";
$html = new simple_html_dom();
$error = '';

// set up curl
$curl = curl_init();                                
// the url to request
curl_setopt( $curl, CURLOPT_URL, $url );           
// return to variable
curl_setopt( $curl, CURLOPT_RETURNTRANSFER, true ); 
// decompress using GZIP
curl_setopt( $curl, CURLOPT_ENCODING, '');
// don't verify peer ssl cert
curl_setopt( $curl, CURLOPT_SSL_VERIFYPEER, false );
//  // fetch remote contents, check for errors
if ( false === ( $response = curl_exec( $curl ) ) )
    $error = curl_error( $curl );
// close the resource
curl_close( $curl );

if ( !$response ){
    die("Curl Error: {$error}");
}
$html->load( $response );

// get html content
// $html = file_get_html($url);

// Find all <div> with the class attribute
// https://stackoverflow.com/questions/15761115/find-div-with-class-using-php-simple-html-dom-parser
// $ret = $html->find('div[class=s-item__link]');

// print_r($ret);

//to fetch all hyperlinks from a webpage
$links = array();
foreach($html->find('a') as $a) {
 $links[] = $a->href;
}
print_r($links);

?>