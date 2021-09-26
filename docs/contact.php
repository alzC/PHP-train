<?php
session_start();
$title = "Nous contacter";
require_once 'data/config.php';
require_once 'elements/menu_function.php';
date_default_timezone_set('Europe/Paris');
$heure = (int)($_GET['heure'] ?? date('G'));
$jour = (int)($_GET['jour'] ?? date('N') - 1);
$creneaux = CRENEAUX[$jour];
$ouvert = in_creneaux($heure, $creneaux);
$color = $ouvert ? 'green' : 'red';
require 'elements/header.php';
?>

<div class="row">
   <div class="col-md-8">
      <h2>Debug</h2>
      <pre><?= var_dump($_SESSION) ?></pre>
      <h2>Nous contacter</h2>
      <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Id quos vero dicta distinctio eligendi. Esse, laborum. Fugit odit ipsa rem? Unde, similique. Reiciendis deleniti dignissimos asperiores. Sequi perferendis unde perspiciatis.</p>
   </div>
   <div class="col-md-4">
      <h2>Horaire d'ouverture</h2>
      <?php if ($ouvert) : ?>
         <div class="alert alert-success">
            le magasin sera ouvert
         </div>
      <?php else : ?>
         <div class="alert alert-danger">
            le magasin sera fermé
         </div>
      <?php endif ?>
      <form action="" method="GET">
         <div class="form-group">
            <?= select('jour', $jour, JOURS) ?>

         </div>
         <div class="form-group">
            <input class="form-control" type="number" name="heure" value="<?= $heure ?>">
         </div>
         <button class="btn btn-primary" type="submit">Voir si le magasin est ouvert</button>
      </form>
      <ul>
         <?php foreach (JOURS as $k => $jour) : ?>
            <li>
               <strong><?= $jour ?></strong>
               <?= creneaux_html(CRENEAUX[$k]); ?>
            </li>
         <?php endforeach; ?>
      </ul>
   </div>
</div>
<?php require 'elements/footer.php' ?>