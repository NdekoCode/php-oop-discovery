<?php

require_once (__DIR__) . DIRECTORY_SEPARATOR . "libs" . DIRECTORY_SEPARATOR . "functions.php";
$title = "OPP";

loadFile('class' . DS . 'Bank', 'Compte');
loadFile('class' . DS . 'Bank', 'CompteCourant');
loadFile('class' . DS . 'Bank', 'CompteEpargne');
loadFile('class' . DS . 'Client', 'Compte');
loadFile("partials", "header", compact("title"));
loadFile("partials", "navbar");

use App\Client\Compte;
use App\Bank\{CompteCourant, CompteEpargne};

$compteCourant = new CompteCourant("Arick", 500, 200);
$compteEpargne = new CompteEpargne("Marcos", 200, 10);
$compteClient = new Compte();
$compteCourant->deposer(30);
$compteCourant->retirer(640);

echo "\n Le taux d'interet est {$compteEpargne->getTauxInterets()}";
$compteEpargne->retirer(300);
varDumper($compteCourant, $compteEpargne, $compteClient);
?>

<?php
loadFile("partials", "footer");
?>