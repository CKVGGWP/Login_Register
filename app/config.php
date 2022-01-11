<?php

define('DB_HOST', 'localhost');
define('DB_PASS', '');
define('DB_USER', 'root');
define('DB_NAME', 'loginregister');


/*protocal type http or https*/

define('PROTOCOL', 'http');

/*root and asset paths*/

$path = str_replace("\\", "/", PROTOCOL . "://" . $_SERVER['SERVER_NAME'] . __DIR__  . "/");
$path = str_replace($_SERVER['DOCUMENT_ROOT'], "", $path);

define('ROOT', str_replace("app", "models", $path));
define('ASSETS', str_replace("app", "public/assets", $path));
define('MODELS', __DIR__);
