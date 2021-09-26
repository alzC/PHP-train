<?php
require_once 'class/message.php';
require_once 'class/GuestBook.php';
$errors = null;
$success = false;
$guestbook = new GuestBook(__DIR__ . DIRECTORY_SEPARATOR . 'data' . DIRECTORY_SEPARATOR . 'message');
if (isset($_POST['username'], $_POST['message'])) {
    $message = new Message($_POST['username'], $_POST['message']);
    if ($message->isValid()) {
        $guestbook->addMessage($message);
        $success = true;
        $_POST = [];
    } else {
        $errors =  $message->getErrors();
    }
}
$messages = $guestbook->getMessage();
$title = "Livre d'or";
require 'elements/header.php';

?>

<div class="container">
    <h1>Livre d'or</h1>

    <?php if (!empty($errors)) : ?>
        <div class="alert alert-danger">
            Formulaire invalide
        </div>
    <?php endif ?>
    <?php if (!empty($success)) : ?>
        <div class="alert alert-success">
            Merci pour votre message
        </div>
    <?php endif ?>
    <form action="" method="post" class="">
        <div class="form-group">
            <input value="<?= htmlentities($_POST['username']) ?? '' ?>" class="form-control <?= isset($errors['username']) ? 'is-invalid' : '' ?>" type="text" name="username" placeholder="Votre pseudo">
            <?php if (isset($errors['username'])) : ?>
                <div class="invalid-feedback"><?= $errors['username'] ?></div>
            <?php endif ?>
        </div>
        <div class="form-group">
            <textarea class="form-control <?= isset($errors['message']) ? 'is-invalid' : '' ?>" name="message" placeholder="Ecrire votre message"><?= htmlentities($_POST['message']) ?? '' ?></textarea>
            <?php if (isset($errors['message'])) : ?>
                <div class="invalid-feedback"><?= $errors['message'] ?></div>
            <?php endif ?>
        </div>
        <button type="submit" class="btn btn-primary">Envoyer</button>
    </form>
    <?php if (!empty($messages)) : ?>
        <h1 class="mt-4">Vos message :</h1>
        <?php foreach ($messages as $messages) : ?>
            <?= $messages->toHTML() ?>
        <?php endforeach ?>
    <?php endif ?>
</div>


<?php require 'elements/footer.php'; ?>