<?php

use App\Autoloader;
use App\Bank\{CompteCourant, CompteEpargne};
use App\Client\Compte;

require_once (__DIR__) . DIRECTORY_SEPARATOR . "Libs" . DIRECTORY_SEPARATOR . "functions.php";
$title = "OPP";

loadFile("partials", "header", compact("title"));
loadFile("partials", "navbar");

loadFile('class', 'Autoloader');


Autoloader::register();
$compteClient = new Compte("Arick", "Bulakali");
$compteClient1 = new Compte("Arick", "Bulakali");
$compteCourant = new CompteCourant($compteClient, 500, 200);
$compteEpargne = new CompteEpargne($compteClient1, 200, 10);
$compteCourant->deposer(30);
$compteCourant->retirer(640);

echo "\n Le taux d'interet est {$compteEpargne->getTauxInterets()}";
$compteEpargne->retirer(300);
varDumper($compteCourant, $compteEpargne);
?>

<?php
loadFile("footer", "partials");
?>