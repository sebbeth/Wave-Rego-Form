<?php

/**
*
*/


require_once 'debug.php';
require_once 'Elvanto_API.php';


debug($_POST);


$data = $_POST;

$json_encoded = json_encode($data);


echo "Saving to log...\n";
$myfile = fopen("submissions.txt", "a") or die("Unable to open file!");
fwrite($myfile, $json_encoded . "\n");
fclose($myfile);

echo "Sending to Elvanto...\n";


 ?>
