<?php

use app\App;
use app\Table\Post;
use app\Table\Category;

$post = Post::find($_GET['id']);
if ($post === false) {
	App::error404();
}

App::setTitle($post->title);

$category = Category::find($post->category_id);
?>

<h1><?= $post->title; ?></h1>
<p><em><?= $category->name; ?></em></p>

<p><?= $post->content; ?></p>