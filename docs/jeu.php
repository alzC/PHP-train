<?php
require_once 'elements/menu_function.php';
$parfums = [
    'Fraise' => 4,
    'Chocolat' => 5,
    'Vanille' => 3
];
$cornets = [
    'Pot' => 2,
    'Cornet' => 3
];
$supplements = [
    'Pepites de chocolat ' => 1,
    'Chantilly' => 0.5
];
$title = "Composer votre glace";

$ingredients = [];
$total = 0;

foreach (['parfum', 'supplement'] as $name) {
    if (isset($_GET[$name])) {
        $liste = $name . 's';
        foreach ($_GET[$name] as $value) {
            if (isset($$liste[$value])) {
                $ingredients[] = $value;
                $total += $$liste[$value];
            }
        }
    }
}




if (isset($_GET['cornet'])) {
    $cornet = $_GET["cornet"];
    if (isset($cornets[$cornet])) {
        $ingredients[] = $cornet;
        $total += $cornets[$cornet];
    };
}

require 'elements/header.php'
?>
<h1 style="text-align:center;"><?= $title ?> </h1>


<div class="row">
    <div class="col-md-4">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Votre glace</h5>
                <ul>
                    <?php foreach ($ingredients as $ingredient) : ?>
                        <li> <?= $ingredient ?></li>
                    <?php endforeach; ?>
                </ul>
                <p>
                    <strong>
                        Prix :
                    </strong> <?= $total ?> €
                </p>
            </div>
        </div>

    </div>
    <div class="col-md-8">
        <form action="/jeu.php" method="GET">
            <div>
                <div>
                    <h2>Choisissez votre parfum</h2>
                    <?php foreach ($parfums as $parfum => $prix) : ?>
                        <div class="checkbox">
                            <label>
                                <?= checkbox('parfum', $parfum, $_GET) ?>
                                <?= $parfum ?> - <?= $prix ?> €
                            </label>
                        </div>
                    <?php endforeach; ?>
                </div>

                <div class="ml-3">
                    <h2>Choisissez votre cornet</h2>
                    <?php foreach ($cornets as $cornet => $prix) : ?>
                        <div class="checkbox">
                            <label>
                                <?= radio('cornet', $cornet, $_GET) ?>
                                <?= $cornet ?> - <?= $prix ?> €
                            </label>
                        </div>
                    <?php endforeach; ?>
                </div>

                <div class="ml-3">
                    <h2>Choisissez votre supplément</h2>
                    <?php foreach ($supplements as $supplement => $prix) : ?>
                        <div class="checkbox">
                            <label>
                                <?= checkbox('supplement', $supplement, $_GET) ?>
                                <?= $supplement ?> - <?= $prix ?> €
                            </label>
                        </div>
                    <?php endforeach; ?>
                </div>

            </div>
            <button type="submit" class="btn btn-primary"> composer ma glace</button>
        </form>
    </div>
</div>



<h2>$_GET</h2>
<pre>
<?php var_dump($_GET) ?>
</pre>

<h2>$_POST</h2>
<pre>
<?php var_dump($_POST) ?>
</pre>

<?php require 'elements/footer.php' ?>