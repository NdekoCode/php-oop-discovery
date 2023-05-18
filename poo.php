<?php

require_once (__DIR__) . DIRECTORY_SEPARATOR . "libs" . DIRECTORY_SEPARATOR . "functions.php";
$title = "OPP";
loadFile('class', 'Compte');
loadFile("partials", "header", compact("title"));
loadFile("partials", "navbar");
$compte = new Compte("Arick", 430);
$compte1 = new Compte("Marcos", 850);
$compte->deposer(30);
$compte1->retirer(840);
varDumper($compte, $compte1);
?>

<?php
loadFile("partials", "footer");
?>