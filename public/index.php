<?php

require_once '../app/Autoloader.php';

use app\Autoloader;
use app\Database;

Autoloader::register();

if (isset($_GET['p'])) {
	$p = $_GET['p'];
} else {
	$p = 'home';
}

//Initialisation des objets
$db = new Database('blog');

ob_start();

if ($p === 'home') {
	require_once '../views/home.php';
} elseif ($p === 'post') {
	require_once '../views/single.php';
} else {
	require_once '../views/home.php';
}

$content = ob_get_clean();

require '../views/templates/default.php';