<h1>Accueil</h1>

<ul>
	<?php foreach($db->query('SELECT * FROM `posts`', 'app\Table\Post') as $post): ?>

		<h2><?= $post->title; ?></h2>

		<p><?= $post->extract; ?></p>

	<?php endforeach; ?>
</ul>

<p><a href="index.php?p=post">Page Single</a></p>
