<?php

$postTable = $app->getTable('postTable');

if (!empty($_POST)) {
    $result = $postTable->delete($_POST['id']);

    if ($result) {
        header('Location: admin.php');
    }
}