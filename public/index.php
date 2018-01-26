<?php
define('ROOT', dirname(__DIR__));

require_once '../app/App.php';

App::load();

$app = App::getInstance();
$app = App::getInstance();

if (isset($_GET['p'])) {
	$p = $_GET['p'];
} else {
	$p = 'home';
}

ob_start();

if ($p === 'home') {
	require_once ROOT . '/views/posts/home.php';
} elseif ($p === 'post.single') {
	require_once ROOT . '/views/posts/single.php';
} elseif ($p === 'post.category') {
	require_once ROOT . '/views/posts/category.php';
} else {
	require_once ROOT . '/views/posts/home.php';
}

$content = ob_get_clean();

require_once ROOT . '/views/templates/default.php';