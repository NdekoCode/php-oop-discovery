<?php
$title = "Super variable";
require_once __DIR__ . DIRECTORY_SEPARATOR . "libs" . DIRECTORY_SEPARATOR . "functions.php";

loadFile("partials", "header", compact("title"));
loadFile("partials", "navbar");
debugPrint($_SERVER['REMOTE_ADDR']);
debugPrint($_COOKIE);
debugPrint($_SESSION);

?>
<?php


loadFile("partials", "footer");
?>