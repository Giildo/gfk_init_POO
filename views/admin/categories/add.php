<?php

$app->setTitle('Ajouter une catégorie');

use \Core\HTML\BootstrapForm;

$categoryTable = $app->getTable('CategoryTable');

if (!empty($_POST)) {
    $result = $categoryTable->update('INSERT INTO `categories`(`name`) VALUES (:name)', $_POST);
    
    if ($result) {
        header('Location: admin.php?p=category.index');
    }
}

$form = new BootstrapForm();

?>

<h1>Ajouter une nouvelle catégorie</h1>

<form method="post">
    <?= $form->fields('input', 'name', 'Nom de la catégorie'); ?>
    <?= $form->submit('Valider'); ?>
</form>