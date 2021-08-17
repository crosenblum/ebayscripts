<?php

// check for url parameters

// https://stackoverflow.com/questions/43476760/php-post-data-convert-to-local-variables
foreach ($_POST as $key => $value) {
    $$key = $value; // yes, a double $$ - not pretty and a pain to debug!
}

// create full url with parameters
$url="http://www.ebay.com/sch/i.html?LH_ItemCondition=".$LH_ItemCondition."&country=".$country."&_sacat=".$_sacat."&LH_PrefLoc=".$LH_PrefLoc."&LH_Complete=".$LH_Complete."&_sop=".$_sop."&_nkw=".$_nkw;

// get html content
$html = file_get_html($url);

// Find all <div> with the class attribute
// https://stackoverflow.com/questions/15761115/find-div-with-class-using-php-simple-html-dom-parser
$ret = $html->find('div[class=s-item__link]');


?>