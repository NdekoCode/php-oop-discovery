<?php
require_once __DIR__ . DIRECTORY_SEPARATOR . "libs" . DIRECTORY_SEPARATOR . "functions.php";
if (isConnect()) {
    header("Location: /profile.php", true, 303);
    die();
}
$email = null;
$password = null;
$valid = false;
$error = null;
$validData = fn ($value) => validFieldData($value);
if (isNotEmpty($_POST)) {
    $_POST = array_map($validData, $_POST);
    extract($_POST);
    if (isset($pseudo, $email, $password, $confpassword)) {

        if (!isValidEmail($email)) {
            $error = "email invalid";
        }
        if (!isValidStringField($pseudo, 2)) {
            $error = "Entrer un pseudo correct";
        }
        if (!isValidStringField($password, 5) || $password !== $confpassword) {
            $error = "Mot de passe invalid";
        }
        if (empty($error)) {
            $valid = true;
        }
        if ($valid) {

            $password = password_hash($password, PASSWORD_ARGON2ID);
            $dbb = connectDb();
            $request = $dbb->prepare("INSERT INTO users(pseudo,email,password) VALUES(:pseudo,:email,:password)");
            $request->execute(compact('pseudo', 'email', 'password'));

            redirect("/signin.php", true);
        }
    } else {

        // debugPrint($_POST);
        $error = "Veuillez remplir tous les champs requis";
    }
}
$title = "Login";

loadFile("partials", "header", compact("title"));
loadFile("partials", "navbar");
?>

<?php if ($error) : ?>
    <div class="container px-3 mx-auto max-w-7xl sm:px-2">
        <div class="p-3 text-red-600 bg-red-100 border border-red-500 rounded"><?= $error ?></div>
    </div>
<?php endif; ?>
<div class="container flex items-center justify-center w-full min-h-screen">
    <form method="POST" enctype="multipart/form-data" class="min-w[250px] min-h-[350px] shadow-md border p-5 rounded-md">
        <div class="mb-3">
            <label class="block mb-1 text-sm" for="pseudo">Pseudo</label>
            <input type="pseudo" value="<?= $_POST['pseudo'] ?? "" ?>" class="px-1 py-2 transition-all duration-300 border border-gray-100 rounded shadow outline-none focus:ring-blue-200 ring-transparent ring" name="pseudo" id="pseudo" />
        </div>
        <div class="mb-3">
            <label class="block mb-1 text-sm" for="email">Email</label>
            <input type="email" value="<?= $_POST['email'] ?? "" ?>" class="px-1 py-2 transition-all duration-300 border border-gray-100 rounded shadow outline-none focus:ring-blue-200 ring-transparent ring" name="email" id="email" />
        </div>
        <div class="mb-3">
            <label class="block mb-1 text-sm" for="password">Password</label>
            <input type="password" class="px-1 py-2 transition-all duration-300 border border-gray-100 rounded shadow outline-none focus:ring-blue-200 ring-transparent ring" name="password" id="password" autocomplete="true" />
        </div>
        <div class="mb-3">
            <label class="block mb-1 text-sm" for="confpassword">Confirm pass</label>
            <input type="password" class="px-1 py-2 transition-all duration-300 border border-gray-100 rounded shadow outline-none focus:ring-blue-200 ring-transparent ring" name="confpassword" id="confpassword" autocomplete="true" />
        </div>

        <button type="submit" class="px-5 py-2 text-white transition-colors bg-blue-600 rounded hover:bg-blue-800 min-w-max">M'inscrire</button>
    </form>
</div>
<?php

loadFile("partials", "footer");
