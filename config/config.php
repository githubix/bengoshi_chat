<?php

ini_set('display_errors', 1);

define('DSN', 'mysql:dbhost=localhost;dbname=hogehoge');
define('DB_USERNAME', 'hoge');
define('DB_PASSWORD', 'hogehogehoge');

define('SITE_URL', 'http://hoge.hoge');

require_once(__DIR__ . '/../lib/functions.php');
require_once(__DIR__ . '/autoload.php');

session_start();