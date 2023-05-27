<?php
require_once __DIR__ . DIRECTORY_SEPARATOR . "Libs" . DIRECTORY_SEPARATOR . "functions.php";

if (isConnect()) {
    header("Location: /profile.php", true, 303);
    die();
}
$validData = fn ($value) => validFieldData($value);
if (!empty($_POST)) {

    $_POST = array_map($validData, $_POST);
    extract($_POST);
    if (isNotEmpty($email) && isNotEmpty($password)) {
        $dbb = connectDb();
        $request = $dbb->prepare("SELECT * FROM users WHERE email=? LIMIT 1");
        $request->execute([$email]);
        $user = $request->fetch();
        if ($user && password_verify($password, $user['password'])) {
            $_SESSION['user'] = [
                'id' => $user['id'],
                'email' => $user['email'],
                'pseudo' => $user['pseudo']
            ];
            redirect("/profile.php", true, 303);
        } else {

            $_SESSION['errors']['user'] = "Mot de passe ou email invalide";
            redirect("/signin.php", true);
        }
    } else {
        $_SESSION['errors']['user'] = "Email ou Mot de passe invalide";
        redirect("/signin.php", true);
    }
}
$title = "Login";

loadFile("partials", "header", compact("title"));
loadFile("partials", "navbar");
?>

<?php if (isset($_SESSION['errors']['user'])) : ?>
    <div class="container px-3 mx-auto max-w-7xl sm:px-2">
        <div class="p-3 text-red-600 bg-red-100 border border-red-500 rounded"><?= $_SESSION['errors']['user'] ?></div>
    </div>
<?php endif; ?>
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
unset($_SESSION['errors']['user']);
