<?php

require_once '../app/Autoloader.php';

use app\Autoloader;
use app\Database;
use app\Config;
use app\App;

Autoloader::register();

$singleton = App::getInstance();
var_dump($singleton);