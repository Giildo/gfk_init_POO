<?php
define('ROOT', dirname(__DIR__));

require_once ROOT . '/app/App.php';
require_once ROOT . '/vendor/autoload.php';

App::load();

if (isset($_GET['p'])) {
    $p = $_GET['p'];
} else {
    $p = 'posts.index';
}

$p = explode('.', $p);

if ($p[0] === 'admin') {
    $controllerName = '\App\Controller\\' . ucfirst($p[0]) . '\\' . ucfirst($p[1]) . 'Controller';
    $action = $p[2];
} else {
    $controllerName = '\App\Controller\\' . ucfirst($p[0]) . 'Controller';
    $action = $p[1];
}

$controller = new $controllerName();
$controller->$action();