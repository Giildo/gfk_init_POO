<?php

$app->setTitle('Modifier une catégorie');

use \Core\HTML\BootstrapForm;

$categoryTable = $app->getTable('CategoryTable');

if (!empty($_POST)) {
    $_POST['id'] = $_GET['id'];

    $result = $categoryTable->update('UPDATE `categories` SET name=:name WHERE id=:id', $_POST);
    
    if ($result) {
        ?>
            <div class="alert alert-success">La catégorie a été modifiée avec succès !</div>
        <?php
    }
}

$category = $categoryTable->find($_GET['id']);

$form = new BootstrapForm($category);

?>

<h1>Modifier la catégorie</h1>

<form method="post">
    <?= $form->fields('input', 'name', 'Nom de la catégorie'); ?>
    <?= $form->submit('Valider'); ?>
</form>