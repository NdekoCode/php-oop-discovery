<?php
require_once __DIR__ . DIRECTORY_SEPARATOR . "Libs" . DIRECTORY_SEPARATOR . "functions.php";
$title = "Login";

loadFile("partials", "header", compact("title"));
loadFile("partials", "navbar");
if (!isConnect()) {
    header("Location: /signin.php", true, 303);
    die();
}
?>

<div class="container mx-auto max-w-7xl">
    <p class="mb-3 text-3xl text-gray-800">Salut <strong class="font-bold underline"><?= $_SESSION['user']['pseudo'] ?></strong></p>
    <div class="p-3 border border-gray-100 flex  justify-center flex-col rounded-md shadow-md min-w-[250px] w-max min-h-[250px]">
        <p class="mb-3 text-gray-600">Pseudo : <strong class="font-bold"><?= $_SESSION['user']['pseudo'] ?></strong></p>
        <p class="text-gray-600">Email : <strong class="font-bold"><?= $_SESSION['user']['email'] ?></strong></p>

    </div>
    .
</div>
<?php

loadFile("partials", "footer");
