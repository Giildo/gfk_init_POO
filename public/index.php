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

ob_start();

if ($p === 'home') {
	require_once '../views/home.php';
} elseif ($p === 'post' && isset($_GET['id'])) {
	require_once '../views/single.php';
} elseif ($p === 'category' && isset($_GET['id'])) {
	require_once('../views/category.php');
} else {
	require_once '../views/home.php';
}

$content = ob_get_clean();

require '../views/templates/default.php';