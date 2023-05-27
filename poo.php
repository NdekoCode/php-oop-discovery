<?php

use App\Autoloader;
use App\Models\AnnoncesModel;

require_once (__DIR__) . DIRECTORY_SEPARATOR . "Libs" . DIRECTORY_SEPARATOR . "functions.php";
$title = "OPP";

loadFile("partials", "header", compact("title"));
loadFile("partials", "navbar");

loadFile("/", 'Autoloader');


Autoloader::register();

$annonce = new AnnoncesModel();
$data = $annonce->find(2);
varDumper($data);

?>

<?php
loadFile("partials", "footer");
?>