<?php

require_once (__DIR__) . DIRECTORY_SEPARATOR . "libs" . DIRECTORY_SEPARATOR . "functions.php";

$title = "OPP";

loadFile('class', 'Compte');
loadFile('class', 'CompteCourant');
loadFile('class', 'CompteEpargne');
loadFile("partials", "header", compact("title"));
loadFile("partials", "navbar");

$compteCourant = new CompteCourant("Arick", 500, 200);
$compteEpargne = new CompteEpargne("Marcos", 200);
$compteCourant->deposer(30);
$compteCourant->retirer(640);

echo "\n Le taux d'interet est {$compteEpargne->getTauxInteret()}";
$compteEpargne->retirer(300);
varDumper($compteCourant, $compteEpargne);
?>

<?php
loadFile("partials", "footer");
?>