<?php


// Base URL of the application
define('BASE_URL','http://'. $_SERVER['HTTP_HOST'].'/');

// Path of the download.php file
define('DOWNLOAD_PATH', BASE_URL.'download.php');

// Path of the token directory to store keys
define('TOKEN_DIR', 'tokens');

// Authentication password to generate download links
define('OAUTH_PASSWORD','coder729');

// Expiration time of the link (examples: +1 year, +1 month, +5 days, +10 hours)
define('EXPIRATION_TIME', '+5 minutes');
?>