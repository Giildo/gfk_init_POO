<?php
use \Core\Auth\DBAuth;
use \Core\HTML\BootstrapForm;

$app = App::getInstance();

if (!empty($_POST)) {
    $auth = new DBAuth($app->getDb());
    if ($auth->login($_POST['pseudo'], $_POST['mdp'])) {
        header('Location: admin.php');
    } else {
        ?>
        <br />
        <div class="alert alert-danger">
            Identifiants incorrects
        </div>
        <?php
    }
}

$form = new BootstrapForm($_POST);
?>

<form method="post">
    <?=$form->input('pseudo');?>
    <?=$form->input('mdp', 'mot de passe', ['type' => 'password']);?>
    <?=$form->submit('Valider', 'btn btn-warning');?>
</form>