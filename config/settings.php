<?php
# Database Connections
define("DB_SERVER", "localhost"); # Database server
define("DB_USER", ""); # username
define("DB_PASS", ""); # Password (panniga :))
define("DB_NAME", ""); # Database name with username!!

# Nice URL
$script_folder = '/tak22_crud_default/'; # NB! .htaccess
$request = str_replace($script_folder, '/', $_SERVER['REQUEST_URI']);
$request = substr($request, 1, strlen($request)); // remove first /
$req = explode('/', $request); // Split from /
# Max Per Page
define('MAXPERPAGE', 4);
