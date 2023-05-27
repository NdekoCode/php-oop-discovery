<?php
require_once __DIR__ . DIRECTORY_SEPARATOR . 'Libs' . DIRECTORY_SEPARATOR . 'functions.php';
$id = (int)$_GET['id'] ?? null;
$bdd  = null;
$data = null;
if ($id) {
    $bdd = connectDb();
    $request  = $bdd->prepare("SELECT * FROM jeux_video WHERE ID=? LIMIT 1");
    $request->execute([$id]);
    $data = $request->fetch();
}
if (isNotEmpty($_POST)) {
    $nom = validFieldData($_POST['game-name']) ?? "";
    $possesseur = validFieldData($_POST['game-possesor'])  ?? "";
    $console = validFieldData($_POST['console-name'])  ?? "";
    $prix = (float) validFieldData($_POST['price'])  ?? 0;
    $nbre_joueurs_max = (float)validFieldData($_POST['max-number-gamer'])  ?? 0;
    $commentaires = validFieldData($_POST['comment'])  ?? "";
    $schema = compact('nom', 'possesseur', 'console', 'prix', 'nbre_joueurs_max', 'commentaires', 'commentaires');
    $request = $bdd->prepare("UPDATE jeux_video SET nom=:nom,possesseur=:possesseur,console=:console,prix=:prix,nbre_joueurs_max=:nbre_joueurs_max,commentaires=:commentaires WHERE ID=:id");
    $schema['id'] = $id;
    if ($request) {
        debugPrint($schema);
        $response =  $request->execute($schema);
        if ($response) {
            header("Location: /games.php");
            $_SESSION['success'] = "Game modifier avec success";
            exit();
        } else {
            $_SESSION['error'] = "Error lors de la modification";
            header("Location: /games.php");
        }
    }
}
$title = "Add a game";
loadFile("partials", "header", compact('title'));
loadFile("partials", "navbar"); ?>
<div class="container mx-auto max-w-7xl">

    <form action="" method="POST" class="max-w-5xl p-5 mx-auto mt-5 transition-all shadow hover:shadow-xl rounded-2xl">
        <div class="flex w-full gap-3">

            <div class="w-1/2 mb-3">
                <label for="game-name" class="block mb-1 text-base text-gray-600">Game name</label>
                <input value="<?= $_POST['gamge-name'] ?? $data['nom'] ?? "" ?>" type="text" name="game-name" id="game-name" placeholder="Game name" class="w-full px-3 py-2 text-sm transition-all duration-200 rounded shadow outline-none placeholder:text-gray-300 ring ring-transparent focus:ring-blue-100 focus:ring-offset-1">
            </div>

            <div class="w-1/2 mb-3">
                <label for="game-possesor" class="block mb-1 text-base text-gray-600">Game possesor</label>
                <input type="text" value="<?= $_POST['game-possesor'] ?? $data['possesseur'] ?? "" ?>" name="game-possesor" id="game-possesor" placeholder="Game possesor" class="w-full px-3 py-2 text-sm transition-all duration-200 rounded shadow outline-none placeholder:text-gray-300 ring ring-transparent focus:ring-blue-100 focus:ring-offset-1">
            </div>
        </div>
        <div class="flex gap-3">


            <div class="w-1/2 mb-3">
                <label for="console-name" class="block mb-1 text-base text-gray-600">Console</label>
                <input type="text" value="<?= $_POST['console-name'] ?? $data['console'] ?? "" ?>" name="console-name" id="console-name" placeholder="Console name" class="w-full px-3 py-2 text-sm transition-all duration-200 rounded shadow outline-none placeholder:text-gray-300 ring ring-transparent focus:ring-blue-100 focus:ring-offset-1">
            </div>

            <div class="w-1/2 mb-3">
                <label for="price" class="block mb-1 text-base text-gray-600">Game price</label>
                <input type="number" value="<?= $_POST['price'] ?? $data['prix'] ?? "" ?>" name="price" id="price" placeholder="Game price" class="w-full px-3 py-2 text-sm transition-all duration-200 rounded shadow outline-none placeholder:text-gray-300 ring ring-transparent focus:ring-blue-100 focus:ring-offset-1">
            </div>
        </div>

        <div class="mb-3">
            <label for="max-number-gamer" class="block mb-1 text-base text-gray-600">Max Number gamer</label>
            <input type="number" value="<?= $_POST['max-number-gamer'] ?? $data['nbre_joueurs_max'] ?? "" ?>" name="max-number-gamer" id="max-number-gamer" placeholder="Max Number gamer" class="w-full px-3 py-2 text-sm transition-all duration-200 rounded shadow outline-none placeholder:text-gray-300 ring ring-transparent focus:ring-blue-100 focus:ring-offset-1">
        </div>
        <div class="mb-3">
            <label for="comment" class="block mb-1 text-base text-gray-600">Comment</label>
            <textarea type="text" name="comment" id="comment" placeholder="Comment the game" class="w-full px-3 py-2 text-sm transition-all duration-200 rounded shadow outline-none placeholder:text-gray-300 ring ring-transparent focus:ring-blue-100 focus:ring-offset-1"><?= $_POST['comment'] ?? $data['commentaires'] ?? "" ?></textarea>
        </div>
        <button type="submit" class="px-3 py-2 my-1 text-white bg-blue-600 rounded">Add game</button>
    </form>
</div>
<?php

loadFile("partials", "footer");
