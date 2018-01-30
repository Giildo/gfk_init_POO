<?php

$app->setTitle('Ajouter un article');

use \Core\HTML\BootstrapForm;

$postTable = $app->getTable('PostTable');
$categoryTable = $app->getTable('CategoryTable');
$categories = $categoryTable->all();

if (!empty($_POST)) {
    $result = $postTable->update('INSERT INTO `posts`(`title`, `content`, `date`, `category_id`) VALUES (:title, :content, NOW(), :category_id)', $_POST);
    
    if ($result) {
        header('Location: admin.php?p=post.modify&id=' . $app->getDb()->lastInsertId('posts'));
    }
}

$form = new BootstrapForm();

?>

<h1>Ajouter un nouvel article</h1>

<form method="post">
    <?= $form->fields('input', 'title', 'Titre'); ?>
    <?= $form->fields('textArea', 'content', 'Article', ['rows' => '10']); ?>

    <?= $form->fields('select', 'category_id', 'Catégories', ['selects' => $categories, 'categoryId' => $post->category_id]); ?>

    <?= $form->submit('Valider'); ?>
</form>