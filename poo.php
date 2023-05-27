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
// $data = $model->find(1);
$annonce = [
    "title" => "Ndekocode compatibility",
    "description" => "mixed is soft-reserved since PHP 7. Until PHP 8, it is technically possible to declare a class with name mixed, and it will not raise any errors, warnings, or notices. PHPDoc standard widely used mixed as a type declaration, so it is highly unlikely that even the wildest code base out there declares a class with name mixed.",
    "active" => 1
];
$model->hydrateData($annonce);
$model->update(1);

varDumper($model);

?>

<?php
loadFile("partials", "footer");
?>