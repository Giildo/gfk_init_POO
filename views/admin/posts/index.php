<?php

use \App\Table\PostTable;
use \Core\HTML\BootstrapForm;

$form = new BootstrapForm([]);

$posts = App::getInstance()->getTable('PostTable')->all();
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
        <?php foreach ($posts as $post) : ?>
        <tr>
            <td><?= $post->id; ?></td>
            <td><?= $post->title; ?></td>
            <td>
                <a href="<?= $post->modifyURL; ?>" class="btn btn-primary">Modifier</a>
                <form action="admin.php?p=post.delete" method="post" style="display:inline;">
                    <?= $form->input('id', '', ['type' => 'hidden', 'data' => $post->id]); ?>
                    <?= $form->submit('Supprimer', 'btn btn-danger'); ?>
                </form>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<p><a href="admin.php?p=post.add" class="btn btn-primary">Ajouter un nouvel article</a></p>

<div class="row">
</div>