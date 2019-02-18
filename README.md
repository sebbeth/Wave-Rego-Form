# Wave Rego form
This form is designed to take parent input and forward it to Elvanto as a Wave registration.

# Setup
Clone this repo and then add a file to the root directory named `api-keys.php`
This file is used to define the API tokens. Use it to define the variable `$api_key`.
E.g.
```
<?php

$api_key = '<ELVANTO API KEY>';

?>
```

Eastiest way to run this is using the PHP local dev server. If you have it installed you can run it like this:
```
php -S localhost:8000
```
