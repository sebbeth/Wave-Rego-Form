<?php

/**
*
*/


require_once 'debug.php';
require_once 'Elvanto_API.php';
if(!@include_once('api-keys.php')) {
  die('NO API KEY - make a file named api-keys.php that defines the variable $api_key');
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

/*
Here's the deal:
- Instantiate the API Wrapper.
- Search for the primary contact to see if they are known to HBC.
- If not, create a person for primary, with a new family.
- If they are, get the person's family Id.
- Add the parent to the wave parent group.
- Search each child with the family id as a parameter. We don't care about any matches outside the family.
- If any children are found, add them to the wave attendees group.
- If not found, create a person, add to family and add to attendee group.
*/


$elvanto = new Elvanto_API(array('api_key' => $api_key));
$request = [
  "search" => [
    "firstname" => "Sebastian",
    "lastname" => "Brown"
  ]
];
$results = $elvanto->call('people/search',$request);
debug($results);


//echo "Will now redirect to the payment jotform...\n";


 ?>
