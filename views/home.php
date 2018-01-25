<?php
use app\Table\Category;
use app\Table\Post;

$categories = Category::all();
?>

<h1>Accueil</h1>

<div class="row">
	<ul class="col-sm-8">
		<?php foreach(Post::getLastPosts() as $post): ?>

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