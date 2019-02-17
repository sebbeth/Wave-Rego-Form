<?php

/**
*
*/


require_once 'debug.php';
require_once 'Elvanto_API.php';
if(!@include_once('api-key.php')) {
  die('NO API KEY - make a file named api-key.php that defines the variable $api_key');
}

date_default_timezone_set ('Australia/Sydney');


debug($_POST);


$data = $_POST;

// Add the current time to the data.
$data['submitted'] = date("F j, Y, g:i a");


$json_encoded = json_encode($data);


echo "Saving to log...\n";
$myfile = fopen("submissions.txt", "a") or die("Unable to open file!");
fwrite($myfile, $json_encoded . "\n");
fclose($myfile);

echo "Sending to Elvanto...\n";

echo "Will now redirect to the payment jotform...\n";

 ?>
