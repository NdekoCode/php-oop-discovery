<?php
require_once __DIR__ . DIRECTORY_SEPARATOR . "libs" . DIRECTORY_SEPARATOR . "functions.php";

if (isConnect()) {
    header("Location: /profile.php", true, 303);
    die();
}
$email = null;
$password = null;
if (isNotEmpty($_POST)) {
    if (isNotEmpty($_POST['email']) && isNotEmpty($_POST['password'])) {
        $email = validFieldData($_POST['email']);
        $password = validFieldData($_POST['password']);
        $_SESSION['user'] = [
            'email' => $email
        ];
    }
}
$title = "Login";

loadFile("partials", "header", compact("title"));
loadFile("partials", "navbar");
?>

<div class="container flex items-center justify-center w-full min-h-screen">

    <form method="POST" enctype="multipart/form-data" class="min-w[250px] min-h-[350px] shadow-md border p-5 rounded-md">
        <div class="mb-3">
            <label class="block mb-1 text-sm" for="email">Email</label>
            <input type="email" class="px-1 py-2 transition-all duration-300 border border-gray-100 rounded shadow outline-none focus:ring-blue-200 ring-transparent ring" name="email" id="email" />
        </div>
        <div class="mb-3">
            <label class="block mb-1 text-sm" for="password">Password</label>
            <input type="password" class="px-1 py-2 transition-all duration-300 border border-gray-100 rounded shadow outline-none focus:ring-blue-200 ring-transparent ring" name="password" id="password" autocomplete="true" />
        </div>

        <button type="submit" class="px-5 py-2 text-white transition-colors bg-blue-600 rounded hover:bg-blue-800 min-w-max">Valider</button>
    </form>
</div>
<?php

loadFile("partials", "footer");
