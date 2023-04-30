<?php
require_once __DIR__ . DIRECTORY_SEPARATOR . "libs" . DIRECTORY_SEPARATOR . "functions.php";
$title = "Login";

loadFile("partials", "header", compact("title"));
loadFile("partials", "navbar");
if (!isConnect()) {
    header("Location: /signin.php", true, 303);
    die();
}
?>

<div class="container flex items-center justify-center w-full min-h-screen">
    <h1 class="mb-3 text-3xl font-bold text-gray-800">Salut <?= $_SESSION['user']['email'] ?></h1>
</div>
<?php

loadFile("partials", "footer");
