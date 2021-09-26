<?php

setcookie('nom', $user['nom']);

$nom = null;
if (!empty($_GET['action']) && $_GET['action'] === 'deconnecter') {
    unset($_COOKIE['utilisateur']);
    setcookie('utilisateur', '', time() - 10);
}
if (!empty($_COOKIE['utilisateur'])) {
    $nom = $_COOKIE['utilisateur'];
}
if (!empty($_POST['nom'])) {
    setcookie('utilisateur', $_POST['nom']);
    $nom = $_POST['nom'];
}

require 'elements/header.php';
?>

<?php if ($nom) : ?>
    <h1>Bonjour <?= htmlentities($nom) ?></h1>
    <a href="profil.php?action=deconnecter">Se déconecter</a>
<?php else : ?>
    <form action="" method="post" class="form-inline">
        <div class="form-group">
            <label for="prename">
                <input type="text" name="nom" placeholder="Entrez votre nom" class="form-control">
            </label>
        </div>
        <button class="btn btn-primary">validate</button>
    </form>
<?php endif; ?>








<?php require 'elements/footer.php'; ?>