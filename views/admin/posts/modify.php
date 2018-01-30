<?php

$app->setTitle('Modifier un article');

use \Core\HTML\BootstrapForm;

$postTable = $app->getTable('PostTable');
$categoryTable = $app->getTable('CategoryTable');
$categories = $categoryTable->all();

if (!empty($_POST)) {
    $_POST['id'] = $_GET['id'];

    $result = $postTable->update('UPDATE `posts` SET title=:title, content=:content, category_id=:category_id, date_modify=NOW() WHERE id=:id', $_POST);
    
    if ($result) {
        ?>
            <div class="alert alert-success">L'article a été modifié avec succès !</div>
        <?php
    }
}

$post = $postTable->find($_GET['id']);

$form = new BootstrapForm($post);

if (!$post) {
    $app->error404();
}

?>

<h1>Modifier l'article "<?= $post->title; ?>"</h1>

<form method="post">
    <?= $form->fields('input', 'title', 'Titre'); ?>
    <?= $form->fields('textArea', 'content', 'Article', ['rows' => '10']); ?>

    <?= $form->fields('select', 'category_id', 'Catégories', ['selects' => $categories, 'categoryId' => $post->category_id]); ?>

    <?= $form->submit('Valider'); ?>
</form>