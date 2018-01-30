<?php

use app\Table\PostTable;
use app\Table\CategoryTable;

$app = App::getInstance();

$posts = $app->getTable('PostTable');
$post = $posts->find($_GET['id']);

$categories = $app->getTable('CategoryTable');
$category = $categories->find($post->category_id);

if ($post === false) {
	$app->error404();
}

$app->setTitle($post->title);
?>

<h1><?= $post->title; ?></h1>
<p><em><a href="<?= $category->url; ?>"><?= $category->name; ?></a></em></p>

<p><?= $post->content; ?></p>

<?= ($post->date_modify != NULL) ? '<p><em>Modifié le ' . $post->date_modify . '</em></p>' : NULL ; ?>