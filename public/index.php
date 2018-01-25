<?php

require_once '../app/Autoloader.php';

use app\Autoloader;
use app\Database;
use app\Config;
use app\App;

Autoloader::register();

$app = App::getInstance();
$posts = $app->getTable('Posts');
var_dump($posts->all());