<?php
header('Content-Type: application/json');

// get url from html page load it compress it and return it to avoid cross-domain issues

// setup variables
$url = '';

// get url parameters
if (isset($_POST['url']) && !empty($_POST['url'])) {
	$url = $_POST['url'];
}
if (isset($_GET['url']) && !empty($_GET['url'])) {
	$url = $_GET['url'];
}

// check if empty
if (isset($url) && empty($url)) {
	echo 'url not passed correctly...'.$url;
	exit;
}

// check if valid url
if (filter_var($url, FILTER_VALIDATE_URL) === FALSE) {
    echo 'Not a valid URL';
	exit;
}

// load html from url
$data = file_get_contents($url);

// check if data is empty
if (isset($data) && empty($data)) {
	echo 'error loading html from :'.$url;
	exit;
}

// now compress the html
$html = rmspace($data);

// now display it
// echo htmlspecialchars($html);


function rmspace($buffer){ 
        return preg_replace('~>\s*\n\s*<~', '><', $buffer); 
};


?>