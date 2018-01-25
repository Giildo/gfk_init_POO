<?php
use app\Table\Category;
use app\Table\Post;
use app\App;

$categories = Category::all();

$posts = Post::getPostByCategory($_GET['id']);
if (empty($posts)) {
	App::error404();
}
App::setTitle($posts[0]->category);
?>

<h1>Accueil</h1>

<div class="row">
	<ul class="col-sm-8">
		<?php foreach($posts as $post): ?>

			<h2><?= $post->title; ?></h2>

			<p><em><?= $post->category; ?></em></p>

			<p><?= $post->extract; ?></p>

		<?php endforeach; ?>
	</ul>

	<ul class="col-sm-4">
		<?php
		foreach($categories as $category):
		?>
		<li><a href="<?= $category->url; ?>"><?= $category->name; ?></a></li>
		<?php
		endforeach;
		?>
	</ul>
</div>