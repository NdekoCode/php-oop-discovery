<?php

use App\Autoloader;
use App\Models\AnnoncesModel;

require_once (__DIR__) . DIRECTORY_SEPARATOR . "Libs" . DIRECTORY_SEPARATOR . "functions.php";
$title = "OPP";

loadFile("partials", "header", compact("title"));
loadFile("partials", "navbar");

loadFile("/", 'Autoloader');


Autoloader::register();

$model = new AnnoncesModel();
$data = $model->find(1);
$annonce = $model->setTitle("Nouvelle annonce")
    ->setDescription("Le future grand developpeur est en train de sonner à la porte")
    ->setActive(1);
varDumper($data);

?>

<?php
loadFile("partials", "footer");
?>