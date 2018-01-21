<?php
$post = $db->prepare('SELECT * FROM `posts` WHERE id=?', 'app\Table\Post', $_GET['id'], true);
?>

<h1><?= $post->title; ?></h1>

<p><?= $post->content; ?></p>