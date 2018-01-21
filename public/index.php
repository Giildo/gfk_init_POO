<?php

require_once '../app/Autoloader.php';

App\Autoloader::register();

if (isset($_GET['p'])) {
	$p = $_GET['p'];
} else {
	$p = 'home';
}

ob_start();

if ($p === 'home') {
	require_once '../views/home.php';
} elseif ($p === 'single') {
	require_once '../views/single.php';
} else {
	require_once '';
}

$content = ob_get_clean();

require '../views/templates/default.php';