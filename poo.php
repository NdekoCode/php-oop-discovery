<?php

use App\Autoloader;
use App\Models\UsersModel;

require_once (__DIR__) . DIRECTORY_SEPARATOR . "Libs" . DIRECTORY_SEPARATOR . "functions.php";
$title = "OPP";

loadFile("partials", "header", compact("title"));
loadFile("partials", "navbar");

loadFile("/", 'Autoloader');


Autoloader::register();

$model = new UsersModel();

// $data = $model->find(1);
$user = [
    "pseudo" => "Terry",
    "email" => "atuny0@sohu.com",
    "password" => "9uQFF1Lh"
];
$model->hydrateData($user);
$model->create();

varDumper($model);

?>

<?php
loadFile("partials", "footer");
?>