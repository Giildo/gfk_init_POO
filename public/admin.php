<?php
define('ROOT', dirname(__DIR__));

require_once '../app/App.php';

use Core\Auth\DBAuth;

App::load();

$app = App::getInstance();

$p = isset($_GET['p']) ? $_GET['p'] : 'home';

// Auth
$auth = new DBAuth($app->getDb());

if (!$auth->logged()) {
	$app->forbidden();
}

ob_start();

if ($p === 'home') {
	require_once ROOT . '/views/admin/posts/index.php';
} elseif ($p === 'post.modify' && isset($_GET['id'])) {
	require_once ROOT . '/views/admin/posts/modify.php';
} elseif ($p === 'post.add') {
	require_once ROOT . '/views/admin/posts/add.php';
} elseif ($p === 'post.delete') {
	require_once ROOT . '/views/admin/posts/delete.php';
} elseif ($p === 'category.index') {
	require_once ROOT . '/views/admin/categories/index.php';
} elseif ($p === 'category.modify' && isset($_GET['id'])) {
	require_once ROOT . '/views/admin/categories/modify.php';
} elseif ($p === 'category.add') {
	require_once ROOT . '/views/admin/categories/add.php';
} elseif ($p === 'category.delete') {
	require_once ROOT . '/views/admin/categories/delete.php';
} else {
	require_once ROOT . '/views/admin/posts/index.php';
}

$content = ob_get_clean();

require_once ROOT . '/views/templates/default.php';