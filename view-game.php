<?php require_once __DIR__ . DIRECTORY_SEPARATOR . "Libs" . DIRECTORY_SEPARATOR . "functions.php";

$param = validFieldData($_GET['id'] ?? "");
$game = null;
$title = null;
$bdd = connectDb();
if (!empty($param)) {
    $request = $bdd->prepare("SELECT * FROM jeux_video WHERE ID=? LIMIT 1");
    $request->execute([$param]);
    $game = $request->fetch();
    $title =  $game['nom'];
}

loadFile("partials", "header", compact('title'));
loadFile("partials", "navbar");
?>

<div class="container mx-auto mt-5 max-w-7xl">
    <?php if (isNotEmpty($game)) : ?>

        <div class="border rounded-md shadow-lg min-w-[250px] min-h-[250px] p-3">
            <h2 class="block mb-3 text-xl font-bold text-gray-700"> A : <?= $game['nom'] ?></h2>
            <ul class="my-1 text-base text-gray-500">
                <li class="mb-1">Proprietaire: <?= $game['possesseur'] ?></li>
                <li class="mb-1">Type d'appareil: <?= $game['console'] ?></li>
                <li class="mb-1">Prix: <?= $game['prix'] ?>€</li>
                <li class="mb-1">Nombre de joueur max: <?= $game['nbre_joueurs_max'] ?></li>
            </ul>
            <div class="flex gap-1">

                <a href="./delete-game.php?id=<?= $game['ID'] ?>" class="px-3 py-2 my-1 text-white bg-red-600 rounded">
                    Delete game</a>
                <a href="./update-game.php?id=<?= $game['ID'] ?>" class="px-3 py-2 my-1 text-white bg-yellow-600 rounded">Update game</a>
            </div>
        </div>
    <?php else : ?>

        <div class="flex flex-wrap items-center justify-center gap-5">
            <h6 class="mb-3 text-xl font-bold">Not data found</h6>
        </div>
    <?php
    endif; ?>

</div>
<?php
loadFile("partials", "footer");
