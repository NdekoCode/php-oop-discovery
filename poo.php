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
    "title" => "Ayanokoji Likes Kei – Classroom of the Elite S2 Ep 13 Review ",
    "description" => "The episode begins with a flashback of Ryuen killing a snake, wondering if he would have experienced fear if he waited for the snake to bite him. I’m sure that this is a clear analogy of Ryuen continually taunting and toying with Class D in order to identify their mastermind – just for the mastermind ‘snake’ to ‘bite’ him, allowing Ryuen to experience true fear.As Ryuen states to Ibuki when confronted about his behavior (paraphrasing) “a tyrant is only permitted so long as they embody a goal”. Ryuen not only failed to beat the mastermind once uncovering their identity, but was humiliated and broken in front of his most loyal comrades Ibuki, Albert, and Ishizaki.Now defeated with no motivation to continue on, Ayanokoji wants to enlist Ryuen in his scheme to get Kushida Kikyo expelled. I’ve heard that in the Light Novels Horikita Suzune repeatedly interferes with Kushida being taken care of, but hopefully that could change by the next anime season? ",
    "active" => 1
];
$model->hydrateData($annonce);
$model->create();

varDumper($model);

?>

<?php
loadFile("partials", "footer");
?>