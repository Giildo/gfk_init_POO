<?php

$categoryTable = $app->getTable('categoryTable');

if (!empty($_POST)) {
    $result = $categoryTable->delete($_POST['id']);

    if ($result) {
        header('Location: admin.php?p=category.index');
    }
}