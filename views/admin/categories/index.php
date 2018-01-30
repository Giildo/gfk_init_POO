<?php

use \App\Table\PostTable;
use \Core\HTML\BootstrapForm;

$form = new BootstrapForm([]);

$categories = App::getInstance()->getTable('categoryTable')->all();
?>

<h1>Administration</h1>


<table class="table">
    <thead>
        <tr>
            <td>ID</td>
            <td>Titre</td>
            <td>Actions</td>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($categories as $category) : ?>
        <tr>
            <td><?= $category->id; ?></td>
            <td><?= $category->name; ?></td>
            <td>
                <a href="<?= $category->modifyURL; ?>" class="btn btn-primary">Modifier</a>
                <form action="admin.php?p=category.delete" method="post" style="display:inline;">
                    <?= $form->input('id', '', ['type' => 'hidden', 'data' => $category->id]); ?>
                    <?= $form->submit('Supprimer', 'btn btn-danger'); ?>
                </form>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<p><a href="admin.php?p=category.add" class="btn btn-primary">Ajouter un nouvel article</a></p>