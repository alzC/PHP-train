<?php
const BIRTHDAY_LABEL = 'birthday';
$age = null;
$birthday = null;

if (!empty($_POST[BIRTHDAY_LABEL])) {
    $birthday = $_POST[BIRTHDAY_LABEL];
    setcookie(BIRTHDAY_LABEL, $birthday);
}

if (!empty($_COOKIE[BIRTHDAY_LABEL])) {
    $birthday = $_COOKIE[BIRTHDAY_LABEL];
    $age = intval((new DateTime())->format('Y')) - $birthday;
}

require 'elements/header.php'; ?>

<?php if ($age >= 18) : ?>
    <h1>Du contenu réservé aux adultes</h1>
<?php elseif ($age < 18 && null !== $age) : ?>
    <div class="alert alert-danger">Vous n'avez pas l'age requis pour voir le contenu</div>
<?php else : ?>
    <form action="" method="post" class="form-group">
        <div class="form-inline">
            <label for="birthday">Section réservée pour les adultes, entrer votre année de naissance !</label>
            <select name="birthday" id="birthday" class="form-control">
                <?php for ($i = 2010; $i > 1919; $i--) : ?>
                    <option value="<?= $i ?>"><?= $i ?></option>
                <?php endfor;  ?>
            </select>
        </div>
        <button type="submit" class="btn btn-primary"> Envoyer</button>
    </form>
<?php endif; ?>

<?php require 'elements/footer.php'; ?>